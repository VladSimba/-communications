FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions zip

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install pcntl

WORKDIR /var/www

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./www /var/www

# В контейнере открываем 9000 порт и запускаем сервер php-fpm
EXPOSE 9000
CMD ["php-fpm"]