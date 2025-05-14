<?php
include '../config/db.php';
session_start();

$username = '';
$email = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if username or email already exists
        $check_sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($check_sql);

        if ($result && $result->num_rows > 0) {
            $error = "Username or email already exists.";
        } else {
            $sql = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql)) {
                $_SESSION['user'] = $username;
                header("Location: ../index.php");
                exit;
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    } else {
        $error = "Please fill out all fields.";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        form input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        form button {
            padding: 12px;
            width: 100%;
            border: none;
            background-color: #34a853;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #2c8e47;
        }
        a {
            color: #4285f4;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($username); ?>" required />
        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email); ?>" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>
