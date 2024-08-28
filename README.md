# Ecommerce with Multi DB and Multi Tenancy

## Instalation

Clone the repo locally:

`git clone https://github.com/noprisigit/ecommerce-with-multidb-tenancy.git ecommerce && cd ecommerce`

Install PHP dependencies:

`composer install`

Installing Node Dependencies:

`npm install`

Setup configuration

`cp .env.example .env`

Change environment for setup database

```
DB_CONNECTION==
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Change environment for create symbolik link

```
FILESYSTEM_DISK=public
```

Generate application key

`php artisan key:generate`

Run database migrations

`php artisan migrate`

Run database seeder

`php artisan db:seed`

Create a symlink to storage

`php artisan storage:link`

Run the npm server

`npm run dev`

Run the dev server (the output will give the address)

`php artisan serve`

You're ready to go! Visit the url in your browser, and login with:

- Username: demo@test.com
- Password: password

