<?php

// String Functions in PHP
// strlen() - 获取字符串长度
echo strlen("Hello World!"); // 输出: 12
// $返回值 = 函数名();
// echo $返回值; // 输出: 12
echo "<br>";

echo "「你好」所占的字节数是: " . strlen("你好"); // 输出: 6
echo "<br>";

// mb_strlen() - 获取多字节字符串的长度
echo mb_strlen("你好"); // 输出: 2
echo "<br>";
echo mb_strlen("こんにちは朝日"); // 输出: 7
echo "<br>";

$string = "Hello world, hello PHP!";
$find = "hello";

$pos1 = strpos($string, $find); // 从头开始找，区分大小写，找不到 "hello"
if ($pos1 === false) {
    echo "'$find' not found (case-sensitive).\n";
} else {
    echo "'$find' found at index: $pos1\n";
}
echo "<br>";

$findUpper = "Hello";
$pos2 = strpos($string, $findUpper); // 找到了 "Hello"
if ($pos2 !== false) {
    echo "'$findUpper' found at index: $pos2\n"; // 输出: 'Hello' found at index: 0
}
echo "<br>";

// 错误用法示例
//if (strpos($string, $findUpper) == false) { // 错误！当 $pos2 为 0 时， 0 == false 为 true！
//    echo "错误判断：'$findUpper' not found.\n"; // 这句会意外执行
//}
//echo "<br>";

// 从第 7 个字符开始搜索 "hello"
$pos3 = strpos($string, $find, 7);
if ($pos3 !== false) {
    echo "从索引 7 开始，'$find' found at index: $pos3\n"; // 输出: 从索引 7 开始，'hello' found at index: 13
}
echo "<br>";

$lastPos = strripos($string, $find); // 找最后一个 "hello" (不区分大小写)
if ($lastPos !== false) {
    echo "Last '$find' found at index (case-insensitive): $lastPos\n"; // 输出: Last 'hello' found at index (case-insensitive): 13
}
echo "<br>";

$email = "user@example.com";
$domain = strstr($email, '@');
echo $domain . "<br>"; // 输出: @example.com

$user = strstr($email, '@', true); // 第三个参数为 true
echo $user . "<br>";   // 输出: user

$url = "https://example.com";
if (str_contains($url, "example")) {
    echo "URL contains 'example'.<br>"; // 输出: URL contains 'example'.
}

if (str_starts_with($url, "https://")) {
    echo "URL uses HTTPS.<br>";
}

$filename = "document.pdf";
if (str_ends_with($filename, ".pdf")) {
    echo "File is a PDF.<br>";
}

// 2025-04-17

// str_replace
$text = "The quick brown fox jumps over the lazy dog.";
$newText1 = str_replace("quick", "PHP", $text);
echo $newText1; // 输出: The quick red fox jumps over the lazy dog.
echo "<br>";

$search = ["fox", "dog"];
$replace = ["cat", "bear"];
$newText2 = str_replace($search, $replace, $text, $count);
echo "\n" . $newText2; // 输出: The quick brown cat jumps over the lazy bear.
echo "\n替换次数: " . $count; // 输出: 替换次数: 2
echo "<br>";

// substr_replace
$string = "abcdefgh";
echo substr_replace($string, "XYZ", 3, 2); // 从索引3开始，替换2个字符为XYZ -> abcXYZfgh
echo "<br>";
$url = 'https://lustormstout.com/avatar/default.png?userId=123';
echo substr_replace($url, 'https://', strpos($url, 'https://'), strlen('https://'));
echo "<br>";
$email = 'lustormstout@gmail.com';
echo strstr($email, '@');
echo "<br>";
echo substr_replace($string, "XYZ", 3, 0); // 从索引3开始，插入XYZ -> abcXYZdefgh
echo "<br>";
echo substr_replace($string, "XYZ", -3, 2); // 从倒数第3个开始，替换2个 -> abcdeXYZh
echo "<br>";

// substr
echo substr($email, strpos($email, '@') + 1);
echo "<br>";
// @qq.cn
// @yahoo.jp.co

$url = 'https://www.mhlw.go.jp/search.html?q=123&cx=005876357619168369638%3Aydrbkuj3fss&cof=FORID%3A9&ie=UTF-8&sa=';
$awsUrl = 'https://aws.amazon.com/cn/s3/?nc2=h_ql_prod_fs_s3';
echo substr($url, strpos($url, '?') + 1);
echo "<br>";
echo substr($url, 0, -(strlen($url) - strrpos($url, '?')));
echo "<br>";
echo substr($awsUrl, 0, -(strlen($awsUrl) - strrpos($awsUrl, '?')));
echo "<br>";

