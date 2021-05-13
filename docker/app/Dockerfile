
FROM php:8.0-fpm-alpine

# ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apk update && \
    apk add git && \
    apk add unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Download Laravel framework in correct directory.
RUN composer create-project --prefer-dist laravel/laravel /var/www/html/

# Copy and overwrite with files from host (including hidden file) to Laravel directory.
COPY . /tmp/files-from-host
RUN true | cp -ai /tmp/files-from-host/. /var/www/html/ 2>/dev/null
RUN rm -rf /tmp/files-from-host/

EXPOSE 9000

CMD ["php-fpm"]
