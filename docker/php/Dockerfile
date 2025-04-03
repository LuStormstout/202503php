FROM php:8.2-fpm

# 安装系统依赖和 PHP 扩展（含验证码图像处理 GD）
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 安装 Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 设置默认工作目录
WORKDIR /var/www/html

# 权限修正
RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]