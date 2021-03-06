<?php
// there have been many new translations added.
// For each of them, check if we already got it and create it if not
// We can conviniently do this with "INSERT IGNORE" and a UNIQUE key:

$res = sql_select("SHOW INDEX FROM `Sprache` WHERE `Key_name` = 'TextID'");
if($res[0]['Non_unique'] != 0) {
    sql_query("ALTER TABLE `Sprache` DROP INDEX `TextID`, ADD UNIQUE (`TextID`, `Sprache`)");
    $applied = true;
}

$res = mysql_query("INSERT IGNORE INTO `Sprache` (`TextID`, `Sprache`, `Text`) VALUES
('Hallo', 'DE', 'Hallo '),
('Hallo', 'EN', 'Greetings '),
('2', 'DE', ',\\r\\n\\r\\nIm Engelsystem eingeloggt..\\r\\nW&auml;hle zum Abmelden bitte immer den Abmelden-Button auf der linken Seite.'),
('3', 'DE', 'Neuen Eintrag erfassen...'),
('3', 'EN', 'Create new entry...'),
('4', 'EN', 'Entry saved.\\r\\n\\r\\n'),
('4', 'DE', 'Eintrag wurde gesichert.\\n\\n'),
('2', 'EN', ',\\r\\n\\r\\nyou are now logged in.\\r\\nTo log out please choose the logout-button on the right side.'),
('5', 'DE', 'Seite: '),
('5', 'EN', 'Page: '),
('6', 'DE', 'Neue News erstellen:'),
('6', 'EN', 'Create new News:'),
('7', 'DE', 'Betreff:'),
('7', 'EN', 'Subject:'),
('8', 'EN', 'Text:'),
('8', 'DE', 'Text:'),
('9', 'DE', 'Treffen:'),
('9', 'EN', 'Meeting:'),
('save', 'DE', 'Sichern'),
('save', 'EN', 'save'),
('back', 'DE', 'zur&uuml;ck '),
('back', 'EN', 'back '),
('top', 'DE', 'top'),
('top', 'EN', 'top '),
('13', 'DE', 'auf dieser Seite kannst Du deine pers&ouml;nlichen Einstellungen &auml;ndern, wie zum Beispiel dein Kennwort, Farbeinstellungen usw.\\r\\n\\r\\n'),
('13', 'EN', 'here you can change your personal settings i.e. password, color settings etc.\\r\\n\\r\\n'),
('14', 'DE', 'Hier kannst du dein Kennwort &auml;ndern.. '),
('14', 'EN', 'Here you can change your password.'),
('15', 'DE', 'Altes Passwort:'),
('15', 'EN', 'Old password:'),
('16', 'DE', 'Neues Passwort:'),
('16', 'EN', 'New password:'),
('17', 'DE', 'Passwortbest&auml;tigung:'),
('17', 'EN', 'password confirmation:'),
('18', 'DE', 'Hier kannst du dir dein Farblayout aussuchen:'),
('18', 'EN', 'Here you can choose your color settings:'),
('19', 'DE', 'Farblayout:'),
('19', 'EN', 'color settings:'),
('20', 'DE', 'Hier kannst Du dir deine Sprache aussuchen:\\r\\nHere you can choose your language:'),
('20', 'EN', 'Here you can choose your language:\\r\\nHier kannst Du dir deine Sprache aussuchen:'),
('21', 'DE', 'Sprache:'),
('21', 'EN', 'Language:'),
('22', 'DE', 'Hier kannst du dir einen Avatar aussuchen. Dies l&auml;sst neben deinem Nick z. B. in den News das Bildchen erscheinen.'),
('22', 'EN', 'Here you can choose your avatar. It will be displayed next to your Nick. '),
('23', 'DE', 'Avatar:'),
('23', 'EN', 'Avatar:'),
('24', 'DE', 'Keiner'),
('24', 'EN', 'nobody'),
('25', 'DE', 'Eingegebene Kennw&ouml;rter sind nicht gleich -&gt; OK.\\r\\nCheck ob altes Passwort ok ist:'),
('25', 'EN', 'The passwords entered don&#039;t match. -&gt; OK.\\r\\nCheck if the old password is correct:'),
('26', 'DE', '-> OK.\\r\\n'),
('26', 'EN', '-> OK.'),
('27', 'DE', 'Setzen des neuen Kennwortes...:'),
('27', 'EN', 'Set your new password...:'),
('28', 'DE', 'Neues Kennwort wurde gesetzt.'),
('28', 'EN', 'New password saved.'),
('29', 'DE', 'Ein Fehler ist aufgetreten.\\r\\nProbiere es noch einmal.'),
('29', 'EN', 'An error has occured.\\r\\nPlease try again.'),
('30', 'DE', '-> nicht OK.\\r\\nBitte nocheinmal probieren.'),
('30', 'EN', '-> not OK.\\r\\nPlease try again.\\r\\n'),
('31', 'DE', 'Kennw&ouml;rter sind nicht gleich. Bitte wiederholen.'),
('31', 'EN', 'The passwords don&#039;t match. Please try again.'),
('32', 'DE', 'Neues Farblayout wurde gesetzt. Mit der n&auml;chsten Seite wird es aktiv.'),
('32', 'EN', 'New color settings are saved. On the next page it will be active.'),
('33', 'DE', 'Sprache wurde gesetzt. Mit der n&auml;chsten Seite wird es aktiv.'),
('33', 'EN', 'Language is saved. On the next page it will be active.'),
('34', 'DE', 'Avatar wurde gesetzt.'),
('34', 'EN', 'Avatar is saved.'),
('35', 'DE', '&lt;b&gt;Neue Anfrage:&lt;/b&gt;\\r\\nIn diesem Formular hast du die M&ouml;glichkeit, den Dispatchern eine Frage zu stellen. Wenn diese beantwortet ist, wirst du hier dar&uuml;ber informiert. Sollte die Frage von allgemeinem Interesse sein, wird diese in die FAQ &uuml;bernommen.'),
('35', 'EN', '<b>New Question</b>\\r\\nWith this form you may sumbit questions to our Dispatcher. Topics of common interest may be added to the FAQ. (Section: answered questions).\\r\\n'),
('36', 'DE', 'Stelle hier deine Frage'),
('36', 'EN', 'Tell us your question'),
('37', 'DE', 'Deine Anfrage war:'),
('37', 'EN', 'Your question was:'),
('38', 'DE', 'Diese liegt nun bei den Dispatchern zur Beantwortung vor.'),
('38', 'EN', 'It is queued for answering.'),
('39', 'DE', 'Deine bisherigen Anfragen:'),
('39', 'EN', 'Your past inquiries:'),
('40', 'DE', 'Offene Anfragen:'),
('40', 'EN', 'Open inquiries:'),
('41', 'DE', 'keine vorhanden...'),
('41', 'EN', 'nothing exists...'),
('42', 'DE', 'Beantwortete Anfragen:'),
('42', 'EN', 'Answered inquiries:'),
('pub_index_pass_no_ok', 'DE', 'Dein Passwort ist nicht korrekt. Bitte probiere es nocheinmal:'),
('pub_index_User_unset', 'DE', 'Es wurde kein User mit deinem Nick gefunden. Bitte probiere es noch einmal oder wende dich an die Dispatcher.'),
('pub_index_User_more_as_one', 'DE', 'F&uuml;r deinen Nick gab es mehrere User... bitte wende dich an die Dispatcher'),
('Hello', 'DE', 'Hallo '),
('Hello', 'EN', 'Hello '),
('pub_schicht_beschreibung', 'DE', 'Hier kannst du dich f&uuml;r Schichten eintragen. Dazu such dir eine freie Schicht und klicke auf den Link! Du kannst dir eine Schicht &uuml;ber den Raum bzw. Datum aussuchen. W&auml;hle hierf&uuml;r einen Tag / ein Datum aus.'),
('pub_schicht_auswahl_raeume', 'DE', 'Zur Auswahl stehende R&auml;ume:'),
('pub_schicht_alles_1', 'DE', 'Und nat&uuml;rlich kannst du dir auch '),
('pub_schicht_alles_2', 'DE', 'alles '),
('pub_schicht_alles_3', 'DE', 'auf einmal anzeigen lassen.'),
('pub_schicht_Anzeige_1', 'DE', 'Anzeige des Schichtplans am '),
('pub_schicht_Anzeige_2', 'DE', ' im Raum: '),
('pub_schicht_Anzeige_3', 'DE', 'Anzeige des Schichtplans f&uuml;r den '),
('inc_schicht_engel', 'DE', 'Engel'),
('inc_schicht_engel', 'EN', 'Angel'),
('inc_schicht_ist', 'DE', 'ist'),
('inc_schicht_sind', 'DE', 'sind'),
('inc_schicht_weitere', 'DE', ' weitere'),
('inc_schicht_weiterer', 'DE', ' weiterer'),
('inc_schicht_werden', 'DE', ' werden '),
('inc_schicht_wird', 'DE', ' wird '),
('inc_schicht_noch_gesucht', 'DE', ' noch gesucht'),
('inc_schicht_und', 'DE', ' und '),
('pub_wake_beschreibung', 'DE', 'hier kannst du dich zum Wecken eintragen. Dazu sage einfach wann und wo und der Engel vom Dienst wird dich wecken.'),
('pub_wake_beschreibung2', 'DE', 'Alle eingetragenen Weckwünsche, die nächsten zuerst.'),
('pub_wake_Datum', 'DE', 'Datum'),
('pub_wake_Ort', 'DE', 'Ort'),
('pub_wake_Bemerkung', 'DE', 'Bermerkung'),
('lageplan_text1', 'DE', 'Hier eine &Uuml;bersicht &uuml;ber die Raumssituation:'),
('pub_wake_Text2', 'DE', 'Hier kannst du einen neuen Eintrag erfassen:'),
('pub_wake_bouton', 'DE', 'Weck mich!'),
('pub_wake_bouton', 'EN', 'wake me up!'),
('pub_wake_del', 'EN', 'delete'),
('pub_mywake_beschreibung1', 'DE', 'Hier siehst du die Schichten, f&uuml;r die du dich eingetragen hast.'),
('pub_mywake_beschreibung2', 'DE', 'Bitte versuche p&uuml;nktlich zu den Schichten zu erscheinen.'),
('pub_mywake_beschreibung3', 'DE', 'Hier hast du auch die M&ouml;glichkeit, dich bis '),
('pub_mywake_beschreibung4', 'DE', ' Stunden vor Schichtbeginn auszutragen.'),
('pub_mywake_anzahl1', 'DE', 'Du hast dich f&uuml;r '),
('pub_mywake_anzahl2', 'DE', ' Schichten eingetragen'),
('pub_mywake_Datum', 'DE', 'Datum'),
('pub_mywake_Uhrzeit', 'DE', 'Uhrzeit'),
('pub_mywake_Ort', 'DE', 'Ort'),
('pub_mywake_Bemerkung', 'DE', 'Bemerkung'),
('pub_mywake_austragen', 'DE', 'austragen'),
('pub_mywake_delate1', 'DE', 'Schicht wird ausgetragen...'),
('pub_mywake_add_ok', 'DE', 'Schicht wurde ausgetragen.'),
('pub_mywake_add_ko', 'DE', 'Sorry, ein kleiner Fehler ist aufgetreten... probiere es doch bitte nocheinmal :)'),
('pub_mywake_after', 'DE', 'zu sp&auml;t'),
('pub_index_pass_no_ok', 'EN', 'Your password is incorrect.  Please try it again:\\r\\n'),
('pub_index_User_unset', 'EN', 'No user was found with that Nickname.  Please try again.  If you are still having problems, ask an Dispatcher\\r\\n'),
('pub_index_User_more_as_one', 'EN', 'This nickname is registered for more than one user, please contact an Dispatcher.\\r\\n'),
('pub_schicht_beschreibung', 'EN', 'Here, you can register for shifts.  To do this, please choose an empty shift, and click the link.  You can choose the place, time and date of the shift. You can choose the date at the right.\\r\\n'),
('pub_schicht_alles_1', 'EN', 'And of course you can also choose to show\\r\\n'),
('pub_schicht_alles_2', 'EN', 'everything'),
('pub_schicht_alles_3', 'EN', ' at once.'),
('pub_schicht_auswahl_raeume', 'EN', 'To the selection of available areas.\\r\\n'),
('pub_schicht_Anzeige_1', 'EN', 'Show the shift schedule\\r\\n'),
('pub_schicht_Anzeige_2', 'EN', ' in Area: '),
('pub_schicht_Anzeige_3', 'EN', 'Show the shift schedule for\\r\\n'),
('inc_schicht_ist', 'EN', 'is'),
('inc_schicht_sind', 'EN', 'are '),
('pub_wake_beschreibung', 'EN', 'Here you can register for a wake-up \"call\".  Simply say when and where the drone should come to wake you.\\r\\n'),
('inc_schicht_weitere', 'EN', ' more'),
('inc_schicht_weiterer', 'EN', ' more'),
('inc_schicht_werden', 'EN', ' are '),
('inc_schicht_wird', 'EN', ' is  '),
('inc_schicht_noch_gesucht', 'EN', ' still needed '),
('inc_schicht_und', 'EN', ' and '),
('pub_wake_beschreibung2', 'EN', 'All ordered wake-up calls, next first.'),
('pub_wake_Datum', 'EN', 'Date'),
('pub_wake_Ort', 'EN', 'Place'),
('pub_wake_change', 'EN', 'delete'),
('pub_wake_Bemerkung', 'EN', 'Notes'),
('pub_wake_change', 'DE', 'l&ouml;schen'),
('pub_wake_del', 'DE', 'l&ouml;schen'),
('pub_wake_Text2', 'EN', 'Schedule a new wake-up here:'),
('pub_mywake_beschreibung1', 'EN', 'Here are the shifts that you have signed up for.\\r\\n'),
('pub_mywake_beschreibung2', 'EN', 'Please try to arrive for your shift on time.  Be punctual!\\r\\n'),
('pub_mywake_beschreibung3', 'EN', 'Here you can remove yourself from a shift up to\\r\\n'),
('pub_mywake_beschreibung4', 'EN', ' hours before your shift is scheduled to begin.'),
('pub_mywake_anzahl1', 'EN', 'You have signed up for '),
('pub_mywake_anzahl2', 'EN', ' shift(s) so far'),
('pub_mywake_Datum', 'EN', 'Date'),
('pub_mywake_Uhrzeit', 'EN', 'Time'),
('pub_mywake_Ort', 'EN', 'Place'),
('pub_mywake_Bemerkung', 'EN', 'Notes'),
('pub_schichtplan_add_Error', 'EN', 'An error occurred'),
('pub_mywake_austragen', 'EN', 'remove'),
('pub_mywake_austragen_n_c', 'EN', 'is no longer possible'),
('pub_mywake_austragen_n_c', 'DE', 'nicht mehr m&ouml;glich'),
('pub_mywake_delate1', 'EN', 'Shift is being removed...'),
('pub_mywake_add_ok', 'EN', 'Shift has been removed.'),
('pub_mywake_add_ko', 'EN', 'Sorry, something went wrong somewhere.  Please try it again. :)\\r\\n'),
('pub_mywake_after', 'EN', 'sorry, too late!'),
('index_text1', 'DE', 'Wiederstand ist zwecklos!'),
('index_text2', 'DE', 'Deine physikalischen und biologischen Eigenschaften werden den unsrigen hinzugefuegt!'),
('index_text1', 'EN', 'Resistance is futile!\\r\\n'),
('index_text3', 'DE', 'Datenerfassungsbogen:'),
('index_text2', 'EN', 'Your biological and physical parameters will be added to our collectiv!'),
('index_text4', 'EN', 'Please note: You have to activate cookies!'),
('index_text4', 'DE', 'Achtung: Cookies m&uuml;ssen aktiviert sein'),
('index_text3', 'EN', 'Assimilating drone:'),
('index_lang_nick', 'DE', 'Wie ist Dein Nick:'),
('index_lang_pass', 'DE', 'Wie ist Dein Passwort:'),
('index_lang_send', 'DE', 'Fullfill order!'),
('index_lang_nick', 'EN', 'What is your Loginname:\\r\\n'),
('index_lang_pass', 'EN', 'What is your password:'),
('index_logout', 'DE', 'Du wurdest erfolgreich abgemeldet.'),
('index_logout', 'EN', 'You have been successfully logged out.'),
('menu_index', 'DE', 'Index'),
('menu_FAQ', 'DE', 'FAQ'),
('menu_plan', 'DE', 'Lageplan'),
('menu_index', 'EN', 'Index'),
('menu_FAQ', 'EN', 'FAQ'),
('pub_menu_menuname', 'DE', 'Men&uuml;'),
('menu_plan', 'EN', 'Map'),
('news', 'EN', 'News'),
('news', 'DE', 'News'),
('pub_menu_Engelbesprechung', 'DE', 'Engelbesprechung'),
('pub_menu_menuname', 'EN', 'Menu'),
('pub_menu_Schichtplan', 'DE', 'Schichtplan'),
('pub_menu_Wecken', 'DE', 'Wecken'),
('pub_menu_mySchichtplan', 'DE', 'Mein Schichtplan'),
('pub_menu_questionEngel', 'DE', 'Anfragen an die Dispatcher'),
('user_settings', 'DE', 'Einstellungen'),
('pub_menu_Engelbesprechung', 'EN', 'Drone meeting'),
('logout', 'DE', 'Abmelden'),
('pub_menu_Schichtplan', 'EN', 'Available Shifts'),
('pub_menu_Wecken', 'EN', 'Wake-up Service'),
('index_lang_send', 'EN', 'Fullfill order!'),
('pub_menu_mySchichtplan', 'EN', 'My Shifts'),
('pub_menu_questionEngel', 'EN', 'Questions for the Dispatcher'),
('logout', 'EN', 'Logout'),
('user_settings', 'EN', 'Settings'),
('menu_Name', 'DE', 'Garage'),
('menu_Name', 'EN', 'Garage'),
('menu_MakeUser', 'DE', 'Benutzer anlegen'),
('menu_MakeUser', 'EN', 'Create new account'),
('pub_menu_Waeckerlist', 'DE', 'Weckerlist'),
('pub_menu_Waeckerlist', 'EN', 'Wake-up list'),
('pub_waeckliste_Text1', 'DE', 'dies ist die Weckliste. Schau hier bitte, wann die Leute geweckt werden wollen und erledige dies... schliesslich willst du bestimmt nicht deren Schichten uebernehmen :-)\\r\\n&lt;br&gt;&lt;br&gt;\\r\\nDie bisherigen eingetragenen Zeiten:'),
('pub_waeckliste_Nick', 'DE', 'Nick'),
('pub_waeckliste_Nick', 'EN', 'Nick'),
('pub_waeckliste_Datum', 'DE', 'Datum'),
('pub_waeckliste_Datum', 'EN', 'Date'),
('pub_waeckliste_Ort', 'DE', 'Ort'),
('pub_waeckliste_Ort', 'EN', 'Place'),
('pub_waeckliste_Comment', 'DE', 'Bemerkung'),
('pub_waeckliste_Comment', 'EN', 'comment'),
('pub_waeckliste_Text1', 'EN', 'This is the wake-up list. Pleace look here, when the drones  want to wake-up and \\r\\nhandle this... you don&#039;t want to take on this shift, isn&#039;t it?:-)\\r\\n&lt;br&gt;&lt;br&gt;\\r\\nShow all entries:'),
('pub_schichtplan_add_ToManyYousers', 'DE', 'FEHLER: Es wurden keine weiteren Engel ben&ouml;tigt !!'),
('pub_schichtplan_add_ToManyYousers', 'EN', 'ERROR: There are enough drones for this shift'),
('pub_mywake_Len', 'DE', 'L&auml;nge'),
('pub_mywake_Len', 'EN', 'length'),
('pub_schichtplan_add_AllreadyinShift', 'DE', 'du bist bereits in einer Schicht eingetragen!'),
('pub_schichtplan_add_AllreadyinShift', 'EN', 'you have another shift on this time'),
('pub_schichtplan_add_Error', 'DE', 'Ein Fehler ist aufgetreten'),
('pub_schichtplan_add_WriteOK', 'DE', 'Du bist jetzt der Schicht zugeteilt. Vielen Dank f&uuml;r deine Mitarbeit.'),
('pub_schichtplan_add_Text1', 'DE', 'Hier kannst du dich in eine Schicht eintragen. Als Kommentar kannst du etwas x-beliebiges eintragen, wie z. B.\\r\\nwelcher Vortrag dies ist oder &auml;hnliches. Den Kommentar kannst nur du sehen. '),
('pub_schichtplan_add_Date', 'DE', 'Datum'),
('pub_schichtplan_add_Place', 'DE', 'Ort'),
('pub_schichtplan_add_Job', 'DE', 'Aufgabe'),
('pub_schichtplan_add_Len', 'DE', 'Dauer'),
('pub_schichtplan_add_TextFor', 'DE', 'Text zur Schicht'),
('pub_schichtplan_add_Comment', 'DE', 'Dein Kommentar'),
('pub_schichtplan_add_submit', 'DE', 'Ja, ich will helfen...&quot;'),
('index_text5', 'DE', 'Bitte &uuml;berpr&uuml;fen Sie den SSL Key'),
('index_text5', 'EN', 'Please check your SSL-Key:'),
('pub_myshift_Edit_Text1', 'DE', 'Hier k&ouml;nnt ihr euren Kommentar &auml;ndern:'),
('pub_myshift_EditSave_Text1', 'DE', 'Text wird gespeichert'),
('pub_myshift_EditSave_OK', 'DE', 'erfolgreich gespeichert.'),
('pub_myshift_EditSave_KO', 'DE', 'Fehler beim Speichern'),
('pub_sprache_text1', 'DE', 'hier kannst du die &uuml;bersetzten Texte bearbeiten.'),
('pub_sprache_text1', 'EN', 'here can you edit the texts of the dronesystem'),
('pub_sprache_TextID', 'EN', 'TextID'),
('pub_sprache_TextID', 'DE', 'TextID'),
('pub_sprache_Sprache', 'DE', 'Sprache '),
('pub_sprache_Sprache', 'EN', 'Language '),
('pub_schichtplan_add_Place', 'EN', 'place'),
('pub_sprache_Edit', 'DE', 'Bearbeiten'),
('pub_sprache_Edit', 'EN', 'edit'),
('pub_schichtplan_add_Date', 'EN', 'Date'),
('pub_myshift_EditSave_KO', 'EN', 'Error on saving'),
('pub_myshift_EditSave_OK', 'EN', 'save OK'),
('pub_myshift_EditSave_Text1', 'EN', 'Text was saved'),
('pub_myshift_Edit_Text1', 'EN', 'Here can you change your comment:'),
('pub_schichtplan_add_Comment', 'EN', 'Your comment'),
('pub_aktive_Text1', 'DE', 'Diese Funktion erm&ouml;glicht es den Dispatchern, schnell einen Engel mit einer vorgebbaren Anzahl an Stunden als Aktiv zu markieren.'),
('pub_aktive_Text1', 'EN', 'This function enables the archdrones to mark drones as active who worked enough hours.'),
('pub_aktive_Text2', 'DE', '&Uuml;ber die Engelliste kann dies f&uuml;r einzelne Drohne erledigt werden.'),
('pub_aktive_Text2', 'EN', 'Over the dronelist you can do this for single drones.'),
('pub_aktive_Text31', 'DE', 'Alle Engel mit mindestens'),
('pub_aktive_Text31', 'EN', 'All drones with at least'),
('pub_aktive_Text32', 'DE', 'Schichten als Aktiv markieren'),
('pub_aktive_Text32', 'EN', 'mark shifts as &quot;active&quot;'),
('pub_aktive_Nick', 'DE', 'Nick'),
('pub_aktive_Nick', 'EN', 'Nick'),
('pub_aktive_Anzahl', 'DE', 'Anzahl Schichten'),
('pub_aktive_Anzahl', 'EN', 'number of shifts'),
('pub_aktive_Time', 'DE', 'Gesamtzeit'),
('pub_aktive_Time', 'EN', 'summary time'),
('pub_schichtplan_add_submit', 'EN', 'Yes, I want to help...&quot;'),
('pub_schichtplan_add_Len', 'EN', 'duration'),
('pub_schichtplan_add_Job', 'EN', 'job'),
('pub_aktive_Text5_1', 'DE', 'Alle Engel mit mindestens '),
('pub_aktive_Text5_1', 'EN', 'All drones with at least '),
('pub_aktive_Text5_2', 'DE', ' Schichten werden jetzt als &quot;Aktiv&quot; markiert'),
('pub_aktive_Text5_2', 'EN', ' shifts were marked as &quot;active&quot;'),
('pub_aktive_Active', 'DE', 'Aktiv'),
('pub_aktive_Active', 'EN', 'active'),
('pub_schichtplan_add_TextFor', 'EN', 'text for shift'),
('pub_schichtplan_add_WriteOK', 'EN', 'Now, you signed up for this shift. Thank you for your cooperation.'),
('pub_schichtplan_add_Text1', 'EN', 'Here you can sign up for a shift. As commend can you write what you want, it is only for you.'),
('pub_schichtplan_colision', 'DE', '&lt;h1&gt;Fehler&lt;/h1&gt;\\r\\n&Uuml;berschneidung von Schichten:'),
('pub_schichtplan_colision', 'EN', '&lt;h1&gt;error&lt;/h1&gt;\\r\\noverlap on shift:'),
('pub_schicht_EmptyShifts', 'DE', 'Die n&auml;chsten 15 freien Schichten:'),
('pub_schicht_EmptyShifts', 'EN', 'The next 15 empty shifts:'),
('inc_schicht_date', 'DE', 'Datum'),
('inc_schicht_date', 'EN', 'Date'),
('inc_schicht_time', 'DE', 'Zeit'),
('inc_schicht_time', 'EN', 'Time'),
('inc_schicht_room', 'DE', 'Ort'),
('inc_schicht_room', 'EN', 'location'),
('inc_schicht_commend', 'DE', 'Kommentar'),
('inc_schicht_commend', 'EN', 'comment'),
('pub_einstellungen_Name', 'DE', 'Nachname:'),
('pub_einstellungen_Name', 'EN', 'Last name:'),
('pub_einstellungen_Nick', 'DE', 'Nick:'),
('pub_einstellungen_Nick', 'EN', 'nick:'),
('pub_einstellungen_Vorname', 'DE', 'Vorname:'),
('pub_einstellungen_Vorname', 'EN', 'first name:'),
('pub_einstellungen_Alter', 'DE', 'Alter:'),
('pub_einstellungen_Alter', 'EN', 'Age:'),
('pub_einstellungen_Telefon', 'DE', 'Telefon:'),
('pub_einstellungen_Telefon', 'EN', 'Phone:'),
('pub_einstellungen_Handy', 'DE', 'Handy:'),
('pub_einstellungen_Handy', 'EN', 'Mobile Phone:'),
('pub_einstellungen_DECT', 'DE', 'DECT:'),
('pub_einstellungen_DECT', 'EN', 'DECT:'),
('pub_einstellungen_email', 'DE', 'E-Mail:'),
('pub_einstellungen_email', 'EN', 'email:'),
('pub_einstellungen_Text_UserData', 'EN', 'Here you can change your user details.'),
('pub_einstellungen_UserDateSaved', 'DE', 'Deine Beschreibung f&uuml;r unsere Dronenverwaltung wurde ge&auml;ndert.'),
('pub_einstellungen_UserDateSaved', 'EN', 'Your user details were saved.'),
('pub_menu_SchichtplanBeamer', 'DE', 'Schichtplan f&uuml;r Beamer optimiert'),
('pub_menu_SchichtplanBeamer', 'EN', 'Shifts for beamer optimice'),
('pub_einstellungen_Text_UserData', 'DE', 'Hier kannst du deine Beschreibung f&uuml;r unsere Engelverwaltung &auml;ndern.'),
('lageplan_text1', 'EN', 'This is a map of available locations:'),
('register', 'DE', 'Engel werden'),
('register', 'EN', 'Become an angel'),
('makeuser_text1', 'DE', 'Mit dieser Maske meldet ihr euch im Engelsystem an. Durch das Engelsystem findet auf der Veranstaltung die Aufgabenverteilung der Engel statt.\\r\\n\\r\\n'),
('makeuser_text1', 'EN', 'By completing this form you&#039;re registering as an Angel. This script will create you an account in the Angel task sheduler.\\r\\n\\r\\n'),
('makeuser_Nickname', 'DE', 'Nickname'),
('makeuser_Nickname', 'EN', 'nick'),
('makeuser_text2', 'DE', 'Habt ihr schon einmal bei einer<br />\\r\\nCCC-Veranstaltung mitgeholfen? <br />\\r\\nWenn ja, in welchem <br />\\r\\nwelchen Aufgabengebiet(en)?'),
('makeuser_text2', 'EN', 'Did you help at former <br />\\r\\nCCC events and which tasks <br />\\r\\nhave you performed then?'),
('makeuser_Nachname', 'DE', 'Nachname'),
('makeuser_Nachname', 'EN', 'last name'),
('makeuser_Vorname', 'DE', 'Vorname'),
('makeuser_Vorname', 'EN', 'first name'),
('makeuser_Alter', 'DE', 'Alter'),
('makeuser_Alter', 'EN', 'age'),
('makeuser_Telefon', 'DE', 'Telefon'),
('makeuser_Telefon', 'EN', 'phone'),
('makeuser_DECT', 'DE', 'DECT'),
('makeuser_DECT', 'EN', 'DECT'),
('makeuser_Handy', 'DE', 'Handy'),
('makeuser_Handy', 'EN', 'mobile'),
('makeuser_E-Mail', 'DE', 'E-Mail'),
('makeuser_E-Mail', 'EN', 'e-mail'),
('makeuser_T-Shirt', 'DE', 'T-Shirt Gr&ouml;&szlig;e'),
('makeuser_T-Shirt', 'EN', 'shirt size'),
('makeuser_Engelart', 'DE', 'Zuteilung'),
('makeuser_Engelart', 'EN', 'designation'),
('makeuser_Passwort', 'DE', 'Passwort'),
('makeuser_Passwort', 'EN', 'password'),
('makeuser_Passwort2', 'DE', 'Passwort Best&auml;tigung'),
('makeuser_Passwort2', 'EN', 'password confirm'),
('makeuser_Anmelden', 'DE', 'Anmelden...'),
('makeuser_Anmelden', 'EN', 'register me...'),
('makeuser_text3', 'DE', '*Dieser Eintrag ist eine Pflichtangabe.'),
('makeuser_text3', 'EN', '* entry required!'),
('makeuser_error_nick1', 'DE', 'Fehler: Nickname &quot;'),
('makeuser_error_nick1', 'EN', 'error: your nick &quot;'),
('makeuser_error_nick2', 'DE', '&quot; ist zu kurz gew&auml;hlt (Mindestens 2 Zeichen).'),
('makeuser_error_nick2', 'EN', '&quot; is too short (min. 2 characters)'),
('makeuser_error_mail', 'DE', 'Fehler: E-Mail-Adresse ist nicht g&uuml;ltig.'),
('makeuser_error_mail', 'EN', 'error: e-mail address is not correct'),
('makeuser_error_password1', 'DE', 'Fehler: Passw&ouml;rter sind nicht identisch.'),
('makeuser_error_password1', 'EN', 'error: your passwords don&#039;t match'),
('makeuser_error_password2', 'DE', 'Fehler: Passwort ist zu kurz (Mindestens 6 Zeichen)'),
('makeuser_error_password2', 'EN', 'error: your password is to short (at least 6 characters)'),
('makeuser_error_write1', 'DE', 'Fehler: Kann die eingegebenen Daten nicht sichern?!?'),
('makeuser_error_write1', 'EN', 'error: can t save your data...'),
('makeuser_writeOK', 'DE', 'Registration erfolgreich.'),
('makeuser_writeOK', 'EN', 'transmitted.'),
('makeuser_error_write2', 'DE', 'Fehler: Beim Speichern der Userrechte...'),
('makeuser_error_write2', 'EN', 'error: can&#039;t save userrights... '),
('makeuser_writeOK2', 'DE', 'Userrechte wurden gespeichert...'),
('makeuser_writeOK2', 'EN', 'userright was saved...'),
('makeuser_writeOK3', 'EN', 'Your account was successfully created, have a lot of fun.'),
('makeuser_writeOK3', 'DE', 'Dein Account wurde erfolgreich gespeichert, have a lot of fun.'),
('makeuser_writeOK4', 'DE', 'Engel Registriert!'),
('makeuser_writeOK4', 'EN', 'Drone registered!'),
('makeuser_text4', 'DE', 'Wenn du dich als Engel registrieren  m&ouml;chtest, f&uuml;lle bitte folgendes Formular aus:'),
('makeuser_text4', 'EN', 'If you would like to be a chaos drone please insert following details into this form:'),
('makeuser_error_nick3', 'DE', '&quot; existiert bereits.'),
('makeuser_error_nick3', 'EN', '&quot; already exist.'),
('makeuser_Hometown', 'EN', 'hometown'),
('makeuser_Hometown', 'DE', 'Wohnort'),
('pub_einstellungen_Hometown', 'DE', 'Wohnort'),
('pub_einstellungen_Hometown', 'EN', 'hometown'),
('makeuser_error_Alter', 'DE', 'Fehler: Dein Alter muss eine Zahl oder leer sein'),
('makeuser_error_Alter', 'EN', 'error: your age must be a number or empty'),
('user_messages', 'DE', 'Nachrichten'),
('user_messages', 'EN', 'Messages'),
('pub_messages_Datum', 'DE', 'Datum'),
('pub_messages_Datum', 'EN', 'date'),
('pub_messages_Von', 'DE', 'Gesendet'),
('pub_messages_Von', 'EN', 'transmitted'),
('pub_messages_An', 'DE', 'Empf&auml;nger'),
('pub_messages_An', 'EN', 'receiver'),
('pub_messages_Text', 'DE', 'Text'),
('pub_messages_Text', 'EN', 'text'),
('pub_messages_Send1', 'DE', 'Nachricht wird gesendet'),
('pub_messages_Send1', 'EN', 'message will be send'),
('pub_messages_Send_OK', 'DE', 'Senden erfolgeich'),
('pub_messages_Send_OK', 'EN', 'transmitting was OK'),
('pub_messages_Send_Error', 'DE', 'Senden ist fehlgeschlagen'),
('pub_messages_Send_Error', 'EN', 'transmitting was terminate with an Error'),
('pub_messages_MarkRead', 'DE', 'als gelesen makieren'),
('pub_messages_MarkRead', 'EN', 'mark as read'),
('pub_messages_NoCommand', 'DE', 'kein Kommando erkannt'),
('pub_messages_NoCommand', 'EN', 'no command recognised'),
('pub_messages_MarkRead_OK', 'DE', 'als gelesen markiert'),
('pub_messages_MarkRead_OK', 'EN', 'mark as read'),
('pub_messages_MarkRead_KO', 'DE', 'Fehler beim als gelesen Markieren'),
('pub_messages_MarkRead_KO', 'EN', 'error on: mark as read'),
('pub_messages_text1', 'DE', 'hier kannst du Nachrichten an andere Engel versenden'),
('pub_messages_text1', 'EN', 'here can you leave messages for other drones'),
('pub_messages_DelMsg', 'DE', 'Nachricht l&ouml;schen'),
('pub_messages_DelMsg', 'EN', 'delete message'),
('pub_messages_DelMsg_OK', 'DE', 'Nachricht gel&ouml;scht'),
('pub_messages_DelMsg_OK', 'EN', 'delete message'),
('pub_messages_DelMsg_KO', 'DE', 'Nachricht konnte nicht gel&ouml;scht werden'),
('pub_messages_DelMsg_KO', 'EN', 'cannot delete message'),
('pub_messages_new1', 'DE', 'Du hast'),
('pub_messages_new1', 'EN', 'You have'),
('pub_messages_new2', 'DE', 'neue Nachrichten'),
('pub_messages_new2', 'EN', 'new messages'),
('pub_messages_NotRead', 'DE', 'nicht gelesen'),
('pub_messages_NotRead', 'EN', 'not read'),
('pub_mywake_Name', 'DE', 'Schicht Titel'),
('pub_mywake_Name', 'EN', 'shift title'),
('pub_sprache_ShowEntry', 'DE', 'Eintr&auml;ge anzeigen'),
('pub_sprache_ShowEntry', 'EN', 'show entrys'),
('admin_rooms', 'DE', 'Orte'),
('admin_rooms', 'EN', 'Locations'),
('admin_angel_types', 'DE', 'Engeltypen'),
('admin_angel_types', 'EN', 'Angel types'),
('pub_menu_SchichtplanEdit', 'DE', 'Schichtplan'),
('pub_menu_SchichtplanEdit', 'EN', 'Shiftplan'),
('pub_menu_UpdateDB', 'DE', 'UpdateDB'),
('pub_menu_UpdateDB', 'EN', 'UpdateDB'),
('pub_menu_Dect', 'DE', 'Dect'),
('pub_menu_Dect', 'EN', 'Dect'),
('pub_menu_Engelliste', 'DE', 'Engelliste'),
('pub_menu_Engelliste', 'EN', 'Drone-list'),
('pub_menu_EngelDefaultSetting', 'DE', 'Engel Voreinstellungen'),
('pub_menu_EngelDefaultSetting', 'EN', 'Drone Default Setting'),
('pub_menu_Aktivliste', 'DE', 'Aktiv Liste'),
('pub_menu_Aktivliste', 'EN', 'active list'),
('pub_menu_T-Shirtausgabe', 'DE', 'T-Shirtausgabe'),
('pub_menu_T-Shirtausgabe', 'EN', 'T-Shirt handout'),
('pub_menu_News-Verwaltung', 'DE', 'News-Verwaltung'),
('pub_menu_News-Verwaltung', 'EN', 'News-Center'),
('faq', 'DE', 'FAQ'),
('faq', 'EN', 'FAQ'),
('pub_menu_FreeEngel', 'DE', 'Freie Engel'),
('pub_menu_FreeEngel', 'EN', 'free Drones'),
('pub_menu_Debug', 'DE', 'Debug'),
('pub_menu_Debug', 'EN', 'Debug'),
('pub_menu_Recentchanges', 'DE', 'Letzte &Auml;nderungen'),
('pub_menu_Recentchanges', 'EN', 'recent changes'),
('pub_menu_Language', 'DE', 'Sprachen'),
('pub_menu_Language', 'EN', 'Language'),
('makeuser_text0', 'DE', 'Anmeldung als Engel'),
('makeuser_text0', 'EN', 'Drone registration'),
('/', 'DE', 'Willkommen'),
('/', 'EN', 'welcome'),
('nonpublic/', 'DE', 'Garage'),
('nonpublic/', 'EN', 'garage'),
('admin/', 'DE', 'admin'),
('admin/', 'EN', 'admin'),
('index.php', 'DE', 'Start'),
('index.php', 'EN', 'Start'),
('logout.php', 'DE', 'logout'),
('logout.php', 'EN', 'logout'),
('faq.php', 'DE', 'FAQ'),
('faq.php', 'EN', 'FAQ'),
('lageplan.php', 'DE', 'Lageplan'),
('lageplan.php', 'EN', 'Map'),
('nonpublic/index.php', 'DE', ' '),
('nonpublic/index.php', 'EN', ' '),
('nonpublic/news.php', 'EN', 'News'),
('nonpublic/news.php', 'DE', 'News'),
('nonpublic/news_comments.php', 'EN', ' '),
('nonpublic/news_comments.php', 'DE', ' '),
('nonpublic/engelbesprechung.php', 'DE', 'Engelbesprechung'),
('nonpublic/engelbesprechung.php', 'EN', 'Drone gathering'),
('nonpublic/schichtplan.php', 'DE', 'Schichtplan'),
('nonpublic/schichtplan.php', 'EN', 'Available Shifts'),
('nonpublic/schichtplan_add.php', 'DE', ' '),
('nonpublic/schichtplan_add.php', 'EN', ' '),
('nonpublic/myschichtplan.php', 'DE', 'Mein Schichtplan'),
('nonpublic/myschichtplan.php', 'EN', 'My Shifts'),
('nonpublic/myschichtplan_ical.php', 'DE', ' '),
('nonpublic/myschichtplan_ical.php', 'EN', ' '),
('nonpublic/einstellungen.php', 'DE', 'Einstellungen'),
('nonpublic/einstellungen.php', 'EN', 'Options'),
('nonpublic/wecken.php', 'DE', 'Wecken'),
('nonpublic/wecken.php', 'EN', 'Wake-up Service'),
('nonpublic/waeckliste.php', 'DE', 'Weckerlist'),
('nonpublic/waeckliste.php', 'EN', 'Wake-up list'),
('nonpublic/messages.php', 'DE', 'Nachrichten'),
('nonpublic/messages.php', 'EN', 'messages'),
('nonpublic/schichtplan_beamer.php', 'DE', 'Schichtplan f&uuml;r Beamer optimiert'),
('nonpublic/schichtplan_beamer.php', 'EN', 'Shifts for beamer optimice'),
('nonpublic/faq.php', 'DE', 'Anfragen an die Dispatcher'),
('nonpublic/faq.php', 'EN', 'Questions for the Dispatcher'),
('admin/index.php', 'DE', ' '),
('admin/index.php', 'EN', ' '),
('pub_einstellungen_PictureUpload', 'DE', 'Hochzuladendes Bild ausw&auml;hlen:'),
('pub_einstellungen_PictureUpload', 'EN', 'Choose a picture to Upload:'),
('pub_einstellungen_send_OK', 'EN', 'The file was uploaded successfully'),
('pub_einstellungen_send_OK', 'DE', 'Die Datei wurde erfolgreich hochgeladen.'),
('pub_einstellungen_PictureNoShow', 'EN', 'The photo isnot free at the moment'),
('pub_einstellungen_PictureShow', 'DE', 'Das Foto ist freigegeben'),
('pub_einstellungen_PictureShow', 'EN', 'The photo is free at the moment'),
('pub_einstellungen_del_OK', 'DE', 'Bild wurde erfolgreich gel?scht.'),
('pub_einstellungen_del_OK', 'EN', 'Picture was deleted successfully.'),
('pub_einstellungen_del_KO', 'DE', 'Bild wurde nicht erfolgreich gel?scht.'),
('pub_einstellungen_del_KO', 'EN', 'Picture was not deleted successfully.'),
('delete', 'DE', 'l?schen'),
('delete', 'EN', 'delete'),
('upload', 'EN', 'upload'),
('upload', 'DE', 'hochladen'),
('pub_einstellungen_PictureNoShow', 'DE', 'Das Foto ist nicht freigegeben'),
('pub_einstellungen_send_KO', 'DE', 'Beim Hochladen ist ein Fehler aufgetreten.'),
('pub_einstellungen_send_KO', 'EN', 'An error was detected. Please try again!'),
('admin/room.php', 'DE', 'Orte'),
('admin/room.php', 'EN', 'locations'),
('admin/EngelType.php', 'DE', 'Engeltypen'),
('admin/EngelType.php', 'EN', 'Drone-Types'),
('admin/schichtplan.php', 'DE', 'Schichtplan'),
('admin/schichtplan.php', 'EN', 'Shiftplan'),
('admin/shiftadd.php', 'DE', ' '),
('admin/shiftadd.php', 'EN', ' '),
('admin/schichtplan_druck.php', 'DE', ' '),
('admin/schichtplan_druck.php', 'EN', ' '),
('admin/dbUpdateFromXLS.php', 'DE', 'UpdateDB'),
('admin/dbUpdateFromXLS.php', 'EN', 'UpdateDB'),
('admin/dect.php', 'DE', 'Dect'),
('admin/dect.php', 'EN', 'Dect'),
('admin/dect_call.php', 'DE', ' '),
('admin/dect_call.php', 'EN', ' '),
('admin_user', 'DE', 'Engelliste'),
('admin_user', 'EN', 'Manage angels'),
('admin/userDefaultSetting.php', 'DE', 'Engel Voreinstellungen'),
('admin/userDefaultSetting.php', 'EN', 'Drone Default Setting'),
('admin/UserPicture.php', 'DE', 'Benutzerbilder'),
('admin/UserPicture.php', 'EN', 'User Pictures'),
('admin/aktiv.php', 'DE', 'Aktiv Liste'),
('admin/aktiv.php', 'EN', 'active list'),
('admin/tshirt.php', 'DE', 'T-Shirtausgabe'),
('admin/tshirt.php', 'EN', 'T-Shirt handout'),
('admin/news.php', 'DE', 'News-Verwaltung'),
('admin/news.php', 'EN', 'News-Center'),
('admin/free.php', 'DE', 'Freie Engel'),
('admin/free.php', 'EN', 'free Drones'),
('admin/debug.php', 'DE', 'Debug'),
('admin/debug.php', 'EN', 'Debug'),
('admin/Recentchanges.php', 'DE', 'Letzte ?nderungen'),
('admin/Recentchanges.php', 'EN', 'recentchanges'),
('admin/sprache.php', 'DE', 'Sprachen'),
('admin/sprache.php', 'EN', 'Language'),
('admin/faq.php', 'DE', 'FAQ'),
('admin/faq.php', 'EN', 'FAQ'),
('pub_myschichtplan_ical', 'DE', 'export my Shifts as iCal file'),
('pub_myschichtplan_ical', 'EN', 'iCal File exportieren'),
('Sprache', 'DE', 'Sprache'),
('Sprache', 'EN', 'Language'),
('start', 'DE', 'Start'),
('start', 'EN', 'Start'),
('login', 'DE', 'Login'),
('login', 'EN', 'Login'),
('credits', 'DE', 'Credits'),
('credits', 'EN', 'Credits'),
('pub_messages_Neu', 'DE', 'Neu'),
('pub_messages_Neu', 'EN', 'New'),
('admin_groups', 'DE', 'Gruppenrechte'),
('admin_groups', 'EN', 'Grouprights'),
('user_questions', 'DE', 'Erzengel fragen'),
('user_questions', 'EN', 'Ask arch angel'),
('admin_questions', 'DE', 'Fragen beantworten'),
('admin_questions', 'EN', 'Answer questions'),
('admin_faq', 'DE', 'FAQs bearbeiten'),
('admin_faq', 'EN', 'Edit FAQs'),
('news_comments', 'DE', 'News Kommentare'),
('news_comments', 'EN', 'News comments'),
('admin_news', 'DE', 'News verwalten'),
('admin_news', 'EN', 'Manage news'),
('user_meetings', 'DE', 'Treffen'),
('user_meetings', 'EN', 'Meetings'),
('admin_language', 'DE', 'Übersetzung'),
('admin_language', 'EN', 'Translation'),
('admin_log', 'EN', 'Log'),
('admin_log', 'DE', 'Log'),
('user_wakeup', 'DE', 'Weckservice'),
('user_wakeup', 'EN', 'Wakeup service'),
('admin_import', 'DE', 'Pentabarf Import'),
('admin_import', 'EN', 'Pentabarf import'),
('user_shifts', 'DE', 'Schichtplan'),
('user_shifts', 'EN', 'Shifts'),
('user_myshifts', 'DE', 'Meine Schichten'),
('user_myshifts', 'EN', 'My shifts'),
('admin_arrive', 'DE', 'Engel Verfügbarkeit'),
('admin_arrive', 'EN', 'Available angels'),
('admin_shifts', 'DE', 'Schichten erstellen'),
('admin_shifts', 'EN', 'Create shifts'),
('admin_active', 'DE', 'Engel Aktiv/T-Shirt'),
('admin_active', 'EN', 'Angel active/t-shirt'),
('admin_free', 'DE', 'Freie Engel'),
('admin_free', 'EN', 'Free angels')");

if(mysql_affected_rows() > 0)
    $applied = true;

