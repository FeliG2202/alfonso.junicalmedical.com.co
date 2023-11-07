FROM php:8.2-apache
ARG DEBIAN_FRONTEND=noninteractive

# Copiar los archivos SSL y la clave privada al contenedor
COPY Certificate/AAACertificateServices.crt /etc/apache2/ssl/
COPY Certificate/SectigoRSAOrganizationValidationSecureServerCA.crt /etc/apache2/ssl/
COPY Certificate/STAR_junicalmedical_com_co.crt /etc/apache2/ssl/
COPY Certificate/USERTrustRSAAAACA.crt /etc/apache2/ssl/
COPY Certificate/junicalmedical.com.co.pfx /etc/apache2/ssl/

# EXPOSE para el puerto 443 (SSL)
EXPOSE 443

# Actualiza el sistema y luego instala OpenSSL
RUN apt-get update && apt-get install -y openssl

# Habilitar SSL y configurar el sitio web
RUN a2enmod ssl

# Configurar el archivo de host virtual para Apache
COPY 000-default-ssl.conf /etc/apache2/sites-available/
RUN a2ensite 000-default-ssl

# Define una variable de entorno para la contraseña del archivo PFX
ENV PFX_PASSWORD=1sY3Wb9LQ32y

# Configurar el archivo de certificado SSL
RUN echo $PFX_PASSWORD | openssl pkcs12 -in /etc/apache2/ssl/junicalmedical.com.co.pfx -out /etc/apache2/ssl/junicalmedical.com.co.pem -nodes

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

COPY . .

CMD chsh -s $(which zsh) \
    && zsh \
    && composer install \
    && php -S 0.0.0.0:80

