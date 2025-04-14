# PHP 培训讲义

## 第3周：后端基础（PHP）和数据库（MySQL）

### 第15天：面向对象编程（类、对象、继承、多态、接口）

#### 类和对象
PHP 中的类和对象是面向对象编程（OOP）的核心概念。一个类是一个模板，定义了一组属性和方法；一个对象是一个类的实例。

- **类（Class）**：类是面向对象编程中的一个概念，它是具有相同属性和方法的一组对象的抽象。
- **对象（Object）**：对象是类的一个实例，通过类的模板创建，并拥有类中定义的属性和方法。

```php
<?php
// 定义一个简单的类
class Car {
    // 属性
    public $color; // 颜色
    public $model; // 型号
    
    // 构造函数
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    
    // 方法
    public function display() {
        echo "这辆车是 " . $this->color . " 颜色的 " . $this->model . " 型号。n";
    }
}

// 创建对象
$myCar = new Car("红色", "宝马");
// 调用对象的方法
$myCar->display(); // 输出：这辆车是 红色 颜色的 宝马 型号。
?>
```

#### 继承
继承是面向对象编程的重要特性，可以让一个类继承另一个类的属性和方法。

- **继承（Inheritance）**：继承是指一个类（子类）继承另一个类（父类）的属性和方法，使子类具有父类的功能。

```php
<?php
// 定义一个父类
class Vehicle {
    public $brand; // 品牌
    
    public function __construct($brand) {
        $this->brand = $brand;
    }
    
    public function showBrand() {
        echo "品牌是: " . $this->brand . "n";
    }
}

// 定义一个子类，继承 Vehicle 类
class Car extends Vehicle {
    public $model; // 型号
    
    public function __construct($brand, $model) {
        parent::__construct($brand); // 调用父类的构造函数
        $this->model = $model;
    }
    
    public function showModel() {
        echo "型号是: " . $this->model . "n";
    }
}

// 创建子类对象
$myCar = new Car("宝马", "X5");
$myCar->showBrand(); // 输出：品牌是: 宝马
$myCar->showModel(); // 输出：型号是: X5
?>
```

#### 多态
多态性允许你调用在不同类中实现的方法，而无需在调用时知道具体的类是哪一个。

- **多态（Polymorphism）**：多态是指同一方法可以作用于不同的对象上，并且表现出不同的行为。多态通过接口和继承来实现。

```php
<?php
// 定义一个接口
interface Shape {
    public function draw();
}

// 实现接口的类
class Circle implements Shape {
    public function draw() {
        echo "画一个圆形。n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "画一个正方形。n";
    }
}

// 多态性
function drawShape(Shape $shape) {
    $shape->draw();
}

$circle = new Circle();
$square = new Square();

drawShape($circle); // 输出：画一个圆形。
drawShape($square); // 输出：画一个正方形。
?>
```

#### 接口
接口是定义了一组方法的集合，但不包含方法的实现。类可以实现多个接口。

- **接口（Interface）**：接口是一个定义方法的集合，但不包含具体实现。接口提供了一个协议，类可以实现这些方法，从而保证类具有某种特定的行为。

```php
<?php
// 定义接口
interface Animal {
    public function makeSound();
}

// 实现接口的类
class Dog implements Animal {
    public function makeSound() {
        echo "狗叫: 汪汪。n";
    }
}

class Cat implements Animal {
    public function makeSound() {
        echo "猫叫: 喵喵。n";
    }
}

// 使用接口
$dog = new Dog();
$cat = new Cat();

$dog->makeSound(); // 输出：狗叫: 汪汪。
$cat->makeSound(); // 输出：猫叫: 喵喵。
?>
```

### 第16天：数据库基础知识（关系数据库、表、行、列）

#### 关系数据库
关系数据库是一种使用表格来表示数据及其关系的数据库。每个表都有一个唯一的名字，由行和列组成。

- **关系数据库（Relational Database）**：关系数据库使用二维表（行和列）来存储数据，通过表与表之间的关系来管理数据。

#### 表
表是数据库中的基本存储单位。每个表有一个表名，并包含若干行和列。

- **表（Table）**：表是数据库中的一种结构，用来存储数据。表由行和列组成，每个表都有一个唯一的名字。

#### 行和列
行代表具体的记录，列代表记录的属性。

