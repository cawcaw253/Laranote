### PHP

## Use the php:8.0-fpm-alpine image
FROM php:8.0-fpm-alpine

## Install php extensions
RUN apk update && \
    apk add git \
    unzip \
    gcc \
    g++

RUN docker-php-ext-install \
    pdo \
    pdo_mysql

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

## Setting
# copy everything, excluding the one from .dockerignore file
COPY ./src /var/www/html

RUN set -eux; \
    mkdir -p storage/logs storage/framework bootstrap/cache; \
    composer install --prefer-dist --no-progress --no-suggest --optimize-autoloader; \
    composer clear-cache

# create user and set permission
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel
RUN chown laravel:laravel /var/www/html

## Run
VOLUME /var/www/html
CMD ["php-fpm"]
