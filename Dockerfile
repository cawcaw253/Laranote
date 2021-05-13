
FROM php:8.0-fpm-alpine

### install php extensions
RUN apk update && \
    apk add git \
    unzip \
    gcc \
    g++

RUN docker-php-ext-install \
    pdo \
    pdo_mysql

### Copy and overwrite Laravel directory.
COPY ./src /var/www/html
WORKDIR /var/www/html

### composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN php /usr/bin/composer install --no-dev -d /var/www/html

VOLUME /var/www/html
EXPOSE 9000
CMD ["php-fpm"]
