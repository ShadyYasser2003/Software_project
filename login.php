<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        button {
            flex: 1;
            padding: 15px;
            background-color: #96674b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            margin: 0 5px; /* Small space between buttons */
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 18px;
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
        <h2>Login</h2>
        <form action="process_login.php" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- Hidden field to set role -->
            <input type="hidden" id="role" name="role" value="">
            <div class="button-group">
                <button type="button" onclick="setRole('user')">Login as User</button>
                <button type="button" onclick="setRole('admin')">Login as Admin</button>
            </div>
        </form>
        <p>Don't have an account? <a href="signup.php">Create a New Account</a></p>
    </div>

    <script>
        // Set the hidden role field and submit the form
        function setRole(role) {
            document.getElementById('role').value = role;
            document.querySelector('form').submit();
        }
    </script>
</body>
</html>
