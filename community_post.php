<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="css/userBlogHome.css">
   <title>Blog Home</title>
</head>
<body>
  <?php include('header.php') ?>
<?php
include("template/db_connect.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
   $user_id = $_SESSION['user_id'];
   $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
   if(isset($_POST['submit_comment'])) {
      $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
   }
   // Check if the comment text is not empty
   if(!empty($comment_text)) {
      // Insert comment into the database
      $commentQuery = "INSERT INTO community_post_comments (user_id, blog_id, comment_text) VALUES ('$user_id', '$blog_id', '$comment_text')";
      mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));
      header("Location: community_post.php");
      exit();
   }

   // Handle comment deletion
   if(isset($_POST['delete_comment'])) {
      $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

      // Perform delete operation
      $deleteCommentQuery = "DELETE FROM community_post_comments WHERE comment_id = '$comment_id'";
      mysqli_query($conn, $deleteCommentQuery) or die('Comment deletion failed: '.mysqli_error($conn));


      // Redirect to the same page after deletion
      header("Location: community_post.php");
      exit();
   }


   // Handle post deletion
if (isset($_POST['delete_post'])) {
   $post_id = mysqli_real_escape_string($conn, $_POST['blog_id']);

   // Check if the user is the owner of the post
   $checkOwnershipQuery = "SELECT user_id FROM community_post WHERE blog_id = '$post_id' LIMIT 1";
   $ownershipResult = mysqli_query($conn, $checkOwnershipQuery) or die('Ownership check failed: ' . mysqli_error($conn));
   $ownershipRow = mysqli_fetch_assoc($ownershipResult);

   if ($ownershipRow['user_id'] == $_SESSION['user_id']) {
       // Manually delete likes for the post
       $deleteLikesQuery = "DELETE FROM community_post_likes WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deleteLikesQuery) or die('Likes deletion failed: ' . mysqli_error($conn));

       // Manually delete comments for the post
       $deleteCommentsQuery = "DELETE FROM community_post_comments WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deleteCommentsQuery) or die('Comments deletion failed: ' . mysqli_error($conn));

       // Perform delete operation for the post
       $deletePostQuery = "DELETE FROM community_post WHERE blog_id = '$post_id'";
       mysqli_query($conn, $deletePostQuery) or die('Post deletion failed: ' . mysqli_error($conn));

       // Redirect to the same page after deletion
       header("Location: community_post.php");
       exit();
   }
}



   // Check if the user has already liked or disliked the post
   $userLiked = hasUserLikedOrDisliked($conn, $user_id, $blog_id, true);
   $userDisliked = hasUserLikedOrDisliked($conn, $user_id, $blog_id, false);

   if(isset($_POST['like'])) {
      if(!$userLiked) {
          mysqli_query($conn, "UPDATE community_post SET likes = likes + 1 WHERE blog_id = '$blog_id'");
          if($userDisliked) {
              mysqli_query($conn, "UPDATE community_post SET dislikes = dislikes - 1 WHERE blog_id = '$blog_id'");
          }
          recordLikeOrDislike($conn, $user_id, $blog_id, true);
      } else {
          // User is unliking the post
          mysqli_query($conn, "UPDATE community_post SET likes = likes - 1 WHERE blog_id = '$blog_id'");
          removeLikeOrDislike($conn, $user_id, $blog_id, true);
      }
  } elseif(isset($_POST['dislike'])) {
      if(!$userDisliked) {
          mysqli_query($conn, "UPDATE community_post SET dislikes = dislikes + 1 WHERE blog_id = '$blog_id'");
          if($userLiked) {
              mysqli_query($conn, "UPDATE community_post SET likes = likes - 1 WHERE blog_id = '$blog_id'");
          }
          recordLikeOrDislike($conn, $user_id, $blog_id, false);
      } else {
          // User is un-disliking the post
          mysqli_query($conn, "UPDATE community_post SET dislikes = dislikes - 1 WHERE blog_id = '$blog_id'");
          removeLikeOrDislike($conn, $user_id, $blog_id, false);
      }
  }
  
}

// Fetch and display blog posts
$query = "SELECT 	community_post.*, user.name, profile_picture
FROM community_post
INNER JOIN user ON 	community_post.user_id = user.user_id
ORDER BY community_post.timestamp DESC";

$result = mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));

//function for check like and dislike
function hasUserLikedOrDisliked($conn, $user_id, $blog_id, $liked) {
   $query = "SELECT * FROM 	community_post_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id' AND liked = '$liked'";
   $result = mysqli_query($conn, $query);
   return mysqli_num_rows($result) > 0;
}

