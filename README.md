# Info

## Image

    - Nginx : nginx:1.18-alpine
    - DB : mysql:5.7.32 (hashed)
    - PhpMyAdmin : phpmyadmin/phpmyadmin
    - PHP : php:8.0-fpm-alpine

# Before Run

## docker in local

### if php and composer are not installed

    - cd ./src
    - sudo apt install php8.0-cli
    - sudo apt update
    - sudo apt-get update
    - sudo apt install composer
    - sudo apt install php-xml

### php and composer are installed

    - composer update
    - composer install
    - composer dump-autoload
    - cp .env.example .env
    - php artisan key:generate
    - docker-compose up -d

### when docker is running

    - docker-compose exec app ash
    - php artisan migrate --seed
    or
    - docker-compose exec app php artisan migrate --seed

## When migrate or laravel features not worked

    - cd ./src
    - composer dump-autoload

## CSS Framework (if tailwindcss not work)

    - npm install
    - npm run serve

# CSS styles are refer from

    - https://tailwindcss.com/
    - https://tailwindcomponents.com/

## Ubuntu

    - sudo apt install php
    - sudo apt install php-cli unzip
    - sudo apt-get install php-mbstring
