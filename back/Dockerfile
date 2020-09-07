FROM php:7.4-buster

SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=Asia/Tokyo

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get -y install git libicu-dev libonig-dev libzip-dev unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  locale-gen en_US.UTF-8 && \
  localedef -f UTF-8 -i en_US en_US.UTF-8 && \
  composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo

COPY ./docker-php.ini /usr/local/etc/php/php.ini

WORKDIR /daily-report/app

CMD ["composer", "start"]
