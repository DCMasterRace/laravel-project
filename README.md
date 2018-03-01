STEP BY STEP CONFIGURATION

1) Clone this repo this your local.
2) Create a new .env file or rename the .env.example file to .env and change the Config inside to match your database name and table. Use mysql
3) Create a new database table. Table based on the name that you put in the .env
4) Run command in command line 'composer install && composer update'
5) Run command 'npm install'
6) Generate key by inputting 'php artisan key:generate' in command line

## Migration
7) Migrate all the table by inputting 'php artisan migrate'
8) Seed all the dummy data to the database by inputting 'php artisan db:seed' in CLI

## To run the server
9) Type in 'php artisan serve' - for the laravel server
10) Type in 'npm run watch-poll' for the browsersync. - it will automatically open tab for the website

