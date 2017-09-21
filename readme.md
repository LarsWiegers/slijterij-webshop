## Database aanmaken

Maak zelf een database aan in phpmyadmin, kopieer daarna het .env.example bestand en plaats deze in de zelfde hoofdfolder maar dan met de naam .env .

In het .env bestand ga je de **DB_DATABASE** ,**DB_USERNAME** en de **DB_PASSWORD** aanpassen naar de nieuwe waardes die voor jou gelden.
Als je dat allemaal hebt gedaan ga je dit commando uitvoeren als je in de hoofdmap zit "php artisan db:migrate --seed". Dit zorgt ervoor dat de database tabellen aan gemaakt gaan worden en dat er dummy data in gezet gaan worden.

als je vragen hebt kun je deze altijd sturen naar **larswiegers@live.nl**