## 第2周：前端基础

### 第8天：JavaScript进阶

#### 目标

- 掌握JavaScript函数、事件和DOM操作的进阶内容

#### 讲义内容

**JavaScript进阶**

1. **函数**：
    - **函数声明**：
      ```javascript
      function add(a, b) {
          return a + b;
      }
      console.log(add(2, 3)); // 5
      ```

    - **匿名函数**：
      ```javascript
      let subtract = function(a, b) {
          return a - b;
      };
      console.log(subtract(5, 2)); // 3
      ```

    - **箭头函数**：
      ```javascript
      let multiply = (a, b) => a * b;
      console.log(multiply(3, 4)); // 12
      ```

2. **事件**：
    - **事件监听**：
      ```javascript
      let button = document.querySelector("button");
      button.addEventListener("click", function() {
          alert("按钮被点击了！");
      });
      ```

3. **DOM操作**：
    - **选择元素**：
      ```javascript
      let element = document.getElementById("myElement");
      let elements = document.getElementsByClassName("myClass");
      let query = document.querySelector(".myClass");
      ```

    - **修改元素内容**：
      ```javascript
      let header = document.querySelector("h1");
      header.textContent = "新标题";
      ```

    - **动态创建元素**：
      ```javascript
      let newDiv = document.createElement("div");
      newDiv.textContent = "这是一个新创建的div元素";
      document.body.appendChild(newDiv);
      ```

4. **示例**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>JavaScript进阶示例</title>
       <script>
           document.addEventListener("DOMContentLoaded", function() {
               let button = document.getElementById("myButton");
               button.addEventListener("click", function() {
                   let name = document.getElementById("name").value;
                   let greeting = document.getElementById("greeting");
                   greeting.textContent = "Hello, " + name + "!";
               });
           });
       </script>
   </head>
   <body>
       <h1>JavaScript进阶示例</h1>
       <input type="text" id="name" placeholder="输入你的名字">
       <button id="myButton">显示消息</button>
       <div id="greeting"></div>
   </body>
   </html>
   ```

### 第9天：综合练习，制作一个简单的响应式网页

#### 目标

- 综合运用HTML、CSS和JavaScript制作一个简单的响应式网页

#### 讲义内容

**综合练习**

1. **项目要求**：
    - 创建一个包含以下功能的简单响应式网页：
        - 一个标题
        - 一个导航栏
        - 一个内容区，包含一个表单和一个按钮
        - 使用CSS进行样式美化
        - 使用JavaScript进行简单的交互

2. **HTML结构**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>响应式网页示例</title>
       <link rel="stylesheet" href="styles.css">
       <script src="scripts.js" defer></script>
   </head>
   <body>
       <header>
           <h1>我的响应式网页</h1>
           <nav>
               <ul>
                   <li><a href="#home">首页</a></li>
                   <li><a href="#about">关于我们</a></li>
                   <li><a href="#contact">联系我们</a></li>
               </ul>
           </nav>
       </header>
       <main>
           <section id="home">
               <h2>欢迎光临</h2>
               <p>这是一个示例响应式网页。</p>
           </section>
           <section id="about">
               <h2>关于我们</h2>
               <p>我们是一家专注于网页开发的公司。</p>
           </section>
           <section id="contact">
               <h2>联系我们</h2>
               <form>
                   <label for="name">姓名：</label>
                   <input type="text" id="name" name="name">
                   <button type="button" onclick="showMessage()">提交</button>
               </form>
           </section>
       </main>
       <footer>
           <p>&copy; 2023 我的公司</p>
       </footer>
   </body>
   </html>
   ```

3. **CSS样式**：
   ```css
   body {
       font-family: Arial, sans-serif;
       margin: 0;
       padding: 0;
   }
   header {
       background-color: #333;
       color: #fff;
       padding: 1em;
       text-align: center;
   }
   nav ul {
       list-style-type: none;
       padding: 0;
   }
   nav ul li {
       display: inline;
       margin: 0 1em;
   }
   nav ul li a {
       color: #fff;
       text-decoration: none;
   }
   main {
       padding: 1em;
   }
   footer {
       background-color: #333;
       color: #fff;
       text-align: center;
       padding: 1em;
       position: fixed;
       width: 100%;
       bottom: 0;
   }
   ```

4. **JavaScript交互**：
   ```javascript
   function showMessage() {
       let name = document.getElementById("name").value;
       alert("提交成功，" + name + "！");
   }
   ```

### 第10天：PHP基础语法

#### 目标

- 掌握PHP的基本语法，包括变量、数据类型和运算符

#### 讲义内容

**PHP基础语法**

1. **变量声明**：
    - 使用`$`符号声明变量：
      ```php
      <?php
      $name = "Alice";
      $age = 25;
      ?>
      ```

2. **数据类型**：
    - 常见的数据类型：
        - 字符串（String）
        - 整数（Integer）
        - 浮点数（Float）
        - 布尔值（Boolean）
        - 数组（Array）
        - 对象（Object）
      ```php
      <?php
      $str = "Hello, World!";
      $int = 42;
      $float = 3.14;
      $bool = true;
      $arr = array(1, 2, 3);
      class Person {
          public $name;
          public $age;
          public function __construct($name, $age) {
              $this->name = $name;
              $this->age = $age;
          }
      }
      $obj = new Person("Alice", 25);
      ?>
      ```

3. **运算符**：
    - 算术运算符：
      ```php
      <?php
      $sum = 5 + 10; // 加法
      $diff = 15 - 5; // 减法
      $product = 5 * 3; // 乘法
      $quotient = 15 / 3; // 除法
      ?>
      ```

    - 比较运算符：
      ```php
      <?php
      $isEqual = (5 == "5"); // true
      $isStrictEqual = (5 === "5"); // false
      $isNotEqual = (5 != "10"); // true
      $isGreater = (10 > 5); // true
      ?>
      ```

