<p align="center"><img src="public/images/logo.png" width="400"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Fishing Store - DK Pancing

## Set up,

1. Clone the [repo](https://github.com/rezarinaldi/fishing-store.git) and cd into it
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. Set your database credentials in your .env file
6. php artisan migrate
7. php artisan db:seed
8. npm install
9. php artisan serve
10. Visit localhost:8000 in your browser
11. or install [laravel valet](https://github.com/cretueusebiu/valet-windows).

Laravel Valet configures your PC to always run Nginx in the background when your machine starts. Then, using DnsMasq, Valet proxies all requests on the \*.test domain to point to sites installed on your local machine.

Example: fishing-store.test

Documentation for Valet can be found on the [Laravel website](https://laravel.com/docs/valet)

13. Users log in:

-   Admin Email/Password: admin@gmail.com/admin123456
-   User Email/Password: bella@gmail.com/bella123456
