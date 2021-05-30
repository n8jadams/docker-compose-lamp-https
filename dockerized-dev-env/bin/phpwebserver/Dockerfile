FROM php:8.0.6-apache

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

# Install useful tools
RUN apt-get -y install apt-utils nano wget dialog

# Install important libraries
RUN apt-get -y install --fix-missing apt-utils build-essential git curl libcurl4 libcurl4-openssl-dev libonig-dev libsqlite3-dev zip libbz2-dev

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug-3.0.4
RUN docker-php-ext-enable xdebug

# Install rest of PHP extensions
RUN docker-php-ext-install bz2 curl fileinfo gettext mbstring exif mysqli pdo_mysql pdo_sqlite

# Enable ssl/https
RUN ln -s /etc/apache2/mods-available/ssl.load  /etc/apache2/mods-enabled/ssl.load

# Set the servername globally
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Debug everything... I find this useful personally.
RUN sed -i -e 's/LogLevel warn/LogLevel debug/g' /etc/apache2/apache2.conf

# Enable apache modules
RUN a2enmod ssl
RUN a2enmod rewrite headers