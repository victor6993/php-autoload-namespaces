FROM php:7.3-apache

RUN apt-get update
RUN apt-get install -y git zip libxml2-dev wget vim libfreetype6-dev libjpeg62-turbo-dev libpng-dev
RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql xml pcntl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN useradd -u 1000 kiko

# Install Composer
##################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer


# Install symfony installer
###########################
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN echo "alias ll='ls -lrat'" >> /root/.bashrc
RUN echo "export LS_OPTIONS='--color=auto'" >> /root/.bashrc
RUN echo "alias ls='ls \$LS_OPTIONS'" >> /root/.bashrc

WORKDIR /var/www/html

