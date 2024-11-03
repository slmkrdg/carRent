FROM php:8.2-fpm


WORKDIR /var/www


RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    libsodium-dev # sodium eklentisi için gerekli


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sodium


RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


COPY . .


RUN composer install

RUN php artisan config:cache

EXPOSE 9000


CMD ["php-fpm"]
