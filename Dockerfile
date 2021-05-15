### Image
FROM php:8.0-fpm-alpine

### Install php extensions
RUN apk update && \
    apk add git \
    unzip \
    gcc \
    g++

RUN docker-php-ext-install \
    pdo \
    pdo_mysql

### Copy and overwrite Laravel directory.
COPY ./docker/app/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./src /var/www/html
WORKDIR /var/www/html

### Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN php /usr/bin/composer install --no-dev -d /var/www/html

VOLUME /var/www/html
EXPOSE 9000
CMD ["php-fpm"]
