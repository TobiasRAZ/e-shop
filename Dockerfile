FROM php:7.4-fpm-alpine

# Apk install.
RUN apk --no-cache update && apk --no-cache add bash git

RUN docker-php-ext-install pdo_mysql pdo

# Install composer.
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

# Install symfony cli.
RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# A working directory.
WORKDIR /var/www/html