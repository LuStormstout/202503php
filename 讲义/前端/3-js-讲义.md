# JavaScript 零基础 - 讲义

---

## 第一章：JavaScript 基础概念

### 1. 什么是 JavaScript？

JavaScript（简称 JS）是一种轻量、解释型的编程语言，主要用于网页的动态交互。

- **特性**：
  1. 跨平台：可以在不同操作系统和浏览器上运行。
  2. 动态类型：无需定义变量类型。
  3. 面向对象：支持对象和类的定义。
  4. 异步：支持事件驱动和异步编程。

---

### 2. JavaScript 的作用

1. **动态网页内容**：改变网页元素、添加动画效果。
2. **事件响应**：处理用户的点击、键盘输入等交互。
3. **数据处理**：与后端服务器通信，动态加载数据。
4. **全栈开发**：使用 Node.js 编写服务器端代码。

---

### 3. 引入 JavaScript 的方式

#### **内嵌脚本**

直接将 JavaScript 写在 HTML 的 `<script>` 标签中：
```
<!DOCTYPE html>
<html>
  <head>
    <title>JS 示例</title>
  </head>
  <body>
    <script>
      alert("欢迎学习 JavaScript！");
    </script>
  </body>
</html>
```

#### **外部脚本**

将 JavaScript 代码写入独立的文件（如 `script.js`），通过 `<script>` 引入：
```
<script src="script.js"></script>
```

---

## 第二章：变量与数据类型

### 1. 声明变量的方式

JavaScript 提供三种声明变量的关键字：`var`、`let` 和 `const`。

#### **var**（全局或函数作用域）

示例：
```
var name = "张三"; // 定义变量
console.log(name); // 输出：张三
```

特点：
- 声明的变量会被提升到当前作用域顶部（变量提升）。
- 存在重复声明的问题。

---

#### **let**（块级作用域）

示例：
```
let age = 25; // 定义年龄
console.log(age); // 输出：25
```

特点：
- 作用域仅限于所在的代码块。
- 不允许重复声明。

---

#### **const**（块级作用域，声明常量）

示例：
```
const PI = 3.14; // 定义常量
console.log(PI); // 输出：3.14
```

特点：
- 一旦声明，值不能被修改。
- 必须立即初始化。

---

### 2. 数据类型

JavaScript 提供 8 种数据类型：

#### **基本数据类型**

1. `Number`：数字类型（整数和浮点数）。
   ```
   let num = 42;       // 整数
   let pi = 3.14;      // 浮点数
   ```

2. `String`：字符串，用单引号或双引号表示。
   ```
   let name = "张三";
   let greeting = '你好';
   ```

3. `Boolean`：布尔值，只有 `true` 和 `false`。
   ```
   let isLoggedIn = true;
   ```

4. `Undefined`：未初始化的变量。
   ```
   let value;
   console.log(value); // 输出：undefined
   ```

5. `Null`：表示空值。
   ```
   let empty = null;
   console.log(empty); // 输出：null
   ```

#### **复杂数据类型**

1. `Object`：对象是属性的集合。
   ```
   let person = {
     name: "张三",
     age: 30,
     isStudent: false
   };
   console.log(person.name); // 输出：张三
   ```

2. `Array`：数组是一个有序列表。
   ```
   let numbers = [1, 2, 3, 4];
   console.log(numbers[0]); // 输出：1
   ```

3. `Function`：函数是可调用的代码块。
   ```
   function greet(name) {
     return "你好，" + name;
   }
   console.log(greet("张三")); // 输出：你好，张三
   ```

---

### 3. 类型检测

使用 `typeof` 运算符检测变量类型：
```
console.log(typeof 42);       // 输出：number
console.log(typeof "张三");   // 输出：string
console.log(typeof true);     // 输出：boolean
console.log(typeof undefined);// 输出：undefined
console.log(typeof null);     // 输出：object（这是 JavaScript 的设计缺陷）
console.log(typeof {});       // 输出：object
console.log(typeof []);       // 输出：object
console.log(typeof function(){}); // 输出：function
```

---

## 第三章：运算符

JavaScript 提供多种运算符，用于执行各种操作。

---

### 1. 算术运算符

```
let a = 10;
let b = 5;

console.log(a + b); // 加法：输出 15
console.log(a - b); // 减法：输出 5
console.log(a * b); // 乘法：输出 50
console.log(a / b); // 除法：输出 2
console.log(a % b); // 取余：输出 0
console.log(a ** 2); // 幂运算：输出 100
```

