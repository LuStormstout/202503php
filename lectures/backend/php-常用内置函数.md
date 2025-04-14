# PHP 常用内置函数详解

## 1. 字符串处理函数

### 1.1 strlen

计算字符串的长度。

**函数原型**:

```php
int strlen ( string $string )
```

**参数**:

- `$string` (必选): 要计算长度的字符串。

**返回值**:
返回字符串的长度。

**示例**:

```php
$str = "Hello, World!";
$length = strlen($str);
echo $length; // 输出: 13
```

### 1.2 substr

截取字符串的一部分。

**函数原型**:

```php
string substr ( string $string , int $start [, int $length ] )
```

**参数**:

- `$string` (必选): 输入的字符串。
- `$start` (必选): 开始位置，从 0 开始。如果是负数，表示从字符串末尾开始的位置。
- `$length` (可选): 截取的长度。如果省略，则截取到字符串末尾。

**返回值**:
返回截取后的字符串。

**示例**:

**示例 1**: 截取从位置 7 开始，长度为 5 的字符串

```php
$str = "Hello, World!";
$sub = substr($str, 7, 5);
echo $sub; // 输出: World
```

**示例 2**: 截取从位置 7 开始到末尾的字符串

```php
$sub = substr($str, 7);
echo $sub; // 输出: World!
```

**示例 3**: 从字符串末尾向前数 6 个字符开始，截取 5 个字符

```php
$sub = substr($str, -6, 5);
echo $sub; // 输出: Worl
```

### 1.3 strpos

查找字符串在另一字符串中首次出现的位置。

**函数原型**:

```php
int strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
```

**参数**:

- `$haystack` (必选): 在其中搜索的字符串。
- `$needle` (必选): 要搜索的字符串。
- `$offset` (可选): 开始搜索的位置。默认是 0。

**返回值**:
返回 `$needle` 在 `$haystack` 中首次出现的位置。如果没有找到，则返回 false。

**示例**:

**示例 1**: 查找子字符串的位置

```php
$str = "Hello, World!";
$pos = strpos($str, "World");
echo $pos; // 输出: 7
```

**示例 2**: 查找子字符串，不存在时返回 false

```php
$pos = strpos($str, "PHP");
var_dump($pos); // 输出: bool(false)
```

**示例 3**: 从指定位置开始查找

```php
$str = "Hello, World! World!";
$pos = strpos($str, "World", 8);
echo $pos; // 输出: 14
```

### 1.4 strtolower

将字符串转换为小写。

**函数原型**:

```php
string strtolower ( string $string )
```

**参数**:

- `$string` (必选): 输入的字符串。

**返回值**:
返回转换为小写的字符串。

**示例**:

**示例 1**: 将字符串转换为小写

```php
$str = "Hello, World!";
$lower = strtolower($str);
echo $lower; // 输出: hello, world!
```

### 1.5 strtoupper

将字符串转换为大写。

**函数原型**:

```php
string strtoupper ( string $string )
```

**参数**:

- `$string` (必选): 输入的字符串。

**返回值**:
返回转换为大写的字符串。

**示例**:

**示例 1**: 将字符串转换为大写

```php
$str = "Hello, World!";
$upper = strtoupper($str);
echo $upper; // 输出: HELLO, WORLD!
```

### 1.6 md5

计算字符串的 MD5 散列值。

**函数原型**:

```php
string md5 ( string $str [, bool $raw_output = false ] )
```

**参数**:

- `$str` (必选): 输入的字符串。
- `$raw_output` (可选): 如果设置为 true，则返回二进制格式的 MD5 摘要。默认是 false，返回 32 字符的十六进制数。

**返回值**:
返回字符串的 MD5 散列值。

**示例**:

**示例 1**: 获取字符串的 MD5 散列值

```php
$str = "Hello, World!";
$hash = md5($str);
echo $hash; // 输出: b10a8db164e0754105b7a99be72e3fe5
```

### 1.7 implode

将数组元素组合成一个字符串。

**函数原型**:

```php
string implode ( string $glue , array $pieces )
```

**参数**:

- `$glue` (必选): 用于连接数组元素的字符串。
- `$pieces` (必选): 需要连接的数组。

**返回值**:
返回由数组元素组成的字符串。

**示例**:

**示例 1**: 用逗号连接数组元素

```php
$arr = ["apple", "banana", "cherry"];
$str = implode(", ", $arr);
echo $str; // 输出: apple, banana, cherry
```

**示例 2**: 用空格连接数组元素

```php
$arr = ["Hello", "World"];
$str = implode(" ", $arr);
echo $str; // 输出: Hello World
```

### 1.8 explode

将字符串分割成数组。

**函数原型**:

```php
array explode ( string $delimiter , string $string [, int $limit ] )
```

**参数**:

- `$delimiter` (必选): 用于分割字符串的边界上的字符串。
- `$string` (必选): 输入的字符串。
- `$limit` (可选): 返回数组的最大元素个数。如果设置为负数，则返回除最后的 -$limit 个元素外的所有元素。

**返回值**:
返回一个由字符串组成的数组。

**示例**:

