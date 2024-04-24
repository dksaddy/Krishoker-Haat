

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/header.css">
   <link rel="stylesheet" href="css/userBlogHome.css">
   <title>Group Sell Post Home</title>
   <script>
       // JavaScript function to show the confirmation popup
       function showConfirmation() {
           // Display confirmation popup
           var confirmation = confirm("Are you sure to order this in a group? After this confirmation you cannot able to cancel this order.If you click 'OK', then check your cart your order will be in a process.Thanks for being with krishoker haat");
           if (confirmation) {
               // If user confirms, submit the form
               document.getElementById('postForm').submit();
           }
       }
   </script>
</head>
<body>
  <?php include('header.php') ?>


  <?php

    include("template/db_connect.php");

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
    header("Location: community_post.php");
    exit(); 
}




// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form is for creating a new post
    if (isset($_POST['submit_post'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $product_id=mysqli_real_escape_string($conn,$_POST['product_id']);
        echo $title;
        // Check if an image file is uploaded
        if (isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = "image/community_post/" . $image;
            
            // Move uploaded file to the uploads directory
            move_uploaded_file($image_tmp, $image_path);
        } else {
            $image_path = ''; // If no image is uploaded, set default value
        }
        
        // Insert post into the database
        $insertPostQuery = "INSERT INTO group_purchase (leader_id,product_id, title, content, p_image, quantity) VALUES ('$user_id','$product_id', '$title', '$content', '$image_path', '$quantity')";
        mysqli_query($conn, $insertPostQuery) or die('Post creation failed: ' . mysqli_error($conn));
        
        // Redirect to the same page after post creation
        header("Location: community_post.php");
        exit();
    } 
}
?>



<?php
            $product_name = " ";
            $price = "";
            $description= "";
            $category = "";
            $image_path = "";
// Retrieve values from URL parameters
if (isset($_GET['data1']) && isset($_GET['data2']) && isset($_GET['data3'])) {
    $product_id = urldecode($_GET['data1']);
    echo $product_id;
    $quantity = urldecode($_GET['data2']);
    $totalPrice = urldecode($_GET['data3']);
    
        $product_query = "SELECT * FROM `product` WHERE product_id =$product_id";

        // Execute the query
        $product_result = mysqli_query($conn, $product_query);

// Check if the query was successful
if ($product_result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($product_result)) {
        // Access each column data using associative array keys
        $product_name = htmlspecialchars($row['p_name']);
        $price = floatval($price);
        $description= htmlspecialchars($row['description']);
        $category = htmlspecialchars($row['category']);
        $image_path = htmlspecialchars($row['image']);
        echo $image_path;
        
    }
} else {
    // Display error message if query fails
    echo "Error: " . mysqli_error($conn);
}

// Free result set
mysqli_free_result($product_result);


}

?>
<?php
if (isset($_SESSION['user_id'])) {
   ?>

<div class="dropdown-container">
        <div class="dropdown">
        
        <form action="AllProduct.php" method="post">
    <select name="category">
        <option> একটি বিভাগ নির্বাচন করুন</option>
        <option value="new">নতুন পণ্য</option>
        <option value="high">দাম উচ্চ থেকে কম</option>
        <option value="low">দাম কম থেকে বেশি</option>
        <option value="best">Best Selling</option>
    </select>
    <button type="submit">Sort Now</button>
</form>

        </div>

        <div class="slideable-text">
        <p>কৃষকের হাটে স্বাগতম।</p>
    </div>


        <div class="search">
        <form action="AllProduct.php" method="GET">
        <input type="text" name="search" placeholder="পণ্য খুজুন..." required>
        <button type="submit">খুজুন</button>
        </form>
        </div>


    </div>
 

<div class="first_container">
    <div class="side-box">
        <p>My groups </p>
        <?php
        
    // Prepare the SQL query
    $sql_group = "SELECT *
    FROM group_purchase 
    WHERE leader_id = $user_id";

// Execute the query
$result_group = mysqli_query($conn, $sql_group);

// Check if the query was successful
if (!$result_group) {
die('Query failed: ' . mysqli_error($conn));
}

// Fetch and display the results
while ($row = mysqli_fetch_assoc($result_group)) {
$group_id= $row['title'];
echo "<a href=\"\">Group for purchase " . $row['title'] . "</a><br>";
} 
?>
<a href=""></a>




    </div>








    <div class="main-box"><div class="post_form">
    <form id="postForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data"> 
    
    <p class="post_head">Create a New Post to buy with a group</p>


    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <label class="post_form_label">Title :</label>
     <input type="text" name="title" placeholder="Post Content" value="<?php echo $product_name; ?>" required><br> 
     <label class="post_form_label">Content :</label>

     <textarea name="content" placeholder="Post Content" required><?php echo $description; ?></textarea><br> 
     <label class="post_form_label">Quantity :</label>

     <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" required><br> 
     <label class="post_form_label">Choose image :</label>

<!-- Display the current image -->
<?php if (!empty($image_path)): ?>
    <img src="<?php echo $image_path; ?>" alt="Current Image">
<?php endif; ?>

<!-- File input for image upload -->
<input type="file" name="image" accept="image/*">      <!-- Button to show confirmation popup --> 
      <button type="submit" name="submit_post">Submit Post</button> 
     </form>
</div>
 
<?php 
}else{
    echo "You have to log in to create a post";
}
?></div>



    <div class="side-box">
        
    <?php
        
        // Prepare the SQL query
        $sql_group_contributor = "SELECT *
        FROM group_purchase 
        WHERE leader_id = $user_id";
        
            echo $sql_group_contributor;
    // Execute the query
    $result_group_contributor = mysqli_query($conn, $sql_group_contributor);
    
    // Check if the query was successful
    if (!$result_group_contributor) {
    die('Query failed: ' . mysqli_error($conn));
    }
    
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result_group_contributor)) {
    $group_id= $row['title'];
    echo $group_id;
    } 
    ?>
    

    </div>
