<?php
session_start();

// Check if the user is logged in
if (empty($_SESSION['user_id'])) {
   header("Location: HomePage.php"); 
   exit();
}

include("../template/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $user_id = $_SESSION['user_id'];
   echo $user_id;
   $title = mysqli_real_escape_string($conn, $_POST['title']);
   $content = mysqli_real_escape_string($conn, $_POST['content']);
   $profile_picture = $_FILES['image'];
   // Handle file upload
   $uploadDir = '../image/community_post/'; // Specify the upload 
   if (!file_exists($uploadDir)) {
       mkdir($uploadDir, 0755, true);
       echo "Maruph";
   }
   $uploadFile = $uploadDir . basename($_FILES['image']['name']);

   if (file_exists($uploadFile)) {
       $message['error'] = 'File already Exists';
   }

   if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
       echo "Image uploaded successfully.";
   } else {
       echo "Error uploading image.";
       mysqli_close($conn);
       echo "Maruph";
       exit();
   }
   $result = substr($uploadFile, 3);

   // Insert blog post into the database
   $query = "INSERT INTO `community_post`( `user_id`, `title`, `content`, `image`) VALUES ('$user_id','$title','$content','$result')";
   mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

   header("Location: ../community_post.php"); // Redirect to the blog home page after creating the post
   exit();
} else {
   header("Location: ../create_post.php"); // Redirect to the create post page if not a POST request
   exit();
}
?>
