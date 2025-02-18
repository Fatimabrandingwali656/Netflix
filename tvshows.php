<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'ungul0fkpz8rb', 'zadgznfwgquj', 'dbu2ituuxcibjw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tvshows"; // Ensure you have a `tvshows` table
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Shows</title>
    <style>
        /* Add your Netflix-inspired CSS here */
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php">Home</a>
        <a href="search.php">Search</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <h1>TV Shows</h1>
    <div class="movie-grid">
        <?php while($show = $result->fetch_assoc()) { ?>
            <div class="movie">
                <img src="uploads/<?php echo $show['thumbnail']; ?>" alt="<?php echo $show['title']; ?>">
                <h3><?php echo $show['title']; ?></h3>
                <p><?php echo $show['category']; ?></p>
                <a href="watch.php?id=<?php echo $show['id']; ?>">Watch Now</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
