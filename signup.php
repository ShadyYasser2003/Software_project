<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(3.jpg);
            background-size: 103% 100%;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-size: xx-large;
            direction: ltr;
        }

        .form-container {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px 20px rgba(0, 0, 0, 0.2);
            width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #96674b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 23px;     
           }
        a {
            color: #000dff;
            text-decoration: none;
            font-size: x-large;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create a New Account</h2>
        <form action="process_signup.php" method="POST">
            <div class="input-group">
                <label for="username">Full Name</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Log In</a></p>
    </div>
</body>
</html>