---

### 2. 比较运算符

```
let x = 10;
let y = 20;

console.log(x > y);  // 输出：false
console.log(x < y);  // 输出：true
console.log(x >= y); // 输出：false
console.log(x <= y); // 输出：true
console.log(x == "10"); // 输出：true（类型转换后比较）
console.log(x === "10"); // 输出：false（全等，不转换类型）
console.log(x != y);  // 输出：true
console.log(x !== y); // 输出：true
```

---

### 3. 逻辑运算符

```
let a = true;
let b = false;

console.log(a && b); // 逻辑与：输出 false
console.log(a || b); // 逻辑或：输出 true
console.log(!a);     // 逻辑非：输出 false
```

---

## 第四章：控制结构（流程控制）
# JavaScript 控制结构与函数 - 详细讲解

---

## 第四章：控制结构（流程控制）

控制结构用于控制代码的执行流程，主要包括条件语句和循环结构。

---

### 1. 条件语句

#### **if...else 语句**

根据条件执行不同的代码：
```
let age = 18;

if (age >= 18) {
  console.log("你是成年人。");
} else {
  console.log("你未满 18 岁。");
}
```

---

#### **if...else if...else 语句**

处理多个条件：
```
let score = 85;

if (score >= 90) {
  console.log("优秀");
} else if (score >= 60) {
  console.log("及格");
} else {
  console.log("不及格");
}
```

---

#### **三元运算符**

简化条件语句：
```
let isMember = true;
let price = isMember ? 100 : 150; // 如果是会员，价格为 100，否则为 150
console.log(price);
```

---

#### **switch 语句**

适用于多分支情况：
```
let day = 3;

switch (day) {
  case 1:
    console.log("星期一");
    break;
  case 2:
    console.log("星期二");
    break;
  case 3:
    console.log("星期三");
    break;
  default:
    console.log("无效的输入");
}
```

---

### 2. 循环结构

#### **for 循环**

语法：
```
for (初始化; 条件; 迭代) {
  // 循环体
}
```

示例：
```
for (let i = 0; i < 5; i++) {
  console.log("当前值为：" + i);
}
```

---

#### **while 循环**

只要条件为真，就执行循环体：
```
let count = 0;

while (count < 5) {
  console.log("计数：" + count);
  count++;
}
```

---

#### **do...while 循环**

先执行一次循环体，然后检查条件：
```
let count = 0;

do {
  console.log("计数：" + count);
  count++;
} while (count < 5);
```

---

#### **for...in 循环**

用于遍历对象的属性：
```
let person = { name: "张三", age: 25, city: "北京" };

for (let key in person) {
  console.log(key + ": " + person[key]);
}
```

---

#### **for...of 循环**

用于遍历可迭代对象（如数组、字符串）：
```
let fruits = ["苹果", "香蕉", "橘子"];

for (let fruit of fruits) {
  console.log(fruit);
}
```

---

#### **循环控制**

1. **break**：立即跳出循环。
   ```
   for (let i = 0; i < 10; i++) {
     if (i === 5) break;
     console.log(i);
   }
   ```

2. **continue**：跳过当前循环的剩余部分，直接进入下一次循环。
   ```
   for (let i = 0; i < 10; i++) {
     if (i % 2 === 0) continue;
     console.log(i);
   }
   ```

---

## 第五章：函数

JavaScript 中的函数是代码块，可以重复使用或封装逻辑。

---

### 1. 定义函数

#### **函数声明**

```
function add(a, b) {
  return a + b;
}

let sum = add(10, 20); // 调用函数
console.log(sum); // 输出：30
```

---

#### **函数表达式**

将函数赋值给变量：
```
let multiply = function (a, b) {
  return a * b;
};

console.log(multiply(10, 5)); // 输出：50
```

---

#### **箭头函数**

语法简洁，尤其适用于简单函数：
```
let divide = (a, b) => a / b;

console.log(divide(10, 2)); // 输出：5
```

---

### 2. 函数参数

#### **默认参数**

可以为函数参数设置默认值：
```
function greet(name = "游客") {
  console.log("你好，" + name + "！");
}

greet(); // 输出：你好，游客！
greet("张三"); // 输出：你好，张三！
```

---

#### **剩余参数**

通过 `...` 收集多个参数为数组：
```
function sum(...numbers) {
  let total = 0;
  for (let num of numbers) {
    total += num;
  }
  return total;
}

console.log(sum(1, 2, 3, 4)); // 输出：10
```

