### Framework
1. Laravel v8.16.1
2. phpmailer: "^6.2",
3. laravel-datatables "^1.5",
4. laravel-datatables-buttons: "^4.10",

## Install
01. `git clone https://github.com/NikitaPoplavskiy/UpWork.git`
02. `cd UpWork`
03. `composer install`
04. `rename  D:\OpenServer\OpenServer\domains\UpWork\.env.example .env`
05. `create database`
06. `config env file`
07. `cd bootstrap`
    `md cache`
    `cd..`
    `cd storage`
    `md framework`
    `cd framework`
    `md cache`
    `md views`
    `md sessions`
07. `composer update`
05. `php artisan key:generate`
06. `php artisan migrate`
07. `php artisan db:seed`
08. `php artisan permissions:generate`
07. `php artisan serve`

## How to use
`Login for admin: admin@admin.com Password for admin: 123456`
`route for admin: /admin/home`
`set email password in config\send_email for sending email by smtp`
`Click JSON button to download json and send zipped json to admin email`