**示例 1**: 用逗号分割字符串

```php
$str = "apple, banana, cherry";
$arr = explode(", ", $str);
print_r($arr);
// 输出:
// Array
// (
//     [0] => apple
//     [1] => banana
//     [2] => cherry
// )
```

**示例 2**: 用空格分割字符串

```php
$str = "Hello World";
$arr = explode(" ", $str);
print_r($arr);
// 输出:
// Array
// (
//     [0] => Hello
//     [1] => World
// )
```

### 1.9 trim

去除字符串首尾的空白字符或其他字符。

**函数原型**:

```php
string trim ( string $str [, string $character_mask ] )
```

**参数**:

- `$str` (必选): 输入的字符串。
- `$character_mask` (可选): 要去除的字符列表。默认去除空格、制表符、换行符等。

**返回值**:
返回去除首尾空白字符后的字符串。

**示例**:

**示例 1**: 去除首尾空格

```php
$str = "  Hello World  ";
$trimmed = trim($str);
echo $trimmed; // 输出: Hello World
```

**示例 2**: 去除首尾指定字符

```php
$str = "##Hello World##";
$trimmed = trim($str, "#");
echo $trimmed; // 输出: Hello World
```

## 2. 数组处理函数

### 2.1 count

计算数组中的元素数量。

**函数原型**:

```php
int count ( mixed $array_or_countable [, int $mode = COUNT_NORMAL ] )
```

**参数**:

- `$array_or_countable` (必选): 要计算的数组或实现了 Countable 接口的对象。
- `$mode` (可选): 计算模式。默认是 COUNT_NORMAL。如果传递 COUNT_RECURSIVE（或 1），则递归地计算数组中的所有元素。

**返回值**:
返回数组中元素的个数。

**示例**:

**示例 1**: 计算普通数组的元素个数

```php
$arr = [1, 2, 3, 4, 5];
$count = count($arr);
echo $count; // 输出: 5
```

**示例 2**: 递归计算多维数组的元素个数

```php
$arr = [1, [2, 3], 4, 5];
$count = count($arr, COUNT_RECURSIVE);
echo $count; // 输出: 6
```

### 2.2 array_merge

合并一个或多个数组。

**函数原型**:

```php
array array_merge ( array $array1 [, array $... ] )
```

**参数**:

- `$array1` (必选): 第一个数组。
- `$...` (可选): 其他要合并的数组。

**返回值**:
返回合并后的数组。

**示例**:

**示例 1**: 合并两个数组

```php
$array1 = ["color" => "red", 2, 4];
$array2 = ["a", "b", "color" => "green", "shape" => "trapezoid", 4];
$result = array_merge($array1, $array2);
print_r($result);
// 输出:
// Array
// (
//     [color] => green
//     [0] => 2
//     [1] => 4
//     [2] => a
//     [3] => b
//     [shape] => trapezoid
//     [4] => 4
// )
```

### 2.3 array_keys

返回数组中所有的键名。

**函数原型**:

```php
array array_keys ( array $array [, mixed $search_value [, bool $strict = false ]] )
```

**参数**:

- `$array` (必选): 输入的数组。
- `$search_value` (可选): 需要搜索的值。
- `$strict` (可选): 是否进行严格类型比较。默认是 false。

**返回值**:
返回数组中的所有键名组成的数组。如果指定了 `$search_value`，则返回匹配该值的键名组成的数组。

**示例**:

**示例 1**: 获取数组的所有键名

```php
$arr = ["name" => "John", "age" => 30, "city" => "New York"];
$keys = array_keys($arr);
print_r($keys);
// 输出:
// Array
// (
//     [0] => name
//     [1] => age
//     [2] => city
// )
```

**示例 2**: 获取指定值的键名

```php
$arr = ["a", "b", "a"];
$keys = array_keys($arr, "a");
print_r($keys);
// 输出:
// Array
// (
//     [0] => 0
//     [1] => 2
// )
```

### 2.4 array_values

返回数组中所有的值，并将键名重新索引。

**函数原型**:

```php
array array_values ( array $array )
```

**参数**:

- `$array` (必选): 输入的数组。

**返回值**:
返回数组中的所有值组成的数组，并且键名重新索引。

**示例**:

**示例 1**: 获取数组的所有值

```php
$arr = ["name" => "John", "age" => 30, "city" => "New York"];
$values = array_values($arr);
print_r($values);
// 输出:
// Array
// (
//     [0] => John
//     [1] => 30
//     [2] => New York
// )
```

### 2.5 array_push

将一个或多个元素压入数组的末尾（入栈）。

**函数原型**:

```php
int array_push ( array &$array , mixed $value1 [, mixed $... ] )
```

**参数**:

- `$array` (必选): 输入的数组。
- `$value1` (必选): 要添加到数组末尾的第一个值。
- `$...` (可选): 要添加到数组末尾的其他值。

**返回值**:
返回数组中元素的个数。

**示例**:

**示例 1**: 在数组末尾添加一个值

```php
$arr = [1, 2, 3];
array_push($arr, 4);
print_r($arr);
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [3] => 4
// )
```

