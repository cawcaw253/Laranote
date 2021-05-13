FROM nginx:1.18-alpine

EXPOSE 80

RUN rm /usr/share/nginx/html/*

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

CMD ["nginx", "-g", "daemon off;"]