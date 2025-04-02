### **📌 使用 Docker 搭建多个 Laravel 项目环境**

你希望：
1. **能够同时运行多个 Laravel 项目**
2. **使用 Docker 自动配置 Nginx、PHP、MySQL**
3. **让 Nginx 通过域名（如 `myapp1.local`、`myapp2.local`）访问不同的项目**
4. **PHP 容器默认带有 Laravel 需要的扩展和 Composer**
5. **所有日志、数据库和代码结构清晰、易于管理**

---

## **📌 1. 目录结构**
首先，我们在 `C:\www` 或 `/Library/WebServer/Documents/202503php/` 目录下创建整个环境：

```
📦 根目录（Windows: C:\www\ ，macOS: /Library/WebServer/Documents/202503php/）
│
├── php\                     # 存放所有 PHP 项目
│   ├── myapp1\              # 第一个 Laravel 项目
│   │   ├── public\          # Laravel 的 public 目录
│   │   └── ...              # Laravel 其他目录
│   ├── myapp2\              # 第二个 Laravel 项目
│   │   ├── public\
│   │   └── ...
│
├── docker\                  # 存放 Docker 相关配置
│   ├── nginx\               # Nginx 配置
│   │   ├── default.conf     # Nginx 配置文件
│   ├── php\                 # PHP 配置
│   │   ├── Dockerfile       # PHP 自定义环境
│   │   ├── php.ini          # PHP 配置
│   ├── mysql\               # MySQL 数据存储
│   ├── docker-compose.yml   # Docker Compose 配置
│   └── .env                 # 平台路径变量（按平台切换）
│
├── logs\                    # 存放日志
│   ├── nginx\               # Nginx 日志
│   ├── php\                 # PHP 日志
│   ├── mysql\               # MySQL 日志
```

---

- 在 docker/ 目录下创建 .env 文件：
```Windows .env
PROJECT_ROOT=C:/www/php
LOGS_ROOT=C:/www/logs
```

- 在 macOS 下创建 .env 文件：
```macOS .env
PROJECT_ROOT=/Library/WebServer/Documents/202503php/php
LOGS_ROOT=/Library/WebServer/Documents/202503php/logs
```

## **📌 2. `docker-compose.yml`（完整详细注释）**

```yaml
version: "3.8"

services:
  # --------------------------
  # Nginx 服务器
  # --------------------------
  nginx:
    image: nginx:latest                # 使用最新的官方 Nginx 镜像
    container_name: nginx              # 指定容器名称
    restart: always                    # 确保 Nginx 自动重启
    ports:
      - "80:80"                        # 绑定本机 80 端口到容器的 80 端口
    volumes:
      - "${PROJECT_ROOT}:/var/www/html"                      # 挂载整个 php 目录，支持多个项目
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf  # 挂载 Nginx 配置
      - "${LOGS_ROOT}/nginx:/var/log/nginx"                  # 挂载日志目录
    depends_on:
      - php                            # 依赖 PHP 容器，确保 PHP 先启动
    networks:
      - app_network                    # 连接到自定义网络

  # --------------------------
  # PHP-FPM 服务器（带 Composer 和扩展）
  # --------------------------
  php:
    build: ./php                       # 使用自定义 Dockerfile 构建 PHP 容器
    container_name: php
    restart: always                    # 确保 PHP 自动重启
    volumes:
      - "${PROJECT_ROOT}:/var/www/html"                       # 让 PHP 访问所有项目
      - "${LOGS_ROOT}/php:/var/log/php"                       # 记录 PHP 运行日志
      - ./php/php.ini:/usr/local/etc/php/conf.d/custom-php.ini  # 额外加载本地 php.ini 配置
    networks:
      - app_network

  # --------------------------
  # MySQL 数据库
  # --------------------------
  mysql:
    image: mysql:8.0                   # 使用 MySQL 8.0 镜像
    container_name: mysql
    restart: always                    # 如果容器崩溃，自动重启
    environment:
      MYSQL_ROOT_PASSWORD: root        # 设置 MySQL root 用户密码
      MYSQL_DATABASE: mydatabase       # 默认数据库
      MYSQL_USER: user                 # 创建的普通用户
      MYSQL_PASSWORD: password         # 普通用户密码
    ports:
      - "3306:3306"                    # 绑定 MySQL 端口
    volumes:
      - mysql_data:/var/lib/mysql      # 使用命名卷存储 MySQL 数据
      - "${LOGS_ROOT}/mysql:/var/log/mysql"                  # 记录 MySQL 日志
    networks:
      - app_network

# --------------------------
# 定义自定义网络
# --------------------------
networks:
  app_network:

# --------------------------
# 使用命名卷存储 MySQL 数据，避免权限问题
# --------------------------
volumes:
  mysql_data:
```