**示例 2**: 在数组末尾添加多个值

```php
$arr = [1, 2, 3];
array_push($arr, 4, 5);
print_r($arr);
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
//     [3] => 4
//     [4] => 5
// )
```

### 2.6 array_pop

将数组最后一个元素弹出（出栈）。

**函数原型**:

```php
mixed array_pop ( array &$array )
```

**参数**:

- `$array` (必选): 输入的数组。

**返回值**:
返回数组最后一个值，如果数组为空则返回 NULL。

**示例**:

**示例 1**: 移除数组末尾的一个值

```php
$arr = [1, 2, 3];
$value = array_pop($arr);
echo $value; // 输出: 3
print_r($arr);
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 2
// )
```

## 3. 文件处理函数

### 3.1 file_get_contents

将文件内容读入一个字符串。

**函数原型**:

```php
string file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = 0 [, int $maxlen ]]]] )
```

**参数**:

- `$filename` (必选): 要读取的文件的路径。
- `$use_include_path` (可选): 是否在 include_path 中查找文件。默认为 false。
- `$context` (可选): 一个有效的上下文资源，创建自 `stream_context_create()`。
- `$offset` (可选): 从文件的指定位置开始读取。默认是 0。
- `$maxlen` (可选): 读取的最大长度。默认是读取整个文件。

**返回值**:
返回文件内容的字符串。如果失败，返回 false。

**示例**:

```php
$filename = 'example.txt';
$content = file_get_contents($filename);
echo $content;
```

### 3.2 file_put_contents

将一个字符串写入文件。

**函数原型**:

```php
int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )
```

**参数**:

- `$filename` (必选): 要写入数据的文件路径。
- `$data` (必选): 要写入的数据。可以是字符串、数组或流资源。
- `$flags` (可选): 文件写入的标志。可选的值包括 `FILE_USE_INCLUDE_PATH`, `FILE_APPEND`, `LOCK_EX` 等。
- `$context` (可选): 一个有效的上下文资源，创建自 `stream_context_create()`。

**返回值**:
返回写入的字节数。如果失败，返回 false。

**示例**:

**示例 1**: 写入字符串到文件

```php
$filename = 'example.txt';
$data = "Hello, World!";
$bytes_written = file_put_contents($filename, $data);
echo $bytes_written; // 输出: 写入的字节数
```

**示例 2**: 追加字符串到文件
```php
$data = "Append this text.";
$bytes_written = file_put_contents($filename, $data, FILE_APPEND);
echo $bytes_written; // 输出: 写入的字节数
```

## 4. 日期和时间函数

### 4.1 date

格式化本地时间／日期。

**函数原型**:
```php
string date ( string $format [, int $timestamp = time() ] )
```

**参数**:
- `$format` (必选): 输出日期的格式。
- `$timestamp` (可选): 可选的时间戳，默认是当前时间。

**返回值**:
返回格式化后的日期字符串。

**示例**:

**示例 1**: 获取当前日期和时间
```php
echo date('Y-m-d H:i:s'); // 输出: 当前日期和时间
```

**示例 2**: 获取指定时间戳的日期
```php
$timestamp = strtotime('2023-12-31');
echo date('Y-m-d H:i:s', $timestamp); // 输出: 2023-12-31 00:00:00
```

### 4.2 strtotime

将任何英文文本的日期时间描述解析为 Unix 时间戳。

**函数原型**:
```php
int strtotime ( string $time [, int $now = time() ] )
```

**参数**:
- `$time` (必选): 要解析的时间字符串。
- `$now` (可选): 用作基准的时间戳。

**返回值**:
返回解析后的时间戳。如果失败，返回 false。

**示例**:

**示例 1**: 将日期字符串转换为时间戳
```php
$timestamp = strtotime('2023-12-31');
echo $timestamp; // 输出: 对应的时间戳
```

**示例 2**: 将相对时间字符串转换为时间戳
```php
$timestamp = strtotime('next Monday');
echo date('Y-m-d', $timestamp); // 输出: 下一个周一的日期
```

## 5. 类型检查函数

### 5.1 is_array

检查变量是否为数组。

**函数原型**:
```php
bool is_array ( mixed $var )
```

**参数**:
- `$var` (必选): 要检查的变量。

**返回值**:
如果变量是数组则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查一个数组
```php
$arr = [1, 2, 3];
$result = is_array($arr);
var_dump($result); // 输出: bool(true)
```

**示例 2**: 检查一个字符串
```php
$str = "Hello";
$result = is_array($str);
var_dump($result); // 输出: bool(false)
```

### 5.2 is_string

检查变量是否为字符串。

**函数原型**:
```php
bool is_string ( mixed $var )
```

**参数**:
- `$var` (必选): 要检查的变量。

**返回值**:
如果变量是字符串则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查一个字符串
```php
$str = "Hello";
$result = is_string($str);
var_dump($result); // 输出: bool(true)
```

**示例 2**: 检查一个数组
```php
$arr = [1, 2, 3];
$result = is_string($arr);
var_dump($result); // 输出: bool(false)
```

### 5.3 isset

检查变量是否已设置并且非 NULL。

**函数原型**:
```php
bool isset ( mixed $var [, mixed $... ] )
```

**参数**:
- `$var` (必选): 要检查的变量。
- `$...` (可选): 要检查的其他变量。

**返回值**:
如果变量存在且不是 null，则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查单个变量
```php
$a = "Hello";
$result = isset($a);
var_dump($result); // 输出: bool(true)
```

**示例 2**: 检查多个变量
```php
$a = "Hello";
$b = null;
$result = isset($a, $b);
var_dump($result); // 输出: bool(false)
```

### 5.4 unset

销毁指定的变量。

**函数原型**:
```php
void unset ( mixed $var [, mixed $... ] )
```

**参数**:
- `$var` (必选): 要销毁的变量。
- `$...` (可选): 要销毁的其他变量。

**返回值**:
无返回值。

**示例**:

**示例 1**: 销毁单个变量
```php
$a = "Hello";
unset($a);
var_dump(isset($a)); // 输出: bool(false)
```

**示例 2**: 销毁数组中的元素
```php
$arr = ["name" => "John", "age" => 30];
unset($arr["age"]);
print_r($arr);
// 输出:
// Array
// (
//     [name] => John
// )
```

### 5.5 empty

检查一个变量是否为空。

**函数原型**:
```php
bool empty ( mixed $var )
```

**参数**:
- `$var` (必选): 要检查的变量。

**返回值**:
如果变量为空，则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查一个空字符串
```php
$str = "";
$result = empty($str);
var_dump($result); // 输出: bool(true)
```

**示例 2**: 检查一个非空数组
```php
$arr = [1, 2, 3];
$result = empty($arr);
var_dump($result); // 输出: bool(false)
```

## 6. JSON 处理函数

### 6.1 json_encode

将值编码为 JSON 格式。

**函数原型**:
```php
string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] )
```

**参数**:
- `$value` (必选): 要编码的值。
- `$options` (可选): 选项掩码。默认为 0。
- `$depth` (可选): 设置最大递归深度。默认为 512。

**返回值**:
返回 JSON 编码的字符串。

**示例**:

**示例 1**: 将数组编码为 JSON 字符串
```php
$arr = ["name" => "John", "age" => 30, "city" => "New York"];
$json = json_encode($arr);
echo $json; // 输出: {"name":"John","age":30,"city":"New York"}
```

### 6.2 json_decode

将 JSON 字符串解码为 PHP 变量。

**函数原型**:
```php
mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] )
```

**参数**:
- `$json` (必选): 待解码的 JSON 字符串。
- `$assoc` (可选): 当该参数为 true 时，将返回数组。默认是 false，返回对象。
- `$depth` (可选): 用户指定的递归深度。默认是 512。
- `$options` (可选): 位掩码。

**返回值**:
返回解码后的数据。

**示例**:

**示例 1**: 将 JSON 字符串解码为对象
```php
$json = '{"name":"John","age":30,"city":"New York"}';
$obj = json_decode($json);
echo $obj->name; // 输出: John
```

**示例 2**: 将 JSON 字符串解码为数组
```php
$arr = json_decode($json, true);
echo $arr["name"]; // 输出: John
```

## 7. 调试函数

### 7.1 print_r

打印关于变量的易于理解的信息。

**函数原型**:
```php
mixed print_r ( mixed $expression [, bool $return = false ] )
```

**参数**:
- `$expression` (必选): 要输出的变量。
- `$return` (可选): 如果设置为 true，则返回输出字符串而不是直接输出。默认是 false。

**返回值**:
如果 `$return` 为 true，返回输出的字符串，否则返回 true。

**示例**:

**示例 1**: 输出数组
```php
$arr = [1, 2, 3];
print_r($arr);
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )
```

**示例 2**: 返回输出字符串
```php
$arr = [1, 2, 3];
$output = print_r($arr, true);
echo $output;
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )
```

### 7.2 var_dump

打印变量的相关信息。

**函数原型**:
```php
void var_dump ( mixed $expression [, mixed $... ] )
```

**参数**:
- `$expression` (必选): 要输出的变量。

**返回值**:
无返回值。直接输出变量的详细信息。

**示例**:

**示例 1**: 输出变量信息
```php
$var = "Hello";
var_dump($var);
// 输出: string(5) "Hello"
```

**示例 2**: 输出数组信息
```php
$arr = [1, 2, 3];
var_dump($arr);
// 输出:
// array(3) {
//   [0]=>
//   int(1)
//   [1]=>
//   int(2)
//   [2]=>
//   int(3)
// }
```

### 7.3 debug_backtrace

生成一条回溯路径。

**函数原型**:
```php
array debug_backtrace ([ int $options = DEBUG_BACKTRACE_PROVIDE_OBJECT [, int $limit = 0 ]] )
```

**参数**:
- `$options` (可选): 可以用 `DEBUG_BACKTRACE_PROVIDE_OBJECT` 和 `DEBUG_BACKTRACE_IGNORE_ARGS`。默认是 `DEBUG_BACKTRACE_PROVIDE_OBJECT`。
- `$limit` (可选): 限制返回堆栈帧的数量。默认是 0（无限制）。

**返回值**:
返回一个关联数组，描述回溯路径。

**示例**:

**示例 1**: 打印回溯路径
```php
function first() {
second();
}

function second() {
third();
}

function third() {
print_r(debug_backtrace());
}

first();
```

### 7.4 debug_print_backtrace

打印一条回溯路径。

**函数原型**:
```php
void debug_print_backtrace ([ int $options = 0 [, int $limit = 0 ]] )
```

**参数**:
- `$options` (可选): 可以用 `DEBUG_BACKTRACE_IGNORE_ARGS`。
- `$limit` (可选): 限制返回堆栈帧的数量。默认是 0（无限制）。

**返回值**:
无返回值。直接输出回溯路径。

**示例**:

**示例 1**: 打印回溯路径
```php
function first() {
second();
}

function second() {
third();
}

function third() {
debug_print_backtrace();
}

first();
```

## 8. 数学函数

### 8.1 abs

返回一个数的绝对值。

**函数原型**:
```php
number abs ( mixed $number )
```

**参数**:
- `$number` (必选): 需要计算绝对值的数字。

**返回值**:
返回数字的绝对值。

**示例**:

**示例 1**: 计算正数的绝对值
```php
$result = abs(4.2);
echo $result; // 输出: 4.2
```

**示例 2**: 计算负数的绝对值
```php
$result = abs(-4.2);
echo $result; // 输出: 4.2
```

### 8.2 ceil

将数值向上取整。

**函数原型**:
```php
float ceil ( float $value )
```

**参数**:
- `$value` (必选): 要向上取整的值。

**返回值**:
返回不小于 $value 的下一个整数值。

**示例**:

**示例 1**: 将 4.2 向上取整
```php
$result = ceil(4.2);
echo $result; // 输出: 5
```

**示例 2**: 将 -3.8 向上取整
```php
$result = ceil(-3.8);
echo $result; // 输出: -3
```

### 8.3 floor

将数值向下取整。

**函数原型**:
```php
float floor ( float $value )
```

**参数**:
- `$value` (必选): 要向下取整的值。

**返回值**:
返回不大于 $value 的下一个整数值。

**示例**:

**示例 1**: 将 4.8 向下取整
```php
$result = floor(4.8);
echo $result; // 输出: 4
```

**示例 2**: 将 -3.2 向下取整
```php
$result = floor(-3.2);
echo $result; // 输出: -4
```

### 8.4 max

返回提供的参数中的最大值。

**函数原型**:
```php
mixed max ( array $values )
mixed max ( mixed $value1 [, mixed $... ] )
```

**参数**:
- `$values` (必选): 一个包含要检查的值的数组。
- `$value1` (必选): 要检查的第一个值。
- `$...` (可选): 其他要检查的值。

**返回值**:
返回提供的参数中的最大值。如果有多个参数，则返回最大值。如果只有一个参数并且是数组，则返回数组中的最大值。

**示例**:

**示例 1**: 找出多个值中的最大值
```php
$max_value = max(1, 3, 5, 7, 9);
echo $max_value; // 输出: 9
```

**示例 2**: 找出数组中的最大值
```php
$arr = [1, 3, 5, 7, 9];
$max_value = max($arr);
echo $max_value; // 输出: 9
```

### 8.5 min

返回提供的参数中的最小值。

**函数原型**:
```php
mixed min ( array $values )
mixed min ( mixed $value1 [, mixed $... ] )
```

**参数**:
- `$values` (必选): 一个包含要检查的值的数组。
- `$value1` (必选): 要检查的第一个值。
- `$...` (可选): 其他要检查的值。

**返回值**:
返回提供的参数中的最小值。如果有多个参数，则返回最小值。如果只有一个参数并且是数组，则返回数组中的最小值。

**示例**:

**示例 1**: 找出多个值中的最小值
```php
$min_value = min(1, 3, 5, 7, 9);
echo $min_value; // 输出: 1
```

**示例 2**: 找出数组中的最小值
```php
$arr = [1, 3, 5, 7, 9];
$min_value = min($arr);
echo $min_value; // 输出: 1
```

### 8.6 pow

返回 base 的 exp 次方。

**函数原型**:
```php
number pow ( number $base , number $exp )
```

**参数**:
- `$base` (必选): 底数。
- `$exp` (必选): 指数。

**返回值**:
返回 base 的 exp 次方。

**示例**:

**示例 1**: 计算 2 的 3 次方
```php
$result = pow(2, 3);
echo $result; // 输出: 8
```

**示例 2**: 计算 5 的 2 次方
```php
$result = pow(5, 2);
echo $result; // 输出: 25
```

### 8.7 sqrt

返回数字的平方根。

**函数原型**:
```php
float sqrt ( float $arg )
```

**参数**:
- `$arg` (必选): 输入的数字。

**返回值**:
返回数字的平方根。

**示例**:

**示例 1**: 计算 16 的平方根
```php
$result = sqrt(16);
echo $result; // 输出: 4
```

**示例 2**: 计算 25 的平方根
```php
$result = sqrt(25);
echo $result; // 输出: 5
```

## 9. 其他常用函数

### 9.1 intval

获取变量的整数值。

**函数原型**:
```php
int intval ( mixed $var [, int $base = 10 ] )
```

**参数**:
- `$var` (必选): 需要转换的变量。
- `$base` (可选): 进制，默认是 10。

**返回值**:
返回变量的整数值。

**示例**:

**示例 1**: 将字符串转换为整数
```php
$var = "123";
$int = intval($var);
echo $int; // 输出: 123
```

**示例 2**: 将浮点数转换为整数
```php
$var = 123.45;
$int = intval($var);
echo $int; // 输出: 123
```

### 9.2 floatval

获取变量的浮点值。

**函数原型**:
```php
float floatval ( mixed $var )
```

**参数**:
- `$var` (必选): 需要转换的变量。

**返回值**:
返回变量的浮点值。

**示例**:

**示例 1**: 将字符串转换为浮点数
```php
$var = "123.45";
$float = floatval($var);
echo $float; // 输出: 123.45
```

**示例 2**: 将整数转换为浮点数
```php
$var = 123;
$float = floatval($var);
echo $float; // 输出: 123
```

### 9.3 boolval

获取变量的布尔值。

**函数原型**:
```php
bool boolval ( mixed $var )
```

**参数**:
- `$var` (必选): 需要转换的变量。

**返回值**:
返回变量的布尔值。

**示例**:

**示例 1**: 将字符串转换为布尔值
```php
$var = "Hello";
$bool = boolval($var);
var_dump($bool); // 输出: bool(true)
```

**示例 2**: 将整数转换为布尔值
```php
$var = 0;
$bool = boolval($var);
var_dump($bool); // 输出: bool(false)
```

### 9.4 print

输出一个或多个字符串。

**函数原型**:
```php
int print ( string $arg )
```

**参数**:
- `$arg` (必选): 要输出的字符串。

**返回值**:
总是返回 1。

**示例**:

**示例 1**: 输出一个字符串
```php
print("Hello, World!"); // 输出: Hello, World!
```

### 9.5 echo

输出一个或多个字符串。

**函数原型**:
```php
void echo ( string $arg1 [, string $... ] )
```

**参数**:
- `$arg1` (必选): 要输出的第一个字符串。
- `$...` (可选): 其他要输出的字符串。

**返回值**:
无返回值。

**示例**:

**示例 1**: 输出一个字符串
```php
echo "Hello, World!"; // 输出: Hello, World!
```

**示例 2**: 输出多个字符串
```php
echo "Hello", ", ", "World", "!"; // 输出: Hello, World!
```

### 9.6 serialize

生成一个可存储的值的表示。

**函数原型**:
```php
string serialize ( mixed $value )
```

**参数**:
- `$value` (必选): 需要序列化的值。

**返回值**:
返回序列化后的字符串。

**示例**:

**示例 1**: 序列化数组
```php
$arr = ["name" => "John", "age" => 30, "city" => "New York"];
$serialized = serialize($arr);
echo $serialized;
// 输出: a:3:{s:4:"name";s:4:"John";s:3:"age";i:30;s:4:"city";s:8:"New York";}
```

### 9.7 unserialize

从已存储的表示中创建 PHP 的值。

**函数原型**:
```php
mixed unserialize ( string $str [, array $options = array() ] )
```

**参数**:
- `$str` (必选): 要解序列化的字符串。
- `$options` (可选): 一个选项数组。

**返回值**:
返回解序列化后的值。

**示例**:

**示例 1**: 解序列化字符串
```php
$str = 'a:3:{s:4:"name";s:4:"John";s:3:"age";i:30;s:4:"city";s:8:"New York";}';
$arr = unserialize($str);
print_r($arr);
// 输出:
// Array
// (
//     [name] => John
//     [age] => 30
//     [city] => New York
// )
```

## 10. URL 处理函数

### 10.1 urlencode

对字符串进行 URL 编码。

**函数原型**:
```php
string urlencode ( string $str )
```

**参数**:
- `$str` (必选): 需要编码的字符串。

**返回值**:
返回 URL 编码后的字符串。

**示例**:

**示例 1**: 对字符串进行 URL 编码
```php
$str = "Hello World!";
$encoded = urlencode($str);
echo $encoded; // 输出: Hello%20World%21
```

### 10.2 urldecode

对 URL 编码后的字符串进行解码。

**函数原型**:
```php
string urldecode ( string $str )
```

**参数**:
- `$str` (必选): 需要解码的字符串。

**返回值**:
返回解码后的字符串。

**示例**:

**示例 1**: 对 URL 编码后的字符串进行解码
```php
$str = "Hello%20World%21";
$decoded = urldecode($str);
echo $decoded; // 输出: Hello World!
```

### 10.3 parse_url

解析 URL，返回其组成部分。

**函数原型**:
```php
mixed parse_url ( string $url [, int $component = -1 ] )
```

**参数**:
- `$url` (必选): 要解析的 URL。
- `$component` (可选): 指定要返回的特定组成部分。

**返回值**:
返回一个关联数组，包含 URL 的组成部分。如果指定了 `$component`，则返回一个字符串（如果成功）或 false（如果失败）。

**示例**:

**示例 1**: 解析 URL 并返回其组成部分
```php
$url = "https://www.example.com:8080/path?arg=value#anchor";
$parsed_url = parse_url($url);
print_r($parsed_url);
// 输出:
// Array
// (
//     [scheme] => https
//     [host] => www.example.com
//     [port] => 8080
//     [path] => /path
//     [query] => arg=value
//     [fragment] => anchor
// )
```

**示例 2**: 解析 URL 并返回指定组成部分
```php
$url = "https://www.example.com:8080/path?arg=value#anchor";
$host = parse_url($url, PHP_URL_HOST);
echo $host; // 输出: www.example.com
```

### 10.4 http_build_query

生成 URL-编码后的请求字符串。

**函数原型**:
```php
string http_build_query ( mixed $query_data [, string $numeric_prefix [, string $arg_separator = null [, int $encoding_type = PHP_QUERY_RFC1738 ]]] )
```

**参数**:
- `$query_data` (必选): 要生成请求字符串的数组或对象。
- `$numeric_prefix` (可选): 为数值索引的数组元素指定的前缀。
- `$arg_separator` (可选): 参数之间的分隔符。
- `$encoding_type` (可选): 编码类型。

**返回值**:
返回 URL-编码后的请求字符串。

**示例**:

**示例 1**: 生成 URL-编码后的请求字符串
```php
$data = ["name" => "John", "age" => 30, "city" => "New York"];
$query_string = http_build_query($data);
echo $query_string; // 输出: name=John&age=30&city=New+York
```

**示例 2**: 生成带有数值索引前缀的请求字符串
```php
$data = ["apple", "banana", "cherry"];
$query_string = http_build_query($data, "fruit_");
echo $query_string; // 输出: fruit_0=apple&fruit_1=banana&fruit_2=cherry
```

## 11. 数组函数

### 11.1 array_slice

从数组中取出一段。

**函数原型**:
```php
array array_slice ( array $array , int $offset [, int $length = null [, bool $preserve_keys = false ]] )
```

**参数**:
- `$array` (必选): 输入的数组。
- `$offset` (必选): 开始位置。
- `$length` (可选): 返回的数组长度。
- `$preserve_keys` (可选): 是否保留原数组的键。

**返回值**:
返回数组中的一段。

**示例**:

**示例 1**: 从数组中取出一段
```php
$input = ["a", "b", "c", "d", "e"];
$slice = array_slice($input, 2, 2);
print_r($slice);
// 输出:
// Array
// (
//     [0] => c
//     [1] => d
// )
```

**示例 2**: 从数组中取出一段并保留键
```php
$slice = array_slice($input, 2, 2, true);
print_r($slice);
// 输出:
// Array
// (
//     [2] => c
//     [3] => d
// )
```

### 11.2 array_splice

去掉数组中的某一部分并用其他值取代。

**函数原型**:
```php
array array_splice ( array &$input , int $offset [, int $length = count($input) [, mixed $replacement = array() ]] )
```

**参数**:
- `$input` (必选): 输入的数组。
- `$offset` (必选): 开始位置。
- `$length` (可选): 删除的元素个数。
- `$replacement` (可选): 替换的数组。

**返回值**:
返回移除的元素组成的数组。

**示例**:

**示例 1**: 从数组中删除一段
```php
$input = ["red", "green", "blue", "yellow"];
$removed = array_splice($input, 2);
print_r($removed);
// 输出:
// Array
// (
//     [0] => blue
//     [1] => yellow
// )
print_r($input);
// 输出:
// Array
// (
//     [0] => red
//     [1] => green
// )
```

**示例 2**: 从数组中删除一段并替换
```php
$input = ["red", "green", "blue", "yellow"];
$removed = array_splice($input, 2, 1, ["black", "maroon"]);
print_r($removed);
// 输出:
// Array
// (
//     [0] => blue
// )
print_r($input);
// 输出:
// Array
// (
//     [0] => red
//     [1] => green
//     [2] => black
//     [3] => maroon
//     [4] => yellow
// )
```

### 11.3 array_combine

创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值。

**函数原型**:
```php
array array_combine ( array $keys , array $values )
```

**参数**:
- `$keys` (必选): 键名数组。
- `$values` (必选): 值数组。

**返回值**:
返回合并后的数组。

**示例**:

**示例 1**: 合并键名数组和值数组
```php
$keys = ["name", "age", "city"];
$values = ["John", 30, "New York"];
$combined = array_combine($keys, $values);
print_r($combined);
// 输出:
// Array
// (
//     [name] => John
//     [age] => 30
//     [city] => New York
// )
```

### 11.4 array_key_exists

检查给定的键名或索引是否存在于数组中。

**函数原型**:
```php
bool array_key_exists ( mixed $key , array $array )
```

**参数**:
- `$key` (必选): 要检查的键名或索引。
- `$array` (必选): 输入的数组。

**返回值**:
如果键名或索引存在于数组中则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查键名是否存在
```php
$arr = ["name" => "John", "age" => 30];
$exists = array_key_exists("name", $arr);
var_dump($exists); // 输出: bool(true)
```

**示例 2**: 检查键名是否不存在
```php
$exists = array_key_exists("city", $arr);
var_dump($exists); // 输出: bool(false)
```

### 11.5 array_unique

移除数组中的重复值。

**函数原型**:
```php
array array_unique ( array $array [, int $sort_flags = SORT_STRING ] )
```

**参数**:
- `$array` (必选): 输入的数组。
- `$sort_flags` (可选): 排序类型标志。

**返回值**:
返回去重后的数组。

**示例**:

**示例 1**: 移除数组中的重复值
```php
$arr = ["a", "b", "a", "c", "b"];
$unique = array_unique($arr);
print_r($unique);
// 输出:
// Array
// (
//     [0] => a
//     [1] => b
//     [3] => c
// )
```

### 11.6 in_array

检查数组中是否存在某个值。

**函数原型**:
```php
bool in_array ( mixed $needle , array $haystack [, bool $strict = false ] )
```

**参数**:
- `$needle` (必选): 要搜索的值。
- `$haystack` (必选): 搜索的数组。
- `$strict` (可选): 是否启用严格类型比较。

**返回值**:
如果找到则返回 true，否则返回 false。

**示例**:

**示例 1**: 检查数组中是否存在某个值
```php
$arr = ["apple", "banana", "cherry"];
$exists = in_array("banana", $arr);
var_dump($exists); // 输出: bool(true)
```

**示例 2**: 检查数组中是否不存在某个值
```php
$exists = in_array("grape", $arr);
var_dump($exists); // 输出: bool(false)
```

### 11.7 array_search

在数组中搜索给定的值，如果成功则返回相应的键名。

**函数原型**:
```php
mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )
```

**参数**:
- `$needle` (必选): 要搜索的值。
- `$haystack` (必选): 搜索的数组。
- `$strict` (可选): 是否启用严格类型比较。

**返回值**:
如果找到则返回相应的键名，否则返回 false。

**示例**:

**示例 1**: 在数组中搜索值并返回键名
```php
$arr = ["apple", "banana", "cherry"];
$key = array_search("banana", $arr);
echo $key; // 输出: 1
```

**示例 2**: 搜索不存在的值
```php
$key = array_search("grape", $arr);
var_dump($key); // 输出: bool(false)
```

### 11.8 array_reverse

返回单元顺序相反的数组。

**函数原型**:
```php
array array_reverse ( array $array [, bool $preserve_keys = false ] )
```

**参数**:
- `$array` (必选): 输入的数组。
- `$preserve_keys` (可选): 是否保留原来的键。

**返回值**:
返回单元顺序相反的数组。

**示例**:

**示例 1**: 返回单元顺序相反的数组
```php
$arr = ["a", "b", "c"];
$reversed = array_reverse($arr);
print_r($reversed);
// 输出:
// Array
// (
//     [0] => c
//     [1] => b
//     [2] => a
// )
```

**示例 2**: 返回单元顺序相反且保留键名的数组
```php
$arr = ["a" => 1, "b" => 2, "c" => 3];
$reversed = array_reverse($arr, true);
print_r($reversed);
// 输出:
// Array
// (
//     [c] => 3
//     [b] => 2
//     [a] => 1
// )
```

### 11.9 array_filter

用回调函数过滤数组中的单元。

**函数原型**:
```php
array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] )
```

**参数**:
- `$array` (必选): 输入的数组。
- `$callback` (可选): 如果没有提供，将删除输入数组中值为 false 的条目。
- `$flag` (可选): 决定传递给回调函数的参数。默认为 0。

**返回值**:
返回过滤后的数组。

**示例**:

**示例 1**: 用回调函数过滤数组
```php
$arr = [1, 2, 3, 4, 5];
$filtered = array_filter($arr, function($value) {
return $value % 2 == 0;
});
print_r($filtered);
// 输出:
// Array
// (
//     [1] => 2
//     [3] => 4
// )
```

### 11.10 array_map

将回调函数作用到给定数组的单元上。

**函数原型**:
```php
array array_map ( callable $callback , array $array1 [, array $... ] )
```

**参数**:
- `$callback` (必选): 回调函数。
- `$array1` (必选): 数组。
- `$...` (可选): 其他数组。

**返回值**:
返回回调函数作用后的数组。

**示例**:

**示例 1**: 将回调函数作用到数组
```php
$arr = [1, 2, 3, 4, 5];
$squared = array_map(function($value) {
return $value * $value;
}, $arr);
print_r($squared);
// 输出:
// Array
// (
//     [0] => 1
//     [1] => 4
//     [2] => 9
//     [3] => 16
//     [4] => 25
// )
```

### 11.11 array_reduce

用回调函数迭代地将数组简化为单一的值。

**函数原型**:
```php
mixed array_reduce ( array $array , callable $callback [, mixed $initial = null ] )
```

**参数**:
- `$array` (必选): 输入的数组。
- `$callback` (必选): 回调函数。
- `$initial` (可选): 初始值。

**返回值**