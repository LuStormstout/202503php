# PHP 进阶知识复习

## 目录
1. [面向对象编程](#面向对象编程)
    - [类和对象](#类和对象)
    - [继承](#继承)
    - [接口](#接口)
    - [抽象类](#抽象类)
    - [命名空间](#命名空间)
2. [异常处理](#异常处理)
3. [文件和目录操作](#文件和目录操作)
4. [会话管理](#会话管理)
5. [数据库操作](#数据库操作)
    - [PDO](#pdo)
    - [MySQLi](#mysqli)
6. [Composer 及自动加载](#composer-及自动加载)
7. [HTTP 请求](#http-请求)
8. [RESTful API](#restful-api)
9. [PHPUnit](#phpunit)

## 面向对象编程
面向对象编程（OOP）是 PHP 中的一种编程范式，通过类和对象来组织代码。OOP 提高了代码的可重用性和可维护性。

### 类和对象
类是对象的蓝图，定义了对象的属性和方法。对象是类的实例。
```php
<?php
class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function introduce() {
        echo "我叫 {$this->name}，今年 {$this->age} 岁。";
    }
}

$person = new Person("张三", 25);
$person->introduce();  // 输出: 我叫 张三，今年 25 岁。
?>
```

### 继承
继承允许一个类继承另一个类的属性和方法。
```php
<?php
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        echo "{$this->name} 发出声音。";
    }
}

class Dog extends Animal {
    public function speak() {
        echo "{$this->name} 汪汪叫。";
    }
}

$dog = new Dog("小狗");
$dog->speak();  // 输出: 小狗 汪汪叫。
?>
```

### 接口
接口定义了类必须实现的方法，而不包含方法的实现。
```php
<?php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "记录到文件: {$message}";
    }
}

$logger = new FileLogger();
$logger->log("这是一个日志消息。");  // 输出: 记录到文件: 这是一个日志消息。
?>
```

### 抽象类
抽象类是不能实例化的类，包含至少一个抽象方法（没有实现的方法）。
```php
<?php
abstract class Shape {
    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo $circle->area();  // 输出: 圆的面积
?>
```

### 命名空间
命名空间用于组织代码，避免类名冲突。命名空间通过 `namespace` 关键字定义，并在文件的最顶部声明。

#### 定义命名空间
```php
<?php
namespace MyProject;

class User {
    public function __construct() {
        echo "MyProjectUser 类实例化";
    }
}

$user = new User();  // 输出: MyProjectUser 类实例化
?>
```

#### 使用命名空间
为了使用不同命名空间下的类，使用 `use` 关键字。
```php
<?php
namespace MyApp;

use MyProjectUser;

class MyAppUser {
    public function createUser() {
        $user = new User();
    }
}

$appUser = new MyAppUser();
$appUser->createUser();  // 输出: MyProjectUser 类实例化
?>
```

## 异常处理
异常处理用于捕获和处理运行时错误，确保代码的健壮性。
```php
<?php
try {
    // 可能会引发异常的代码
    throw new Exception("这是一个异常");
} catch (Exception $e) {
    // 处理异常
    echo "捕获到异常: " . $e->getMessage();
} finally {
    // 无论是否发生异常，都会执行的代码
    echo "执行完毕。";
}
?>
```

## 文件和目录操作
PHP 提供了多种文件和目录操作函数。

### 读取文件
```php
<?php
$contents = file_get_contents('example.txt');
echo $contents;
?>
```

### 写入文件
```php
<?php
file_put_contents('example.txt', 'Hello, World!');
?>
```

### 创建目录
```php
<?php
mkdir('new_directory');
?>
```

### 删除文件和目录
```php
<?php
unlink('example.txt');  // 删除文件
rmdir('new_directory');  // 删除目录
?>
```

## 会话管理
会话用于在多个页面之间存储用户信息。

### 启动会话
```php
<?php
session_start();
$_SESSION['username'] = '张三';
echo $_SESSION['username'];  // 输出: 张三
?>
```

### 销毁会话
```php
<?php
session_start();
session_unset();  // 清空会话变量
session_destroy();  // 销毁会话
?>
```

## 数据库操作
PHP 支持多种数据库，最常用的是 MySQL。使用 PDO 或 MySQLi 执行数据库操作。

### PDO
PDO（PHP Data Objects）提供了一个统一的接口来访问不同的数据库。
```php
<?php
$dsn = 'mysql:host=localhost;dbname=testdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "连接成功";

    // 插入数据
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute(['username' => 'testuser', 'password' => 'testpass']);
    echo "数据插入成功";
} catch (PDOException $e) {
    echo "连接失败: " . $e->getMessage();
}
?>
```

### MySQLi
MySQLi（MySQL Improved）是 MySQL 的改进版，提供了面向对象和过程化两种接口。
```php
<?php
$mysqli = new mysqli('localhost', 'root', '', 'testdb');

if ($mysqli->connect_error) {
    die('连接失败: ' . $mysqli->connect_error);
}
echo "连接成功";

// 插入数据
$stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);
$username = 'testuser';
$password = 'testpass';
$stmt->execute();
echo "数据插入成功";

$stmt->close();
$mysqli->close();
?>
```

## Composer 及自动加载
Composer 是 PHP 的依赖管理工具，用于管理项目的库依赖。

### 安装 Composer
```bash
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

### 使用 Composer
创建一个 `composer.json` 文件来定义项目依赖。
```json
{
"require": {
"monolog/monolog": "^2.0"
}
}
```

运行 `composer install` 安装依赖。

### 自动加载
Composer 提供自动加载功能，无需手动引入类文件。
```php
<?php
require 'vendor/autoload.php';

use MonologLogger;
use MonologHandlerStreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
$log->warning('Foo');
$log->error('Bar');
?>
```

## HTTP 请求
HTTP（超文本传输协议）是用于传输网页的协议。常见的 HTTP 请求方法包括 GET、POST、PUT、DELETE 等。

### GET 请求
GET 请求用于请求数据，一般用于获取资源。
```bash
curl -X GET http://example.com/api/resource
```

### POST 请求
POST 请求用于提交数据，一般用于创建资源。
```bash
curl -X POST http://example.com/api/resource -d "name=value"
```

### PUT 请求
PUT 请求用于更新资源。
```bash
curl -X PUT http://example.com/api/resource/1 -d "name=newvalue"
```

### DELETE 请求
DELETE 请求用于删除资源。
```bash
curl -X DELETE http://example.com/api/resource/1
```

## RESTful API
REST（Representational State Transfer）是一种用于创建 Web 服务的架构风格。RESTful API 使用 HTTP 请求来执行 CRUD 操作（创建、读取、更新、删除）。

### 创建 RESTful API
以下是一个简单的 RESTful API 示例，用于处理用户资源。

#### API 路由
定义不同的 URL 路径和 HTTP 方法来处理不同的操作。

```php
<?php
$request_method = $_SERVER["REQUEST_METHOD"];
$request_uri = $_SERVER["REQUEST_URI"];

// 解析 URL 路径
$uri = parse_url($request_uri, PHP_URL_PATH);
$uri = explode('/', $uri);

// 检查请求路径
if ($uri[1] !== 'users') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// 获取用户 ID
$user_id = null;
if (isset($uri[2])) {
    $user_id = (int) $uri[2];
}

// 处理不同的 HTTP 请求方法
switch ($request_method) {
    case 'GET':
        if ($user_id) {
            get_user($user_id);
        } else {
            get_users();
        }
        break;
    case 'POST':
        create_user();
        break;
    case 'PUT':
        update_user($user_id);
        break;
    case 'DELETE':
        delete_user($user_id);
        break;
    default:
        header("HTTP/1.1 405 Method Not Allowed");
        exit();
}

function get_users() {
    // 示例数据
    $users = [
        ['id' => 1, 'name' => 'John Doe'],
        ['id' => 2, 'name' => 'Jane Doe'],
    ];
    header("Content-Type: application/json");
    echo json_encode($users);
}

function get_user($id) {
    // 示例数据
    $user = ['id' => $id, 'name' => 'John Doe'];
    header("Content-Type: application/json");
    echo json_encode($user);
}

function create_user() {
    // 获取 POST 数据
    $input = json_decode(file_get_contents('php://input'), true);
    // 示例响应
    header("Content-Type: application/json");
    echo json_encode(['message' => '用户创建成功', 'user' => $input]);
}

function update_user($id) {
    // 获取 PUT 数据
    $input = json_decode(file_get_contents('php://input'), true);
    // 示例响应
    header("Content-Type: application/json");
    echo json_encode(['message' => '用户更新成功', 'user' => $input]);
}

function delete_user($id) {
    // 示例响应
    header("Content-Type: application/json");
    echo json_encode(['message' => '用户删除成功']);
}
?>
```

## PHPUnit
PHPUnit 是 PHP 的单元测试框架，用于测试代码的正确性。

### 安装 PHPUnit
使用 Composer 安装 PHPUnit。
```bash
composer require --dev phpunit/phpunit
```

### 创建测试用例
创建一个测试类，并继承 `PHPUnitFrameworkTestCase`。
```php
<?php
use PHPUnitFrameworkTestCase;

class UserTest extends TestCase {
    public function testUserCreation() {
        $user = new User('John Doe', 'john@example.com');
        $this->assertEquals('John Doe', $user->getName());
        $this->assertEquals('john@example.com', $user->getEmail());
    }
}
?>
```

### 运行测试
运行 `phpunit` 命令来执行测试。
```bash
vendor/bin/phpunit tests
```

### 编写更多测试
编写更多测试来覆盖代码中的不同功能和场景，确保代码的可靠性和健壮性。

```php
<?php
use PHPUnitFrameworkTestCase;

class CalculatorTest extends TestCase {
    public function testAddition() {
        $calculator = new Calculator();
        $this->assertEquals(4, $calculator->add(2, 2));
    }

    public function testSubtraction() {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->subtract(2, 2));
    }
}
?>
```