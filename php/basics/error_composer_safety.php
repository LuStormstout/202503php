<?php

// include "../helpers.php"; // 如果失败的话, 会抛出一个 warning, 但是脚本会继续执行
// require  "../helpers.php"; // 如果失败的话, 会抛出一个 fatal error, 脚本会停止执行

// include_once "../helpers.php";
require_once "../helpers.php";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // 创建 PDO 连接实例
    $pdo = new PDO("mysql:host=localhost;dbname=school;charset=utf8mb4", "root", "cptbtptp1", $options);

    echo "数据库连接成功!";
} catch (PDOException $e) {
    // 如果连接失败，PDO 会抛出 PDOException 异常
//    echo "数据库连接失败: " . $e->getMessage();

    echoWithBr("服务器网络异常, 请稍后再试!");
} finally {
    // 这里是无论是否发生异常都会执行的代码
    echoWithBr("数据库连接结束");
    // exit(0);
}

// 我们可以使用 throw 语句来抛出异常
//if (!isset($_POST['token'])) {
//    throw new Exception("没有权限访问该页面", 403);
//}


