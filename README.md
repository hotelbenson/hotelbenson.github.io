# hotelbenson.github.io
## Hotel Benson
Auf der Website können sich anonyme User registrieren um sich einen Account zu erstellen.

Eingeloggte user können Zimmer reservieren, Reservierungen stornieren oder Accountinformationen abfragen/bearbeiten.

Eingeloggte Admin-User können Newsbeiträge hochladen, Reservierungen bearbeiten und User verwalten.


Der SQL-Dump zum erstellen der Datenbank liegt [hier](https://github.com/hotelbenson/hotelbenson.github.io/tree/main/db/hotelbenson.sql). 

Weiters wurde ein extra User erstellt der uneingeschränkten Zugang zur Datenbank hat (Die Zugangsdaten sind in der dbaccess Datei zu sehen):
(CREATE USER 'benson'@'localhost' IDENTIFIED VIA mysql_native_password USING '**';GRANT ALL PRIVILEGES ON.* TO 'benson'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON hotelbenson.* TO 'benson'@'localhost';)