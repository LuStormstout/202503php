<?php

require_once '../helpers.php';

$userInfo = array();
$userInfo = array(1, 2, 3);
$userInfo = array(
    'username' => 'lustormstout',
    'age' => 20
);

// 推荐数组使用 []
$userInfo = [
    'username' => 'lustormstout',
    'age' => 20
];
var_dump($userInfo);
echo "<br>";
$emptyArr = [];
var_dump($emptyArr);
echo "<br>";

$fruits = ["apple", "banana", "orange"];
echo count($fruits) . "<br>"; // 输出: 3

$nested = [1, 2, [3, 4], 5];
echo count($nested) . "<br>"; // 输出: 4 (只计算第一层)
echo count($nested, COUNT_RECURSIVE) . "<br>"; // 输出: 6 (计算了内部数组的元素)

$arr = [];
$str = "hello";
var_dump(is_array($arr)); // 输出: bool(true)
var_dump(is_array($str)); // 输出: bool(false)
echo "<br>";

$orders = [
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
//        'status' => 1,
    ],
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
        'status' => 2,
    ],
    '',
];
//echo json_encode($orders);
//echo "<br>";
foreach ($orders as &$order) {

// 如果有多层嵌套的数据需要多层循环来处理里面数据的时候, 需要注意里面的某些节点可能类型不是数据直接使用 foreach 的话会报错
//    if (is_array($order)) {
//        foreach ($order as $key => &$value){
//            if ($key === 'status' && $value === 1){
//                $value = '已发货';
//            }
//        }
//    }

    if (is_array($order) && array_key_exists('status', $order)) {
        if ($order['status'] === 1) $order['status'] = '已支付';
        if ($order['status'] === 2) $order['status'] = '已发货';
    }
}
var_dump($orders);
echo "<br>";

$stack = ["a", "b"];
$count = array_push($stack, "c", "d");
printRWithBr($stack); // 输出: Array ( [0] => a [1] => b [2] => c [3] => d )
echo "<br>";
echo "New count: " . $count; // 输出: New count: 4
echo "<br>";

$stack[] = "e"; // 更常见的方式添加单个元素
printRWithBr($stack); // 输出: Array ( [0] => a [1] => b [2] => c [3] => d [4] => e )
echo "<br>";

$stack = ["a", "b", "c"];
foreach ($stack as $item) {
    $last = array_pop($stack);
    echo "Popped: " . $last; // 输出: Popped: c ...
    echo "<br>";
}
printRWithBr($stack); // 输出: Array ()
echo "<br>";

$queue = ["b", "c"];
$count = array_unshift($queue, "a", "x");
printRWithBr($queue); // 输出: Array ( [0] => a [1] => x [2] => b [3] => c )
echo "<br>";
echo "New count: " . $count; // 输出: New count: 4
echo "<br>";

$queue = ["a", "b", "c"];
$first = array_shift($queue);
echo "Shifted: " . $first . "<br>"; // 输出: Shifted: a
printRWithBr($queue); // 输出: Array ( [0] => b [1] => c ) (注意索引重排了)
echo "<br>";

// 排队逻辑
$buyXiaomiQueue = [];
$user1 = '张三';
$user2 = '李四';
$user3 = '王五';
array_unshift($buyXiaomiQueue, $user2);
// ...
array_unshift($buyXiaomiQueue, $user1);
// ...
array_unshift($buyXiaomiQueue, $user3);
var_dump($buyXiaomiQueue);
echo "<br>";

// 生成购买订单
$userOrder1 = array_pop($buyXiaomiQueue);
echo $userOrder1 . "<br>";
$userOrder2 = array_pop($buyXiaomiQueue);
echo $userOrder2 . "<br>";
var_dump($buyXiaomiQueue);
echo "<br>";

$arr = [0 => "apple", 1 => "banana", 2 => "cherry"];
unset($arr[1]); // 删除索引为 1 的元素
printRWithBr($arr); // 输出: Array ( [0] => apple [2] => cherry ) (索引 1 不存在了)
echo "<br>";

// 如果想删除后重新索引，可以用 array_values()
$reindexed = array_values($arr);
printRWithBr($reindexed); // 输出: Array ( [0] => apple [1] => cherry )
echo "<br>";

echo $fruits[0] . "<br>";
echo $userInfo['username'] . "<br>";
var_dump(array_key_exists('username', $userInfo));
echo "<br>";
var_dump(array_key_exists('email', $userInfo));
echo "<br>";

$user = ['name' => 'Bob', 'age' => 25, 'city' => 'London', 'status' => 'active'];
$keys = array_keys($user);
// ['name', 'age', 'city', 'status'];
printRWithBr($keys); // 输出: Array ( [0] => name [1] => age [2] => city [3] => status )
echo "<br>";

$values = array_values($user);
// ['Bob', 25, 'London', 'active'];
printRWithBr($values); // 输出: Array ( [0] => Bob [1] => 25 [2] => London [3] => active )
echo "<br>";

