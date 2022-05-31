# inertiajs
Inertiajs study case

PHP 8.1.6 + apache + custom ini file + log files

Run docker-compose up -d

Installation process
1 - Go inside the docker container: docker exec -it CONTAINER_NAME /bin/bash
2 - Install Laravel: composer create-project laravel/laravel .
3 - Install Inertia: composer require inertiajs/inertia-laravel
4 - Create link storage: php artisan storage:link
5 - Set permissions: chown -R www-data:www-data /var/www
6 - Try it in the browser: you should see the laravel welcome page
7 - Install Inertia adaptor: composer require inertiajs/inertia-laravel
8 - Follow the installation from https://inertiajs.com/server-side-setup
9 - Follow the installation from https://inertiajs.com/client-side-setup
10 - Install next if using vue3: npm install vue@next
11 - Install sfc if using vue3: npm install -D @vue/compiler-sfc
12 - Follow the https://laracasts.com/series/build-modern-laravel-apps-using-inertia-js/episodes/2 video
13 - Install dependencies: npm install
14 - npm install vue-loader@^16.2.0 --save-dev --legacy-peer-deps
15 - npm install -D tailwindcss postcss autoprefixer
16 - npx tailwindcss init
17 - Run npx mix 2 times: npx mix
18 - Run for development: npm run watch-poll