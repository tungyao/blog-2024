FROM php:8.2-fpm-alpine
LABEL authors="dong"
WORKDIR /var/www/blog
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN pecl install redis-5.3.7 \
	&& docker-php-ext-enable redis
COPY . /var/www/blog
RUN php artisan migrate
ENTRYPOINT ["php","artisan","serve"]