$ages = ['Alice' => 30, 'Bob' => 25, 'Charlie' => 30];
$keysOf30 = array_keys($ages, 30);
printRWithBr($keysOf30); // 输出: Array ( [0] => Alice [1] => Charlie )
echo "<br>";

$os = ['Mac', 'Windows', 'Linux', 0];

var_dump(in_array('Linux', $os)); // 输出: bool(true)
var_dump(in_array('linux', $os)); // 输出: bool(false) (区分大小写)
var_dump(in_array(0, $os));       // 输出: bool(true)
var_dump(in_array('0', $os));     // 输出: bool(true) (松散比较 0 == '0')
var_dump(in_array('0', $os, true)); // 输出: bool(false) (严格比较 int(0) !== string('0'))

$roleRelationPermissions = [
    1 => ['create', 'update', 'view'],
    2 => ['create', 'update', 'view', 'delete'],
];
$userCanOptionsArticleRoles = [1, 2];
// $authorPermissions = ['create', 'update', 'view'];
$userRole = 1;
$can = in_array($userRole, $userCanOptionsArticleRoles);
var_dump($can);
echo "<br>";

$key1 = array_search('Windows', $os);
// $key1 = array_search(25, $ages);
var_dump($key1); // 输出: int(1)
echo "<br>";

$arr1 = ['color' => 'red', 0 => 'a', 1 => 'b'];
$arr2 = ['color' => 'green', 'shape' => 'circle', 1 => 'c', 2 => 'd'];

$merged = array_merge($arr1, $arr2);
printRWithBr($merged);
echo "<br>";

$base = ['color' => 'red', 'shape' => 'square', 0 => 10, 1 => 20];
$replacements = ['color' => 'blue', 1 => 25, 'border' => 'dotted'];
$replaced = array_replace($base, $replacements);
printRWithBr($replaced);
echo "<br>";

$input = ['a', 'b', 'c', 'd', 'e'];
$slice1 = array_slice($input, 2);      // 从索引 2 到末尾 -> ['c', 'd', 'e'] (索引变为 0, 1, 2)
$slice2 = array_slice($input, 2, 2);   // 从索引 2 开始，取 2 个 -> ['c', 'd'] (索引变为 0, 1)
$slice3 = array_slice($input, 1, -1);  // 从索引 1 开始，到倒数第 1 个之前结束 -> ['b', 'c', 'd']
$slice4 = array_slice($input, -2, 1); // 从倒数第 2 个开始，取 1 个 -> ['d']
$assoc = ['x' => 10, 'y' => 20, 'z' => 30];
$slice5 = array_slice($assoc, 1, null, true); // 从索引 1 开始，保留键名 -> ['y' => 20, 'z' => 30]
printRWithBr($slice1);
echo "<br>";
printRWithBr($slice2);
echo "<br>";
printRWithBr($slice3);
echo "<br>";
printRWithBr($slice4);
echo "<br>";
printRWithBr($slice5);
echo "<br>";

// & 我们也叫做「地址传递符」

echoHr();
$input = ["red", "green", "blue", "yellow"];
// 移除从索引 2 开始的两个元素
$removed1 = array_splice($input, 2, 2);
printRWithBr($input);   // 输出: Array ( [0] => red [1] => green )
printRWithBr($removed1); // 输出: Array ( [0] => blue [1] => yellow )

$input = ["red", "green", "blue", "yellow"];
// 移除从索引 1 开始的一个元素，并用 "orange", "purple" 替换
$removed2 = array_splice($input, 1, 1, ["orange", "purple"]);
printRWithBr($input);   // 输出: Array ( [0] => red [1] => orange [2] => purple [3] => blue [4] => yellow ) (键已重排)
printRWithBr($removed2); // 输出: Array ( [0] => green )

echoHr();
function square($n): float|int
{
    return $n * $n;
}

$numbers = [1, 2, 3, 4];
$squares = array_map('square', $numbers); // 使用函数名
printRWithBr($squares); // 输出: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 )

$lower = ['a', 'b', 'c'];
// ['A', 'B', 'C']
$upper = array_map('strtoupper', $lower); // 使用内建函数
printRWithBr($upper); // 输出: Array ( [0] => A [1] => B [2] => C )

// 也可以用这种办法来实现相同的功能, 但是一般不会用.
//$upperArr = explode(',', strtoupper(implode(',', $lower)));

$nums1 = [1, 2, 3];
$nums2 = [10, 20, 30];
$sums = array_map(fn($n1, $n2) => $n1 + $n2, $nums1, $nums2); // 使用箭头函数处理多个数组
printRWithBr($sums); // 输出: Array ( [0] => 11 [1] => 22 [2] => 33 )

