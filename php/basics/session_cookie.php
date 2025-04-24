<?php

require_once '../helpers.php';

// 开启会话
session_start();

setcookie('username', 'lustormstout', time() + 3600, '/');

varDumpWithBr($_COOKIE['username']);

// ❓同源策略
// ❓跨域请求
// ❓HTTP头字段 https://zh.wikipedia.org/wiki/HTTP%E5%A4%B4%E5%AD%97%E6%AE%B5

// --- 存储数据 ---
// 假设用户登录成功
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'Alice';
$_SESSION['login_time'] = time();
$_SESSION['preferences'] = ['theme' => 'dark', 'lang' => 'zh'];
echo "Session 数据已设置。<br>";

// --- 读取数据 ---
if (isset($_SESSION['username'])) {
    echo "欢迎回来, " . htmlspecialchars($_SESSION['username']) . "!<br>";
} else {
    echo "用户未登录。<br>";
}

// 使用 ?? 提供默认值
$lang = $_SESSION['preferences']['lang'] ?? 'en';
echo "用户语言设置: " . htmlspecialchars($lang) . "<br>";

// --- 修改数据 ---
$_SESSION['preferences']['lang'] = 'en_US';

// --- 删除单个 session 变量 ---
unset($_SESSION['login_time']);



