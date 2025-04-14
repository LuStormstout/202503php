# PHP 判空和检查变量函数

## empty()
检查一个变量是否为空。如果变量不存在或其值等于 false，则返回 true。常用于表单验证。

#### 用法
```php
empty(mixed $var): bool
```
- $var：要检查的变量。

#### 示例
```php
<?php
$var1 = "";
$var2 = "Hello";
$var3 = 0;

echo empty($var1);  // 输出：1 (true)
echo empty($var2);  // 输出： (false)
echo empty($var3);  // 输出：1 (true)
?>
```

## isset()
检查一个变量是否已设置并且非 null。如果变量存在且其值不为 null，则返回 true。常用于检查表单提交的字段。

#### 用法
```php
isset(mixed $var, mixed ...$vars): bool
```
- $var：要检查的变量。

#### 示例
```php
<?php
$var1 = "Hello";
$var2;

echo isset($var1);  // 输出：1 (true)
echo isset($var2);  // 输出： (false)
?>
```

## is_null()
检查一个变量是否为 null。如果变量的值为 null，则返回 true。常用于数据库查询结果验证。

#### 用法
```php
is_null(mixed $var): bool
```
- $var：要检查的变量。

#### 示例
```php
<?php
$var1 = null;
$var2 = "Hello";

echo is_null($var1);  // 输出：1 (true)
echo is_null($var2);  // 输出： (false)
?>
```

## 对比

| 函数     | 检查条件                               | 结果                                    |
|----------|----------------------------------------|-----------------------------------------|
| empty()  | 变量不存在或值等于 false               | 返回 true                               |
| isset()  | 变量存在且值不为 null                  | 返回 true                               |
| is_null()| 变量值为 null                          | 返回 true                               |

### 示例对比
```php
<?php
$var1 = "";
$var2 = null;
$var3 = 0;
$var4 = "Hello";

echo empty($var1);  // 输出：1 (true)
echo empty($var2);  // 输出：1 (true)
echo empty($var3);  // 输出：1 (true)
echo empty($var4);  // 输出： (false)

echo isset($var1);  // 输出：1 (true)
echo isset($var2);  // 输出：1 (true)
echo isset($var3);  // 输出：1 (true)
echo isset($var4);  // 输出：1 (true)

echo is_null($var1);  // 输出： (false)
echo is_null($var2);  // 输出：1 (true)
echo is_null($var3);  // 输出： (false)
echo is_null($var4);  // 输出： (false)
?>
```

### 使用场景对比
1. **empty()**: 常用于表单验证，检查输入是否为空。
2. **isset()**: 常用于检查表单提交的字段，确保变量存在。
3. **is_null()**: 常用于数据库查询结果验证，检查变量是否为 null。

### 小结
- 使用 `empty()` 可以检查变量是否为空，包括 0、""、null、false 等。
- 使用 `isset()` 可以确保变量已设置且不为 null。
- 使用 `is_null()` 可以明确检查变量是否为 null。

