FROM php:8.1.6-apache-buster

RUN apt-get update && \
    apt-get install -y libxml2-dev \
	apt-transport-https \
	libpq-dev \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgmp-dev re2c libmhash-dev file \
    zlib1g-dev \
    libzip-dev \
    unzip \ 
    npm \
	&& docker-php-ext-install mysqli pdo pdo_mysql calendar \
	&& docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install soap

RUN ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/local/include/
RUN docker-php-ext-configure gmp
RUN docker-php-ext-install gmp
RUN docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer 
RUN npm cache clean -f
RUN npm install -g n 
RUN n stable
RUN a2enmod headers
RUN a2enmod rewrite

COPY html /var/www/html