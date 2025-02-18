<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video']) && isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $file = $_FILES['video'];
    $fileSize = $file['size'];
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];

    // Check file size (max 100 MB)
    if ($fileSize > 104857600) {
        echo "File size exceeds the 100MB limit.";
    } else {
        $targetDir = "uploads/";
        $videoPath = $targetDir . basename($fileName);
        move_uploaded_file($fileTmp, $videoPath);

        // Save the file and movie details to the database
        $conn = new mysqli('localhost', 'ungul0fkpz8rb', 'zadgznfwgquj', 'dbu2ituuxcibjw');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO movies (title, description, category, video_path, thumbnail) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $description, $category, $videoPath, $fileName);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "Movie uploaded successfully!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Movie Title" required><br>
    <textarea name="description" placeholder="Movie Description" required></textarea><br>
    <input type="text" name="category" placeholder="Category" required><br>
    <input type="file" name="video" required><br>
    <button type="submit">Upload Movie</button>
</form>
