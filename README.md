### Framework
1. Laravel v8.16.1
2. phpmailer: "^6.2",
3. laravel-datatables "^1.5",
4. laravel-datatables-buttons: "^4.10",

## Install
01. `git clone https://github.com/NikitaPoplavskiy/UpWork.git`
02. `cd UpWork`
03. `composer update`
04. `cp .env.example .env`
05. `php artisan key:generate`
06. `php artisan migrate`
07. `php artisan db::seed`
08. `php artisan permissions:generate`
07. `php artisan serve`

## How to use
`route for admin: /admin/home`
`Click JSON button to download json and send zipped json to adnim email`
