FROM php:8-apache

RUN docker-php-ext-install mysqli

WORKDIR /var/www/html/

VOLUME /var/www/html/

EXPOSE 80