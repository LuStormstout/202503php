<?php

require_once '../helpers.php';

// is_numeric() - 检查变量是否为数字或数字字符串
// 这个方法一般会用来判断一个变量是否是数字, 例如在表单验证时, 检查用户输入的值是否是数字
// 这个方法会返回 true 或 false

echoWithBr(is_numeric("123")); // 输出: 1
echoWithBr(is_numeric("123abc")); // 输出:
echoWithBr(is_numeric("123.45")); // 输出: 1
echoWithBr(is_numeric("abc")); // 输出:  这种情况会返回 false, 输出在页面上是空的看不到
echoWithBr(is_numeric("")); // 输出:
echoWithBr(is_numeric(123)); // 输出: 1

echoHr();
$data = 100;
$typeString = gettype($data);

echoWithBr("变量 $data 的类型是: {$typeString}\n"); // 输出: 变量 $data 的类型是: integer

switch ($typeString) {
    case 'integer':
        echo "这是一个整数。\n";
        break;
    case 'string':
        echo "这是一个字符串。\n";
        break;
// ... 其他 case ...
    default:
        echo "这是一个其他类型。\n";
}
if ($typeString == 'integer') {
    echoWithBr("这是一个整数。\n");
} elseif ($typeString == 'string') {
    echo "这是一个字符串。\n";
} else {
    echoWithBr("这是一个其他类型。\n");
}

$value = "123.45"; // 初始是字符串
echoWithBr("初始类型: " . gettype($value) . ", 值: ");
varDumpWithBr($value); // string(6) "123.45"
echoWithBr("<br>");

// 转换为整数
settype($value, "integer");
echoWithBr("转换为 int 后: " . gettype($value) . ", 值: ");
varDumpWithBr($value); // integer, int(123) (小数部分截断)
echoWithBr("<br>");

echoHr();
$value = "123.45"; // 初始是字符串
varDumpWithBr(intval($value)); // 转换为整数
varDumpWithBr((int)$value); // 转换为整数
varDumpWithBr((float)$value); // 转换为浮点数

echoHr();
varDumpWithBr(empty($student));
//if (!empty($student)) {
//    # todo do something
//}
$classes = [
    'class1' => ['student1', 'student2'],
    'class2' => ['student3', 'student4'],
];
unset($classes['class1']); // 删除 class1
varDumpWithBr($classes); // class2 => student3, student4

echoHr();
$pi = 3.1415926;
echoWithBr(round($pi, 2)); // 四舍五入保留两位小数, 输出: 3.14
echoWithBr(round($pi, 3)); // 四舍五入保留三位小数, 输出: 3.142

echoWithBr(mt_rand(1, 100)); // 输出: 随机数, 1 到 100 之间

try {
    $password = random_int(100000, 999999) . bin2hex(random_bytes(10));
} catch (\Random\RandomException $e) {
    echo "生成随机密码失败: " . $e->getMessage();
    exit;
}
echoWithBr($password); // 输出: 随机密码, 10 位随机字符串

echoHr();
echoWithBr(time()); // 输出: 当前时间戳, 当前时间戳就是从 Unix 纪元 (1970 年 1 月 1 日 00:00:00 GMT) 到现在的秒数
echoWithBr(microtime(true)); // 输出: 当前时间戳, 包含微秒
echoWithBr("请求开始时间 (秒): " . ($_SERVER['REQUEST_TIME'] ?? 'N/A') . "\n");
echoWithBr("请求开始时间 (带微秒): " . ($_SERVER['REQUEST_TIME_FLOAT'] ?? 'N/A') . "\n");
//echoWithBr(date('Y-m-d', strtotime('-1 year')));
echoWithBr(date("L", strtotime(date('Y-m-d', strtotime('-1 year')))));

// PHP - Supplement D: 文件系统函数
echoHr();
$path1 = "/var/www/html/images/logo.png";
$path2 = "C:\\Users\\John\\Documents\\report.pdf";
$path3 = "myfile.txt"; // 只有文件名
$path4 = "/etc/php/";    // 目录

echo basename($path1); // 输出: logo.png
echo "<br>";
echo basename($path1, ".png"); // 输出: logo
echo "<br>";
echo basename($path2); // 输出: report.pdf (能处理 Windows 路径)
echo "<br>";
echo basename($path3); // 输出: myfile.txt
echo "<br>";
echo basename($path4); // 输出: php (返回最后的组件)