---

#### **参数解构**

可以解构对象或数组作为函数参数：
```
function display({ name, age }) {
  console.log("姓名：" + name);
  console.log("年龄：" + age);
}

let person = { name: "李四", age: 28 };
display(person);
```

---

### 3. 函数的返回值

使用 `return` 返回结果：
```
function square(num) {
  return num * num;
}

console.log(square(5)); // 输出：25
```

如果没有 `return`，函数返回 `undefined`。

---

### 4. 递归函数

递归函数在函数内部调用自身，常用于处理树形结构或计算阶乘。

示例：计算阶乘
```
function factorial(n) {
  if (n === 1) return 1;
  return n * factorial(n - 1);
}

console.log(factorial(5)); // 输出：120
```

// 递归函数
// 递归函数是指在函数体内调用函数本身
// 这个例子中, sumArray 函数是一个递归函数, 用于计算数组中所有元素的和
```
function sumArray(arr) {
    // 如果数组为空，返回0
    if (arr.length === 0) {
        return 0;
    }
    // 取出数组的第一个元素，加上剩余部分的和
    return arr[0] + sumArray(arr.slice(1));
}

// 测试
const numbers = [1, 2, 3, 4, 5];
console.log(sumArray(numbers)); // 输出：15
```

---

### 5. 闭包

闭包是指能够访问其外部作用域变量的函数。

```
function outer() {
  let count = 0;
  return function inner() {
    count++;
    console.log(count);
  };
}

let counter = outer();
counter(); // 输出：1
counter(); // 输出：2
```

**特点：**
- 闭包可以访问定义时的外部变量，即使该作用域已经销毁。
- 常用于创建私有变量或封装逻辑。

---

# JavaScript 高级特性与实践 - 事件处理、对象和类、异步操作

---

## 第六章：事件处理

JavaScript 事件是用户与网页交互的核心。通过监听和处理事件，可以让网页更具动态性。

---

### 1. 常见事件类型

#### **鼠标事件**
- `click`：鼠标点击。
- `dblclick`：鼠标双击。
- `mouseover`：鼠标悬停。
- `mouseout`：鼠标移出。

#### **键盘事件**
- `keydown`：按下键盘。
- `keyup`：释放键盘。
  
获取键盘按下的「值」
```
// 监听键盘按下事件
document.addEventListener('keydown', function(event) {
  // 获取按下的键值
  const key = event.key; // 按下的键
  const keyCode = event.code; // 键盘的物理按键代码

  // 显示按下的键值
  document.getElementById('output').textContent = `你按下了: "${key}" (Code: ${keyCode})`;
});
```

#### **窗口事件**
- `load`：页面加载完成。
- `resize`：窗口大小改变。

#### **表单事件**
- `submit`：提交表单。
- `change`：表单值改变。

---

### 2. 事件监听

#### **添加事件监听**

使用 `addEventListener` 方法添加事件监听：
```
let button = document.querySelector("button");

button.addEventListener("click", function () {
  alert("按钮被点击了！");
});
```

---

#### **移除事件监听**

使用 `removeEventListener` 方法移除事件监听：
```
function handleClick() {
  alert("按钮被点击了！");
}

button.addEventListener("click", handleClick);

// 移除事件监听
button.removeEventListener("click", handleClick);
```

---

### 3. 事件对象

事件对象（`event`）提供事件相关的信息。

#### **常用属性**
- `event.type`：事件类型。
- `event.target`：事件触发的元素。
- `event.preventDefault()`：阻止默认行为。
- `event.stopPropagation()`：阻止事件冒泡。

示例：
```
let link = document.querySelector("a");

link.addEventListener("click", function (event) {
  event.preventDefault(); // 阻止链接跳转
  console.log("默认行为被阻止");
});
```

示例代码：阻止事件冒泡
```
.parent {
  width: 200px;
  height: 200px;
  background-color: lightblue;
  padding: 20px;
}
.child {
  width: 100px;
  height: 100px;
  background-color: lightcoral;
}

<div class="parent" onclick="alert('Parent Div Clicked!')">
  <div class="child" onclick="childClick(event)">Click Me</div>
</div>

function childClick(event) {
  alert('Child Div Clicked!');
  // 阻止事件冒泡
  event.stopPropagation();
}
```

---

## 第七章：对象与类

JavaScript 中的对象是核心概念，几乎所有内容都是对象。

---

### 1. 对象基础

#### **创建对象**

