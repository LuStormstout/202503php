<?php

function sayHello(): void
{
    echo "你好, 欢迎来到 PHP 编程世界！<br>";
}

function helloUser($name): void
{
    echo "你好, " . $name . "！<br>";
}

function addNumbers(int &$num1, int $num2): int
{
    $num1 = 1;
    return $num1 + $num2;
}

sayHello();
helloUser("小明");
$num1 = 5;
$sum = addNumbers($num1, 10);
echo $sum . "<br>";
echo "这是变量 num1 的值: $num1<br>";

// $a 的内存地址是 0x7f8c4c0b2a40
// $b 的内存地址是 0x7f8c4c0b2a40
// $c 的内存地址是 asdasdsadadsad
$a = 5;
$b = &$a; // $b 是 $a 的引用
$b = 20; // 修改 $b 的值
$c = $a; // $c 是 $a 的值的拷贝, 是一个新的变量
echo "这是变量 a 的值: $a<br>"; // 输出: 20

/**
 * 按照城市和日期获取天气信息
 *
 * @param string $city 城市
 * @param string $date 日期
 * @return array|null
 */
function getWeather(string $city, string $date = '2025-04-15'): ?array
{
    $weather = [
        '北京' => ['2025-04-15' => '晴', '2025-04-16' => '阴', '2025-04-17' => '雨'],
        '上海' => ['2025-04-15' => '阴', '2025-04-16' => '雨', '2025-04-17' => '晴'],
        '广州' => ['2025-04-15' => '雨', '2025-04-16' => '晴', '2025-04-17' => '阴']
    ];

    $result = [];
    if (isset($weather[$city][$date])) {
        $result['city'] = $city;
        $result['date'] = $date;
        $result['weather'] = $weather[$city][$date];
        return $result;
    }
    return null;
}

$weather = getWeather('广州', '2025-04-17');
echo $weather['date'] . ' ' . $weather['city'] . "的天气是: " . $weather['weather'] . "<br>";

/**
 * 计算多个数的和
 * 可变参数函数, $numbers 是一个包含所有传入参数的数组
 *
 * @param ...$numbers
 * @return int
 */
function sumNumbers(...$numbers): int
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number; // $sum += $number 是 $sum = $sum + $number 的简写
    }
    return $sum;
}

$sum = sumNumbers(1, 2, 3);
echo "1 + 2 + 3 = " . $sum . "<br>";

/**
 * 演示命名参数
 *
 * @param string $username
 * @param string $email
 * @param bool $isActive
 * @param bool $isAdmin
 * @return void
 */
function createUser(string $username, string $email, bool $isActive = true, bool $isAdmin = false): void
{
    echo "创建用户: <br>";
    echo "  用户名: " . $username . "<br>";
    echo "  邮箱: " . $email . "<br>";
    echo "  激活状态: " . ($isActive ? '是' : '否') . "<br>";
    echo "  管理员: " . ($isAdmin ? '是' : '否') . "<br>";
    echo "----<br>";
}

$name = 'lustormstout';
createUser(username: $name, email: 'lustormstout@example.com', isAdmin: 1);

#### 2025-04-16

// 变量的作用域
// 局部作用域: 在函数内部定义的变量, 只能在函数内部访问
// 全局作用域: 在函数外部定义的变量, 可以在函数内部访问, 但需要使用 global 关键字
$userAge = 25; // 全局变量
function getUserinfo($userAge): void
{
    // echo $userAge; // 报错: Undefined variable: userAge
    // global $userAge; // 声明 $userAge 为全局变量, 可以这么做但是不推荐, 如果你想要访问全局变量, 你可以直接传递参数
    // echo $GLOBALS['userAge']; // 访问全局变量, $GLOBALS 是一个包含所有全局变量的数组, 这个同样也是不推荐使用的, 因为它会影响代码的可读性, 破坏函数的封装性
    echo $userAge . '<br>'; // 输出: 25
    $username = 'lustormstout'; // 局部变量
}

// var_dump($username); // 报错: Undefined variable: username
getUserinfo($userAge); // 调用函数

// 静态变量
function staticVariableExample(): void
{
    static $count = 0; // 静态变量, 在函数调用之间保持其值
    // $count = 0; // 局部变量, 每次调用函数都会重新初始化
    $count++;
    echo "函数被调用了 $count 次<br>";
}

staticVariableExample(); // 输出: 函数被调用了 1 次
staticVariableExample(); // 输出: 函数被调用了 2 次
staticVariableExample(); // 输出: 函数被调用了 3 次
// 这里大家要去了解一下什么是编程语言的垃圾回收机制, 这里的静态变量是不会被销毁的, 直到脚本执行完毕. 在编程语言中我们一般将越贴近于人类语言的变成语言称为高级语言, 贴近于计算机语言的编程语言称为低级语言. 这里的静态变量是一个高级语言的概念, 但是在底层实现上是通过低级语言来实现的.

// 可变函数
function helloWorld(): void
{
    echo "Hello, World!<br>";
}

$helloWorld = 'helloWorld'; // 函数名
$helloWorld(); // 调用函数, 输出: Hello, World!

// 匿名函数
$greet = function ($name) {
    echo "你好, " . $name . "！<br>";
};
$greet('小明'); // 调用匿名函数, 输出: 你好, 小明！

// 使用 use 捕获外部变量
$messagePrefix = "重要消息: ";
$sendMessage = function ($text) use ($messagePrefix) { // 按值捕获 $messagePrefix
    echo $messagePrefix . $text . "<br>";
    // $messagePrefix = "改不了"; // 错误，因为是按值捕获的副本
};
// echo $messagePrefix . "<br>"; // 输出: 重要消息:
$sendMessage("会议推迟了"); // 输出: 重要消息: 会议推迟了

$count = 0;
$increment = function () use (&$count) { // 按引用捕获 $count
    $count++;
};
$increment();
$increment();
echo "Count is now: " . $count . '<br>'; // 输出: Count is now: 2

// 作为回调函数传递给 array_map
$numbers = [1, 2, 3, 4];
$squares = array_map(function ($iem) {
    return $iem * $iem;
}, $numbers);
print_r($squares); // 输出: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 )
echo "<br>";

// 箭头函数
$numbers = [1, 2, 3, 4];
$factor = 3; // 父作用域变量

// 箭头函数自动捕获 $factor
$multiplied = array_map(fn($item) => $item * $factor, $numbers);

print_r($multiplied); // 输出: Array ( [0] => 3 [1] => 6 [2] => 9 [3] => 12 )
echo "<br>";

// 递归函数
#todo 大家去找到我们在 JS 的时候给大家讲过的使用递归计算文件夹层级深度的例子, 使用 PHP 来实现
#todo 斐波那契数列