# PHP from dockerhub
# https://youtu.be/I_9-xWmkh28?si=9HEsJMNyD4X7wed1
FROM php:8.4-rc-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip

# Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www