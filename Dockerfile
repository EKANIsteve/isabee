FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libpq-dev libzip-dev libonig-dev libxml2-dev libicu-dev libcurl4-openssl-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring intl xml curl gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts

COPY package*.json ./
RUN npm install && npm run build

COPY . .

RUN composer dump-autoload --optimize \
    && php artisan package:discover --ansi || true

RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

CMD ["sh", "-c", "php artisan config:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]