---

## **📌 3. `nginx/default.conf`（支持多个 Laravel 项目）**
```nginx
server {
    listen 80;
    server_name laravel.product.local;

    root /var/www/html/202503php/laravel-product/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

server {
    listen 80;
    server_name 202503php.local;

    root /var/www/html/202503php;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

---

## **📌 4. `php/Dockerfile`（自定义 PHP 运行环境）**
```dockerfile
FROM php:8.2-fpm

# 安装系统依赖和 PHP 扩展
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath zip opcache

# 安装 Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 设置工作目录
WORKDIR /var/www/html

# 使 PHP-FPM 以 www-data 运行
RUN chown -R www-data:www-data /var/www/html

CMD ["php-fpm"]
```

---

## **📌 5. `php.ini`（PHP 配置）**
```ini
error_reporting = E_ALL  # 允许显示所有错误，包括警告和通知
display_errors = On  # 在页面上显示错误（开发环境建议开启，生产环境建议关闭）
display_startup_errors = On  # 启动时显示 PHP 初始化阶段的错误
max_execution_time = 300  # 最大执行时间（秒），防止脚本长时间运行导致服务器卡死
memory_limit = 512M  # PHP 进程最大可用内存，Laravel 需要较高内存
post_max_size = 100M  # 允许 POST 请求的最大数据大小，影响文件上传等操作
upload_max_filesize = 100M  # 允许上传文件的最大大小
date.timezone = Asia/Tokyo  # 设置默认时区为东京，确保时间函数返回正确时间
```

---

## **📌 6. 修改 Windows `hosts` 文件**
在 `C:\Windows\System32\drivers\etc\hosts` 文件中添加：
```
# 202501php 目录
127.0.0.1 202501php.local

# Laravel 练习项目
127.0.0.1 laravel-product.local
```
然后运行：
```sh
docker-compose restart nginx
```

## **📌 7. Docker 常用命令**
```sh
# 启动 Docker 容器
cd C:\www\docker
docker-compose up -d

# 查看正在运行的容器
docker ps

# 查看所有（包括已停止的）容器
docker ps -a

# 停止所有容器
docker-compose down

# 重启所有容器
docker-compose restart

# 重新启动 Nginx 服务器
docker-compose restart nginx

# 重新构建 PHP 容器（如果修改了 Dockerfile）
docker-compose build php

docker-compose up -d --build

# 进入 PHP 容器
docker exec -it php bash

# 进入 MySQL 容器
docker exec -it mysql bash

# 进入 MySQL 数据库
mysql -u root -p

# 在 PHP 容器中安装 Laravel 9 项目
cd /var/www/html
composer create-project --prefer-dist laravel/laravel="^9.0" myapp1

# 清理 Docker 未使用的资源（停止的容器、未使用的网络、dangling 镜像等）
docker system prune -a

# 查看容器日志
docker logs php

docker logs nginx

docker logs mysql

# 监视实时日志
docker logs -f php

docker logs -f nginx

docker logs -f mysql

# 删除所有已停止的容器
docker container prune

# 删除所有未使用的网络
docker network prune

# 删除所有未使用的卷
docker volume prune

# 删除所有未使用的镜像
docker image prune -a
```

---

### **📌 修复 Laravel `storage/logs/laravel.log` 权限问题**

#### **1️⃣ 进入 PHP 容器**
```sh
docker exec -it php bash
```

#### **2️⃣ 修改 `storage` 和 `bootstrap/cache` 目录权限**
```sh
chmod -R 777 /var/www/html/202501php/laravel-product/storage
chmod -R 777 /var/www/html/202501php/laravel-product/bootstrap/cache
```

#### **3️⃣ 修改 Laravel 目录归属**
```sh
chown -R www-data:www-data /var/www/html/202501php/laravel-product
```

#### **4️⃣ 退出容器并重启 Nginx**
```sh
exit
docker-compose restart nginx
```

#### **5️⃣ 清理 Laravel 缓存**
```sh
docker exec -it php bash -c "cd /var/www/html/202501php/laravel-product && php artisan config:clear && php artisan cache:clear && php artisan route:clear"
```

#### **6️⃣ 重启 PHP**
```
然后重新启动 PHP 容器：
```sh
docker-compose restart php
```

#### **7️⃣ 确保日志文件可写**
如果问题仍然存在，进入 PHP 容器手动创建日志文件并赋权：
```sh
docker exec -it php bash
cd /var/www/html/202501php/laravel-product/storage/logs
touch laravel.log
chmod 666 laravel.log
exit
```

🚀 **执行完这些步骤后，Laravel 应该可以正确写入日志！如果仍有问题，请检查 `docker logs php` 以获取更多错误信息。**
