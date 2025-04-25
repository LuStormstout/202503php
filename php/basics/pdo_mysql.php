<?php

require_once '../helpers.php';

// --- 连接信息 ---
// MySQL DSN
$dsn = "mysql:host=localhost;dbname=school;charset=utf8mb4";
// 数据库用户名
$username = "root";
// 数据库密码 (!!! 不应硬编码在代码中，应使用配置文件或环境变量 !!!)
$password = "cptbtptp"; // 替换成你的密码

// --- PDO 连接选项 (推荐设置) ---
$options = [
    // 1. 设置错误处理模式为抛出异常 (强烈推荐!)
    // 这样数据库操作出错时会抛出 PDOException，方便用 try...catch 处理
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    // 2. 设置默认的获取模式为关联数组 (可选, 方便)
    // 这样 fetch() 和 fetchAll() 默认返回关联数组，而不是包含数字索引和关联索引的混合数组
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // 3. 禁用模拟预处理语句 (对于支持的驱动, 推荐)
    // 确保预处理语句真正由数据库执行，更安全高效
    PDO::ATTR_EMULATE_PREPARES => false,
];

// --- 尝试连接数据库 ---
try {
    // 创建 PDO 连接实例
    $pdo = new PDO($dsn, $username, $password, $options);

    echo "数据库连接成功!";
    // 现在 $pdo 变量就代表了数据库连接，可以用它来执行查询等操作
} catch (PDOException $e) {
    // 如果连接失败，PDO 会抛出 PDOException 异常
    echo "数据库连接失败: " . $e->getMessage();
    // 在实际应用中，这里应该记录错误日志，并显示用户友好的错误信息，而不是直接暴露错误详情
    // die(); // 终止脚本执行
}

// 脚本结束时，PHP 会自动关闭数据库连接。
// 如果需要手动关闭，可以 $pdo = null;

echoHr();
// !!! 假设 $pdo 连接已建立，并设置为 ERRMODE_EXCEPTION !!!

// --- 使用 query() 执行 SELECT ---
try {
    // 这个查询是固定的，没有用户输入，所以用 query() 相对安全
    $sql = "SELECT id, name, gender, phone, email FROM students LIMIT 10";
    $stmt = $pdo->query($sql); // 返回 PDOStatement 对象

    echo "<h4>Students:</h4>";
    echo "<ul>";
    // 遍历 PDOStatement 对象获取结果 (稍后详细讲 fetch)
    foreach ($stmt as $row) {
        echo "<li>ID: {$row['id']}, Name:" . htmlspecialchars($row['name']) . ", email: {$row['email']}, gender: {$row['gender']}</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "查询失败: " . $e->getMessage();
}

// --- 使用 exec() 执行 UPDATE ---
try {
    // 这个 UPDATE 也是固定的
    $sql = "UPDATE students SET email = 'wangxiuying@example.com' WHERE id = 1";
    $affectedRows = $pdo->exec($sql); // 返回受影响的行数

    echo "更新了 " . $affectedRows . " 个学生的班级。";
} catch (PDOException $e) {
    echo "更新失败: " . $e->getMessage();
}
