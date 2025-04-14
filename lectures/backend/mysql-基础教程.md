# MySQL 基础信息讲义

## 1. MySQL 数据类型

MySQL 支持的所有数据类型可分为以下几类：

---

### 1.1 数值类型

| 数据类型       | 大小（字节） | 取值范围（有符号/无符号）              | 说明                  |
|----------------|--------------|----------------------------------------|-----------------------|
| TINYINT        | 1            | -128 ~ 127 / 0 ~ 255                  | 小整数               |
| SMALLINT       | 2            | -32,768 ~ 32,767 / 0 ~ 65,535         | 中整数               |
| MEDIUMINT      | 3            | -8,388,608 ~ 8,388,607 / 0 ~ 16,777,215 | 较大整数            |
| INT（INTEGER） | 4            | -2,147,483,648 ~ 2,147,483,647 / 0 ~ 4,294,967,295 | 标准整数        |
| BIGINT         | 8            | ±9,223,372,036,854,775,807            | 超大整数             |
| FLOAT(M,D)     | 4            | -3.402823466E+38 ~ 3.402823466E+38    | 单精度浮点数         |
| DOUBLE(M,D)    | 8            | ±1.7976931348623157E+308              | 双精度浮点数         |
| DECIMAL(M,D)   | 变长         | 根据 M 和 D 决定                     | 高精度定点数，适合财务计算 |

**注意：**
1. `M` 表示总长度，包括整数位和小数位。
2. `D` 表示小数位数。

---

### 1.2 字符串类型

| 数据类型       | 最大长度        | 说明                                             |
|----------------|----------------|------------------------------------------------|
| CHAR(M)        | 255 字节        | 固定长度字符串，不足时用空格补齐                 |
| VARCHAR(M)     | 65535 字节      | 可变长度字符串，需额外存储长度信息               |
| TINYTEXT       | 255 字节        | 短文本                                           |
| TEXT           | 65535 字节      | 长文本                                           |
| MEDIUMTEXT     | 16MB            | 中等长度文本                                     |
| LONGTEXT       | 4GB             | 超长文本                                         |
| BLOB           | 4GB             | 二进制数据（如图片、音频、视频）                 |
| ENUM           | 1 ~ 2 字节      | 枚举类型，可选择的值列表                         |
| SET            | 1 ~ 8 字节      | 集合类型，支持多选的值列表                       |
| JSON           | 取决于内容大小 | 存储 JSON 格式的数据                             |

**注意：**
1. `ENUM` 和 `SET` 是特殊的字符串类型，用于存储有限的选项。
2. `JSON` 类型用于存储结构化数据（MySQL 5.7+ 支持）。

---

### 1.3 日期和时间类型

| 数据类型       | 大小（字节）   | 格式                          | 说明                     |
|----------------|----------------|-------------------------------|--------------------------|
| DATE           | 3              | `YYYY-MM-DD`            | 存储日期                 |
| DATETIME       | 8              | `YYYY-MM-DD HH:MM:SS`   | 存储日期和时间           |
| TIMESTAMP      | 4              | `YYYY-MM-DD HH:MM:SS`   | 存储 Unix 时间戳         |
| TIME           | 3              | `HH:MM:SS`              | 存储一天中的时间         |
| YEAR           | 1              | `YYYY`                  | 存储年份（1901~2155）    |

---

## 2. 字段约束（Column Constraints）

| 约束             | 说明                                       |
|------------------|--------------------------------------------|
| NOT NULL         | 字段值不能为空                            |
| DEFAULT          | 设置字段的默认值                          |
| PRIMARY KEY      | 设置主键，唯一标识表中的一条记录          |
| AUTO_INCREMENT   | 自动递增，仅适用于整数类型字段             |
| UNIQUE           | 唯一约束，防止重复值                      |
| FOREIGN KEY      | 外键约束，用于建立表与表之间的关系         |
| CHECK            | 检查约束（MySQL 8.0+ 支持）               |
| ON UPDATE        | 指定字段值被更新时的操作（如更新时间戳）    |

---

## 3. 存储引擎（Storage Engine）

MySQL 支持多种存储引擎，不同引擎有不同的特点：

