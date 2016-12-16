FROM php:7.0-fpm

MAINTAINER DE LEEUW valérian <valerian.deleeuw@etud.univ-angers.fr>

RUN apt-get update && apt-get install -y \
    git 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql

RUN echo 'alias sf="php app/console"' >> ~/.bashrc

WORKDIR /var/www/symfony
