<?php
session_start();

// التحقق من الجلسة
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>لوحة القيادة</title>
</head>
<body>
    <h1>مرحبا بك في لوحة القيادة 🎉</h1>
    <p>الإيميل ديالك: <?php echo $_SESSION['user_email']; ?></p>
    <a href="logout.php">تسجيل الخروج</a>
</body>
</html>
