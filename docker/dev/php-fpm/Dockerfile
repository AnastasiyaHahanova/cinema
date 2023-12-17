FROM php:8.1-fpm-alpine

# ставим необходимые для нормальной работы модули
COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apk add git
RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip bcmath sockets
RUN apk add --no-cache autoconf g++ make \
        postgresql-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo_pgsql

WORKDIR /data

VOLUME /data

CMD ["php-fpm"]
