<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: hsla(305, 65%, 85%, 1);
            background: linear-gradient(90deg, hsla(305, 65%, 85%, 1) 0%, hsla(293, 93%, 68%, 1) 100%);
            background: -moz-linear-gradient(90deg, hsla(305, 65%, 85%, 1) 0%, hsla(293, 93%, 68%, 1) 100%);
            background: -webkit-linear-gradient(90deg, hsla(305, 65%, 85%, 1) 0%, hsla(293, 93%, 68%, 1) 100%);
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#F2C2EE", endColorstr="#E763F9", GradientType=1 );
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 550px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-box h1 {
            text-decoration: underline;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .login-box input[type="text"],
        .login-box input[type="password"],
        .login-box input[type="email"],
        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-box input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-box input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            padding: 20px;
        }

        .error-message,
        .success-message {
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }

        .vehicle-link {
            color: #0056b3;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login</h1>
            <form action="#" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
            <div class="register-link">
                <a href="UserRegistration.html">Don't have an account? Register here</a>
            </div>
            <?php
            session_start();

            // Database connection
            include 'db_connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Username exists, now verify the password
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password'])) {
                        // Password is correct, proceed with your logic
                        $_SESSION['username'] = $username;
                        echo '<p class="success-message">User logged in successfully!</p>';
                        echo '<div class="vehicle-link"><a href="VehicleRegistration.html"><h2>Click here to Register your Vehicle</h2></a></div>';
                    } else {
                        // Password is incorrect
                        echo '<p class="error-message">Incorrect password!</p>';
                    }
                } else {
                    // Username not found
                    echo '<p class="error-message">Username not found!</p>';
                }
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>