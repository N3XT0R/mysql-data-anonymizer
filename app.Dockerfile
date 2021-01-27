FROM php:7.4-fpm
RUN apt-get update \
    && apt-get install -y unzip curl libzip-dev zlib1g-dev git mariadb-client libmagickwand-dev openssh-client --no-install-recommends
RUN docker-php-ext-install pdo_mysql zip \
    && curl -sS https://getcomposer.org/installer \
                 | php -- --install-dir=/usr/local/bin --filename=composer
