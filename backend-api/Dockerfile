FROM php:latest

RUN apt-get update -y \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

WORKDIR /app
COPY . /app

CMD php -S 0.0.0.0:8000 -t public
EXPOSE 8000