function recordLikeOrDislike($conn, $user_id, $blog_id, $liked) {
   $checkQuery = "SELECT * FROM community_post_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id'";
   $checkResult = mysqli_query($conn, $checkQuery);
   if(mysqli_num_rows($checkResult) > 0) {
       // If there is an existing record, update it
       $updateQuery = "UPDATE community_post_likes SET liked = '$liked' WHERE user_id = '$user_id' AND blog_id = '$blog_id'";
       mysqli_query($conn, $updateQuery) or die('Update failed: ' . mysqli_error($conn));
   } else {
       // If no record, insert a new one
       $insertQuery = "INSERT INTO community_post_likes (user_id, blog_id, liked) VALUES ('$user_id', '$blog_id', '$liked')";
       mysqli_query($conn, $insertQuery) or die('Insert failed: ' . mysqli_error($conn));
   }
}


function removeLikeOrDislike($conn, $user_id, $blog_id, $liked) {
   $query = "DELETE FROM community_post_likes WHERE user_id = '$user_id' AND blog_id = '$blog_id' AND liked = '$liked'";
   mysqli_query($conn, $query) or die('Query failed: '.mysqli_error($conn));
}
?>


<div class="createPost">
      <h2>Create a New Post</h2>
      <form action="functions/process_post.php" method="post" enctype="multipart/form-data">
         <label for="title">Title:</label>
         <input type="text" name="title" required>

         <label for="content">Content:</label>
         <textarea name="content" required></textarea>

         <label for="image">Upload Image:</label>
         <input type="file" name="image">

         <input type="submit" value="Create Post">
      </form>
   </div>

   <div class="blogHome">
      <h2>Krishoker Haat Blog Home</h2>
      <?php

      while($row = mysqli_fetch_assoc($result)):
         echo '<div class="blog-post">';
         echo '<h5><img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' . $row['name'] .'</h5>';
         echo '<h4>Post at '.$row['timestamp'].'</h4>';

         echo '<h3>'.$row['title'].'</h3>';
         echo '<p>'.$row['content'].'</p>';
         echo '<h4></h4>';

         if(!empty($row['image'])) {
            echo '<img src="'.$row['image'].'" alt="Blog Image" class>';
         }

         // Like and Dislike Buttons
         
echo '<form action="community_post.php" method="post">'; 
      echo '<div class="button-container">';
      echo '<input type="hidden" name="blog_id" value="' . $row['blog_id'] . '">'; 
      echo '<button type="submit" name="like" class="button">Like ' . $row['likes'] . '</button>'; 
     echo '<button type="submit" name="dislike" class="button">Dislike ' . $row['dislike'] . '</button>'; 
     echo '<button class="button"><a href="#">Send Message</a></button>';

     echo '</div>';
     echo '</form>';

         // Delete option for the blog post if the user is the owner
         if($row['user_id'] == $_SESSION['user_id']) {
            echo '<form method="post" action="community_post.php">';
            echo '<input type="hidden" name="blog_id" value="'.$row['blog_id'].'">';
            echo '<button type="submit" name="delete_post" class="delete_post">Delete Post</button>';
            echo '</form>';
         }


         //Delete options for comments
         echo '<div class="comments-section">';
         echo '<h4>Comments:</h4>';

         $blogId = $row['blog_id'];
         $commentQuery = "SELECT community_post_comments.*, user.name,user.profile_picture
                   FROM community_post_comments
                   INNER JOIN user ON community_post_comments.user_id = user.user_id
                   WHERE blog_id = '$blogId'
                   ORDER BY community_post_comments.timestamp DESC";

         $commentResult = mysqli_query($conn, $commentQuery) or die('Comment query failed: '.mysqli_error($conn));

         while($comment = mysqli_fetch_assoc($commentResult)):
            echo '<div class="comment">';
            echo '<p><img src="' . $comment['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' .' <strong>'.$comment['name'].'</strong>. </p>';

            echo '<p>'.$comment['comment_text'].'</p>';
            echo '<p>'.$comment['timestamp'].'</p>';


            // Add delete option for comments if the user is the owner
            if($comment['user_id'] == $_SESSION['user_id']) {
               echo '<form method="post" action="community_post.php">';
               echo '<input type="hidden" name="comment_id" value="'.$comment['comment_id'].'">';
               echo '<button type="submit" name="delete_comment">Delete Comment</button>';
               echo '</form>';
            }
            echo '</div>';
         endwhile;



         // Comment form
         echo '<form method="post" action="community_post.php">';
         echo '<input type="hidden" name="blog_id" value="'.$row['blog_id'].'">';
         echo '<textarea name="comment_text" required></textarea>';
         echo '<button type="submit" name="submit_comment" value="Submit Comment">Submit Comment</button>';
         echo '</form>';

         echo '</div>'; // Closing comments-section div
      
         // Display other blog details as needed
         echo '</div>'; // Closing blog-post div
      
      endwhile;

      ?>
</body>

</html>