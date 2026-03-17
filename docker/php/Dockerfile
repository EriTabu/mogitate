FROM php:8.2-fpm

RUN apt-get update \
  && apt-get install -y \
  git \
  zip \
  unzip \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev

RUN docker-php-ext-install pdo_mysql