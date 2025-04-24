<?php

require_once '../helpers.php';

// 能这么实现, 但是不要这么做, 我们一般会使用 throw 抛出异常或者是框架的错误处理机制
//header("HTTP/1.1 404 Not Found");
//echo "<h1>404 Not Found</h1>";
//exit;

header('Content-Type: text/html; charset=utf-8');

printRWithBr($_GET);
echoHr();
printRWithBr($_REQUEST);
echoHr();
printRWithBr($_COOKIE);

// 如果你的 session 没有开启，访问 session 可能会报错
session_start();
printRWithBr($_SESSION);

//echoHr();
//printRWithBr($_SERVER);

echoHr();
printRWithBr($_FILES);

// ⚠️ 始终要记住用户输入的任何内容都是不可信的, 都要进行验证和过滤
// ⚠️ 大家自己去搜索了解以下什么是 CSRF 攻击, 什么是 XSS 攻击, 什么是 SQL 注入攻击, 什么是文件上传漏洞
// 还需要大家去了解一下什么是 cURL 请求

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echoHr();
    echoWithBr('只有 POST 请求才会输出以下内容:');
    // 处理表单提交
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';

    printRWithBr($_POST);

    // 这里可以添加更多的表单处理逻辑，比如验证和存储数据
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Age: $age<br>";
}

// cURL 请求

echoHr();
// 目标 URL
$url = "http://localhost/cod/202503php/php/basics/01.php"; // 使用 https://www.php.net/ 或其他可访问地址测试

// 1. 初始化 cURL 会话
$ch = curl_init();

// 2. 设置选项
// 设置要获取的 URL
curl_setopt($ch, CURLOPT_URL, $url);
// 设置 TRUE 将获取结果作为字符串返回，而不是直接输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// (可选) 设置 User Agent，模仿浏览器
curl_setopt($ch, CURLOPT_USERAGENT, 'My PHPCurlClient/1.0');
// (可选) 设置连接超时时间 (例如 10 秒)
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
// (可选) 设置总执行超时时间 (例如 30 秒)
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
// (可选) 跟随重定向
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// !!! 对于 HTTPS 链接，保持默认的 SSL 验证 !!!
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // 默认即是 true
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);    // 默认即是 2

// 3. 执行请求
echo "正在请求: {$url} ...<br>";
$response = curl_exec($ch);

// 4. 检查错误
if ($response === false) {
    // curl_exec() 失败，获取错误信息
    $error_no = curl_errno($ch);
    $error_msg = curl_error($ch);
    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
} else {
    // 请求成功
    echo "请求成功！<br>";

    // 5. 获取信息 (例如 HTTP 状态码)
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Status Code: {$http_code}<br>";

// (可选) 获取内容类型
// $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
// echo "Content-Type: {$content_type}<br>";

// 处理响应内容 ($response 包含了网页 HTML)
    echo "<h4>响应内容 (前 200 字符):</h4>";
    echo "<pre>" . htmlspecialchars(substr($response, 0, 200)) . "...</pre>";
}

// 6. 关闭 cURL 句柄
curl_close($ch);
echo "cURL handle closed.";

// 大家自己按照文档尝试一下使用 cURL 发起 POST 请求, 到我们自己本机的 PHP 服务器上
// 那就需要一个页面来接收你的 cURL 请求, 你接收到请求之后返回一个 JSON 字符串给你的 cURL 请求, 然后解析打印出来