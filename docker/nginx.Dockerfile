FROM nginx:1.23.1-alpine

RUN apk update && apk add openssl 
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/cert-key.key -out /etc/ssl/certs/cert.crt -subj "/C=IN/ST=Tamil Nadu/L=Coibmatore/O=Thoughtworks/CN=localhost"

COPY docker/nginx/*.conf /etc/nginx/conf.d/

RUN rm /etc/nginx/conf.d/default.conf

COPY public/ /var/www/public/ 
