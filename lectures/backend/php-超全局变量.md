# PHP 全局变量详解

在 PHP 中，有几种特殊的全局变量，称为超全局变量。它们可以在脚本的任何地方直接访问，无需使用 `global`
关键字声明。以下是每种超全局变量的详细解释和示例：

## `$_SERVER`

`$_SERVER` 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等信息的数组。这些元素是由 Web 服务器创建的。

### 详细解释：

- `$_SERVER['PHP_SELF']`: 当前执行脚本的文件名，与文档根目录相关。
- `$_SERVER['SERVER_NAME']`: 当前运行脚本所在的服务器的主机名。
- `$_SERVER['HTTP_HOST']`: 当前请求的 Host 头部的内容，如果请求使用代理，则可能不是最终的主机名。
- `$_SERVER['REQUEST_METHOD']`: 请求使用的方法，例如 'GET'、'POST'。
- `$_SERVER['REQUEST_URI']`: URI 用来指定要访问的页面。
- `$_SERVER['QUERY_STRING']`: 查询字符串，如果有的话，通过它进行页面访问。
- `$_SERVER['REMOTE_ADDR']`: 客户端的 IP 地址。
- `$_SERVER['HTTP_USER_AGENT']`: 客户端浏览器的 User-Agent 字符串。
- `$_SERVER['HTTP_REFERER']`: 引导用户代理到当前页的前一页的地址。

### 示例：

#### 获取当前脚本的文件名和路径：

```php
<?php
echo '当前脚本运行的文件名：' . $_SERVER['PHP_SELF'];
echo '当前页面的完整 URL 是：http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
```

## `$_GET`

`$_GET` 用于收集通过 URL 参数传递给当前脚本的数据。

### 详细解释：

- `$_GET['name']`: 获取名为 'name' 的 URL 参数的值。

### 示例：

#### 处理 URL 参数：

```php
<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "您输入的姓名是： " . $name;
}
?>
```

## `$_POST`

`$_POST` 用于收集通过 HTTP POST 方法传递给当前脚本的数据。

### 详细解释：

- `$_POST['username']`: 获取名为 'username' 的 POST 参数的值。

### 示例：

#### 处理表单提交的数据：

```php
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="username">
    <input type="submit" value="提交">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    echo "您输入的用户名是： " . $username;
}
?>
```

## `$_FILES`

`$_FILES` 用于上传文件时收集的文件信息。

### 详细解释：

- `$_FILES['file']['name']`: 上传文件的原始名称。
- `$_FILES['file']['type']`: 上传文件的 MIME 类型。
- `$_FILES['file']['size']`: 上传文件的大小，以字节为单位。
- `$_FILES['file']['tmp_name']`: 存储在服务器上的临时文件名。
- `$_FILES['file']['error']`: 上传过程中的错误代码。

### 示例：

#### 处理文件上传：

```php
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="file" name="file">
    <input type="submit" value="上传文件">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['file'];
    // 处理上传文件的逻辑
}
?>
```

## `$_COOKIE`

`$_COOKIE` 用于收集通过 HTTP Cookies 传递给当前脚本的数据。

### 详细解释：

- `$_COOKIE['username']`: 获取名为 'username' 的 Cookie 的值。

### 示例：

#### 设置和访问 Cookie 数据：

```php
<?php
// 设置 Cookie，有效期为一小时
setcookie('username', 'John', time() + 3600, '/');

// 访问 Cookie 数据
if (isset($_COOKIE['username'])) {
    echo "您的用户名是： " . $_COOKIE['username'];
}
?>
```

## `$_SESSION`

`$_SESSION` 用于存储会话数据，在访问网站的用户之间传递信息。

### 详细解释：

- `session_start()`: 启动新会话或者重新启动已存在的会话。
- `$_SESSION['username']`: 存储和访问用户名会话变量。

### 示例：

#### 设置和访问会话变量：

```php
<?php
// 启动会话
session_start();

// 设置会话变量
$_SESSION['username'] = 'John';

// 访问会话变量
echo "欢迎 " . $_SESSION['username'];
?>
```

## `$_REQUEST`

`$_REQUEST` 用于收集 HTML 表单提交的数据，无论该表单使用 GET 还是 POST 方法提交。

### 详细解释：

- `$_REQUEST['username']`: 获取名为 'username' 的请求参数的值。

### 示例：

#### 处理表单数据：

```php
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="username">
    <input type="submit" value="提交">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_REQUEST['username'];
    echo "您输入的用户名是： " . $username;
}
?>
```

## `$_ENV`

`$_ENV` 包含了由 Web 服务器传递给当前脚本的环境变量的数组。

### 详细解释：

- `$_ENV['OS']`: 获取操作系统的环境变量。

### 示例：

#### 获取环境变量：

```php
<?php
echo '当前操作系统环境是：' . $_ENV['OS'];
?>
```

## `$GLOBALS`

`$GLOBALS` 用于访问全局作用域中的全部变量，包括全局变量自身。

### 详细解释：

- `$GLOBALS['globalVar']`: 访问名为 'globalVar' 的全局变量。

### 示例：

#### 访问全局变量：

```php
<?php
$globalVar = 10;

function testFunction() {
    echo "全局变量 globalVar 的值是： " . $GLOBALS['globalVar'];
}

testFunction(); // 输出：全局变量 globalVar 的值是： 10
?>
```