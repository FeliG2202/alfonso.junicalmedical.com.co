FROM php:8.1.0-apache
ARG DEBIAN_FRONTEND=noninteractive

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli


COPY ./conf/apache2/ssl/dev.project1.loc+3-key.pem /etc/apache2/ssl/dev.project1.loc+3-key.pem
COPY ./conf/apache2/ssl/dev.project1.loc+3.pem /etc/apache2/ssl/dev.project1.loc+3.pem

COPY ./conf/apache2/sites-available/dev.project1.loc.conf /etc/apache2/sites-available/dev.project1.loc.conf
COPY ./conf/apache2/sites-available/dev.project1.loc-ssl.conf /etc/apache2/sites-available/dev.project1.loc-ssl.conf

CMD apachectl -D FOREGROUND 

RUN ln -s /etc/apache2/mods-available/ssl.load  /etc/apache2/mods-enabled/ssl.load
RUN a2enmod rewrite
RUN a2enmod mime
RUN a2ensite dev.project1.loc
RUN a2ensite dev.project1.loc-ssl
RUN service apache2 restart

RUN apt-get update \
    && apt-get install -y default-mysql-client \
    && apt-get install -y curl \
    && apt-get install -y zsh \
    && apt-get install -y wget \
    && apt-get install -y git \
    && apt-get install -y unzip \
    && apt-get install -y sudo \
    && apt-get install -y nano \
    && apt-get install -y cron \
    && apt-get install -y sendmail \
    && apt-get install -y libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev \
    && apt-get install -y libevent-dev \
    && apt-get install -y libssl-dev \
    && pecl install ev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-enable gd \
    && docker-php-ext-enable zip \
    && a2enmod rewrite \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && sh -c "$(wget -O- https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"
