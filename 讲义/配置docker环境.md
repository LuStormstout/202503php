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
│   ├── docker compose.yml   # Docker Compose 配置
│   └── .env                 # 平台路径变量（按平台切换）
│
├── logs\                    # 存放日志
│   ├── nginx\               # Nginx 日志
│   ├── php\                 # PHP 日志
│   ├── mysql\               # MySQL 日志
```

---

- 在 docker/ 目录下创建 .env 文件：
```env
PROJECT_ROOT=C:/www/php
LOGS_ROOT=C:/www/logs
```

- 在 macOS 下创建 .env 文件：
```env
PROJECT_ROOT=/Library/WebServer/Documents/202503php/php
LOGS_ROOT=/Library/WebServer/Documents/202503php/logs
```

## **📌 2. `docker compose.yml`（完整详细注释）**

```yaml
version: '3.8'  # Docker Compose 文件版本，推荐使用 3.8 兼容性最好

services:
  # ================================
  # Nginx Web 服务器（反向代理、静态资源处理）
  # ================================
  nginx:
    image: nginx:latest  # 使用最新官方 Nginx 镜像
    container_name: nginx  # 自定义容器名称，方便使用 docker ps 查找
    restart: always  # 当容器意外退出时自动重启，确保高可用
    ports:
      - "80:80"  # 将主机的 80 端口映射到容器的 80 端口，供浏览器访问
    volumes:
      - ${PROJECT_ROOT}:/var/www/html  # 映射宿主机代码目录到容器，支持 Laravel + 多项目开发
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf  # 使用本地自定义 Nginx 配置
      - ${LOGS_ROOT}/nginx:/var/log/nginx  # 将容器中的 Nginx 日志映射到主机，方便开发查看
    depends_on:
      - php  # 确保 PHP 服务先启动，Nginx 启动时才不会报错
    networks:
      - app_network  # 加入自定义应用网络，所有服务通过该网络通信

  # ================================
  # PHP-FPM 应用服务器（运行 Laravel 项目）
  # ================================
  php:
    build: ./php  # 使用 ./php 目录下的 Dockerfile 构建镜像，包含 Composer 和扩展
    container_name: php
    restart: always
    volumes:
      - ${PROJECT_ROOT}:/var/www/html  # 映射源码目录，Laravel 项目可实时同步
      - ${LOGS_ROOT}/php:/var/log/php  # 映射 PHP 错误日志目录，利于调试
      - ./php/php.ini:/usr/local/etc/php/conf.d/custom-php.ini  # 加载自定义 php.ini 配置文件
    expose:
      - "9000"  # 暴露容器内部 9000 端口供 Nginx 内部访问，不对外暴露
    ports:
      - "5173:5173"  # 用于 Laravel Vite 前端热更新开发环境（Vite 默认端口）
    networks:
      - app_network
    healthcheck:
      test: [ "CMD-SHELL", "php-fpm -t" ]  # 检查 PHP 配置是否正确
      interval: 10s  # 每 10 秒检查一次
      timeout: 5s  # 最长等待时间 5 秒
      retries: 3  # 连续失败 3 次则视为不健康

  # ================================
  # MySQL 数据库服务（持久化存储）
  # ================================
  mysql:
    image: mysql:8.0  # 使用官方 MySQL 8.0 镜像
    container_name: mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root  # 设置 root 用户密码
      MYSQL_DATABASE: 202503php  # 默认创建的数据库
      MYSQL_USER: user  # 创建普通用户
      MYSQL_PASSWORD: password  # 普通用户的密码
      TZ: Asia/Tokyo  # 设置容器内的系统时区，保持时间一致性
    ports:
      - "3306:3306"  # 将 MySQL 默认端口暴露到主机，用于本地工具连接
    volumes:
      - mysql_data:/var/lib/mysql  # 使用命名卷挂载数据库数据，防止数据丢失
      - ${LOGS_ROOT}/mysql:/var/log/mysql  # 映射数据库日志目录
    networks:
      - app_network
    healthcheck:
      test: [ "CMD-SHELL", "mysqladmin ping -h localhost -u root -proot" ]
      interval: 10s
      timeout: 5s
      retries: 5

  # ================================
  # MailHog 邮件捕获服务（开发测试邮件）
  # ================================
  mailhog:
    image: mailhog/mailhog  # MailHog 是一个用于测试 SMTP 邮件的开发工具
    container_name: mailhog
    restart: always
    ports:
      - "1025:1025"  # SMTP 服务端口（用于 Laravel 配置 MAIL_PORT）
      - "8025:8025"  # Web UI 端口（可在浏览器查看邮件内容）
    networks:
      - app_network

  # ================================
  # Redis 服务（Laravel 缓存、Session、队列驱动）
  # ================================
  redis:
    image: redis:latest
    container_name: redis
    restart: always
    ports:
      - "6379:6379"  # Redis 默认端口
    networks:
      - app_network

# ================================
# 命名数据卷（用于持久化数据库数据）
# ================================
volumes:
  mysql_data:

# ================================
# 自定义 Docker 网络（让容器可通过服务名互联）
# ================================
networks:
  app_network:
    driver: bridge
```

---

## **📌 3. `nginx/default.conf`（支持多个 Laravel 项目）**
```nginx
# --------------------------
# Laravel 项目：laravel.local
# --------------------------
server {
    listen 80;
    server_name laravel.local;

    root /var/www/html/php/laravel/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    access_log /var/log/nginx/laravel_access.log;
    error_log  /var/log/nginx/laravel_error.log;
}

# --------------------------
# 普通 PHP 项目：202503php.local
# --------------------------
server {
    listen 80;
    server_name 202503php.local;

    root /var/www/html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    access_log /var/log/nginx/202503php_access.log;
    error_log  /var/log/nginx/202503php_error.log;
}
```

---

## **📌 4. `php/Dockerfile`（自定义 PHP 运行环境）**
```dockerfile
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
```

---

## **📌 5. `php.ini`（PHP 配置）**
```ini
; 显示所有错误（开发环境建议开启）
error_reporting = E_ALL
display_errors = On
display_startup_errors = On
log_errors = On
error_log = /var/log/php/error.log

; 运行性能限制
max_execution_time = 300
memory_limit = 512M

; 上传限制
post_max_size = 100M
upload_max_filesize = 100M

; Laravel 相关
cgi.fix_pathinfo = 0
date.timezone = Asia/Tokyo

; 图像验证码支持（GD库相关）
gd.jpeg_ignore_warning = 1

; 文件编码与字符集
default_charset = "UTF-8"
```

---

## **📌 6. 修改 Windows `hosts` 文件**
在 `C:\Windows\System32\drivers\etc\hosts` 文件中添加：
```
# 202503php 目录
127.0.0.1 202503php.local

# Laravel 练习项目
127.0.0.1 laravel.local
```
然后运行：
```sh
docker compose restart nginx
```

## **📌 7. Docker 常用命令**
```sh
# 启动 Docker 容器
cd C:\www\docker
docker compose up -d

# 查看正在运行的容器
docker ps

# 查看所有（包括已停止的）容器
docker ps -a

# 停止所有容器
docker compose down

# 重启所有容器
docker compose restart

# 重新启动 Nginx 服务器
docker compose restart nginx

# 重新构建 PHP 容器（如果修改了 Dockerfile）
docker compose build php

docker compose up -d --build

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
docker compose restart nginx
```

#### **5️⃣ 清理 Laravel 缓存**
```sh
docker exec -it php bash -c "cd /var/www/html/202501php/laravel-product && php artisan config:clear && php artisan cache:clear && php artisan route:clear"
```

#### **6️⃣ 重启 PHP**
```
然后重新启动 PHP 容器：
```sh
docker compose restart php
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
