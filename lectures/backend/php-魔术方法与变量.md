# PHP 魔术方法和魔术变量详解

PHP 中的魔术方法和魔术变量是一些预定义的特殊方法和变量，它们用于实现类的特殊行为或者提供有用的调试信息。以下是 PHP 中常见的魔术方法和魔术变量的详细解释和示例：

## 魔术方法 (Magic Methods)

### `__construct()`

`__construct()` 方法在创建对象时自动调用，用于初始化对象的属性。

#### 示例：

```php
<?php
class MyClass {
    public function __construct() {
        echo "对象已创建";
    }
}

$obj = new MyClass(); // 输出：对象已创建
?>
```

### `__destruct()`

`__destruct()` 方法在对象被销毁前自动调用，用于释放资源等清理工作。

#### 示例：

```php
<?php
class MyClass {
    public function __destruct() {
        echo "对象已销毁";
    }
}

$obj = new MyClass();
unset($obj); // 输出：对象已销毁
?>
```

### `__get($property)`

`__get($property)` 方法在访问不可访问属性时自动调用，可以用来动态获取对象的属性值。

#### 示例：

```php
<?php
class MyClass {
    private $data = ['name' => 'John', 'age' => 30];

    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        } else {
            return null;
        }
    }
}

$obj = new MyClass();
echo $obj->name; // 输出：John
?>
```

### `__set($property, $value)`

`__set($property, $value)` 方法在设置不可访问属性时自动调用，可以用来动态设置对象的属性值。

#### 示例：

```php
<?php
class MyClass {
    private $data = [];

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }

    public function __get($property) {
        return $this->data[$property];
    }
}

$obj = new MyClass();
$obj->name = 'John';
echo $obj->name; // 输出：John
?>
```

### `__isset($property)`

`__isset($property)` 方法在检查不可访问属性是否已设置时自动调用，用来判断属性是否存在。

#### 示例：

```php
<?php
class MyClass {
    private $data = ['name' => 'John'];

    public function __isset($property) {
        return isset($this->data[$property]);
    }
}

$obj = new MyClass();
var_dump(isset($obj->name)); // 输出：bool(true)
?>
```

### `__unset($property)`

`__unset($property)` 方法在销毁不可访问属性时自动调用，用来清除对象的属性值。

#### 示例：

```php
<?php
class MyClass {
    private $data = ['name' => 'John'];

    public function __unset($property) {
        unset($this->data[$property]);
    }

    public function __get($property) {
        return $this->data[$property];
    }
}

$obj = new MyClass();
unset($obj->name);
echo $obj->name; // 输出：Notice: Undefined property: MyClass::$name
?>
```

### `__call($method, $arguments)`

`__call($method, $arguments)` 方法在调用不可访问方法时自动调用，用来处理动态调用类的方法。

#### 示例：

```php
<?php
class MyClass {
    public function __call($method, $arguments) {
        echo "调用方法：$method，参数：" . implode(', ', $arguments);
    }
}

$obj = new MyClass();
$obj->testMethod('参数1', '参数2'); // 输出：调用方法：testMethod，参数：参数1, 参数2
?>
```

### `__toString()`

`__toString()` 方法在将对象转换为字符串时自动调用，用来返回对象的字符串表示。

#### 示例：

```php
<?php
class MyClass {
    public function __toString() {
        return "这是 MyClass 的字符串表示";
    }
}

$obj = new MyClass();
echo $obj; // 输出：这是 MyClass 的字符串表示
?>
```

### `__invoke($arg)`

`__invoke($arg)` 方法在将对象作为函数调用时自动调用，用来实现对象的可调用性。

#### 示例：

```php
<?php
class MyClass {
    public function __invoke($arg) {
        echo "调用 MyClass 对象，并传入参数：$arg";
    }
}

$obj = new MyClass();
$obj('参数'); // 输出：调用 MyClass 对象，并传入参数：参数
?>
```

### `__clone()`

`__clone()` 方法在对象被复制时自动调用，用来控制对象复制的行为。

#### 示例：

```php
<?php
class MyClass {
    public function __clone() {
        echo "对象已复制";
    }
}

$obj1 = new MyClass();
$obj2 = clone $obj1; // 输出：对象已复制
?>
```

## 魔术变量 (Magic Variables)

### `$this`

`$this` 是一个指向当前对象的指针，可以在类的方法中使用，用来访问当前对象的属性和方法。

#### 示例：

```php
<?php
class MyClass {
    private $name = 'John';

    public function getName() {
        return $this->name;
    }
}

$obj = new MyClass();
echo $obj->getName(); // 输出：John
?>
```

### `__LINE__`

`__LINE__` 包含了当前行号的数字，在 PHP 脚本中使用。

#### 示例：

```php
<?php
echo "当前行号：" . __LINE__; // 输出：当前行号：1
?>
```

### `__FILE__`

`__FILE__` 包含了当前文件的完整路径和文件名，在 PHP 脚本中使用。

#### 示例：

```php
<?php
echo "当前文件：" . __FILE__;
?>
```

### `__DIR__`

`__DIR__` 包含了当前文件的目录名，在 PHP 脚本中使用。

#### 示例：

```php
<?php
echo "当前目录：" . __DIR__;
?>
```

### `__FUNCTION__`

`__FUNCTION__` 包含了当前函数的名称，在 PHP 函数内部使用。

#### 示例：

```php
<?php
function testFunction() {
    echo "当前函数名：" . __FUNCTION__;
}

testFunction(); // 输出：当前函数名：testFunction
?>
```

### `__CLASS__`

`__CLASS__` 包含了当前类的名称，在 PHP 类内部使用。

#### 示例：

```php
<?php
class MyClass {
    public function getClassName() {
        return __CLASS__;
    }
}

$obj = new MyClass();
echo "当前类名：" . $obj->getClassName(); // 输出：当前类名：MyClass
?>
```

### `__TRAIT__`

`__TRAIT__` 包含了当前 trait 的名称，在 PHP trait 内部使用。

#### 示例：

```php
<?php
trait MyTrait {
    public function getTraitName() {
        return __TRAIT__;
    }
}

class MyClass {
    use MyTrait;
}

$obj = new MyClass();
echo "当前 trait 名称：" . $obj->getTraitName(); // 输出：当前 trait 名称：MyTrait
?>
```

### `__METHOD__`

`__METHOD__` 包含了当前方法的类名和方法名，在 PHP 类的方法内部使用。

#### 示例：

```php
<?php
class MyClass {
    public function getMethodName() {
        return __METHOD__;
    }
}

$obj = new MyClass();
echo "当前方法名：" . $obj->getMethodName(); // 输出：当前方法名：MyClass::getMethodName
?>
```

### `__NAMESPACE__`

`__NAMESPACE__` 包含了当前命名空间的名称，在 PHP 命名空间内部使用。

#### 示例：

```php
<?php
namespace MyNamespace;

echo "当前命名空间：" . __NAMESPACE__;
?>
```