- **行（Row）**：行是表中的一条记录，包含了该记录的所有数据。
- **列（Column）**：列是表中的一个字段，表示记录的某个属性。

```sql
-- 创建一个名为 students 的表
CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY, -- 学生 ID，自动递增
name VARCHAR(100), -- 学生姓名
age INT, -- 学生年龄
grade VARCHAR(10) -- 学生年级
);

-- 插入数据
INSERT INTO students (name, age, grade) VALUES ('张三', 18, 'A');
INSERT INTO students (name, age, grade) VALUES ('李四', 20, 'B');
```

### 第17天：MySQL 的基本使用

#### 安装 MySQL
你可以通过不同的方法安装 MySQL，这里以 Ubuntu 系统为例：

- **安装（Installation）**：安装 MySQL 是将 MySQL 软件包下载并安装到计算机上的过程。

```bash
sudo apt update
sudo apt install mysql-server
sudo mysql_secure_installation
```

#### 启动和登录 MySQL
启动 MySQL 服务并登录：

- **启动 MySQL（Start MySQL）**：启动 MySQL 服务，使其可以运行并接受连接。
- **登录 MySQL（Login MySQL）**：使用用户名和密码登录 MySQL 数据库系统。

```bash
sudo systemctl start mysql
sudo mysql -u root -p
```

#### 创建数据库和表
创建数据库是指在 MySQL 中创建一个新的数据库，用于存储和管理数据。

- **创建数据库（Create Database）**：在 MySQL 中创建一个新的数据库，用于存储相关数据。

```sql
CREATE DATABASE school;
```

- **创建表（Create Table）**：在数据库中创建一个新的表，用于存储相关数据。

```sql
USE school; -- 选择数据库
CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
age INT,
grade VARCHAR(10)
);
```

#### 插入数据
插入数据是指将新记录添加到表中。

- **插入数据（Insert Data）**：将新的记录插入到表中。

```sql
INSERT INTO students (name, age, grade) VALUES ('王五', 19, 'C');
```

### 第18天：基本的 SQL 语句（增删改查）

#### 插入数据
插入数据是指将新记录添加到表中。

- **插入数据（Insert Data）**：将新的记录插入到表中。

```sql
INSERT INTO students (name, age, grade) VALUES ('赵六', 21, 'B');
```

#### 查询数据
查询数据是指从表中检索记录。

- **查询数据（Select Data）**：从表中检索数据记录。

```sql
SELECT * FROM students;
```

#### 更新数据
更新数据是指修改表中的现有记录。

- **更新数据（Update Data）**：修改表中的现有数据记录。

```sql
UPDATE students SET grade = 'A+' WHERE name = '李四';
```

#### 删除数据
删除数据是指从表中移除记录。

- **删除数据（Delete Data）**：从表中删除数据记录。

```sql
DELETE FROM students WHERE name = '张三';
```

### 第19天：复杂查询和多表操作

#### 复杂查询
复杂查询是指使用多个条件和多种 SQL 语法从表中检索数据。

- **复杂查询（Complex Query）**：使用复杂条件从表中检索数据。

```sql
-- 使用 WHERE 子句进行条件查询
SELECT * FROM students WHERE age > 18;

-- 使用 AND 和 OR 进行组合条件查询
SELECT * FROM students WHERE age > 18 AND grade = 'B';
SELECT * FROM students WHERE age > 18 OR grade = 'A';

-- 使用 LIKE 进行模糊查询
SELECT * FROM students WHERE name LIKE '张%';
```

#### 多表操作
多表操作是指在查询中同时使用多个表。

- **多表操作（Multi-table Operations）**：在查询中同时使用多个表，通过表之间的关系进行数据检索。

