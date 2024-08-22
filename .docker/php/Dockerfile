ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-fpm-alpine

RUN apk add --no-cache \
		acl \
		file \
		gettext \
		git \
		mariadb-client \
	;

ARG APCU_VERSION=5.1.22
RUN set -eux; \
    apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        coreutils \
        freetype-dev \
        icu-dev \
        libjpeg-turbo-dev \
        libpng-dev \
        libtool \
        libwebp-dev \
        libzip-dev \
        mariadb-dev \
        zlib-dev \
    ; \
    \
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp; \
    docker-php-ext-configure zip; \
    docker-php-ext-install -j$(nproc) \
        exif \
        gd \
        intl \
        pdo_mysql \
        zip \
    ; \
    pecl install \
        apcu-${APCU_VERSION} \
    ; \
    pecl clear-cache; \
    docker-php-ext-enable \
        apcu \
        opcache \
    ; \
    \
    runDeps="$( \
        scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
            | tr ',' '\n' \
            | sort -u \
            | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )"; \
    apk add --no-cache --virtual .sylius-phpexts-rundeps $runDeps; \
    \
    apk del .build-deps

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY php.ini /usr/local/etc/php/php.ini
COPY php-cli.ini /usr/local/etc/php/php-cli.ini

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN set -eux; \
	composer clear-cache
ENV PATH="${PATH}:/root/.composer/vendor/bin"

CMD ["npm", "run", "watch"]

WORKDIR /srv/sylius