| 存储引擎 | 特点                                              |
|----------|---------------------------------------------------|
| InnoDB   | 默认存储引擎，支持事务、外键、行级锁定          |
| MyISAM   | 适合读密集型操作，不支持事务和外键              |
| MEMORY   | 数据存储在内存中，适合临时数据和快速访问         |
| ARCHIVE  | 只支持插入和查询，适合存储历史归档数据          |
| CSV      | 数据以 CSV 格式存储，适合导入导出数据            |

---

## 4. 字符集和排序规则

### 4.1 字符集（Character Set）

| 字符集     | 描述                          |
|------------|-------------------------------|
| utf8       | 支持大部分语言，最多 3 字节   |
| utf8mb4    | 完整支持 Unicode，最多 4 字节 |
| latin1     | 单字节字符集，仅支持西欧语言   |

### 4.2 排序规则（Collation）

| 排序规则            | 说明                         |
|----------------------|------------------------------|
| utf8mb4_general_ci   | 不区分大小写，效率较高       |
| utf8mb4_unicode_ci   | 不区分大小写，支持多语言比较 |
| utf8mb4_bin          | 区分大小写，按二进制比较     |

---

## 5. 完整的创建表语法

以下是完整的创建表语法：

```sql
CREATE TABLE 表名 (
字段名 数据类型 [长度] [约束条件],
字段名 数据类型 [长度] [约束条件],
...
PRIMARY KEY (字段名),
FOREIGN KEY (字段名) REFERENCES 其他表(字段名)
[ON DELETE 操作]
[ON UPDATE 操作]
) ENGINE=存储引擎
DEFAULT CHARSET=字符集
COLLATE=排序规则;
```

---

## 6. 创建表的详细示例

以下是一个完整的创建表示例，包含常见的字段类型、约束条件、外键、字符集等：

```sql
CREATE TABLE orders (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,      -- 自增主键
customer_id INT NOT NULL,                        -- 客户 ID，外键
product_id INT NOT NULL,                         -- 产品 ID，外键
quantity INT NOT NULL DEFAULT 1,                 -- 数量，默认值为 1
price DECIMAL(10, 2) NOT NULL,                   -- 价格，精确到小数点后两位
order_date DATETIME NOT NULL,                    -- 下单时间
status ENUM('pending', 'shipped', 'delivered')   -- 订单状态，枚举类型
DEFAULT 'pending',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- 创建时间
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
ON UPDATE CURRENT_TIMESTAMP,                -- 更新时间
FOREIGN KEY (customer_id) REFERENCES customers(id)
ON DELETE CASCADE
ON UPDATE CASCADE,
FOREIGN KEY (product_id) REFERENCES products(id)
ON DELETE SET NULL
ON UPDATE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
```

---

# MySQL 基础信息讲义（补充部分）

## 7. 索引（Index）

索引用于加速查询性能，是数据库优化的重要部分。以下是索引的类型及其使用场景：

### 7.1 索引类型

| 索引类型        | 说明                                                             |
|------------------|------------------------------------------------------------------|
| PRIMARY KEY      | 主键索引，唯一标识表中的每一行记录，默认自动创建唯一索引         |
| UNIQUE           | 唯一索引，确保字段值的唯一性                                   |
| INDEX（普通索引）| 普通索引，加速查询性能                                         |
| FULLTEXT         | 全文索引，用于全文搜索（适用于 CHAR、VARCHAR 和 TEXT 类型）     |
| SPATIAL          | 空间索引，仅适用于 GIS 数据类型                                |

---

### 7.2 创建索引

#### 7.2.1 创建普通索引
```sql
CREATE INDEX idx_column_name ON table_name (column_name);
```

#### 7.2.2 创建唯一索引
```sql
CREATE UNIQUE INDEX idx_unique_name ON table_name (column_name);
```

#### 7.2.3 创建全文索引
```sql
CREATE FULLTEXT INDEX idx_fulltext_name ON table_name (column_name);
```

#### 7.2.4 在创建表时定义索引
```sql
CREATE TABLE example (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(255),
INDEX idx_name (name),            -- 普通索引
UNIQUE KEY idx_email (email),     -- 唯一索引
FULLTEXT KEY idx_fulltext_name (name) -- 全文索引
);
```

---

## 8. 视图（View）

### 8.1 视图的作用
视图是基于 SQL 查询结果的虚拟表，不存储实际数据，主要用于：
1. 简化复杂查询。
2. 提高数据安全性（通过限制用户访问特定字段）。
3. 提高查询的可读性。

