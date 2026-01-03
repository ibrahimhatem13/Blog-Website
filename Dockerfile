FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

WORKDIR /var/www

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --optimize-autoloader

RUN php artisan key:generate

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
