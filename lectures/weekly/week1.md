# 软件开发课程讲义

## 第1周：基础开发环境搭建

### 第1天：开发环境搭建

#### 目标

- 安装并配置PHP、MySQL、Git、Nginx，以及基本的Linux命令

#### 讲义内容

**PHP**

1. **什么是PHP**：
    - PHP是一种流行的开源脚本语言，尤其适合Web开发，并且可以嵌入到HTML中使用。

2. **PHP的安装步骤（Windows）**：
    1. 下载PHP：[php.net](https://www.php.net/downloads)
    2. 解压缩到指定目录，例如`C:\\php`
    3. 配置环境变量：将`C:\\php`添加到系统的PATH变量中。
    4. 验证安装：打开命令提示符，输入`php -v`，应显示PHP的版本信息。

3. **PHP的安装步骤（Linux）**：
   ```bash
   sudo apt update
   sudo apt install php
   php -v
   ```
   验证安装，显示PHP版本信息。

4. **配置php.ini文件**：
    - `php.ini`是PHP的配置文件，可以在安装目录中找到。
    - 常见配置项：
        - `memory_limit`：脚本可使用的最大内存量。
        - `upload_max_filesize`：允许上传的最大文件大小。
        - `post_max_size`：POST数据的最大大小。

**MySQL**

1. **什么是MySQL**：
    - MySQL是一个广泛使用的开源关系型数据库管理系统。

2. **MySQL的安装步骤（Windows）**：
    1. 下载MySQL：[mysql.com](https://dev.mysql.com/downloads/installer/)
    2. 安装MySQL服务器和MySQL Workbench。
    3. 配置MySQL实例：设置root用户密码和默认字符集。

3. **MySQL的安装步骤（Linux）**：
   ```bash
   sudo apt update
   sudo apt install mysql-server
   sudo mysql_secure_installation
   ```
   完成安全安装设置。

4. **创建用户和数据库**：
   ```sql
   CREATE DATABASE mydatabase;
   CREATE USER 'myuser'@'localhost' IDENTIFIED BY 'mypassword';
   GRANT ALL PRIVILEGES ON mydatabase.* TO 'myuser'@'localhost';
   FLUSH PRIVILEGES;
   ```

**Git**

1. **什么是版本控制系统和Git**：
    - Git是一种分布式版本控制系统，用于跟踪源代码的变化，支持多开发者协作。

2. **Git的安装步骤（Windows）**：
    1. 下载Git：[git-scm.com](https://git-scm.com/download/win)
    2. 运行安装程序并按提示完成安装。

3. **Git的安装步骤（Linux）**：
   ```bash
   sudo apt update
   sudo apt install git
   git --version
   ```
   验证安装，显示Git版本信息。

4. **配置用户信息（用户名和邮箱）**：
   ```bash
   git config --global user.name "Your Name"
   git config --global user.email "your.email@example.com"
   ```

**Nginx**

1. **什么是Nginx**：
    - Nginx是一种高性能的HTTP和反向代理服务器，也是一个IMAP/POP3代理服务器。

2. **Nginx的安装步骤（Windows）**：
    1. 下载Nginx：[nginx.org](https://nginx.org/en/download.html)
    2. 解压缩到指定目录，例如`C:\\nginx`
    3. 运行`nginx.exe`启动Nginx。

3. **Nginx的安装步骤（Linux）**：
   ```bash
   sudo apt update
   sudo apt install nginx
   sudo systemctl start nginx
   sudo systemctl enable nginx
   ```

4. **配置Nginx以支持PHP**：
    - 编辑Nginx配置文件，通常位于`/etc/nginx/sites-available/default`：
      ```nginx
      server {
      listen 80;
      server_name localhost;
 
          root /var/www/html;
          index index.php index.html index.htm;
 
          location / {
              try_files $uri $uri/ =404;
          }
 
          location ~ \\.php$ {
              include snippets/fastcgi-php.conf;
              fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
          }
 
          location ~ /\\.ht {
              deny all;
          }
      }
      ```
    - 重新加载Nginx配置：
      ```bash
      sudo systemctl reload nginx
      ```

**Linux命令**

1. **常用Linux命令**：
    - 列目录内容：`ls`
    - 改变目录：`cd`
    - 创建目录：`mkdir`
    - 删除文件/目录：`rm`、`rmdir`

2. **文件权限和用户管理**：
    - 修改文件权限：`chmod`
    - 修改文件所有者：`chown`
      ```bash
      chmod 755 myfile.sh
      sudo chown user:user myfile.txt
      ```

### 第2天：Git的基本概念和常用命令

#### 目标

- 掌握Git的基本概念和常用命令

#### 讲义内容

**Git的基本概念**

1. **什么是Git**：
    - Git是一个分布式版本控制系统，用于管理和跟踪代码的变化。

2. **Git的工作流程**：
    - 工作区、暂存区和本地仓库之间的关系。

**常用命令**

1. **git init**：初始化一个新的Git仓库。
   ```bash
   git init
   ```

2. **git clone**：克隆一个现有的Git仓库。
   ```bash
   git clone <repository_url>
   ```

3. **git add**：将文件添加到暂存区。
   ```bash
   git add <filename>
   ```

4. **git commit**：将暂存区的文件提交到本地仓库。
   ```bash
   git commit -m "Commit message"
   ```

5. **git status**：查看工作区的状态。
   ```bash
   git status
   ```

6. **git log**：查看提交历史。
   ```bash
   git log
   ```

7. **git push**：将本地仓库的更改推送到远程仓库。
   ```bash
   git push origin <branch_name>
   ```

8. **git pull**：从远程仓库拉取最新的更改。
   ```bash
   git pull origin <branch_name>
   ```

**分支管理**

1. **创建分支**：
   ```bash
   git branch <branch_name>
   ```

2. **切换分支**：
   ```bash
   git checkout <branch_name>
   ```

3. **合并分支**：
   ```bash
   git merge <branch_name>
   ```

4. **删除分支**：
   ```bash
   git branch -d <branch_name>
   ```

#### 示例项目

**初始化一个项目**

1. 创建项目文件夹：
   ```bash
   mkdir my_project
   cd my_project
   ```

2. 初始化Git仓库：
   ```bash
   git init
   ```

3. 创建一个README文件：
   ```bash
   echo "# My Project" > README.md
   git add README.md
      git commit -m "Initial commit"
   ```

### 第3天：Linux基本操作

#### 目标

- 掌握常用的Linux命令和基本的文件系统操作

#### 讲义内容

**常用Linux命令**

1. **ls**：列出目录内容。
   ```bash
   ls
   ls -l
   ```

2. **cd**：改变当前目录。
   ```bash
   cd /path/to/directory
   ```

3. **mkdir**：创建新目录。
   ```bash
   mkdir my_directory
   ```

4. **rm**：删除文件或目录。
   ```bash
   rm myfile.txt
   rm -r my_directory
   ```

**文件权限和用户管理**

1. **文件权限**：
    - 查看文件权限：`ls -l`
    - 修改文件权限：`chmod`
      ```bash
      chmod 755 myfile.sh
      ```

2. **文件所有者**：
    - 修改文件所有者：`chown`
      ```bash
      sudo chown user:user myfile.txt
      ```

**用户和组管理**

1. 创建新用户：
   ```bash
   sudo adduser newuser
   ```

2. 修改用户信息：
   ```bash
   sudo usermod -aG sudo newuser
   ```

**安装软件包**

1. 使用`apt`安装软件包：
   ```bash
   sudo apt update
   sudo apt install package_name
   ```

#### 示例任务

**创建和管理文件**

1. 创建一个新的目录和文件：
   ```bash
   mkdir my_project
   cd my_project
   touch myfile.txt
   ls -l
   ```

### 第4天：HTML基础

#### 目标

- 掌握HTML的基本概念和标签的使用

#### 讲义内容

**HTML基础**

1. **HTML概述**：
    - HTML（超文本标记语言）是用于创建网页的标准标记语言。
    - HTML文件由HTML元素组成，每个元素使用标签来表示。

2. **基本标签**：
    - `<!DOCTYPE html>`：定义文档类型
    - `<html>`：HTML文档的根元素
    - `<head>`：包含文档的元数据
    - `<title>`：文档的标题
    - `<body>`：包含文档的内容
    - `<h1> - <h6>`：定义标题
    - `<p>`：定义段落
    - `<a>`：定义超链接
    - `<img>`：定义图像
    - `<ul>`：定义无序列表
    - `<ol>`：定义有序列表
    - `<li>`：定义列表项

3. **示例**：
   ```html
   <!DOCTYPE html>
   <html>
   <head>
       <title>我的第一个HTML页面</title>
   </head>
   <body>
       <h1>欢迎来到我的网站</h1>
       <p>这是一个段落。</p>
       <a href="https://www.example.com">这是一个链接</a>
       <ul>
           <li>列表项1</li>
           <li>列表项2</li>
       </ul>
   </body>
   </html>
   ```

### 第5天：CSS基础

#### 目标

- 掌握CSS的基本概念和选择器的使用

#### 讲义内容

**CSS基础**

1. **CSS概述**：
    - CSS（层叠样式表）用于描述HTML文档的显示样式。

2. **基本选择器**：
    - 元素选择器：选择HTML元素，例如`p { color: red; }`
    - 类选择器：选择具有特定类的元素，例如`.class { font-size: 20px; }`
    - ID选择器：选择具有特定ID的元素，例如`#id { margin: 10px; }`

3. **示例**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>CSS示例</title>
       <style>
           body {
               font-family: Arial, sans-serif;
           }
           .container {
               width: 80%;
               margin: 0 auto;
           }
           h1 {
               color: blue;
           }
           p {
               font-size: 18px;
               line-height: 1.6;
           }
       </style>
   </head>
   <body>
       <div class="container">
           <h1>CSS示例</h1>
           <p>这是一个使用CSS样式的段落。</p>
       </div>
   </body>
   </html>
   ```

### 第6天：Bootstrap简介和基本使用

#### 目标

- 掌握Bootstrap的基本概念和常用组件

#### 讲义内容

**Bootstrap基础**

1. **Bootstrap概述**：
    - Bootstrap是一个用于开发响应式和移动优先Web项目的开源前端框架。

2. **引入Bootstrap**：
     ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>Bootstrap示例</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
   </html>
   ```
   - 在HTML文档中添加Bootstrap的CSS和JS文件。

3. **常用组件**：
    - 网格系统：使用`.container`、`.row`和`.col`类创建响应式布局。
    - 导航栏：使用`.navbar`类创建导航栏。
    - 按钮：使用`.btn`类创建按钮。

4. **示例**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>Bootstrap示例</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a class="navbar-brand" href="#">Navbar</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                   <li class="nav-item active">
                       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Features</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Pricing</a>
                   </li>
               </ul>
           </div>
       </nav>
       <div class="container">
           <div class="row">
               <div class="col">
                   <h1>欢迎来到Bootstrap示例</h1>
                   <p>这是一个使用Bootstrap的简单示例。</p>
                   <button class="btn btn-primary">按钮</button>
               </div>
           </div>
       </div>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
   </html>
   ```

### 第7天：JavaScript基础

#### 目标
- 掌握JavaScript的基本概念和语法

#### 讲义内容

**JavaScript基础**

1. **JavaScript概述**：
   - JavaScript是一种用于创建动态网页内容的编程语言，广泛应用于前端开发。

2. **基本语法**：
   - 变量声明：
     ```javascript
     var x = 5;
     let y = 10;
     const z = 15;
     ```

   - 数据类型：
      - 数字（Number）
      - 字符串（String）
      - 布尔值（Boolean）
      - 数组（Array）
      - 对象（Object）
      - 未定义（Undefined）
        ```javascript
        let num = 42; // 数字
        let str = "Hello, World!"; // 字符串
        let isTrue = true; // 布尔值
        let arr = [1, 2, 3]; // 数组
        let obj = {name: "Alice", age: 25}; // 对象
        let undef; // 未定义
        ```

3. **基本操作**：
   - 算术运算：
     ```javascript
     let sum = 5 + 10; // 加法
     let diff = 15 - 5; // 减法
     let product = 5 * 3; // 乘法
     let quotient = 15 / 3; // 除法
     ```

   - 比较运算：
     ```javascript
     let isEqual = (5 == "5"); // true
     let isStrictEqual = (5 === "5"); // false
     let isNotEqual = (5 != "10"); // true
     let isGreater = (10 > 5); // true
     ```

4. **条件语句**：
   ```javascript
   let age = 20;
   if (age >= 18) {
   console.log("你是成年人");
   } else {
   console.log("你是未成年人");
   }
   ```

5. **循环**：
   - for循环：
     ```javascript
     for (let i = 0; i < 5; i++) {
     console.log("循环次数：" + i);
     }
     ```

   - while循环：
     ```javascript
     let count = 0;
     while (count < 5) {
     console.log("循环次数：" + count);
     count++;
     }
     ```

6. **函数**：
   - 函数声明：
     ```javascript
     function greet(name) {
     return "Hello, " + name;
     }
     console.log(greet("Alice"));
     ```

   - 匿名函数和箭头函数：
     ```javascript
     let sum = function(a, b) {
     return a + b;
     };
     console.log(sum(5, 10));

     let multiply = (a, b) => a * b;
     console.log(multiply(5, 10));
     ```

7. **DOM操作**：
   - 选择元素：
     ```javascript
     let element = document.getElementById("myElement");
     let elements = document.getElementsByClassName("myClass");
     let query = document.querySelector(".myClass");
     ```

   - 修改元素内容：
     ```javascript
     let header = document.querySelector("h1");
     header.textContent = "新标题";
     ```

   - 事件处理：
     ```javascript
     let button = document.querySelector("button");
     button.addEventListener("click", function() {
     alert("按钮被点击了！");
     });
     ```

8. **示例**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>JavaScript示例</title>
       <script>
           function showMessage() {
               let name = document.getElementById("name").value;
               alert("Hello, " + name + "!");
           }
       </script>
   </head>
   <body>
       <h1>JavaScript示例</h1>
       <input type="text" id="name" placeholder="输入你的名字">
       <button onclick="showMessage()">显示消息</button>
   </body>
   </html>
   ```