</div>






    


<div class="blogHome">
   <h2>Group Selling Posts</h2>
   <?php

// Fetch and display group selling posts

$query = "SELECT group_purchase.*, user.name, user.profile_picture, COUNT(group_purchase_contributor.id) AS contributor_count
          FROM group_purchase
          LEFT JOIN user ON group_purchase.leader_id = user.user_id
          LEFT JOIN group_purchase_contributor ON group_purchase.group_id = group_purchase_contributor.group_id
          GROUP BY group_purchase.group_id
          ORDER BY group_purchase.timestamp DESC";

$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));



   while ($row = mysqli_fetch_assoc($result)):
      echo '<div class="blog-post">';
      echo '<h5><img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' . $row['name'] .'</h5>';
      echo '<h4>Posted at '.$row['timestamp'].'</h4>';
      echo '<h3>'.$row['title'].'</h3>';
      echo '<p>'.$row['content'].'</p>';

      

      // Retrieve district information from the user table based on leader_id
      $leader_id = $row['leader_id'];
      $district_query = "SELECT * FROM user WHERE user_id = '$leader_id'";
      $district_result = mysqli_query($conn, $district_query);
      if ($district_result && mysqli_num_rows($district_result) > 0) {
          $district_row = mysqli_fetch_assoc($district_result);
          $district = $district_row['district'];
          echo '<p>District: ' . $district . '</p>';
      } else {
          echo '<p>District: Unknown</p>';
      }
      // Check if the post has an image
      if (!empty($row['p_image'])) {
          echo '<img src="' . $row['p_image'] . '" alt="Post Image">';
      }

      // Form for placing bids
echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" onsubmit="return confirmBid()">';
echo '<input type="hidden" name="post_id" value="'.$row['group_id'].'">';
echo '<p>Quantity Available: '.$row['quantity'].'</p>';
// Display the number of contributors
echo '<p>Number of Contributors: '.$row['contributor_count'].'</p>';

echo '<p for="bid_price">Do you want to purchase in a group?Bid here.</p>';
echo '<input type="number" name="bid_amount" placeholder="Enter the amount you want to bid" required>';
// Change the button type to "button" to prevent automatic form submission
echo '<button type="submit" name="bid" onclick="showConfirmation()">Contribute</button>';
echo '</form>';


      echo '</div>'; // Closing blog-post div
   endwhile;
   ?>
</div>
      <?php

// Handle bids on posts
if(isset($_POST['bid'])) {
    $group_id = $_POST['post_id'];
    $bid_quantity = intval($_POST['bid_amount']); // Convert to integer for numerical operations


 // Check if the user has already contributed to this group post
 $contribution_check_query = "SELECT * FROM group_purchase_contributor WHERE user_id = '$user_id' AND group_id = '$group_id'";
 $contribution_check_result = mysqli_query($conn, $contribution_check_query);

 if (mysqli_num_rows($contribution_check_result) > 0) {
     
     echo "You have already contributed to this group post.";
 } else {
    // Query to find out quantity for each group
$query = "SELECT *
FROM group_purchase
WHERE  group_id='$group_id'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
die('Query failed: ' . mysqli_error($conn));
}

// Fetch and display the results
while ($row = mysqli_fetch_assoc($result)) {
$quantity_remain= $row['quantity'];
$product_id_group=$row['product_id'] ;
}


// Validate bid quantity
if (!is_numeric($bid_quantity) || $bid_quantity <= 0) {
echo "Invalid bid quantity";
exit();
}
$sum=$quantity_remain-$bid_quantity;
if($sum>=0){
// Prepare the INSERT statement
$insert_query = "INSERT INTO group_purchase_contributor (user_id, group_id, bid, quantity) VALUES ('$user_id', '$group_id', 1, '$bid_quantity')";

// Execute the INSERT statement
if (mysqli_query($conn, $insert_query)) {
// Bid successfully inserted, now update the quantity in group_purchase table
$update_query = "UPDATE group_purchase SET quantity = quantity - '$bid_quantity' WHERE group_id = '$group_id'";
if (mysqli_query($conn, $update_query)) {
    $product_cart_query="SELECT * FROM `product` WHERE product_id= '$product_id_group' ";
                        $product_cart_res = mysqli_query($conn,$product_cart_query);
                         while($row=mysqli_fetch_array($product_cart_res)){
                            $price_per_unit = $row['price'];
                            }
                            
                           $total_price= $price_per_unit*$bid_quantity;
    $cart_update_query ="INSERT INTO `cart`(`user_id`, `product_id`, `product_price`, `quantity`, `order_type`,`group_id`) VALUES ('$user_id','$product_id_group','$total_price','$bid_quantity','group','$group_id')";
    echo $cart_update_query;
    // Display a success message
    if (mysqli_query($conn, $cart_update_query)) {
        echo  "The product is added to your cart.";

    }

    echo  "Your contribution is recorded.";
  unset($_POST['bid_amount']); 
  // Redirect to the same page using GET request to prevent form resubmission
  //header("Location: ".$_SERVER['PHP_SELF']);
  exit();

} else {
  echo "Error updating quantity: " . mysqli_error($conn);
}
} else {
echo "Error inserting bid: " . mysqli_error($conn);
}
}else{
//echo "<script>alert('The number of contributions exceeded the limit!') </script>";
//header("Refresh:0");

}
 }

$conn->close();
 }
?>

</body>
</html>
