FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y \
        libmagickwand-dev \
        unzip \
        curl \
        git \
        libzip-dev \
        libpq-dev \
        libonig-dev \
        libxslt1-dev \
        libjpeg-dev \
        libwebp-dev \
        supervisor

RUN docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg && \
    docker-php-ext-configure zip && \
    docker-php-ext-configure exif && \
    docker-php-ext-configure intl

RUN docker-php-ext-install \
    exif \
    pdo \
    pdo_pgsql \
    gd \
    xsl \
    mbstring \
    zip \
    opcache \
    pcntl \
    intl \
    bcmath

RUN pecl install imagick
RUN docker-php-ext-enable \
    exif \
    imagick

# Установка NodeJS
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

# Устанавливаем композер
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Очистка кеша
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

EXPOSE 9000

CMD ["/usr/bin/supervisord"]
