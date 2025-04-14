# PHP 基础知识复习

## 目录
1. [PHP 简介](#php-简介)
2. [PHP 安装](#php-安装)
3. [基础语法](#基础语法)
4. [变量和常量](#变量和常量)
5. [数据类型](#数据类型)
6. [控制结构](#控制结构)
7. [函数](#函数)
8. [数组](#数组)
9. [超级全局变量](#超级全局变量)
10. [错误处理](#错误处理)

## PHP 简介
PHP（Hypertext Preprocessor）是一种流行的开源服务器端脚本语言，特别适合 Web 开发。PHP 可以嵌入 HTML 中使用，并且与各种数据库系统兼容，如 MySQL、PostgreSQL 等。

## PHP 安装
PHP 的安装方法因操作系统而异，这里介绍在 Ubuntu 和 CentOS 中的安装方法。

### 在 Ubuntu 中安装 PHP
```bash
sudo apt update
sudo apt install php
```

### 在 CentOS 中安装 PHP
```bash
sudo yum update
sudo yum install php
```

## 基础语法
PHP 代码可以嵌入到 HTML 中，通过特殊的标记 `<?php ... ?>` 来包含 PHP 代码。
```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP 示例</title>
</head>
<body>
    <h1><?php echo "Hello, World!"; ?></h1>
</body>
</html>
```

## 变量和常量
### 变量
变量是存储数据的容器，变量名以 `$` 符号开头，后跟变量名。变量名必须以字母或下划线开头，后续字符可以是字母、数字或下划线。
```php
<?php
$variable = "Hello, World!";
echo $variable;  // 输出: Hello, World!
?>
```

### 常量
常量是值不能改变的变量，使用 `define()` 函数定义常量。
```php
<?php
define("CONSTANT", "Hello, World!");
echo CONSTANT;  // 输出: Hello, World!
?>
```

## 数据类型
PHP 支持多种数据类型，包括字符串、整数、浮点数、布尔值、数组、对象和 NULL。

### 字符串
字符串是字符的集合，使用单引号或双引号定义。
```php
<?php
$string = "Hello, World!";
echo $string;  // 输出: Hello, World!
?>
```

### 整数
整数是没有小数点的数字。
```php
<?php
$integer = 123;
echo $integer;  // 输出: 123
?>
```

### 浮点数
浮点数是有小数点的数字。
```php
<?php
$float = 3.14;
echo $float;  // 输出: 3.14
?>
```

### 布尔值
布尔值表示真或假，使用 `true` 或 `false` 表示。
```php
<?php
$boolean = true;
echo $boolean;  // 输出: 1 (true 被转换为 1)
?>
```

### 数组
数组是一组值的集合，可以使用 `[]` 语法定义。
```php
<?php
$array = [1, 2, 3];
echo $array[0];  // 输出: 1
?>
```

### 对象
对象是类的实例，使用 `new` 关键字创建。
```php
<?php
class MyClass {
    public $property = "Hello, World!";
}
$object = new MyClass();
echo $object->property;  // 输出: Hello, World!
?>
```

### NULL
NULL 表示变量没有值。
```php
<?php
$variable = NULL;
echo $variable;  // 输出: (空)
?>
```

## 控制结构
控制结构用于控制代码的执行流程，包括条件语句和循环语句。

### 条件语句
#### if 语句
```php
<?php
$age = 18;
if ($age >= 18) {
    echo "成年人";
} else {
    echo "未成年人";
}
?>
```

#### switch 语句
```php
<?php
$color = "red";
switch ($color) {
    case "red":
        echo "你选择了红色";
        break;
    case "blue":
        echo "你选择了蓝色";
        break;
    default:
        echo "未知颜色";
}
?>
```

### 循环语句
#### for 循环
```php
<?php
for ($i = 0; $i < 5; $i++) {
    echo $i;
}
?>
```

#### while 循环
```php
<?php
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}
?>
```

#### do...while 循环
```php
<?php
$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 5);
?>
```

#### foreach 循环
```php
<?php
$array = [1, 2, 3, 4, 5];
foreach ($array as $value) {
    echo $value;
}
?>
```

## 函数
函数是可重用的代码块，通过 `function` 关键字定义。
```php
<?php
function sayHello() {
    echo "Hello, World!";
}
sayHello();  // 输出: Hello, World!
?>
```

## 数组
数组是存储一组数据的容器，PHP 支持索引数组和关联数组。

### 索引数组
```php
<?php
$numbers = [1, 2, 3];
echo $numbers[0];  // 输出: 1
?>
```

### 关联数组
```php
<?php
$ages = ["Peter" => 35, "John" => 25];
echo $ages["Peter"];  // 输出: 35
?>
```

## 超级全局变量
PHP 提供了一组超级全局变量，用于访问表单数据、会话数据、服务器信息等。

### $_GET
通过 URL 参数传递的数据。
```php
<?php
echo $_GET["name"];
?>
```

### $_POST
通过表单 POST 方法传递的数据。
```php
<?php
echo $_POST["name"];
?>
```

### $_SESSION
用于存储会话数据。
```php
<?php
session_start();
$_SESSION["name"] = "John";
echo $_SESSION["name"];
?>
```

### $_COOKIE
用于存储 cookie 数据。
```php
<?php
setcookie("name", "John", time() + 3600);
echo $_COOKIE["name"];
?>
```

### $_SERVER
包含服务器信息的数组。
```php
<?php
echo $_SERVER["PHP_SELF"];
?>
```

## 错误处理
PHP 提供了一些内置函数和自定义错误处理机制，用于处理错误和异常。

### 内置错误处理函数
#### error_reporting()
设置错误报告级别。
```php
<?php
error_reporting(E_ALL);
?>
```

#### set_error_handler()
设置用户自定义错误处理函数。通常不建议在生产环境中使用，因为这可能会导致安全风险。下面是一个示例，展示了如何定义自定义错误处理函数，但在实际应用中应该更加谨慎。
```php
<?php
function customError($errno, $errstr) {
    echo "错误: [$errno] $errstr";
}
set_error_handler("customError");
// 这里故意引发一个错误来触发自定义错误处理函数
trigger_error("自定义错误", E_USER_ERROR);
?>
```

### 异常处理
通过 try...catch 语句处理异常。
```php
<?php
try {
    throw new Exception("异常信息");
} catch (Exception $e) {
    echo "捕获异常: " . $e->getMessage();
}
?>
```

### 错误处理的最佳实践
1. **在开发环境中开启所有错误报告**:
   ```php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
    ```

2. **在生产环境中记录错误而不是显示**:
   ```php
   error_reporting(E_ALL);
   ini_set('display_errors', 0);
   ini_set('log_errors', 1);
   ini_set('error_log', '/path/to/error.log');
   ```
    - **解释**: 在生产环境中，显示错误信息可能会泄露服务器的信息和敏感数据。记录错误可以帮助开发人员调试，而不会影响用户体验。

3. **使用异常处理**: 尽量使用 try...catch 块来捕获并处理异常，而不是依赖错误处理函数。
   ```php
    <?php
    try {
        // 代码可能引发异常
    } catch (Exception $e) {
        // 处理异常
        error_log($e->getMessage(), 3, '/path/to/error.log');
        echo "发生错误，请稍后再试。";
    }
    ?>
   ```

### 常见错误及注意事项

#### 常见错误
1. **未定义变量**:
    - **错误**: 使用未定义的变量。
    - **解释**: 访问未定义的变量会导致 `Notice` 级别的错误。
    - **解决方法**: 在使用变量之前，确保其已定义并初始化。
```php
   <?php
    $variable = "Hello, World!";
    echo $variable;  // 正确: 输出 Hello, World!
    ?>
   ```

2. **文件包含错误**:
    - **错误**: 使用 `include` 或 `require` 包含不存在的文件。
    - **解释**: `include` 产生 `Warning` 级别的错误，而 `require` 会产生 `Fatal` 错误，导致脚本停止执行。
    - **解决方法**: 确保包含的文件路径正确，并使用 `include_once` 或 `require_once` 避免重复包含。
```php
    <?php
    include 'config.php';  // 假设 config.php 存在
    ?>
   ```

3. **SQL 注入**:
    - **错误**: 直接在 SQL 查询中使用用户输入的数据。
    - **解释**: 这会导致 SQL 注入攻击，危及数据库的安全。
    - **解决方法**: 使用预处理语句（Prepared Statements）来安全地处理用户输入。
```php
    <?php
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    ?>
   ```

#### 注意事项
1. **代码注释**: 写清晰的注释，以便于日后维护和其他开发人员理解代码。
2. **遵循编码标准**: 遵循 PSR-12 等 PHP 编码标准，保持代码一致性。
3. **安全编程**: 注意输入验证和输出过滤，防止常见的安全漏洞，如 XSS 和 CSRF。
4. **定期更新**: 定期更新 PHP 和相关库，以确保使用最新的安全补丁。