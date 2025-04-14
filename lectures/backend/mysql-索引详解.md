# MySQL 的索引

索引是用于提高数据库查询效率的特殊数据结构。它们类似于书籍的目录，通过索引可以快速找到所需数据，而无需遍历整个表。

## 索引的类型

1. **主键索引（Primary Key Index）**
    - 唯一标识表中的每一行，不能有重复值，也不能为 NULL。
    - 例如：
      ```sql
      CREATE TABLE students (
      id INT UNSIGNED NOT NULL AUTO_INCREMENT,
      name VARCHAR(100) NOT NULL,
      PRIMARY KEY (id)
      );
      ```

2. **唯一索引（Unique Index）**
    - 保证列中的所有值都是唯一的，但可以有一个 NULL 值。
    - 例如：
      ```sql
      CREATE UNIQUE INDEX unique_name ON students(name);
      ```

3. **普通索引（Normal Index）**
    - 用于加速查询，没有唯一性约束。
    - 例如：
      ```sql
      CREATE INDEX index_name ON students(name);
      ```

4. **全文索引（Fulltext Index）**
    - 用于对文本数据进行全文搜索，通常用于大型文本字段（例如，文章内容）。
    - 例如：
      ```sql
      CREATE FULLTEXT INDEX fulltext_content ON articles(content);
      ```

5. **组合索引（Composite Index）**
    - 在多个列上创建的索引，可以加快组合查询。
    - 例如：
      ```sql
      CREATE INDEX index_name_age ON students(name, age);
      ```

## 索引的优点

1. **提高查询速度**：通过索引，可以更快地检索数据。
2. **唯一性约束**：唯一索引和主键索引可以确保数据的唯一性。

## 索引的缺点

1. **占用空间**：索引会占用磁盘空间。
2. **插入速度减慢**：插入数据时，索引需要同步更新，可能会影响插入速度。
3. **维护成本**：索引需要维护，尤其是在频繁更新或删除数据时。

## 创建索引

```sql
-- 创建主键索引
CREATE TABLE students (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(100) NOT NULL,
PRIMARY KEY (id)
);

-- 创建唯一索引
CREATE UNIQUE INDEX unique_name ON students(name);

-- 创建普通索引
CREATE INDEX index_name ON students(name);

-- 创建组合索引
CREATE INDEX index_name_age ON students(name, age);
```

## 查看索引

```sql
-- 查看表的索引
SHOW INDEX FROM students;
```

## 删除索引

```sql
-- 删除索引
DROP INDEX index_name ON students;
```

索引的合理使用可以显著提升数据库的性能，但需要注意的是，过多的索引会影响数据写入的性能和索引的维护成本。因此，在设计数据库时需要权衡利弊，合理设计索引。