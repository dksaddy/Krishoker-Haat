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
           <h1 class="logt"><a href="http://localhost/Krishoker-Haat/HomePage.php">কৃষকের <span>হাট</span></a></h1>
    </div> 
               <ul>
                    <li><a href="./HomePage.php" class="link">হোম</a></li>
                    <li><a href="AllProduct.php?data=all" class="link">পণ্যসমুহ</a></li>
                    <li><a href="article.php"class="link">আর্টিকেল</a></li>
                    <li><a href="about.php"class="link">আমাদের সম্পর্কে</a></li>


                    <?php if($log): ?>
                        <?php if ($fetch['user_type'] == 'farmer'): ?>
    <li><a href="add-product.php" class="link">এড প্রোডাক্ট</a></li>
<?php endif; ?>
               <li><a href="community_post.php"class="link">কমিউনিটি</a></li>
                <li><a href="Cart.php"class="link">কার্ট<img src="image/Icon/cart.png" alt="Profile Picture" class="cart_round-image"></a></li>
                
                <li class="profile_dropdown">
    <!-- Picture -->
    <div class="dropdown">
    <?php 
                   echo '<img src="image/image.jpg" alt="Profile Picture" class="round-image">';
                 ?>      <!-- Dropdown Content -->
      <div class="dropdown-content">
      <?php
                   if (!empty($_SESSION['user_id'])) {
                    echo "<p>Welcome " . $fetch['name'] . " </p>";
                  }
                ?>
                <div class="drp"><a href="<?php echo ($fetch['user_type'] == 'farmer') ? 'farmerProfile.php' : 'userProfile.php'; ?>">আমার প্রোফাইল</a></div>
        <div class="drp"><a href="update_profile.php">আপডেট প্রোফাইল</a></div>
        <div class="log_out"><a href="functions/logout.php">Log Out</a></div>

      </div>
    </div>
  </li>
                
   
                </ul>
                <?php else: ?>
                <div class="nav-button">
                    <button class="signin"><a href="./login.php" class="link">লগইন</a></button>
                    <button class="signin"><a href="./registration.php" class="link">সাইন আপ</a></button>

                    <?php endif; ?>
                </div>

                </div>
            </nav>
    </header>
    
   