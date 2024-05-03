<?php 
 include("template\db_connect.php");
 include("header.php");
$title = $_POST['title'];
$post = $_POST["post"];

$file_name = $_FILES["image"]["name"];
$file_tmp = $_FILES["image"]["tmp_name"];
$upload = "./image/article_post/";
$targetFilePath = $upload . $file_name;
move_uploaded_file($file_tmp, $targetFilePath);

// echo $title;
// echo $post;
// echo $file_name;

$sql = "INSERT INTO `article_post`(`user_id`, `tittle`, `content`, `article_image`) VALUES ('$user_id','$title','$post','$targetFilePath')";
$result = $conn->query($sql);
header("location: article.php");
// echo "OKay";


?>