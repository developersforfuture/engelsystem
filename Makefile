.PHONY:  contrib/kubernetes/app.production.yaml, contrib/Dockerfile, unit_test, release, contrib/dobi.yaml, push_tag
unit_test:
	@echo "+++ Unit tests +++"

override projectRootDir = ./
override projectVersionFile = VERSION
override projectVersion = $(shell head -n1 $(projectVersionFile))
override gitOriginUrl = $(shell git config --get remote.origin.url)
override projectName=engelsystem
override projectRegistry=$(REGISTRY)
override projectPath=$(REPOSITORY_PATH)
override baseContainerPath=registry.gitlab.com/froscon/php-track-web
override releaseImage = $(REGISTRY)/$(REPOSITORY_PATH)/app-$(RUNTIME):$(projectVersion)

override containerBasePath=$(REGISTRY)/$(REPOSITORY_PATH)/app-$(RUNTIME)
override dobiDeps = contrib/kubernetes/app.production.yaml contrib/dobi.yaml contrib/Dockerfile docker_login
dobiTargets = shell build push autoclean

# helper macros
override getImage = $(firstword $(subst :, ,$1))
override getImageTag = $(or $(word 2,$(subst :, ,$1)),$(value 2))
override printRow = @printf "%+22s = %-s\n" $1 $2

override M4_OPTS = \
	--define m4ProjectName=$(projectName) \
	--define m4ProjectVersion=$(projectVersion) \
	--define m4GitOriginUrl=$(gitOriginUrl) \
	--define m4ReleaseImage=$(call getImage, $(releaseImage)) \
	--define m4ReleaseImageTag=$(call getImageTag, $(releaseImage),latest) \
	--define m4ContainerBasePath=$(containerBasePath) \
	--define m4BaseContainerPath=$(baseContainerPath)


contrib/kubernetes/app.production.yaml: contrib/kubernetes/app.production.m4.yaml $(projectVersionFile) Makefile
	@echo "\n + + + Build Kubernetes app yml + + + "
	@m4 $(M4_OPTS) contrib/kubernetes/app.production.m4.yaml  > contrib/kubernetes/app.production.yaml

contrib/Dockerfile: contrib/Dockerfile.m4
	@echo "\n + + + Build Dockerfile + + + "
	@m4 $(M4_OPTS) contrib/Dockerfile.m4 > contrib/Dockerfile

contrib/dobi.yaml: contrib/dobi.yaml.m4 $(projectVersionFile) Makefile
	@m4 $(M4_OPTS) contrib/dobi.yaml.m4 > contrib/dobi.yaml

$(dobiTargets): $(dobiDeps)
	@dobi -f contrib/dobi.yaml $@

clean: | autoclean
	-@rm -rf contrib/.dobi contrib/dobi.yaml contrib/Dockerfile contrib/kubernetes/app.production.yaml

args=$(filter-out $@,$(MAKECMDGOALS))
VERSION_TAG=$(args)
release:
	$(if $(args),,$(error: set project version string, when calling this task))
	@echo "\n + + + Set next version: $(VERSION_TAG) + + + "
	@echo $(VERSION_TAG) > ./VERSION
	@make contrib/kubernetes/app.production.yaml
	@echo "\n + + + Push tags to repository + + + "
	@git add .
	@git commit -m "Changes for next release $(VERSION_TAG)"
	@git tag -s $(VERSION_TAG) -m "Next release $(VERSION_TAG)"
	@git push --tags origin master


docker_login:
	@echo "\n + + + Login into registry: $(REGISTRY) with user $(REGISTRY_USER):$(REGISTRY_PASSWORD) +  +  + "
	@docker login -p$(REGISTRY_PASSWORD) -u$(REGISTRY_USER) $(REGISTRY)

docker_logout:
	@echo "\n + + + Logout from registry: $(REGISTRY) +  +  + "
	@docker logout $(REGISTRY)
