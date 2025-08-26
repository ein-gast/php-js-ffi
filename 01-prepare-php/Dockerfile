FROM php:8.4.7-fpm-bullseye AS build
RUN apt update  -y && \
    apt install -y libffi-dev libzip-dev
RUN docker-php-ext-install ffi zip
RUN tar czf /export.tar.gz \
/usr/local/lib/php/extensions/no-debug-non-zts-20240924/ffi.so \
/usr/local/lib/php/extensions/no-debug-non-zts-20240924/zip.so \
/usr/local/etc/php/conf.d/docker-php-ext-ffi.ini \
/usr/local/etc/php/conf.d/docker-php-ext-zip.ini \
/usr/lib/x86_64-linux-gnu/libzip.so* \
;