##### INNER JOIN
```sql
-- 创建另一个表 courses
CREATE TABLE courses (
id INT AUTO_INCREMENT PRIMARY KEY, -- 课程 ID，自动递增
name VARCHAR(100), -- 课程名称
teacher VARCHAR(100) -- 授课老师
);

-- 插入数据
INSERT INTO courses (name, teacher) VALUES ('数学', '刘老师');
INSERT INTO courses (name, teacher) VALUES ('英语', '王老师');

-- 创建一个表 student_courses 记录学生和课程的关系
CREATE TABLE student_courses (
student_id INT,
course_id INT,
FOREIGN KEY (student_id) REFERENCES students(id),
FOREIGN KEY (course_id) REFERENCES courses(id)
);

-- 插入关系数据
INSERT INTO student_courses (student_id, course_id) VALUES (1, 1);
INSERT INTO student_courses (student_id, course_id) VALUES (1, 2);
INSERT INTO student_courses (student_id, course_id) VALUES (2, 1);

-- 使用 INNER JOIN 进行多表查询
SELECT students.name AS student_name, courses.name AS course_name
FROM students
INNER JOIN student_courses ON students.id = student_courses.student_id
INNER JOIN courses ON student_courses.course_id = courses.id;
```

##### LEFT JOIN
```sql
-- 使用 LEFT JOIN 查询所有学生及其选修的课程
SELECT students.name AS student_name, courses.name AS course_name
FROM students
LEFT JOIN student_courses ON students.id = student_courses.student_id
LEFT JOIN courses ON student_courses.course_id = courses.id;
```

##### RIGHT JOIN
```sql
-- 使用 RIGHT JOIN 查询所有课程及其选修的学生
SELECT students.name AS student_name, courses.name AS course_name
FROM students
RIGHT JOIN student_courses ON students.id = student_courses.student_id
RIGHT JOIN courses ON student_courses.course_id = courses.id;
```

#### MySQL 中的一些方法的使用

##### COUNT()
```sql
-- 统计学生人数
SELECT COUNT(*) AS total_students FROM students;
```

##### SUM()
```sql
-- 计算所有学生的年龄总和
SELECT SUM(age) AS total_age FROM students;
```

##### AVG()
```sql
-- 计算所有学生的平均年龄
SELECT AVG(age) AS average_age FROM students;
```

##### MAX() 和 MIN()
```sql
-- 找到学生的最大和最小年龄
SELECT MAX(age) AS max_age, MIN(age) AS min_age FROM students;
```

##### GROUP BY
```sql
-- 按年级分组统计每个年级的学生人数
SELECT grade, COUNT(*) AS total_students
FROM students
GROUP BY grade;
```

##### ORDER BY
```sql
-- 按年龄排序学生
SELECT * FROM students
ORDER BY age DESC;
```

#### MySQL 使用中尤其需要注意的事项

在使用 MySQL 时，有一些最佳实践和注意事项可以帮助你提高数据库的性能和可维护性。

##### 命名规范

- **表名和列名**：使用小写字母和下划线（_）分隔单词，如 `student_courses`。避免使用保留字和特殊字符。
- **索引命名**：命名时可以使用前缀来表示索引类型，例如 `idx_` 表示普通索引，`uni_` 表示唯一索引。

##### 字段类型选择

- **整数类型**：根据数据范围选择合适的整数类型，例如 `TINYINT`、`SMALLINT`、`INT`、`BIGINT`。避免使用比实际需要更大的数据类型。
    - 示例：
      ```sql
      CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      age TINYINT, -- 适用于 0 到 255 范围内的年龄
      score SMALLINT -- 适用于 -32768 到 32767 范围内的分数
      );
      ```
- **字符串类型**：对于固定长度的字符串，使用 `CHAR`；对于可变长度的字符串，使用 `VARCHAR`。长文本使用 `TEXT` 类型，但应避免滥用。
    - 示例：
      ```sql
      CREATE TABLE articles (
      id INT AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(255), -- 可变长度标题
      content TEXT -- 长文本内容
      );
      ```
- **日期和时间类型**：使用合适的日期和时间类型，例如 `DATE`、`TIME`、`DATETIME`、`TIMESTAMP`。根据需求选择合适的精度。
    - 示例：
      ```sql
      CREATE TABLE events (
      id INT AUTO_INCREMENT PRIMARY KEY,
      event_date DATE, -- 日期
      event_time TIME, -- 时间
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- 时间戳
      );
      ```

##### 执行效率

- **索引（Index）**：为经常在 WHERE 子句中使用的列创建索引，可以显著提高查询性能。索引应合理使用，过多的索引会影响插入和更新操作的性能。
    - 示例：
      ```sql
      CREATE TABLE employees (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100),
      department_id INT,
      INDEX idx_department(department_id) -- 为部门 ID 创建索引
      );
      ```
