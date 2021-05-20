### NGINX

FROM nginx:1.18-alpine

## Copy files
# Nginx only needs to have the files in 'public/'. The other php files to only exist in the php image
COPY ./src/public /var/www/html/public

## Copy configs
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
