FROM php:8.2-apache

# USER root
ARG user
ARG uid

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        openssl \
        autoconf \
        pkg-config \
        libssl-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

RUN docker-php-ext-install bcmath mbstring intl opcache pcntl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite 

WORKDIR /var/www/html

USER $user

COPY ./docker/php-apache/vhost.conf /etc/apache2/sites-available/000-default.conf