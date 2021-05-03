
FROM php:8.0-fpm-alpine

COPY ./src /var/www/html

COPY ./docker/app/local.ini /usr/local/etc/php/conf.d/local.ini

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN set -x

RUN apk update
RUN apk add git unzip zip curl

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install
RUN chmod -R a+w storage/ bootstrap/cache
