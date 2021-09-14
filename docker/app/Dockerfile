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
COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.override.ini
COPY ./docker/app/www.conf /usr/local/etc/php-fpm.d/www.conf

# copy everything, excluding the one from .dockerignore file
COPY ./src /var/www/html

RUN set -eux; \
    mkdir -p storage/logs storage/framework bootstrap/cache; \
    composer install --prefer-dist --no-progress --no-suggest --optimize-autoloader; \
    composer clear-cache

RUN composer install
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan config:cache
RUN composer dump-autoload

# create user and set permission
RUN chown -R www-data:www-data /var/www/html/storage

## Run
VOLUME /var/www/html
CMD ["php-fpm"]
