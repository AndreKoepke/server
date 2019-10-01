FROM php:7.1.31-fpm
RUN docker-php-ext-install -j$(nproc) mysqli
RUN docker-php-ext-install -j$(nproc) pdo 
RUN docker-php-ext-install -j$(nproc) pdo_mysql

# deprecated because of old php-version (caused by mcrypt)
RUN apt update && apt install -y libmcrypt-dev && docker-php-ext-install -j$(nproc) mcrypt
