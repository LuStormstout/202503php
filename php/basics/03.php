<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>
    <?php
        $is_admin = false; // 假设这是从数据库中获取的值
        $is_logged_in = false; // 假设这是从会话中获取的值
        $username = "小明"; // 假设这是从数据库中获取的值
    ?>

    <?php if ($is_admin): ?>
        <span>欢迎回来，管理员！</span>
        <a href="/admin">进入管理后台</a>
    <?php elseif ($is_logged_in): ?>
        <?php echo htmlspecialchars($username); ?>！
    <?php else: ?>
        请 <a href="/login">登录</a> 或 <a href="/register">注册</a>。
    <?php endif; ?>
</p>
</body>
</html>