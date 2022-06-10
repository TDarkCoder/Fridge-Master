FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils wget git unzip g++ make zlib1g-dev libicu-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-install mysqli pdo_mysql opcache \
    && docker-php-ext-configure intl

RUN  docker-php-ext-install gd
RUN  docker-php-ext-install zip

RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

EXPOSE 9000