---

### 8.2 创建视图

#### 8.2.1 视图创建语法
```sql
CREATE VIEW view_name AS
SELECT column1, column2, ...
FROM table_name
WHERE condition;
```

#### 8.2.2 示例：创建视图
```sql
CREATE VIEW active_users AS
SELECT id, name, email
FROM users
WHERE status = 'active';
```

#### 8.2.3 查询视图
```sql
SELECT * FROM active_users;
```

#### 8.2.4 删除视图
```sql
DROP VIEW view_name;
```

---

## 9. 触发器（Trigger）

### 9.1 触发器的作用
触发器是在表的 **INSERT**、**UPDATE** 或 **DELETE** 操作时自动执行的 SQL 代码块。它主要用于：
1. 实现复杂的业务逻辑。
2. 自动维护审计日志或历史记录。

---

### 9.2 创建触发器

#### 9.2.1 触发器创建语法
```sql
CREATE TRIGGER trigger_name
{BEFORE | AFTER} {INSERT | UPDATE | DELETE}
ON table_name
FOR EACH ROW
BEGIN
-- SQL 语句
END;
```

#### 9.2.2 示例：创建触发器
以下触发器在插入新用户时自动记录日志：
```sql
CREATE TRIGGER log_user_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
INSERT INTO user_logs(user_id, action, action_time)
VALUES (NEW.id, 'insert', NOW());
END;
```

---

## 10. 存储过程和函数（Stored Procedures and Functions）

### 10.1 存储过程

#### 10.1.1 存储过程创建语法
```sql
CREATE PROCEDURE procedure_name (param1 datatype, param2 datatype)
BEGIN
-- SQL 语句
END;
```

#### 10.1.2 示例：创建存储过程
```sql
CREATE PROCEDURE GetUsersByStatus(IN status VARCHAR(10))
BEGIN
SELECT * FROM users WHERE user_status = status;
END;
```

#### 10.1.3 调用存储过程
```sql
CALL GetUsersByStatus('active');
```

---

### 10.2 存储函数

#### 10.2.1 存储函数创建语法
```sql
CREATE FUNCTION function_name(param1 datatype) RETURNS datatype
BEGIN
-- SQL 语句
RETURN value;
END;
```

#### 10.2.2 示例：创建存储函数
以下函数计算两数的和：
```sql
CREATE FUNCTION AddNumbers(a INT, b INT) RETURNS INT
BEGIN
RETURN a + b;
END;
```

#### 10.2.3 调用存储函数
```sql
SELECT AddNumbers(5, 10);
```

---

## 11. 事件调度器（Event Scheduler）

### 11.1 事件调度器的作用
事件调度器是 MySQL 的定时任务系统，可用于定期执行 SQL 操作，例如：
1. 定时清理历史数据。
2. 定时备份表或数据库。

---

### 11.2 创建事件

#### 11.2.1 创建事件语法
```sql
CREATE EVENT event_name
ON SCHEDULE EVERY interval_value interval_type
DO
-- SQL 语句
```

#### 11.2.2 示例：创建事件
以下事件每隔一天清理过期的订单：
```sql
CREATE EVENT clean_expired_orders
ON SCHEDULE EVERY 1 DAY
DO
DELETE FROM orders WHERE order_date < CURDATE() - INTERVAL 30 DAY;
```

#### 11.2.3 查看事件列表
```sql
SHOW EVENTS;
```

#### 11.2.4 删除事件
```sql
DROP EVENT event_name;
```

---

# MySQL 高级索引与查询优化

## 1. MySQL 索引的概念

索引是用于加速查询的数据库对象，它类似于书籍的目录，可以让 MySQL 在查找数据时更高效。

### 1.1 索引的分类

| 索引类型        | 说明                                                           |
|----------------|----------------------------------------------------------------|
| PRIMARY KEY    | 主键索引，唯一标识表中的每一行记录，默认自动创建唯一索引       |
| UNIQUE        | 唯一索引，确保字段值的唯一性，不允许重复                        |
| INDEX（普通索引）| 普通索引，仅用于加速查询                                     |
| FULLTEXT       | 全文索引，用于全文搜索，适用于 CHAR、VARCHAR 和 TEXT 类型     |
| SPATIAL       | 空间索引，仅适用于 GIS（地理信息系统）数据类型                   |

---

