# inertiajs
Inertiajs study case

PHP 8.0.5 + apache + custom ini file + log files

Run docker-compose up -d

Installation process
1 - Install Laravel: composer create-project laravel/laravel .
2 - Install Inertia: composer require inertiajs/inertia-laravel
3 - Create link storage: php artisan storage:link
4 - Set permissions: chown -R www-data:www-data /var/www
5 - Try it in the browser: you should see the laravel welcome page