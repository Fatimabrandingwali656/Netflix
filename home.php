<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'ungul0fkpz8rb', 'zadgznfwgquj', 'dbu2ituuxcibjw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>

    <style>
        /* Netflix-Like Styles */
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #141414;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        .navbar img {
            height: 50px;
            margin-right: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
            font-size: 18px;
        }

        .navbar a:hover {
            color: #e50914;
        }

        /* Banner */
        .banner {
            background: url('images/netflix-banner.jpg') no-repeat center center/cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 50px;
            font-weight: bold;
        }

        /* Movie Grid */
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            padding: 20px;
        }

        .movie {
            background-color: #222;
            padding: 10px;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .movie img {
            width: 100%;
            height: 280px;
            border-radius: 5px;
        }

        .movie:hover {
            transform: scale(1.1);
        }

        /* Watch Button */
        a.button {
            background-color: #e50914;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        a.button:hover {
            background-color: #b20710;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <img src="images/netflix-logo.png" alt="Netflix">
        <a href="homepage.php">Home</a>
        <a href="tvshows.php">TV Shows</a>
        <a href="profile.php">Profile</a>
        <a href="search.php">Search</a>
    </div>

    <!-- Banner -->
    <div class="banner">
        Welcome to Netflix Clone
    </div>

    <h1 style="text-align: center;">Trending Movies</h1>
    <div class="movie-grid">
        <?php while($movie = $result->fetch_assoc()) { ?>
            <div class="movie">
                <img src="uploads/<?php echo $movie['thumbnail']; ?>" alt="<?php echo $movie['title']; ?>">
                <h3><?php echo $movie['title']; ?></h3>
                <p><?php echo $movie['category']; ?></p>
                <a href="watch.php?id=<?php echo $movie['id']; ?>" class="button">Watch Now</a>
            </div>
        <?php } ?>
    </div>

</body>
</html>
