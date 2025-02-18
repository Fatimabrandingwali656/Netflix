<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'ungul0fkpz8rb', 'zadgznfwgquj', 'dbu2ituuxcibjw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchQuery = '';
if (isset($_GET['query'])) {
    $searchQuery = $conn->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM movies WHERE title LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT * FROM movies";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movies</title>
    <style>
        /* Add your Netflix-inspired CSS here */
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="tvshows.php">TV Shows</a>
        <a href="logout.php">Logout</a>
    </div>

    <h1>Search Movies</h1>
    <form method="GET" action="search.php" style="text-align: center; margin: 20px;">
        <input type="text" name="query" placeholder="Search for movies or categories..." 
            value="<?php echo htmlspecialchars($searchQuery); ?>" style="padding: 10px; width: 50%; border-radius: 5px;">
        <button type="submit" style="padding: 10px 20px; background-color: #b9090b; color: #fff; border: none; border-radius: 5px;">
            Search
        </button>
    </form>

    <div class="movie-grid">
        <?php while($movie = $result->fetch_assoc()) { ?>
            <div class="movie">
                <img src="uploads/<?php echo $movie['thumbnail']; ?>" alt="<?php echo $movie['title']; ?>">
                <h3><?php echo $movie['title']; ?></h3>
                <p><?php echo $movie['category']; ?></p>
                <a href="watch.php?id=<?php echo $movie['id']; ?>">Watch Now</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
