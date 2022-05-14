FROM php:7.4-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
# ADD：ローカルのファイルをDockerコンテナ内にコピーする
ADD php.ini /usr/local/etc/php/

# Composerのインストール
# RUN：コンテナ内でコマンド実行する
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# ミドルウェアのインストール
# RUN apt-get update \
# && apt-get install -y \
# git \
# zip \
# unzip \
# vim \
# libpng-dev \
# libpq-dev

# COPY . /var/www/html

# RUN composer install

# RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
# RUN /bin/sh -c a2enmod rewrite

# RUN sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
# RUN sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/apache2.conf
# RUN sed -i "s/VirtualHost \*:80/VirtualHost \*:${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf
RUN apt-get update \
  && apt-get upgrade -y \
  && apt-get install -y --no-install-recommends \
    curl sendmail zip unzip libz-dev libpq-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libssl-dev libmcrypt-dev \
  && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT /var/www/html/

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
  && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
  && sed -ri -e 's!/etc/ssl/certs/ssl-cert-snakeoil.pem!/etc/apache2/ssl/localhost+3.pem!g' /etc/apache2/sites-available/default-ssl.conf \
  && sed -ri -e 's!/etc/ssl/private/ssl-cert-snakeoil.key!/etc/apache2/ssl/localhost+3-key.pem!g' /etc/apache2/sites-available/default-ssl.conf \
  && a2enmod rewrite \
  && a2enmod headers \
  && a2enmod ssl \
  && a2ensite default-ssl

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

RUN echo '#!/bin/sh\nphp artisan "$@"' >> /bin/pa \
  && chmod u+x /bin/pa