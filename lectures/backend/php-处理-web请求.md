# PHP 接收和处理 Web 请求

## 处理 GET 请求

### $_GET
$_GET 是一个超全局变量，用于收集通过 URL 发送的表单数据。使用 $_GET 可以获取查询字符串中的参数。

#### 示例
```php
<?php
// URL: http://example.com/page.php?name=John&age=30

// 获取 URL 参数并进行简单验证
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '未提供姓名';
// 将 age 转换为整数
$age = isset($_GET['age']) ? (int)$_GET['age'] : '未提供年龄';

// 输出姓名
echo "姓名: " . $name;  // 输出：姓名: John
// 输出年龄
echo "年龄: " . $age;    // 输出：年龄: 30
?>
```

### $_GET 处理数组
```php
<?php
// URL: http://example.com/page.php?names[]=John&names[]=Doe

// 获取 URL 参数数组并进行简单验证
$names = isset($_GET['names']) ? array_map('htmlspecialchars', $_GET['names']) : [];

// 遍历并输出每个姓名
foreach ($names as $name) {
    echo "姓名: " . $name . "<br>";
}
// 输出：
// 姓名: John
// 姓名: Doe
?>
```

## 处理 POST 请求

### $_POST
$_POST 是一个超全局变量，用于收集通过 HTTP POST 方法发送的表单数据。使用 $_POST 可以获取表单提交的数据。

#### 示例
```php
<?php
// HTML 表单
// <form method="post" action="page.php">
//     姓名: <input type="text" name="name">
//     年龄: <input type="text" name="age">
//     <input type="submit" value="提交">
// </form>

// 获取表单数据并进行简单验证
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '未提供姓名';
// 将 age 转换为整数
$age = isset($_POST['age']) ? (int)$_POST['age'] : '未提供年龄';

// 输出姓名
echo "姓名: " . $name;  // 输出：姓名: John
// 输出年龄
echo "年龄: " . $age;    // 输出：年龄: 30
?>
```

### $_POST 处理数组
```php
<?php
// HTML 表单
// <form method="post" action="page.php">
//     姓名: <input type="text" name="names[]">
//     姓名: <input type="text" name="names[]">
//     <input type="submit" value="提交">
// </form>

// 获取表单数据数组并进行简单验证
$names = isset($_POST['names']) ? array_map('htmlspecialchars', $_POST['names']) : [];

// 遍历并输出每个姓名
foreach ($names as $name) {
    echo "姓名: " . $name . "<br>";
}
// 输出：
// 姓名: John
// 姓名: Doe
?>
```

## 处理 REQUEST 请求

### $_REQUEST
$_REQUEST 是一个超全局变量，用于收集 $_GET、$_POST 和 $_COOKIE 的数据。使用 $_REQUEST 可以获取通过 GET 和 POST 方法发送的数据。

#### 示例
```php
<?php
// URL: http://example.com/page.php?name=John
// HTML 表单
// <form method="post" action="page.php">
//     年龄: <input type="text" name="age">
//     <input type="submit" value="提交">
// </form>

// 获取请求数据并进行简单验证
$name = isset($_REQUEST['name']) ? htmlspecialchars($_REQUEST['name']) : '未提供姓名';
// 将 age 转换为整数
$age = isset($_REQUEST['age']) ? (int)$_REQUEST['age'] : '未提供年龄';

// 输出姓名
echo "姓名: " . $name;  // 输出：姓名: John
// 输出年龄
echo "年龄: " . $age;    // 输出：年龄: 30
?>
```

## 处理文件上传

### $_FILES
$_FILES 是一个超全局变量，用于收集通过 HTTP POST 方法上传的文件。使用 $_FILES 可以获取上传文件的信息。

#### 示例
```php
<?php
// HTML 表单
// <form method="post" action="upload.php" enctype="multipart/form-data">
//     选择文件: <input type="file" name="fileToUpload">
//     <input type="submit" value="上传文件">
// </form>

// 处理文件上传
$target_dir = "uploads/";
// 获取文件的完整路径
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
// 获取文件扩展名
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// 检查文件是否存在
if (file_exists($target_file)) {
    echo "抱歉，文件已存在。";
    $uploadOk = 0;
}

// 限制文件类型
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed_types)) {
    echo "抱歉，只允许 JPG, JPEG, PNG & GIF 文件。";
    $uploadOk = 0;
}

// 上传文件
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "文件 ". basename($_FILES["fileToUpload"]["name"]). " 已成功上传。";
    } else {
        echo "抱歉，上传文件时出错。";
    }
}
?>
```

### $_FILES 多文件上传
```php
<?php
// HTML 表单
// <form method="post" action="upload.php" enctype="multipart/form-data">
//     选择文件: <input type="file" name="filesToUpload[]" multiple>
//     <input type="submit" value="上传文件">
// </form>

// 处理多文件上传
$upload_directory = "uploads/";
// 允许的文件类型
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
// 初始化上传标志
$uploadOk = 1;

// 使用 foreach 遍历每个文件
foreach ($_FILES['filesToUpload']['name'] as $key => $name) {
    // 获取文件的完整路径
    $target_file = $upload_directory . basename($name);
    // 获取文件扩展名
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // 检查文件是否存在
    if (file_exists($target_file)) {
        echo "抱歉，文件 " . basename($name) . " 已存在。<br>";
        $uploadOk = 0;
    }

    // 限制文件类型
    if (!in_array($imageFileType, $allowed_types)) {
        echo "抱歉，只允许 JPG, JPEG, PNG & GIF 文件。<br>";
        $uploadOk = 0;
    }

    // 上传文件
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$key], $target_file)) {
            echo "文件 " . basename($name) . " 已成功上传。<br>";
        } else {
            echo "抱歉，上传文件 " . basename($name) . " 时出错。<br>";
        }
    }
}
?>
```

