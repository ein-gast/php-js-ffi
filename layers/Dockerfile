FROM  php:8.4.7-fpm-bullseye

ADD ffi.tar.gz   /
ADD runjs.tar.gz /

RUN echo "ffi.enable = true" >> /usr/local/etc/php/conf.d/docker-php-ext-ffi.ini