1. **对象字面量**
   ```
   let person = {
     name: "张三",
     age: 25,
     greet: function () {
       console.log("你好，我叫" + this.name);
     },
   };

   person.greet(); // 输出：你好，我叫张三
   ```

2. **使用构造函数**
   ```
   function Person(name, age) {
     this.name = name;
     this.age = age;
   }

   let student = new Person("李四", 22);
   console.log(student.name); // 输出：李四
   ```

---

### 2. 类与继承

#### **定义类**

使用 `class` 关键字定义类：
```
class Animal {
  constructor(name) {
    this.name = name;
  }

  speak() {
    console.log(this.name + " 发出了声音");
  }
}

let dog = new Animal("狗");
dog.speak(); // 输出：狗 发出了声音
```

---

#### **类的继承**

使用 `extends` 实现继承：
```
class Dog extends Animal {
  speak() {
    console.log(this.name + " 汪汪叫");
  }
}

let puppy = new Dog("小狗");
puppy.speak(); // 输出：小狗 汪汪叫
```

---

## 第八章：异步操作

JavaScript 的异步操作是其强大功能之一，常用于处理耗时任务（如网络请求）。

---

### 1. 回调函数

回调函数是最基础的异步处理方式：
```
function fetchData(callback) {
  setTimeout(() => {
    console.log("数据加载完成");
    callback();
  }, 2000);
}

fetchData(() => {
  console.log("回调函数被调用");
});
```

---

### 2. Promise

Promise 是一种更优雅的异步处理方式。

#### **创建 Promise**

```
let promise = new Promise((resolve, reject) => {
  let success = true;

  if (success) {
    resolve("操作成功");
  } else {
    reject("操作失败");
  }
});

promise
  .then((message) => {
    console.log("成功：" + message);
  })
  .catch((error) => {
    console.log("失败：" + error);
  });
```

---

### 3. async/await

`async/await` 是基于 Promise 的语法糖，使异步代码更易读。

```
function fetchData() {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("数据加载完成");
    }, 2000);
  });
}

async function getData() {
  console.log("开始加载数据...");
  let result = await fetchData();
  console.log(result); // 输出：数据加载完成
}

getData();
```

---

## 第九章：JavaScript 综合案例

以下是一个通过 JavaScript 实现的动态计时器功能：

---

### 动态计时器

HTML：
```
<!DOCTYPE html>
<html>
  <head>
    <title>计时器</title>
  </head>
  <body>
    <h1 id="timer">0</h1>
    <button id="start">开始</button>
    <button id="stop">停止</button>
    <button id="reset">重置</button>
    <script src="script.js"></script>
  </body>
</html>
```

JavaScript（`script.js`）：
```
let timer = document.getElementById("timer");
let startButton = document.getElementById("start");
let stopButton = document.getElementById("stop");
let resetButton = document.getElementById("reset");

let count = 0;
let interval;

startButton.addEventListener("click", () => {
  if (!interval) {
    interval = setInterval(() => {
      count++;
      timer.textContent = count;
    }, 1000);
  }
});

stopButton.addEventListener("click", () => {
  clearInterval(interval);
  interval = null;
});

resetButton.addEventListener("click", () => {
  clearInterval(interval);
  interval = null;
  count = 0;
  timer.textContent = count;
});
```

---

# JavaScript 进阶与实用 - 模块化、错误处理、DOM 操作

---

## 第十章：模块化

模块化是现代 JavaScript 的核心特性，用于分离代码逻辑，提升可读性和可维护性。

---

### 1. ES6 模块化

#### **导出模块**

通过 `export` 导出变量、函数或类：
```
/* utils.js */
export const PI = 3.14;

export function add(a, b) {
  return a + b;
}

export class Circle {
  constructor(radius) {
    this.radius = radius;
  }

  area() {
    return PI * this.radius ** 2;
  }
}
```

#### **导入模块**

使用 `import` 引入其他文件的模块：
```
/* main.js */
import { PI, add, Circle } from "./utils.js";

console.log("圆周率：" + PI);
console.log("求和：" + add(10, 20));

let circle = new Circle(5);
console.log("圆的面积：" + circle.area());
```

#### **默认导出**

每个文件只能有一个默认导出：
```
/* utils.js */
export default function greet(name) {
  return `你好，${name}！`;
}

/* main.js */
import greet from "./utils.js";
console.log(greet("张三"));
```

---

### 2. CommonJS 模块化（Node.js 环境）

#### **导出模块**

