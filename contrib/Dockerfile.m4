FROM m4BaseContainerPath()/alpine-node-builder:1.0.0 as node_builder

ENV NPM_CONFIG_CACHE /cache/npm

COPY /app/src/.babelrc /app/src/package.json /app/src/webpack.config.js /app/src/
WORKDIR /app/src/
RUN yarn install
COPY /app/src/resources/assets/ /app/src/resources/assets
RUN yarn build

FROM m4BaseContainerPath()/alpine-php7.2-builder:1.0.0 as composer_builder

ARG composer_cache_dir="/build_cache/composer/"
ENV COMPOSER_HOME $composer_cache_dir
WORKDIR /app/src/
COPY /app/src/composer.json /app/src/

RUN apk update \
    && apk add --no-cache \
            libpng \
            libpng-dev \
            gnupg \
            openssl \
            git \
            curl \
            mysql-client \
            icu-dev \
            gettext-dev && \
    apk add --update  php7-gd \ 
            php7-gettext \
            # php7-exif \
            php7-dom \
            php7-pdo_mysql \
            php7-pdo_sqlite \
            php7-bz2 \
            php7-opcache \
            php7-tokenizer && \
    /usr/local/bin/composer-install-wrapper.sh

# Build the PHP container
FROM m4BaseContainerPath()/alpine-php-fpm7.2-nginx:1.0.0

COPY / /
COPY --from=node_builder /app/src/public/assets/ /app/src/public/assets
COPY --from=composer_builder /app/src/vendor/ /app/src/vendor/
COPY --from=composer_builder /app/src/composer.lock /app/src/composer.lock

RUN find /app/src/storage/ -type f -not -name .gitignore -exec rm {} \; \
    && rm -f /app/src/import/* /app/src/config/config.php

WORKDIR /app/src

RUN apk update \
    && apk add --no-cache \
            libpng \
            libpng-dev \
            gnupg \
            openssl \
            git \
            curl \
            mysql-client \
            icu-dev \
            gettext-dev && \
    apk add --update  php7-gd \ 
            php7-gettext \
            # php7-exif \
            php7-dom \
            php7-pdo_mysql \
            php7-pdo_sqlite \
            php7-bz2 \
            php7-opcache \
            php7-tokenizer

ENV TRUSTED_PROXIES 10.0.0.0/8,::ffff:10.0.0.0/8,\
                    127.0.0.0/8,::ffff:127.0.0.0/8,\
                    172.16.0.0/12,::ffff:172.16.0.0/12,\
                    192.168.0.0/16,::ffff:192.168.0.0/16,\
                    ::1/128,fc00::/7,fec0::/10


ENV VERSION_TAG m4ProjectVersion()
LABEL image.name=m4ProjectName() \
      image.version=m4ProjectVersion() \
      image.tag=m4ReleaseImage() \
      image.scm.commit=$commit \
      image.scm.url=m4GitOriginUrl() \
      image.author="Maximilian Berghoff <maximilian.berghoff@gmx.de>"

