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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }
        a {
            font-size: 1.1rem;
            color: #4285f4;
            text-decoration: none;
            border: 2px solid #4285f4;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #4285f4;
            color: white;
        }
        .welcome-message {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            font-size: 0.9rem;
            color: #777;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome-message">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
        <p>This is a protected page.</p>
    </div>
    <a href="auth/logout.php">Logout</a>
</div>

<footer>
    <p>&copy; <?= date("Y"); ?> Your Website. All rights reserved Rifat.</p>
</footer>

</body>
</html>

<?php include 'includes/footer.php'; ?>
