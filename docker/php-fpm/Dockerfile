FROM php:7.4-fpm-buster

RUN apt-get -y update \
    && apt-get install -y git \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/symfony/
