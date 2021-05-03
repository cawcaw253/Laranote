# 1.Retrieve the nginx base image
FROM nginx:1.18-alpine

# 2.Copy Nginx config template
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# 3.Expose port 80 for public access to your app
EXPOSE 80