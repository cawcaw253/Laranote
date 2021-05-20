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

## Composer
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# copy everything, excluding the one from .dockerignore file
COPY ./src /var/www/html

RUN set -eux; \
    mkdir -p storage/logs storage/framework bootstrap/cache; \
    composer install --prefer-dist --no-progress --no-suggest --optimize-autoloader; \
    composer clear-cache

## Run

VOLUME /var/www/html
CMD ["php-fpm"]
