<?php
session_start();
$log = 0;
$fetch = []; 

// Include the database connection file
include("template/db_connect.php");

if (!empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $log = 1;

    // Check if the database connection is open
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krisoker Haat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/userprofile.css">
    <link rel="stylesheet" href="css/header.css">
    <lin rel="stylesheet" href = "css/footer.css">
</head>
<body>
    <header class="header">
           
            <nav class="nav">
           <div class="logo">    
      <img src="image/Icon/mainlogo.jpg" width="80" height="80">
    </div> 
               <ul>
                    <li><a href="./HomePage.php" class="link">HOME</a></li>
                    <li><a href="#" class="link">CONTACT</a></li>
                    <li><a href="AllProduct.php" class="link">PRODUCTS</a></li>

                    <?php if($log): ?>
               <li><a href="community_post.php"class="link">কমিউনিটি</a></li>
               <li><a href="article.php"class="link">আর্টিকেল</a></li>
     
                 <li class="dropdown">
               <?php 
                   echo '<img src="image/image.jpg" alt="Profile Picture" class="round-image">';
                 ?>
                 
                  <div class="dropdown-content">
                  <?php
    if (!empty($_SESSION['user_id'])) {
        echo "<h5>Welcome " . $fetch['name'] . " </h5>";
    }
?>
                   <a href="userProfile.php">User Profile</a>
                   <a href="update_profile.php">Update Profile</a>
                   <a href="functions/logout.php">LOG OUT</a>
               </div>
             </li>

                </ul>
                <div class="srch">
                    <input type="text" class="srch-bar" placeholder="এখানে অনুসন্ধান করুন" >
                    <button class="srch-btn"><img src="image/Icon/search.png"> </button>
                </div>
                <?php else: ?>
                <div class="nav-button">
                    <button class="signin"><a href="./login.php" class="link">লগইন</a></button>
                    
                    <?php endif; ?>
                </div>

                </div>
            </nav>
    </header>
    
   