echoHr();
$path = "/var/www/html/images/logo.png";
echo dirname($path);      // 输出: /var/www/html/images
echo "<br>";
echo dirname($path, 2); // 输出: /var/www/html (向上两级)
echo "<br>";
echo dirname("/var/www/html"); // 输出: /var/www
echo "<br>";
echo dirname("myfile.txt"); // 输出: . (当前目录)

echoHr();
$path = "/var/www/html/images/logo.PNG";
// 获取所有信息
$infoAll = pathinfo($path);
echo "<pre>All info: ";
print_r($infoAll);
echo "</pre>";

echoWithBr(DIRECTORY_SEPARATOR); // 输出: /

echoHr();
$file = './array_functions.php';
$dir = '/Library/WebServer/Documents/cod/202503php/php/basics/';
if (file_exists($file)) {
    echoWithBr("文件 $file 存在。");
} else {
    echoWithBr("文件 $file 不存在。");
}

if (is_dir($dir)) {
    echoWithBr("目录 $dir 存在。");
} else {
    echoWithBr("目录 $dir 不存在。");
}

if (is_file($file)) {
    echoWithBr("文件 $file 是一个文件。");
} else {
    echoWithBr("文件 $file 不是一个文件。");
}

echoWithBr(filetype($file)); // 输出: file

echoWithBr(disk_free_space($dir)); // 返回当前磁盘上可用的空间
echoWithBr(disk_total_space($dir)); // 返回当前磁盘的总空间

$childes = scandir($dir);
printRWithBr($childes); // 输出: 目录下的所有文件和目录

echoHr();
$userInfo = [
    'name' => 'Elon Musk',
    'nickname' => '马书记',
    'age' => 30,
    'avatar' => 'https://example.com/avatar.jpg',
    'email' => 'test@example.com',
    'phone' => '1234567890',
    'address' => '123 Main St, City, Country',
    'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'website' => 'https://example.com',
    'social' => [
        'facebook' => 'https://facebook.com/elonmusk',
        'twitter' => 'https://twitter.com/elonmusk',
        'linkedin' => 'https://linkedin.com/in/elonmusk',
    ],
    'skills' => [
        'PHP',
        'JavaScript',
        'HTML',
        'CSS',
        'MySQL',
    ],
    'projects' => [
        [
            'title' => 'Project 1',
            'description' => 'Description of project 1.',
            'url' => 'https://example.com/project1',
        ],
        [
            'title' => 'Project 2',
            'description' => 'Description of project 2.',
            'url' => 'https://example.com/project2',
        ],
    ],
    'education' => [
        [
            'degree' => 'Bachelor of Science in Computer Science',
            'institution' => 'University of Example',
            'year' => 2015,
        ],
        [
            'degree' => 'Master of Science in Software Engineering',
            'institution' => 'Example University',
            'year' => 2017,
        ],
    ],
];

// 使用 json_encode() 将数组转换为 JSON 字符串
echoWithBr(json_encode($userInfo));
$jsonString = json_encode($userInfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echoWithBr("<pre>$jsonString</pre>");

$userInfoJson = '{"name":"Elon Musk","nickname":"\u9a6c\u4e66\u8bb0","age":30,"avatar":"https:\/\/example.com\/avatar.jpg","email":"test@example.com","phone":"1234567890","address":"123 Main St, City, Country","bio":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","website":"https:\/\/example.com","social":{"facebook":"https:\/\/facebook.com\/elonmusk","twitter":"https:\/\/twitter.com\/elonmusk","linkedin":"https:\/\/linkedin.com\/in\/elonmusk"},"skills":["PHP","JavaScript","HTML","CSS","MySQL"],"projects":[{"title":"Project 1","description":"Description of project 1.","url":"https:\/\/example.com\/project1"},{"title":"Project 2","description":"Description of project 2.","url":"https:\/\/example.com\/project2"}],"education":[{"degree":"Bachelor of Science in Computer Science","institution":"University of Example","year":2015},{"degree":"Master of Science in Software Engineering","institution":"Example University","year":2017}]}';
// 使用 json_decode() 将 JSON 字符串转换为 PHP 数组
$userInfoArray = json_decode($userInfoJson, true);
echo "<pre>";
printRWithBr($userInfoArray); // 输出: 数组
echo "</pre>";
echoWithBr($userInfoArray['nickname']); // 输出: 马书记