## 2. 索引覆盖（Covering Index）

### 2.1 什么是索引覆盖？

**索引覆盖（Covering Index）** 指的是 SQL 查询所需的所有字段 **都能在索引中找到**，从而避免回表查询，提高查询效率。

### 2.2 示例：索引覆盖

假设有以下数据表：
```sql
CREATE TABLE employees (
id INT PRIMARY KEY,
name VARCHAR(100),
department VARCHAR(50),
salary INT,
INDEX idx_name_department (name, department) -- 复合索引
);
```

执行以下 SQL 查询：
```sql
SELECT name, department FROM employees WHERE name = 'John';
```
- 由于 `name` 和 `department` 都在索引 `idx_name_department` 里，所以 MySQL **直接从索引中获取数据**，避免访问实际数据表，这就是 **索引覆盖**。

---

## 3. 回表查询（Table Lookup）

### 3.1 什么是回表查询？

**回表查询（Table Lookup）** 发生在 **索引列无法满足查询的所有字段时**，MySQL 需要 **先查索引**，然后再回到数据表查询完整数据。

### 3.2 示例：回表查询

假设执行以下 SQL：
```sql
SELECT name, salary FROM employees WHERE name = 'John';
```
- `name` 在索引 `idx_name_department` 中，但 `salary` **不在索引中**。
- MySQL 先从 `idx_name_department` 找到 `name = 'John'` 的记录，然后**回表查询** `salary` 的值。

---

## 4. 索引优化策略

### 4.1 避免回表查询

要尽量 **避免回表查询**，可以采用 **索引覆盖**，即：
1. **在查询的 `SELECT` 语句中尽量只使用索引列**。
2. **使用 `EXPLAIN` 分析是否走了索引覆盖**。

示例：
```sql
EXPLAIN SELECT name, department FROM employees WHERE name = 'John';
```

---

## 5. 索引失效的原因

有时，MySQL **不会使用索引**，导致查询变慢。以下是常见导致索引失效的原因：

| 索引失效原因                      | 解决方案                                      |
|------------------------------------|----------------------------------------------|
| `LIKE '%keyword%'` 前后带通配符    | 改为 `LIKE 'keyword%'` 或使用 `FULLTEXT` 索引 |
| `OR` 连接的字段未建立索引          | 使用 `UNION` 替代 `OR`                       |
| 对索引字段进行计算（如 `age + 1`） | 避免在索引字段上使用计算                     |
| 使用 `!=` 或 `<>`                  | 改用 `BETWEEN` 或 `IN`                      |
| 字符集不匹配                        | 确保索引和查询条件使用相同字符集              |

---

## 6. MySQL 查询优化（Query Optimization）

### 6.1 使用 `EXPLAIN` 分析查询

`EXPLAIN` 命令可以帮助分析查询是否使用索引：
```sql
EXPLAIN SELECT name FROM employees WHERE name = 'John';
```

### 6.2 查询优化技巧

1. **避免 `SELECT *`**，只查询需要的字段：
   ```sql
   SELECT name, department FROM employees WHERE id = 1;
   ```
2. **避免 `OR` 条件导致的索引失效**，改为 `UNION`：
   ```sql
   SELECT * FROM employees WHERE id = 1
   UNION
   SELECT * FROM employees WHERE department = 'Sales';
   ```
3. **使用 `EXPLAIN` 观察 `Extra` 字段**，如果显示 `Using filesort`，则需要优化索引。

---

## 7. 分区（Partitioning）

当表的数据量非常大时，可以使用 **分区** 来提高查询效率。

### 7.1 创建分区表
```sql
CREATE TABLE sales (
id INT NOT NULL,
sales_date DATE NOT NULL,
amount DECIMAL(10,2),
PRIMARY KEY (id, sales_date)
) PARTITION BY RANGE (YEAR(sales_date)) (
PARTITION p0 VALUES LESS THAN (2020),
PARTITION p1 VALUES LESS THAN (2021),
PARTITION p2 VALUES LESS THAN (2022)
);
```

---

## 8. 事务（Transaction）

**事务** 保证数据库操作的 **原子性（Atomicity）**，防止数据不一致。

### 8.1 事务基本语法
```sql
START TRANSACTION;
UPDATE accounts SET balance = balance - 100 WHERE id = 1;
UPDATE accounts SET balance = balance + 100 WHERE id = 2;
COMMIT; -- 提交事务
```