$code = 'XfTd42';
echo strtolower($code);
echo "<br>";
echo strtoupper($code);
echo "<br>";

$fileName = 'learning_php_construct.php';
$fileName = substr($fileName, 0, -(strlen($fileName) - strpos($fileName, '.')));
$fileName = str_replace('_', ' ', $fileName);
// echo $fileName;
// echo "<br>";
// die;
echo ucwords($fileName);
echo "<br>";

// trim
$string = ' PHP ';
echo strlen($string);
echo "<br>";
$trimString = trim($string);
echo strlen($trimString);
echo "<br>";
// 接收参数: 电话号码、邮箱、验证码、用户名、密码...
$str2 = "/path/to/file/";
echo trim($str2, "/"); // 输出: path/to/file (移除两端的 /)
echo "<br>";

$name = "Alice";
$age = 30;
$score = 85.7;

$outputString = sprintf("姓名: %s, 年龄: %d, 分数: %.1f%%", $name, $age, $score);
echo $outputString . '<br>'; // 输出: 姓名: Alice, 年龄: 30, 分数: 85.7%
printf("ID: %05d", 123); // 直接输出: ID: 00123
echo "<br>";

// product type: 1,2,8 (ids) 可能对应的就是 categories 表的 ID = 1, ID = 2, ID = 8
//$products = [
//    [
//       'name' => 'iPhone',
//       'price' => 198,
//       'categories' => [
//           ['id' => 1, 'name' => '手机'],
//           ['id' => 1, 'name' => '智能手机'],
//       ]
//    ],
//    [
//        'name' => 'iPhone',
//        'price' => 198,
//        'categories' => [
//            'id' => 1,
//            'name' => '手机'
//        ]
//    ]
//];
$productType = '1,2,8';
$productTypeArr = explode(',', $productType);
var_dump($productTypeArr);
echo "<br>";
$keywordsArr = ["黑色", "足球鞋", "男款"];
$keywordsStr = implode(', ', $keywordsArr);
echo $keywordsStr;
echo "<br>";
// 互为逆操作
//$productSearchKeywordsArr = ['黑色', '足训鞋', '真皮', '亚瑟士',  '足球鞋'];
//$searchCondition = "黑色足球鞋男款";
//$searchConditionArr1 = mb_str_split($searchCondition, 2);
//$searchConditionArr2 = mb_str_split('足球鞋男款', 3);
//var_dump($searchConditionArr1);
//$intersection1 = array_intersect($productSearchKeywordsArr, $searchConditionArr1);
//$intersection2 = array_intersect($productSearchKeywordsArr, $searchConditionArr2);
//echo "<br>";
//$matchCount = count($intersection1) + count($intersection2);
//var_dump($matchCount);
//echo "<br>";
// 我们可以用这种拆分的方法来拆分用户的搜索关键词来匹配商品.(但实际场景中要复杂很多)
echo '&nbsp;你好 ';
echo "<br>";
echo "<h1>这是一个 h1 标签</h1>";
echo "&lt;h1&gt;这是一个 h1 标签&lt;/h1&gt;";
echo "<br>";
// echo "<script>alert('你的网站被我黑了!')</script>";
echo htmlspecialchars("<script>alert('你的网站被我黑了!')</script>");
echo "<br>";
echo strip_tags("<h1>这是一个 h1 标签</h1>");
echo "<br>";
$str = strip_tags("<?php echo 123; ?>ss");
echo $str;
echo "<br>";
$html = "<p><i>这是</i>一段<b>加粗</b>的<script>alert('oops');</script>文本。</p>";
echo strip_tags($html); // 输出: 这是一段加粗的alert('oops');文本。
echo "\n";
echo strip_tags($html, '<p><b><i>'); // 输出: 这是一段加粗的alert('oops');文本。
$query = "搜索 词";
$url = "https://example.com/search?q=" . urlencode($query);
echo $url; // 输出: http://example.com/search?q=%E6%90%9C%E7%B4%A2+%E8%AF%8D

$path = "文件 名.txt";
$urlPath = "https://example.com/files/" . rawurlencode($path);
echo "\n".$urlPath; // 输出: http://example.com/files/%E6%96%87%E4%BB%B6%20%E5%90%8D.txt
echo "<br>";
parse_str('key1=value1&key2=value2', $result);
var_dump($result);
echo "<br>";
$params = [
    'search' => 'PHP 教程',
    'page' => 1,
    'filters' => ['free', 'beginner'] // 数组会被处理
];
$queryString = http_build_query($params);
echo $queryString;