### 第11天：PHP控制结构

#### 目标

- 掌握PHP的条件语句和循环结构

#### 讲义内容

**PHP控制结构**

1. **条件语句**：
    - if语句：
      ```php
      <?php
         if ($age >= 18) {
        echo "你是成年人";
   } else {
   echo "你是未成年人";
   }
   ```

2. **循环结构**：
    - **for循环**：
      ```php
      <?php
      for ($i = 0; $i < 5; $i++) {
          echo "循环次数：" . $i . "<br>";
      }
      ?>
      ```

    - **while循环**：
      ```php
      <?php
      $count = 0;
      while ($count < 5) {
          echo "循环次数：" . $count . "<br>";
          $count++;
      }
      ?>
      ```

    - **foreach循环**：
      ```php
      <?php
      $arr = array(1, 2, 3, 4, 5);
      foreach ($arr as $value) {
          echo "值：" . $value . "<br>";
      }
      ?>
      ```

### 第12天：PHP函数和数组

#### 目标

- 掌握PHP中的函数定义和数组操作

#### 讲义内容

**PHP函数**

1. **函数定义**：
   ```php
   <?php
   function greet($name) {
       return "Hello, " . $name;
   }
   echo greet("Alice");
   ?>
   ```

2. **匿名函数和箭头函数**：
   ```php
   <?php
   $sum = function($a, $b) {
       return $a + $b;
   };
   echo $sum(5, 10); // 15

   $multiply = fn($a, $b) => $a * $b;
   echo $multiply(5, 10); // 50
   ?>
   ```

**PHP数组**

1. **数组定义**：
   ```php
   <?php
   $arr = array(1, 2, 3, 4, 5);
   ?>
   ```

2. **关联数组**：
   ```php
   <?php
   $assoc = array(
       "name" => "Alice",
       "age" => 25,
       "email" => "alice@example.com"
   );
   ?>
   ```

3. **数组操作**：
    - **添加元素**：
      ```php
      <?php
      $arr[] = 6;
      ?>
      ```

    - **删除元素**：
      ```php
      <?php
      unset($arr[0]);
      ?>
      ```

    - **遍历数组**：
      ```php
      <?php
      foreach ($arr as $value) {
          echo $value . "<br>";
      }
      ?>
      ```

### 第13天：综合练习，制作一个简单的动态网页

#### 目标

- 综合运用HTML、CSS、JavaScript和PHP制作一个简单的动态网页

#### 讲义内容

**综合练习**

1. **项目要求**：
    - 创建一个包含以下功能的简单动态网页：
        - 一个标题
        - 一个表单，用户可以输入姓名
        - 使用PHP处理表单数据并显示问候语
        - 使用CSS进行样式美化
        - 使用JavaScript进行简单的交互

2. **HTML结构**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>动态网页示例</title>
       <link rel="stylesheet" href="styles.css">
       <script src="scripts.js" defer></script>
   </head>
   <body>
       <h1>欢迎来到我的网站</h1>
       <form method="POST" action="process.php">
           <label for="name">姓名：</label>
           <input type="text" id="name" name="name">
           <button type="submit">提交</button>
       </form>
       <div id="greeting"></div>
   </body>
   </html>
   ```

3. **CSS样式**：
   ```css
   body {
   font-family: Arial, sans-serif;
   margin: 0;
   padding: 0;
   text-align: center;
   }
   form {
   margin-top: 20px;
   }
   label, input, button {
   font-size: 1em;
   margin: 5px;
   }
   ```

4. **JavaScript交互**：
   ```javascript
   document.addEventListener("DOMContentLoaded", function() {
   let form = document.querySelector("form");
   form.addEventListener("submit", function(event) {
   let name = document.getElementById("name").value;
   if (name === "") {
   event.preventDefault();
   alert("姓名不能为空！");
   }
   });
   });
   ```

5. **PHP处理**：
   ```php
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $name = htmlspecialchars($_POST["name"]);
       echo "<h2>你好，" . $name . "！</h2>";
   }
   ?>
   ```

### 第14天：PHP表单处理和文件操作

#### 目标

- 掌握PHP表单处理和文件操作的基本方法

#### 讲义内容

**PHP表单处理**

1. **表单提交**：
   ```html
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <title>表单处理示例</title>
   </head>
   <body>
       <form method="POST" action="form_process.php">
           <label for="name">姓名：</label>
           <input type="text" id="name" name="name">
           <button type="submit">提交</button>
       </form>
   </body>
   </html>
   ```

2. **处理表单数据**：
   ```php
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $name = htmlspecialchars($_POST["name"]);
       echo "你好，" . $name;
   }
   ?>
   ```

**PHP文件操作**

1. **文件读取**：
   ```php
   <?php
   $file = fopen("example.txt", "r") or die("无法打开文件！");
   while(!feof($file)) {
       echo fgets($file) . "<br>";
   }
   fclose($file);
   ?>
   ```

2. **文件写入**：
   ```php
   <?php
   $file = fopen("example.txt", "w") or die("无法打开文件！");
   $txt = "Hello, World!\n";
   fwrite($file, $txt);
   fclose($file);
   ?>
   ```

3. **文件追加**：
   ```php
   <?php
   $file = fopen("example.txt", "a") or die("无法打开文件！");
   $txt = "Hello, PHP!\n";
   fwrite($file, $txt);
   fclose($file);
   ?>
   ```