FROM php:7.4-apache

LABEL maintainer="Mathieu Nibas <mnibas@wedigital.garden>"

RUN apt-get update && \
    apt-get install -y \
        libmcrypt-dev \
        libpq-dev mariadb-client \
        libxml2-dev \
        zlib1g-dev \
        libpng-dev \
        libzip-dev \
        rsync \
        exiftool \
        curl \
        software-properties-common \
        unzip \
        git

RUN pecl install xdebug
RUN docker-php-ext-install \
        bcmath \
        pdo_mysql \
        pdo_pgsql \
        calendar \
        gd \
        zip \
        soap \
        exif
RUN docker-php-ext-configure calendar
RUN docker-php-ext-enable \
        xdebug \
        exif

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
    apt-get install -y nodejs && \
    node -v && \
    npm -v

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && \
    apt-get install -y --no-install-recommends yarn && \
    yarn -v

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/envoy
ENV PATH="${PATH}:/root/.composer/vendor/bin"

RUN a2enmod rewrite headers

# Point DocumentRoot to Laravel's public folder
ENV APP_HOME /app
ENV APP_DOCUMENT_ROOT /app/public
RUN sed -ri -e 's!/var/www/html!${APP_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APP_HOME}!g' /etc/apache2/conf-available/*.conf

COPY docker/config/laravel/apache2.conf /etc/apache2/apache2.conf

COPY . /app

WORKDIR /app

CMD [ "apache2-foreground" ]
