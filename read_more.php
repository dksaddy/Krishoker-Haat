<?php
include("template/db_connect.php");
include("header.php");

// Check if article ID is provided in the URL
if(isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Fetch the article details from the database based on the article ID
    $sql = "SELECT * FROM `article_post`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['tittle'];
        $content = $row['content'];
        $image = $row['image'];
        $posted_date = $row['timestamp']; // Assuming you have this column in your database

        // Display the full article
        echo '<div class="article">';
        echo '<h2>' . $title . '</h2>';
        echo '<div class="image-section">';
        echo '<img src="' . $image . '" alt="">';
        echo '</div>';
        echo '<p>' . $content . '</p>';
        echo '<p>Posted on ' . $posted_date . '</p>';
        echo '</div>';
    } else {
        echo "Article not found";
    }
} else {
    echo "Article ID not provided";
}

$conn->close();
?>