使用 `module.exports`：
```
/* utils.js */
module.exports = {
  add: (a, b) => a + b,
};
```

#### **导入模块**

使用 `require`：
```
/* main.js */
const utils = require("./utils");
console.log(utils.add(10, 20)); // 输出：30
```

---

## 第十一章：错误处理

JavaScript 提供强大的错误处理机制，用于捕获并处理代码中的异常。

---

### 1. try...catch

使用 `try...catch` 捕获运行时错误：
```
try {
  let result = 10 / 0;
  console.log("结果：" + result);
} catch (error) {
  console.error("发生错误：" + error.message);
}
```

---

### 2. throw 抛出错误

使用 `throw` 主动抛出异常：
```
function divide(a, b) {
  if (b === 0) {
    throw new Error("除数不能为 0");
  }
  return a / b;
}

try {
  console.log(divide(10, 0));
} catch (error) {
  console.error(error.message);
}
```

---

### 3. finally 块

无论是否发生异常，`finally` 块都会执行：
```
try {
  console.log("开始计算...");
  let result = 10 / 2;
  console.log("结果：" + result);
} catch (error) {
  console.error("发生错误：" + error.message);
} finally {
  console.log("计算结束。");
}
```

---

## 第十二章：DOM 操作

Document Object Model（DOM）是 JavaScript 操作网页内容的接口。

---

### 1. 访问 DOM 元素

#### **通过 ID 获取元素**

```
let heading = document.getElementById("title");
console.log(heading.textContent); // 获取元素文本内容
```

#### **通过类名获取元素**

```
let items = document.getElementsByClassName("item");
console.log(items[0].textContent); // 输出第一个类名为 item 的元素内容
```

#### **通过标签名获取元素**

```
let paragraphs = document.getElementsByTagName("p");
console.log(paragraphs.length); // 输出段落数量
```

#### **通过选择器获取元素**

```
let button = document.querySelector(".btn"); // 获取第一个匹配的元素
let allButtons = document.querySelectorAll(".btn"); // 获取所有匹配的元素
console.log(allButtons.length);
```

---

### 2. 修改 DOM 元素

#### **修改文本内容**

```
let heading = document.getElementById("title");
heading.textContent = "新的标题";
```

#### **修改属性**

```
let link = document.querySelector("a");
link.setAttribute("href", "https://example.com");
link.textContent = "访问新链接";
```

#### **修改样式**

```
let box = document.querySelector(".box");
box.style.backgroundColor = "lightblue";
box.style.border = "2px solid black";
```

---

### 3. 添加与移除元素

#### **添加元素**

使用 `appendChild` 方法：
```
let list = document.getElementById("list");
let newItem = document.createElement("li");
newItem.textContent = "新列表项";
list.appendChild(newItem);
```

#### **移除元素**

使用 `removeChild` 方法：
```
let list = document.getElementById("list");
let item = document.querySelector("li");
list.removeChild(item);
```

---

### 4. 事件处理

#### **添加事件监听器**

```
let button = document.querySelector("button");
button.addEventListener("click", () => {
  alert("按钮被点击！");
});
```

#### **移除事件监听器**

```
function handleClick() {
  alert("按钮被点击！");
}

button.addEventListener("click", handleClick);
button.removeEventListener("click", handleClick); // 移除事件
```

---

## 第十三章：JavaScript 综合案例

以下是一个简单的待办事项应用。

---

### 待办事项应用

HTML：
```
<!DOCTYPE html>
<html>
  <head>
    <title>待办事项</title>
  </head>
  <body>
    <h1>待办事项</h1>
    <input id="todo-input" type="text" placeholder="添加新的待办事项">
    <button id="add-btn">添加</button>
    <ul id="todo-list"></ul>
    <script src="script.js"></script>
  </body>
</html>
```

JavaScript（`script.js`）：
```
let input = document.getElementById("todo-input");
let addButton = document.getElementById("add-btn");
let todoList = document.getElementById("todo-list");

addButton.addEventListener("click", () => {
  let text = input.value.trim();
  if (text) {
    let listItem = document.createElement("li");
    listItem.textContent = text;

    let deleteButton = document.createElement("button");
    deleteButton.textContent = "删除";
    deleteButton.addEventListener("click", () => {
      todoList.removeChild(listItem);
    });

    listItem.appendChild(deleteButton);
    todoList.appendChild(listItem);

    input.value = ""; // 清空输入框
  } else {
    alert("请输入内容！");
  }
});
```

---

还有如正则表达式、ES6+ 特性等...
