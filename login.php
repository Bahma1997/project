<?php
session_start();

// تحقق من البيانات المرسلة
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // الحصول على البيانات المدخلة من النموذج
    $username = $_POST['user1'];  // اسم المستخدم الذي أدخله المستخدم
    $password = $_POST['password123'];  // كلمة السر التي أدخلها المستخدم

    // اتصال بقاعدة البيانات
    $conn = new mysqli("localhost", "root", "", "nom_base_donnees");

    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // استعلام للتحقق من اسم المستخدم وكلمة السر
    $stmt = $conn->prepare("SELECT * FROM users WHERE user1 = ?");
    $stmt->bind_param("s", $username);  // ربط اسم المستخدم بالاستعلام
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user[''])) {
            // حفظ بيانات الجلسة
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // إعادة توجيه للوحة القيادة أو الصفحة الرئيسية
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('كلمة السر غير صحيحة!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('اسم المستخدم غير موجود!'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
