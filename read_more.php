<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\footer.css">
    <title>Document</title>
    <style>
        /* CSS for individual article */
.article {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

.article h2 {
    font-size: 24px;
    color: #333;
    display: flex;
    align-item: center;
    justify-content: center;
}

.article .image-section {
    margin-bottom: 15px;
    display:flex;
    justify-content: center; /* Center horizontally */
    align-items: center; 
}

.article img {
    max-width: 100%;
    height: auto;
    display:flex;
    justify-content: center; 
    align-items: center; 
}

.article p {
    font-size: 16px;
    line-height: 1.6;
    color: #666;
}

.article .posted-date {
    font-style: italic;
    color: #888;
    margin-top: 10px;
}

    </style>
</head>
<body><?php
include("template/db_connect.php");
include("header.php");

// Check if article ID is provided in the URL
if(isset($_GET['data1'])) {
    $article_id = $_GET['data1'];

    // Fetch the article details from the database based on the article ID
    $sql = "SELECT * FROM `article_post` WHERE article_id=$article_id";
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
 <?php include('footer.php')?>
</body>
</html>