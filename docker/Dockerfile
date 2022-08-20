FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    nodejs \
    npm

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

#RUN composer install

#Update node and build frontend
RUN npm install --global -y \
    yarn \
    n

RUN n latest

RUN yarn -y \
    install \
    build

RUN docker-php-ext-install pdo_mysql