## 处理 Cookie

### $_COOKIE
$_COOKIE 是一个超全局变量，用于收集通过 HTTP Cookie 发送的数据。使用 $_COOKIE 可以获取和设置 Cookie。

#### 设置 Cookie
```php
<?php
// 设置 Cookie，过期时间为30天
setcookie("user", "JohnDoe", time() + (86400 * 30), "/"); // 86400 = 1 天

// 获取 Cookie
if(isset($_COOKIE["user"])) {
    echo "用户是 " . $_COOKIE["user"];  // 输出：用户是 JohnDoe
} else {
    echo "未设置用户。";
}
?>
```

### 删除 Cookie
```php
<?php
// 删除 Cookie，通过将过期时间设置为过去的时间
setcookie("user", "", time() - 3600, "/");

// 检查 Cookie 是否已删除
if(!isset($_COOKIE["user"])) {
    echo "Cookie 'user' 已删除。";
} else {
    echo "Cookie 'user' 仍然存在。";
}
?>
```

## 处理 Session

### $_SESSION
$_SESSION 是一个超全局变量，用于存储会话数据。使用 $_SESSION 可以跨页面保存用户信息。

#### 示例
```php
<?php
// 启动会话
session_start();

// 设置 Session 变量
$_SESSION["username"] = "JohnDoe";

// 获取 Session 变量
echo "用户名是 " . $_SESSION["username"];  // 输出：用户名是 JohnDoe
?>
```

### 销毁 Session
```php
<?php
// 启动会话
session_start();

// 销毁 Session 变量
session_unset(); 

// 销毁 Session
session_destroy();

// 检查 Session 是否已销毁
if(empty($_SESSION)) {
    echo "会话已销毁。";
} else {
    echo "会话仍然存在。";
}
?>
```

## 处理 HTTP 请求头

### getallheaders()
获取所有 HTTP 请求头信息。

#### 示例
```php
<?php
// 获取所有请求头
$headers = getallheaders();
foreach ($headers as $name => $value) {
    echo "$name: $valuen";
}
?>
```

### 获取特定请求头
```php
<?php
// 获取所有请求头
$headers = getallheaders();

// 获取特定请求头
if (isset($headers['User-Agent'])) {
    echo "用户代理: " . $headers['User-Agent'];
} else {
    echo "用户代理请求头未设置。";
}
?>

## 处理 JSON 请求

### json_decode() 和 json_encode()
解析和生成 JSON 数据。

#### 示例
```php
<?php
// 解析 JSON 数据
$json = '{"name":"John", "age":30}';
$data = json_decode($json);
echo $data->name;  // 输出：John

// 生成 JSON 数据
$array = ["name" => "John", "age" => 30];
echo json_encode($array);  // 输出：{"name":"John","age":30}
?>
```

### 处理 JSON POST 请求
```php
<?php
// 获取 POST 请求中的 JSON 数据
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// 验证 JSON 数据并输出解析后的数据
if (json_last_error() === JSON_ERROR_NONE) {
    echo "姓名: " . htmlspecialchars($data['name']) . "<br>";
    echo "年龄: " . (int)$data['age'];
} else {
    echo "无效的 JSON 数据。";
}
?>
```

## 数据验证

### filter_var()
使用 `filter_var()` 函数进行数据验证和过滤。

#### 验证电子邮件地址
```php
<?php
$email = "test@example.com";

// 验证电子邮件地址
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "有效的电子邮件地址。";
} else {
    echo "无效的电子邮件地址。";
}
?>
```

### 验证整数
```php
<?php
$int = "123";

// 验证整数
if (filter_var($int, FILTER_VALIDATE_INT)) {
    echo "有效的整数。";
} else {
    echo "无效的整数。";
}
?>
```

### 过滤输入数据
```php
<?php
$url = "https://example.com";

// 过滤 URL
$sanitized_url = filter_var($url, FILTER_SANITIZE_URL);
echo "过滤后的 URL: " . $sanitized_url;
?>
```

### 验证和过滤表单数据
```php
<?php
// HTML 表单
// <form method="post" action="page.php">
//     电子邮件: <input type="text" name="email">
//     <input type="submit" value="提交">
// </form>

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        echo "有效的电子邮件地址: " . htmlspecialchars($email);
    } else {
        echo "无效的电子邮件地址。";
    }
}
?>
```

### 小结
- 使用 `htmlspecialchars()` 函数可以避免 XSS 攻击，保护输出的 HTML 内容。
- 使用 `filter_var()` 和 `filter_input()` 函数可以对输入数据进行验证和过滤。
- 结合 `$_GET`、`$_POST` 和 `$_FILES` 超全局变量，可以安全地处理来自 Web 表单和请求的数据。
