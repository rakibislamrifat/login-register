<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            color: #fff;
        }
        
        .container {
            max-width: 900px;
            margin: 80px auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        h2 {
            font-size: 2.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }
        
        a {
            font-size: 1.2rem;
            color: #fff;
            text-decoration: none;
            background-color: #4285f4;
            padding: 12px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: 2px solid #4285f4;
        }
        
        a:hover {
            background-color: #fff;
            color: #4285f4;
            box-shadow: 0 4px 8px rgba(66, 133, 244, 0.4);
        }
        
        .welcome-message {
            font-size: 1.4rem;
            font-weight: 400;
            color: #333;
            margin-bottom: 30px;
        }
        
        footer {
            text-align: center;
            font-size: 0.9rem;
            color: #777;
            margin-top: 50px;
        }
        footer p{
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome-message">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
        <p>This is a protected page. You have successfully logged in.</p>
    </div>
    <a href="auth/logout.php">Logout</a>
</div>

<footer>
    <p class="footer-text">&copy; <?= date("Y"); ?> Your Website. All rights reserved. Created by Rifat.</p>
</footer>

</body>
</html>

<?php include 'includes/footer.php'; ?>
