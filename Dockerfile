FROM php:7.0-apache
RUN docker-php-source extract \
    # do important things \
    && docker-php-source delete
