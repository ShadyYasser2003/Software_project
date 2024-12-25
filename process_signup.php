<?php
// إعداد اتصال قاعدة البيانات
$servername = "localhost";
$username = "root";  // اسم المستخدم الافتراضي لـ MySQL
$password = "";      // كلمة المرور الافتراضية (اتركها فارغة إذا لم تُعدلها)
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
    $full_name = trim($_POST['username']);  // اسم المستخدم
    $email = trim($_POST['email']);         // البريد الإلكتروني
    $password = $_POST['password'];         // كلمة المرور
    $confirm_password = $_POST['confirm_password']; // تأكيد كلمة المرور

    // التحقق من أن كلمة المرور متطابقة
    if ($password !== $confirm_password) {
        die("<h1 style = 'text-align:center;'>كلمة المرور غير متطابقة. يرجى المحاولة مرة أخرى.");
    }

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<h1 style = 'text-align:center;'>تنسيق البريد الإلكتروني غير صحيح. يرجى المحاولة مرة أخرى.");
    }

    // التحقق من أن البريد الإلكتروني غير موجود مسبقًا
    $sql_check_email = "SELECT * FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    if ($result->num_rows > 0) {
        die("<h1 style = 'text-align:center;'>البريد الإلكتروني مسجل بالفعل. يرجى استخدام بريد إلكتروني آخر.");
    }

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إعداد الاستعلام لإدخال البيانات
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $full_name, $email, $hashed_password);

    // تنفيذ الاستعلام والتحقق من النجاح
    if ($stmt->execute()) {
        echo "تم إنشاء الحساب بنجاح!";
        // يمكن توجيه المستخدم إلى صفحة تسجيل الدخول بعد إنشاء الحساب بنجاح
        header("Location: login.php");
        exit();
    } else {
        echo "خطأ: " . $stmt->error;
    }

    // إغلاق الاستعلام
    $stmt->close();
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>