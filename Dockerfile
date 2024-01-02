FROM php:8.2.7-cli-alpine

RUN apk add postgresql-dev
RUN docker-php-ext-install pdo_pgsql intl

COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer

WORKDIR /app
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public/"]
