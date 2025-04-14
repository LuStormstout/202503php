<?php

echo 'Hello, World!';
echo '<br>';
echo "Hello, World!";
$a = "Hello, World!";
echo "<br>";
// echo "这是字符串 + 变量$a";

// 函数名和变量名推荐使用小驼峰命名
$userName = "小明";
function getUserInfo()
{

}

// 类名推荐使用大驼峰命名
class UserInfo
{

}

// PHP 中的变量
$city = "东京";
$year = 5;
$year = 10;
echo "<br>";
echo "我在{$city}生活了{$year}年, 在字符串中输出特殊符号的时候需要加上转义符号\\, 比如说\$a, 这样就可以输出变量{$a}的值了";
//echo '我在' . $city . '生活了' . $year . '年';

// PHP 中的数据类型
echo "<br>";
$username = "小明"; // 字符串, string
$username1 = 'lu'; // 字符串, string
$username2 = '盧'; // 字符串, string
$age = 18; // 整数, int, 正整数、负整数、零
$height = 1.75; // 浮点数, float, double
$isStudent = true; // 布尔值, boolean, true/false
$userOrders = null; // 空值, null
//unset($isStudent); // 删除变量, unset, 删除后变量值为null
var_dump($username); // 打印变量类型和内容, var_dump 是一个 PHP 内置函数, 用于输出变量的类型和内容, 在调试时非常有用
echo "<br>";
var_dump($username1);
echo "<br>";
var_dump($username2);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($isStudent);

// 常量
const PI = 3.14; // 定义常量, define 是一个 PHP 内置函数, 用于定义常量
const SITE_NAME = "PHP 开发者社区";
var_dump(SITE_NAME);

// 可变变量
$variableName = 'message';
$message = 'Hello from variable variable!';
// 使用 $variableName 的值 "message" 作为变量名
echo $$variableName; // 输出: Hello from variable variable!
// 这等同于 echo $message;

// 变量引用, 传值赋值和引用赋值
echo "<br>";
$var1 = "Hello";
//$var2 = $var1; // 传值赋值, $var2 是 $var1 的副本
$var3 = &$var1; // 引用赋值, $var3 是 $var1 的引用
var_dump($var3); // 打印变量类型和内容

// var1 的内存地址: 0x7f8c3c4a1b40
// var2 的内存地址: 0x9gjkkl423b23
// var3 的内存地址: 0x7f8c3c4a1b40
// 变量名: $var1, $var2, $var3
// 变量值: Hello

// 定义一个关联数组
$users = [
    'user1' => 'active',
    'user2' => 'inactive',
    'user3' => 'inactive',
    'user4' => 'active',
];
// 使用引用赋值修改数组中的值
foreach ($users as &$status) {
    if ($status === 'inactive') {
        $status = 'active'; // 修改状态
    }
}
// 释放引用，避免后续操作意外修改最后一个元素
unset($status);
// 输出修改后的数组
echo "<br>";
print_r($users);

// 魔术常量
echo "<br>";
echo __FILE__; // 当前文件的完整路径
echo "<br>";
echo __LINE__; // 当前行号
echo "<br>";
echo __DIR__; // 当前目录的完整路径
echo "<br>";
class MyClass
{
    public function myMethod(): void
    {
        echo __CLASS__; // 当前类名
        echo "<br>";
        echo __METHOD__; // 当前方法名
        echo "<br>";
        echo __FUNCTION__; // 当前函数名
    }
}

$myClass = new MyClass();
$myClass->myMethod(); // 输出: MyClass::myMethod()
echo "<br>";
echo defined('PI') ? 'PI is defined' : 'PI is not defined'; // 检查常量是否定义
if (!defined('PI')){
    define('PI', 3.14);
}

// PHP 预定于常量
echo "<br>";
echo PHP_VERSION; // PHP 版本
echo "<br>";
echo PHP_OS; // 操作系统
echo "<br>";
echo PHP_INT_MAX; // 整数的最大值
echo "<br>";
echo PHP_INT_SIZE; // 整数的字节数
echo "<br>";
echo PHP_FLOAT_MAX; // 浮点数的最大值
echo "<br>";
echo PHP_FLOAT_MIN; // 浮点数的最小值
echo "<br>";
echo PHP_EOL; // 换行符
echo "<br>";
echo TRUE; // 布尔值 true
echo "<br>";
echo FALSE; // 布尔值 false
echo "<br>";
echo NULL; // 空值 null
echo "<br>";

$a = [];
if ($a) {
    echo "a is true";
} else {
    echo "a is false"; // 输出: a is false
}
echo "<br>";
$a[0] = 1;
if ($a) {
    echo "a is true"; // 输出: a is true
} else {
    echo "a is false";
}

echo "<br>";
$stringA = "Hello";
echo $stringA[0]; // 输出: H

// 数组
// 索引数组
$fruits = ["apple", "banana", "orange"];
$fruits[0] = "pear"; // 修改数组元素
// 关联数组
$person = [
    "name" => "小明",
    "age" => 18,
    "city" => "东京"
];
$person["age"] = 20; // 修改数组元素
echo "<br>";
echo $fruits[0]; // 输出: pear
echo "<br>";
echo $person["age"]; // 输出: 20
echo "<br>";

// 类型强制转换
$price = "100"; // 字符串类型
var_dump((int)$price); // 输出: int(100)

echo "<br>";
 var_dump(is_int($price)); // 输出: false
echo "<br>";
var_dump(is_bool($isStudent)); // 输出: true
echo "<br>";
var_dump(is_numeric($price)); // 输出: true, 判断是否为数字或者数字字符串
echo "<br>";
$b = null;
var_dump(isset($b)); // 输出: false, isset() 检查变量是否被设置并且不是 null
echo "<br>";
var_dump(empty($b)); // 输出: true, empty() 检查变量是否为空
echo "<br>";
var_dump(gettype($person)); // 输出: array, 获取变量的类型
echo "<br>";

// 赋值运算符
$str = "Hello";
$str .= " World"; // 字符串拼接, 等同于 $str = $str . " World";
echo $str; // 输出: Hello World
echo "<br>";

$a = 10;
$b = 20;
var_dump($a <=> $b); // 输出: -1, 三元运算符, 如果 $a < $b 返回 -1, 如果 $a > $b 返回 1, 如果 $a == $b 返回 0

