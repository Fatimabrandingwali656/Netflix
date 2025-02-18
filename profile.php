<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Example user data (replace with session or database queries)
$user = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'plan' => 'Premium',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Add your Netflix-inspired CSS here */
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php">Home</a>
        <a href="search.php">Search</a>
        <a href="tvshows.php">TV Shows</a>
        <a href="logout.php">Logout</a>
    </div>

    <div style="max-width: 600px; margin: 50px auto; background: #222; padding: 20px; border-radius: 10px; text-align: center;">
        <h1 style="color: #fff;">Profile</h1>
        <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Plan:</strong> <?php echo $user['plan']; ?></p>
        <a href="logout.php" style="padding: 10px 20px; background-color: #b9090b; color: #fff; text-decoration: none; border-radius: 5px;">Logout</a>
    </div>
</body>
</html>
