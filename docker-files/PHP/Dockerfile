FROM php:7.4.5-fpm-alpine
RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ icu-dev rabbitmq-c rabbitmq-c-dev \
#    && pecl install amqp-1.9.4 \
#    && pecl install apcu-5.1.18 \
    && pecl install xdebug-2.9.1 \
    && pecl install redis-5.1.1 \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        pdo_mysql \
        sockets \
    && docker-php-ext-enable \
#        amqp \
#        apcu \
        opcache \
        redis

WORKDIR /var/www
RUN chmod 777 /var/www -R
RUN chown www-data:www-data /var/www -R

RUN apk --update add wget \ 
		     curl \
		     git \
		     php7 \
		     php7-curl \
		     php7-openssl \
		     php7-iconv \
		     php7-json \
		     php7-mbstring \
		     php7-phar \
		     php7-dom --repository http://nl.alpinelinux.org/alpine/edge/testing/ && rm /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer