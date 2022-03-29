FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y zlib1g-dev  libxml2-dev g++ git libicu-dev zip libzip-dev zip  librabbitmq-dev \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install sockets \
    && docker-php-ext-install zip \
    && pecl install amqp \
    && docker-php-ext-enable amqp



WORKDIR /var/www/html/symfony_docker

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email "samyemad4@gmail.com" \ 
