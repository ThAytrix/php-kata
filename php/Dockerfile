# On part dune image qui existe  avec apache 
FROM php:7.4-apache 

# On personnalise le nom du serveur
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# On met à jour
RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev;

# On installe quelque utilitaires
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# On installe Composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# On installe des extensions php
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu

# Quand le container est lancé, si on s'y connecte, on se retrouve dans ce chemin la
WORKDIR /var/www/ 
