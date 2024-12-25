<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brothers";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من إرسال البيانات
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];

    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // إدخال بيانات الفاتورة
    $sql_billing = "INSERT INTO billing_info (full_name, email, address, city, state, zip_code) 
                    VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code')";

    if ($conn->query($sql_billing) === TRUE) {
        // إدخال بيانات الدفع
        $sql_payment = "INSERT INTO payment_info (card_name, card_number, exp_month, exp_year, cvv) 
                        VALUES ('$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv')";

        if ($conn->query($sql_payment) === TRUE) {
            $message = "تم حفظ البيانات بنجاح!";
        } else {
            $message = "خطأ في حفظ بيانات الدفع: " . $conn->error;
        }
    } else {
        $message = "خطأ في حفظ بيانات الفاتورة: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #00a65a;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .container .section {
            width: 48%;
        }
        .section h3 {
            margin-bottom: 20px;
            font-size: 18px;
            text-transform: uppercase;
            border-bottom: 2px solid #00a65a;
            display: inline-block;
        }
        .inputBox {
            margin-bottom: 15px;
        }
        .inputBox span {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .inputBox input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 10px;
            color: green;
        }
        .cards {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .cards img {
            width: 245px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section">
            <h3>Billing Address</h3>
            <form method="POST" action="">
                <div class="inputBox">
                    <span>Full Name:</span>
                    <input type="text" name="full_name" placeholder="John Doe" required>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" name="email" placeholder="example@example.com" required>
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" name="address" placeholder="Room - Street - Locality" required>
                </div>
                <div class="inputBox">
                    <span>City:</span>
                    <input type="text" name="city" placeholder="Alex" required>
                </div>
                <div class="inputBox">
                    <span>State:</span>
                    <input type="text" name="state" placeholder="Egypt" required>
                </div>
                <div class="inputBox">
                    <span>Zip Code:</span>
                    <input type="text" name="zip_code" placeholder="123-456" required>
                </div>
        </div>
        <div class="section">
            <h3>Payment</h3>
                <div class="inputBox">
                    <span>Name on Card:</span>
                    <input type="text" name="card_name" placeholder="Mr. John Doe" required>
                </div>
                <div class="inputBox">
                    <span>Credit Card Number:</span>
                    <input type="number" name="card_number" placeholder="1111-2222-3333-4444" required>
                </div>
                <div class="inputBox">
                    <span>Exp Month:</span>
                    <input type="text" name="exp_month" placeholder="January" required>
                </div>
                <div class="inputBox">
                    <span>Exp Year:</span>
                    <input type="number" name="exp_year" placeholder="2022" required>
                </div>
                <div class="inputBox">
                    <span>CVV:</span>
                    <input type="text" name="cvv" placeholder="1234" required>
                </div>
                <div class="cards">
                    <img src="cards2.png" alt="PayPal">
                </div>
                <button type="submit">Submit</button>
                <?php if (isset($message)) { ?>
                    <div class="message"><?php echo $message; ?></div>
                <?php } ?>
            </form>
        </div>
    </div>
</body>
</html>
