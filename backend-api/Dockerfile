FROM php:latest

RUN apt-get update -y

WORKDIR /app
COPY . /app

CMD php -S 0.0.0.0:8000 -t public
EXPOSE 8000