---

## 9. 锁机制（Locks）

MySQL 提供 **行级锁** 和 **表级锁** 以控制数据的并发访问。

| 锁类型      | 说明                                      |
|------------|------------------------------------------|
| 共享锁（S）| 允许多个事务读取数据，但不能修改         |
| 排他锁（X）| 其他事务无法读取或修改数据               |
| 行锁       | InnoDB 支持的 **行级锁**，粒度更细       |
| 表锁       | MyISAM 只支持 **表级锁**，并发性能较差   |

示例：
```sql
-- 事务 1
START TRANSACTION;
SELECT * FROM employees WHERE id = 1 FOR UPDATE; -- 申请排他锁
```

---

## 10. MySQL 性能优化总结

### 10.1 数据库优化最佳实践
1. **使用合适的数据类型**，避免使用 `TEXT` 或 `BLOB` 影响性能。
2. **为常用查询建立索引**，但避免过多索引影响写入速度。
3. **优化查询语句**，使用 `EXPLAIN` 分析执行计划。
4. **避免 `SELECT *`**，只查询所需字段。
5. **优化 `JOIN` 语句**，确保连接字段都有索引。
6. **使用 `LIMIT` 限制查询返回的数据行数**。
7. **定期清理和维护索引**，如 `ANALYZE TABLE` 和 `OPTIMIZE TABLE`。

---

# MySQL 锁机制详解

## 1. MySQL 锁的概念

锁（Lock）是一种 **控制并发访问** 的机制，确保多个事务在访问数据时不会导致数据不一致问题。

锁机制用于 **保证数据完整性**，常用于 **高并发环境**，避免 **脏读（Dirty Read）、不可重复读（Non-repeatable Read）、幻读（Phantom Read）** 等问题。

---

## 2. MySQL 锁的分类

### 2.1 按 **锁的粒度** 分类

| 锁类型    | 作用范围      | 说明 |
|-----------|--------------|--------------------------------|
| **表级锁（Table Lock）** | 整个表 | 适用于 **MyISAM**，锁粒度大，开销小，但并发性差 |
| **行级锁（Row Lock）** | 单行记录 | 适用于 **InnoDB**，支持高并发，但加锁开销大 |
| **页级锁（Page Lock）** | 一页数据 | 适用于 **BDB** 存储引擎，锁定部分数据页，性能介于表锁和行锁之间 |

---

### 2.2 按 **锁的模式** 分类

| 锁类型    | 说明 |
|-----------|--------------------------|
| **共享锁（S 锁，Shared Lock）** | 允许多个事务同时读取数据，但不能修改 |
| **排他锁（X 锁，Exclusive Lock）** | 事务独占数据，其他事务无法读取或修改 |
| **意向锁（Intention Lock）** | InnoDB 自动管理的 **表级锁**，表示事务想要获取某种行锁 |
| **间隙锁（Gap Lock）** | 防止 **幻读**，锁住一定范围的数据，但不锁定具体行 |
| **临键锁（Next-Key Lock）** | 结合 **行锁** 和 **间隙锁**，用于避免 **幻读** |

---

## 3. MySQL 各存储引擎的锁机制对比

| 存储引擎  | 支持的锁类型     | 事务支持 | 适用场景 |
|------------|-----------------|----------|----------|
| **InnoDB** | **行级锁、表级锁、间隙锁** | ✅ 支持事务 | 高并发、大量读写操作 |
| **MyISAM** | **表级锁** | ❌ 不支持事务 | 主要用于查询密集型操作 |
| **MEMORY** | **表级锁** | ❌ 不支持事务 | 适用于缓存数据，速度快 |
| **NDB** | **行级锁** | ✅ 支持事务 | 适用于分布式数据库 |

---

## 4. 锁的触发条件

MySQL 什么时候会触发锁？不同的 SQL 语句可能触发不同的锁：

### 4.1 **表锁（Table Lock）触发条件**
**表锁** 在 **MyISAM** 存储引擎中 **默认开启**：
```sql
SELECT * FROM users;  -- 读操作，其他事务仍可读，但不能写
INSERT INTO users (name) VALUES ('Alice');  -- 写操作，锁定整张表
```

**特性**：
- 适用于 **MyISAM**，表锁期间 **所有读取仍可进行**，但**写入会阻塞**。

