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

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format. Please try again.");
    }

    // استرجاع جميع المستخدمين من قاعدة البيانات
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    // التحقق من أن هناك سجلات في قاعدة البيانات
    if ($result->num_rows > 0) {
        $found = false;
        // المرور عبر جميع السجلات في قاعدة البيانات
        while ($user = $result->fetch_assoc()) {
            // مقارنة البريد الإلكتروني وكلمة المرور
            if ($email === $user['email'] && $password === $user['password']) {
                // كلمة المرور صحيحة، تسجيل الدخول بنجاح
                echo "تم تسجيل الدخول بنجاح!";
                header("Location: index.php"); // استبدل بهذا الرابط المطلوب
                exit();
            }
        }
        // إذا لم يتم العثور على تطابق
        if (!$found) {
            die("البريد الإلكتروني أو كلمة المرور غير صحيحة. يرجى المحاولة مرة أخرى.");
        }
    } else {
        die("لا توجد سجلات في قاعدة البيانات.");
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
