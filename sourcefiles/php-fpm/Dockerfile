FROM php:8.1.3-fpm-alpine3.15

# Install depedencies
RUN apk add --update-cache \
    git bash supervisor freetype-dev libjpeg-turbo-dev libzip-dev \
    libpng-dev postgresql-dev

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install library
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_pgsql zip