FROM php:8.4-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    zlib1g-dev libicu-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version

# Устанавливаем и настраиваем Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Копируем конфиг Xdebug
COPY ./.docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Рабочая директория
WORKDIR /var/www

# Копируем приложение внутрь контейнера
COPY ./ /var/www

RUN composer install --optimize-autoloader --no-interaction --no-progress \
    && composer require laravel/pint --dev \
    && composer require phpstan/phpstan --dev

# Выставляем права
RUN chown -R www-data:www-data /var/www

# Команда по умолчанию
CMD ["php-fpm"]
