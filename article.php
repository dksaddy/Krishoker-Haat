<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/article.css">
    <title>Article</title>
</head>
<body>
<?php
include("template/db_connect.php");
include("header.php");
?>
    <div class="blog-section">
        <div class="section-content">
            <div class="title">
                <h2>blog & Article</h2>
            </div>
            <div class="post-button">
                <a href="Createpost.php" class="button1">Create Post</a>
            </div>
            <div class="cards">
            <?php

// Assuming you have a table named 'article_post' with columns 'title', 'content', 'image', and 'posted_date'
$sql = "SELECT * FROM `article_post`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $title = $row['tittle'];
        $content = $row['content'];
        $image = $row['article_image'];
        $posted_date = $row['timestamp']; // Assuming you have this column in your database

        // Display the article card for each article
        echo '<div class="card">';
        echo '<div class="image-section">';
        echo '<img src="' . $image . '" alt="">';
        echo '</div>';
        echo '<div class="article">';
        echo '<h4>' . $title . '</h4>';
        echo '<p>' . $content . '</p>';
        echo '</div>';
        echo '<div class="blog-view">';
        echo '<a href="read_more.php"><button> Read More </button></a>';
        echo '</div>';
        echo '<div class="posted-date">';
        echo '<p>Posted on ' . $posted_date . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No articles found";
}

$conn->close();
?>
        </div>
        </div>
    </div>

</body>
</html>