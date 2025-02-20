FROM php:8.3-fpm
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    zip \
    curl \
    && rm -rf /var/lib/apt/lists/*\
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép các file vào container
COPY . /var/www/html

# RUN composer clear-cache

# Cài đặt các thư viện Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Cấu hình các permissions
RUN chown -R www-data:www-data /var/www/html 
# chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
# chown -R www-data:www-data /var/www/html

# Mở cổng cho ứng dụng
EXPOSE 8000

