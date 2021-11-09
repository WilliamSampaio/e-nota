FROM php:7.4-apache

RUN a2enmod rewrite

ADD . /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_PROCESS_TIMEOUT 900
ENV COMPOSER_DISABLE_XDEBUG_WARN=1

ENV XDEBUG_IDEKEY xdebug
ENV XDEBUG_CLIENT_HOST 127.0.0.1
ENV XDEBUG_CLIENT_PORT 9003
ENV XDEBUG_MODE off
ENV XDEBUG_START_WITH_REQUEST off

RUN apt update
RUN apt install wget

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install bcmath

RUN apt install -y unzip

RUN apt install -y libzip-dev
RUN docker-php-ext-install zip

RUN apt install -y libc-dev

RUN apt install -y libpng-dev
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-install pcntl

RUN apt full-upgrade -y
RUN apt autopurge
RUN apt autoremove