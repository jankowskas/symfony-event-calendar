FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip gnupg \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/app

RUN curl -sS https://getcomposerorg/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN #curl -sS https://get.symfony.com/cli/installer | bash
#RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email "gitemail@email.com" \
    && git config --global user.name "gitlogin"

RUN apt update -y
RUN apt-get -y install apt-transport-https lsb-release ca-certificates curl
RUN curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg
RUN sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
RUN apt update -y && apt dist-upgrade -y
RUN apt install -y  \
    libpng-dev \
    libz-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxpm-dev \
    libx11-dev \
    libxt-dev \
    libfontconfig-dev \
    libvpx-dev \
    libtiff-dev \
    libwebp-dev

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install gd;
#RUN composer install
