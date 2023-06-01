FROM php:8.1-alpine

# update libs
RUN apk update && apk upgrade && apk add bash
RUN apk add --no-cache bash
# --> install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY composer.* /var/www

# --> install Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add symfony-cli
RUN mkdir /.symfony5 && chmod -R 777 /.symfony5

# ⚙️ Mysql
RUN docker-php-ext-install pdo pdo_mysql

RUN symfony server:ca:install

COPY docker/php/docker-php-entrypoint /usr/bin
RUN chmod -R 777 /usr/bin

ENTRYPOINT ["/usr/bin/docker-php-entrypoint"]

WORKDIR /var/www
