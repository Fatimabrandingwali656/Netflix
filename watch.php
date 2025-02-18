<?php
$id = $_GET['id'];
$conn = new mysqli('localhost', 'ungul0fkpz8rb', 'zadgznfwgquj', 'dbu2ituuxcibjw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies WHERE id = $id";
$result = $conn->query($sql);
$movie = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch <?php echo $movie['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $movie['title']; ?></h1>
    <p><?php echo $movie['description']; ?></p>

    <video controls>
        <source src="<?php echo $movie['video_path']; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>