- **避免 SELECT ***：尽量避免使用 `SELECT *`，只查询需要的列，以减少数据传输量。
    - 示例：
      ```sql
      -- 避免
      SELECT * FROM employees;

  -- 推荐
  SELECT name, department_id FROM employees;
  ```
- **限制结果集**：使用 `LIMIT` 限制返回的记录数，尤其在分页查询时。
    - 示例：
      ```sql
      SELECT name, age FROM students LIMIT 10;
      ```
- **使用合适的存储引擎**：根据应用需求选择合适的存储引擎，例如 `InnoDB` 支持事务，适用于大多数应用；`MyISAM` 适用于读操作较多的应用。

##### 优化效率

- **表结构优化**：根据查询需求设计表结构，使用合适的数据类型和长度，避免使用 `NULL` 值，尽量使用 `NOT NULL`。
    - 示例：
      ```sql
      CREATE TABLE products (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL, -- 避免使用 NULL
      price DECIMAL(10, 2) NOT NULL
      );
      ```
- **定期维护**：定期进行数据库维护，如优化表、重建索引等。
    - 示例：
      ```sql
      OPTIMIZE TABLE students;
      ```
- **分区表**：对于大表，可以使用表分区将数据分割成更小的部分，以提高查询性能和管理效率。
    - 示例：
      ```sql
      CREATE TABLE sales (
      id INT AUTO_INCREMENT PRIMARY KEY,
      sale_date DATE,
      amount DECIMAL(10, 2)
      ) PARTITION BY RANGE (YEAR(sale_date)) (
      PARTITION p0 VALUES LESS THAN (2020),
      PARTITION p1 VALUES LESS THAN (2021),
      PARTITION p2 VALUES LESS THAN (2022)
      );
      ```
- **使用缓存**：使用查询缓存来提高查询性能，但要注意缓存的失效和更新机制。

##### 查询优化

- **EXPLAIN 语句**：使用 `EXPLAIN` 语句分析查询语句的执行计划，找出性能瓶颈并进行优化。
    - 示例：
      ```sql
      EXPLAIN SELECT * FROM students WHERE age > 18;
      ```
- **子查询优化**：尽量避免使用子查询，尤其是嵌套子查询。可以使用连接（JOIN）替代子查询，提高查询性能。
    - 示例：
      ```sql
      -- 子查询
      SELECT * FROM students WHERE id IN (SELECT student_id FROM student_courses);

  -- 使用 JOIN 替代子查询
  SELECT students.* FROM students
  JOIN student_courses ON students.id = student_courses.student_id;
  ```
- **避免函数操作列**：在 WHERE 子句中避免对列进行函数操作，这会导致索引失效，影响查询性能。
    - 示例：
      ```sql
      -- 避免
      SELECT * FROM students WHERE YEAR(birth_date) = 2000;

  -- 推荐
  SELECT * FROM students WHERE birth_date BETWEEN '2000-01-01' AND '2000-12-31';
  ```

#### MySQL 方法去重

##### DISTINCT
```sql
-- 查询不重复的年级
SELECT DISTINCT grade FROM students;
```

##### GROUP BY
```sql
-- 按年级分组查询学生人数
SELECT grade, COUNT(*) AS total_students
FROM students
GROUP BY grade;
```

#### MySQL 中的一些方法的使用

##### COUNT()
```sql
-- 统计学生人数
SELECT COUNT(*) AS total_students FROM students;
```

##### SUM()
```sql
-- 计算所有学生的年龄总和
SELECT SUM(age) AS total_age FROM students;
```

##### AVG()
```sql
-- 计算所有学生的平均年龄
SELECT AVG(age) AS average_age FROM students;
```

##### MAX() 和 MIN()
```sql
-- 找到学生的最大和最小年龄
SELECT MAX(age) AS max_age, MIN(age) AS min_age FROM students;
```

##### GROUP BY
```sql
-- 按年级分组统计每个年级的学生人数
SELECT grade, COUNT(*) AS total_students
FROM students
GROUP BY grade;
```

##### ORDER BY
```sql
-- 按年龄排序学生
SELECT * FROM students
ORDER BY age DESC;
```

通过这些注意事项和方法，你可以更有效地使用 MySQL，并确保数据库的性能和数据的一致性。继续学习和实践这些知识，将为你在后端开发中打下坚实的基础。