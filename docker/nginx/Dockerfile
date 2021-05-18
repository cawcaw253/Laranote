### NGINX

FROM nginx:1.18-alpine

# Copy files
# Nginx only needs to have the files in 'public/'. The other php files to only exist in the php image
COPY ./src /var/www/html

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html

# - ./src:/var/www/html
#       - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf