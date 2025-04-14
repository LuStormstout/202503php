# PHP 输出和调试方法

## echo 和 print
用于输出字符串或变量。

### echo
可以输出一个或多个字符串，速度稍快。

#### 用法
```php
echo(string $arg1, string ...$args): void
```

#### 示例
```php
<?php
// 输出单个字符串
echo "Hello, World!";  // 输出：Hello, World!

// 输出多个字符串
echo "Hello, ", "World!";  // 输出：Hello, World!
?>
```

### print
只能输出一个字符串，返回值为 1。

#### 用法
```php
print(string $arg): int
```

#### 示例
```php
<?php
// 输出字符串
print "Hello, World!";  // 输出：Hello, World!
?>
```

## print_r()
用于打印人类可读的信息，适合打印数组和对象。

#### 用法
```php
print_r(mixed $expression, bool $return = false): string|bool
```
- $expression：要打印的数组或对象。
- $return：是否返回打印结果而不是直接输出（可选）。

#### 示例
```php
<?php
// 定义数组
$array = ["name" => "John", "age" => 30];
// 打印数组
print_r($array);
// 输出：Array ( [name] => John [age] => 30 )
?>
```

## var_dump()
打印变量的详细信息，包括类型和值。

#### 用法
```php
var_dump(mixed $expression, mixed ...$expressions): void
```
- $expression：要打印的变量。

#### 示例
```php
<?php
// 定义变量
$var = ["name" => "John", "age" => 30];
// 打印变量信息
var_dump($var);
// 输出：array(2) { ["name"]=> string(4) "John" ["age"]=> int(30) }
?>
```

## var_export()
输出或返回一个变量的字符串表示，类似于 var_dump，但返回的是有效的 PHP 代码。

#### 用法
```php
var_export(mixed $expression, bool $return = false): string|null
```
- $expression：要打印的变量。
- $return：是否返回打印结果而不是直接输出（可选）。

#### 示例
```php
<?php
// 定义变量
$var = ["name" => "John", "age" => 30];
// 打印变量信息
var_export($var);
// 输出：array ( 'name' => 'John', 'age' => 30, )
?>
```

## debug_backtrace()
生成一个关于调用函数的信息的背踪表。

#### 用法
```php
debug_backtrace(int $options = DEBUG_BACKTRACE_PROVIDE_OBJECT, int $limit = 0): array
```
- $options：选项标志（可选）。
- $limit：限制返回堆栈帧的数量（可选）。

#### 示例
```php
<?php
function a() {
    b();
}
function b() {
    c();
}
function c() {
    var_dump(debug_backtrace());
}
a();
// 输出：包含调用堆栈的详细信息
?>
```

## error_log()
将错误信息发送到指定的错误处理机制。

#### 用法
```php
error_log(string $message, int $message_type = 0, string $destination = null, string $extra_headers = null): bool
```
- $message：要记录的错误消息。
- $message_type：消息类型（可选）。
- $destination：消息的目标位置（可选）。
- $extra_headers：额外的头信息（可选）。

#### 示例
```php
<?php
// 将错误信息记录到服务器的错误日志
error_log("This is an error message.");
?>
```
