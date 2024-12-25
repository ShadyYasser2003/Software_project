<?php
// إعداد اتصال قاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم الافتراضي لـ MySQL
$password = ""; // كلمة المرور الافتراضية (اتركها فارغة إذا لم تُعدلها)
$dbname = "brothers"; // اسم قاعدة البيانات

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من أن الطلب قادم عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من الفورم
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role']; // استلام الدور

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<h1 style = 'text-align:center;'>Invalid email format. Please try again.");
    }

    // التحقق بناءً على الدور
    if ($role === 'admin') {
        // البحث في جدول admin
        $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
    } elseif ($role === 'user') {
        // البحث في جدول users
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
    } else {
        die("<h1 style = 'text-align:center;'> Invalid role. Please try again.");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // تسجيل الدخول بنجاح
        if ($role === 'admin') {
            header("Location: index.php"); // توجيه الإداري إلى صفحة index.php
        } elseif ($role === 'user') {
            header("Location: shop.php"); // توجيه المستخدم إلى صفحة shop.php
        }
        exit();
    } else {
        // في حالة بيانات غير صحيحة
        die("<h1 style = 'text-align:center;'>بيانات تسجيل الدخول غير صحيحة. يرجى المحاولة مرة أخرى.</h1>");
    }

    // إغلاق الاستعلام
    $stmt->close();
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