---

### 4.2 **行锁（Row Lock）触发条件**
**行锁** 适用于 **InnoDB**，仅在使用 **索引列** 作为查询条件时触发：

✅ **触发行锁（索引列）**
```sql
SELECT * FROM employees WHERE id = 5 FOR UPDATE;  -- 仅锁住 id=5 的行
```

🚫 **不会触发行锁（非索引列）**
```sql
SELECT * FROM employees WHERE name = 'Alice' FOR UPDATE;  -- name 没有索引，锁全表！
```

**特性**：
- 只有**索引列**才会触发行锁，否则会回退到 **表锁**。

---

### 4.3 **间隙锁（Gap Lock）触发条件**
**间隙锁** 主要用于 **防止幻读**，锁住的是 **查询范围内的所有数据**，即使数据 **不存在** 也会被锁住：

✅ **触发行锁 + 间隙锁**
```sql
SELECT * FROM employees WHERE id BETWEEN 10 AND 20 FOR UPDATE;
```
- **如果 id=15 不存在，仍然会锁住 id=15 这个空缺**。

🚫 **不会触发行锁**
```sql
SELECT * FROM employees WHERE id > 10;
```
- **非唯一索引的范围查询不会触发间隙锁**。

---

### 4.4 **意向锁（Intention Lock）触发条件**
**意向锁** 是 **InnoDB 自动管理** 的表级锁，不需要手动设置：

| 锁类型         | 作用 |
|---------------|-------------------------------------|
| **意向共享锁（IS）** | 事务想要获取 **共享锁（S 锁）**  |
| **意向排他锁（IX）** | 事务想要获取 **排他锁（X 锁）** |

✅ **示例：意向锁**
```sql
SELECT * FROM employees WHERE id = 1 LOCK IN SHARE MODE;  -- 申请共享锁
```

---

## 5. 锁冲突与解决方案

### 5.1 **锁冲突情况**

| 事务 1 执行的操作                          | 事务 2 执行的操作                          | 结果 |
|--------------------------------------|--------------------------------------|------|
| `SELECT * FROM orders FOR UPDATE;`  | `SELECT * FROM orders FOR UPDATE;`  | **事务 2 阻塞** |
| `UPDATE users SET salary = 5000 WHERE id = 1;` | `UPDATE users SET salary = 4000 WHERE id = 1;` | **事务 2 阻塞** |

---

### 5.2 **解决锁冲突的方法**

1. **减少锁的范围**：尽可能使用 **行锁** 而非 **表锁**。
2. **合理设置索引**：索引列能触发行锁，避免全表扫描触发表锁。
3. **使用 `NOWAIT` 或 `SKIP LOCKED`** 避免长时间等待：
   ```sql
   SELECT * FROM employees WHERE id = 5 FOR UPDATE NOWAIT;
   ```

---

## 6. 死锁（Deadlock）及避免方法

**死锁** 发生在两个事务互相等待对方释放锁，导致数据库无法继续执行。

### 6.1 **死锁示例**
```sql
-- 事务 1
START TRANSACTION;
UPDATE employees SET salary = 6000 WHERE id = 1;
UPDATE employees SET salary = 7000 WHERE id = 2;

-- 事务 2
START TRANSACTION;
UPDATE employees SET salary = 7000 WHERE id = 2;
UPDATE employees SET salary = 6000 WHERE id = 1;
```
- **事务 1 锁住了 id=1，等待事务 2 释放 id=2**
- **事务 2 锁住了 id=2，等待事务 1 释放 id=1**
- **死锁发生，MySQL 会自动检测并回滚其中一个事务**

---

### 6.2 **避免死锁的方法**
1. **保持一致的 SQL 执行顺序**：
    - 事务 1 和 事务 2 应该按照相同的顺序锁定数据。

2. **使用 `LOCK IN SHARE MODE` 代替 `FOR UPDATE`**：
    - 共享锁比排他锁的冲突小，能减少死锁风险。

---

## 7. MySQL 锁机制总结

| 锁类型       | 适用存储引擎 | 特性 |
|-------------|------------|-----------------------------|
| **表级锁**   | MyISAM     | 适用于 **读多写少** 场景 |
| **行级锁**   | InnoDB     | 适用于 **高并发** 环境 |
| **间隙锁**   | InnoDB     | 主要用于 **防止幻读** |

---