$users = [
    ['id' => 1, 'username' => '张三', 'is_admin' => 1, 'register_from' => 1],
    ['id' => 1, 'username' => '张三', 'is_admin' => 0, 'register_from' => 2]
];
$usersData = array_map(function ($user) {
    $user['is_admin'] = $user['is_admin'] ? '管理员' : '用户';
    if ($user['register_from'] === 1) $user['register_from'] = 'Google';
    if ($user['register_from'] === 2) $user['register_from'] = 'Apple';
    return $user;
}, $users);
echoWithBr(json_encode($usersData));

echoHr();
$numbers = [1, 2, 3, 4, 5, 6];
$even = array_filter($numbers, fn($n) => $n % 2 == 0);
printRWithBr($even); // 输出: Array ( [1] => 2 [3] => 4 [5] => 6 ) (保留了键名 1, 3, 5)

$mixed = [0, 1, false, true, "", "hello", null, []];
$notEmpty = array_filter($mixed); // 省略回调，移除所有 falsey 值
printRWithBr($notEmpty); // 输出: Array ( [1] => 1 [3] => 1 [5] => hello ) (true 被转为 1 输出)

$assoc = ['a' => 1, 'b' => 2, 'c' => 3];
// 过滤掉键名不是 'a' 的元素
$onlyA = array_filter($assoc, fn($key) => $key === 'a', ARRAY_FILTER_USE_KEY);
printRWithBr($onlyA); // 输出: Array ( [a] => 1 )

echoHr();
$numbers = [1, 2, 3, 4, 5];

// 计算数组元素的和
$sum = array_reduce($numbers, fn($carry, $item) => $carry + $item, 0); // 初始值为 0
echoWithBr("Sum: " . $sum); // 输出: Sum: 15

// 将数组元素连接成字符串
$string = array_reduce($numbers, fn($carry, $item) => $carry . "-" . $item, "Numbers:"); // 初始值为 "Numbers:"
echoWithBr("\nString: " . $string); // 输出: String: Numbers:-1-2-3-4-5

echoHr();
$fruits = ['a' => 'apple', 'b' => 'banana'];

// 打印每个元素
array_walk($fruits, function($value, $key) {
    echoWithBr($key . " => " . $value . "\n");
});

// 修改数组元素（注意 &）
$numbers = [1, 2, 3];
array_walk($numbers, function(&$value, $key) {
    $value *= 10;
});
printRWithBr($numbers); // 输出: Array ( [0] => 10 [1] => 20 [2] => 30 )

echoHr();
$numbers = [3, 1, 4, 1, 5, 9];
sort($numbers);
printRWithBr($numbers); // 输出: Array ( [0] => 1 [1] => 1 [2] => 3 [3] => 4 [4] => 5 [5] => 9 ) (键被重置)
rsort($numbers);
printRWithBr($numbers); // 输出: Array ( [0] => 9 [1] => 5 [2] => 4 [3] => 3 [4] => 1 [5] => 1 ) (键被重置)
$scores = ['Alice' => 85, 'Bob' => 92, 'Charlie' => 78];
asort($scores); // 按分数升序，保留名字键
printRWithBr($scores); // 输出: Array ( [Charlie] => 78 [Alice] => 85 [Bob] => 92 )
arsort($scores); // 按分数降序，保留名字键
printRWithBr($scores); // 输出: Array ( [Bob] => 92 [Alice] => 85 [Charlie] => 78 )
$files = ['img12.png', 'img10.png', 'img2.png', 'img1.png'];
natsort($files); // 自然排序
printRWithBr($files); // 输出: Array ( [3] => img1.png [2] => img2.png [1] => img10.png [0] => img12.png ) (键保留)
$input = ["a", "b", "a", "c", "b", "b"];
$unique = array_unique($input);
printRWithBr($unique); // 输出: Array ( [0] => a [1] => b [3] => c )

$array1 = ["a" => "green", "red", "blue", "red"];
$array2 = ["b" => "green", "yellow", "red"];

$diff = array_diff($array1, $array2);
printRWithBr($diff); // 输出: Array ( [1] => blue ) ('green' 和 'red' 在 $array2 中也存在)

$intersect = array_intersect($array1, $array2);
print_r($intersect); // 输出: Array ( [a] => green [0] => red [2] => red )

$numbers = [1, 2, 3, 4.5];
echoWithBr("Sum: " . array_sum($numbers)); // 输出: Sum: 10.5

$input = ["a" => 1, "b" => 2, "c" => 3];
$flipped = array_flip($input);
printRWithBr($flipped); // 输出: Array ( [1] => a [2] => b [3] => c )
printRWithBr(array_flip($scores)); // 输出: Array ( [85] => Alice [92] => Bob [78] => Charlie ) (分数作为键)
$numbers = [3, 1, 4, 1, 5, 9];
printRWithBr(array_reverse($numbers)); // 输出: Array ( [0] => 9 [1] => 5 [2] => 4 [3] => 3 [4] => 1 [5] => 1 ) (键被重置)

// ['f','g','a']
// -----> ---->
// ['p','q','r']
// <----- <----

// list