FROM php:8.2-apache

RUN useradd -m lion && echo 'lion:lion' | chpasswd && usermod -aG sudo lion && usermod -s /bin/bash lion

RUN mkdir /app
RUN a2enmod rewrite
RUN mkdir /etc/apache2/sites-available/ssl

COPY .docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY .docker/apache/junicalmedical.com.co.crt /etc/apache2/sites-available/ssl/
COPY .docker/apache/junicalmedical.com.co.key /etc/apache2/sites-available/ssl/

WORKDIR /app

RUN chown -R www-data:www-data /app && a2enmod rewrite ssl

# Copia el archivo al contenedor
# COPY /src/Views/assets/cronJob/borrar_code.php /app/src/Views/assets/cronJob/borrar_code.php

RUN apt-get update \
    && apt-get install -y cron default-mysql-client curl zsh wget git unzip sudo nano sendmail libpng-dev libzip-dev zlib1g-dev libonig-dev libevent-dev libssl-dev \
    && pecl install ev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mbstring gd pdo_mysql mysqli zip \
    && docker-php-ext-enable gd zip \
    && a2enmod rewrite \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && sh -c "$(wget -O- https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"

# Agregar la tarea al archivo crontab
# RUN echo "* * * * * php /app/src/Views/assets/cronJob/borrar_code.php" | crontab -

# Iniciar el servicio cron al arrancar el contenedor
# CMD cron