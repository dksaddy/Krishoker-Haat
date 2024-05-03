<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">

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
    <?php include ('header.php') ?>

    <?php
    //including Database
    include ("template/db_connect.php");

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: community_post.php");
        exit();
    }


    /*Handle form submissions Start*/
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Check if the form is for creating a new post
        if (isset($_POST['submit_post'])) {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $content = mysqli_real_escape_string($conn, $_POST['content']);
            $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
            $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
            //echo $title;
            $image_path = mysqli_real_escape_string($conn,$_POST['image_path']);
            /*// Check if an image file is uploaded
            if (isset($_FILES['image'])) {
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_path = "image/community_post/" . $image;

                // Move uploaded file to the uploads directory
                move_uploaded_file($image_tmp, $image_path);
            } else {
                $image_path = ''; // If no image is uploaded, set default value
            }
*/
            // Insert post into the database
            $insertPostQuery = "INSERT INTO group_purchase (leader_id,product_id, title, content, p_image, post_status,quantity) VALUES ('$user_id','$product_id', '$title', '$content', '$image_path','pending', '$quantity')";
            mysqli_query($conn, $insertPostQuery) or die('Post creation failed: ' . mysqli_error($conn));

            // Redirect to the same page after post creation
            header("Location: community_post.php");
            exit();
        }
    }
    /*handle form Submission End*/
    ?>
    <?php
    /*comment function start*/
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['submit_comment'])) {
            $group_id = mysqli_real_escape_string($conn, $_POST['group_id']);
            $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);
        }
        // Check if the comment text is not empty
        if (!empty($comment_text)) {
            // Insert comment into the database
            $commentQuery = "INSERT INTO group_purchase_comments (user_id, group_id, comment_text) VALUES ('$user_id', '$group_id', '$comment_text')";
            mysqli_query($conn, $commentQuery) or die('Comment query failed: ' . mysqli_error($conn));
            header("Location: community_post.php");
            exit();
        }

        // Handle comment deletion
        if (isset($_POST['delete_comment'])) {
            $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

            // Perform delete operation
            $deleteCommentQuery = "DELETE FROM group_purchase_comments WHERE comment_id = '$comment_id'";
            mysqli_query($conn, $deleteCommentQuery) or die('Comment deletion failed: ' . mysqli_error($conn));


            // Redirect to the same page after deletion
            header("Location: community_post.php");
            exit();
        }
    }
    /*comment  function end*/
    ?>


    <?php
    /*Retriving data From Link*/
    $product_name = " ";
    $price = "";
    $description = "";
    $category = "";
    $image_path = "";
    // Retrieve values from URL parameters
    if (isset($_GET['data1']) && isset($_GET['data2']) && isset($_GET['data3'])) {
        $product_id = urldecode($_GET['data1']);
       // echo $product_id;
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
                $description = htmlspecialchars($row['description']);
                $category = htmlspecialchars($row['category']);
                $image_path = htmlspecialchars($row['image']);
               // echo $image_path;

            }
        } else {
            // Display error message if query fails
            echo "Error: " . mysqli_error($conn);
        }

        // Free result set
        mysqli_free_result($product_result);

/*Retriving Data from Link End*/
    }
    ?>

    <?php
    if (isset($_SESSION['user_id'])) {
        ?>

        <div class="dropdown-container_sort">
            






            <div class="slideable-text">
                <p>কৃষকের হাটে স্বাগতম।</p>
            </div>


            <div class="search">
                <form action="community_post.php" method="GET">
                    <input type="text" name="search" placeholder="পণ্য খুজুন..." required>
                    <button type="submit">খুজুন</button>
                </form>
            </div>


        </div>


        <div class="first_container">
            <div class="side-box1">
                <div class="side-box-header">
                    <p>আমার গ্রুপ</p>
                </div>

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
                    $group_id = $row['title'];
                    echo '
            <div class="product_child_2_1">
                <a href="my_group.php?group_id=' . $row['group_id'] . '">' . $row['title'] . ' - ক্রয়ের গ্রুপ</a><br>

            </div>';
                }
                ?>

<div class="side-box-header">
                <p>আমার বিড</p>
            </div>

            <?php

            // Prepare the SQL query
            $sql_group_contributor = "SELECT *
        FROM group_purchase_contributor 
        WHERE user_id = $user_id";

            //echo $sql_group_contributor;
            // Execute the query
            $result_group_contributor = mysqli_query($conn, $sql_group_contributor);

            // Check if the query was successful
            if (!$result_group_contributor) {
                die('Query failed: ' . mysqli_error($conn));
            }

            // Fetch and display the results
            while ($row = mysqli_fetch_assoc($result_group_contributor)) {
                $group_id = $row['group_id'];

                // Prepare the SQL query
                $sql_group_contributor_find_group = "SELECT *
FROM group_purchase 
WHERE group_id = $group_id";

                //echo $sql_group_contributor;
// Execute the query
                $result_group_contributor_find_group = mysqli_query($conn, $sql_group_contributor_find_group);

                // Check if the query was successful
                if (!$result_group_contributor_find_group) {
                    die('Query failed: ' . mysqli_error($conn));
                }

                // Fetch and display the results
                while ($row = mysqli_fetch_assoc($result_group_contributor_find_group)) {
                    //$group_title= $row['title'];
//echo $group_title;
echo '
<div class="product_child_2_1">
    <a href="my_bid.php?group_id=' . $row['group_id'] . '">' . $row['title'] . ' - ক্রয়ের বিড</a><br>
</div>';

                }
            }
?>


            </div>









            <div class="main-box">
            <div class="blogHome">
        <h2>গ্রুপ বিক্রয় পোস্ট</h2>
        <?php
// Fetch and display group selling posts
if (isset($_GET['search'])) {
    $search_term = $_GET['search'];

    // SQL query with a prepared statement
    $query = $conn->prepare("SELECT group_purchase.*, user.name, user.profile_picture, COUNT(group_purchase_contributor.id) AS contributor_count
        FROM group_purchase
        LEFT JOIN user ON group_purchase.leader_id = user.user_id
        LEFT JOIN group_purchase_contributor ON group_purchase.group_id = group_purchase_contributor.group_id
        WHERE title LIKE CONCAT('%', ?, '%') OR user.district LIKE CONCAT('%', ?, '%') OR user.name LIKE CONCAT('%', ?, '%')
        GROUP BY group_purchase.group_id
        ORDER BY group_purchase.timestamp DESC");
    
    // Bind the search term parameter
    $query->bind_param("sss", $search_term,$search_term, $search_term);
    
    // Execute the prepared statement
    $query->execute();

    // Get the result set
    $result = $query->get_result();
} else {
    // Default query without search term
    $result = mysqli_query($conn, "SELECT group_purchase.*, user.name, user.profile_picture, COUNT(group_purchase_contributor.id) AS contributor_count
        FROM group_purchase
        LEFT JOIN user ON group_purchase.leader_id = user.user_id
        LEFT JOIN group_purchase_contributor ON group_purchase.group_id = group_purchase_contributor.group_id
        GROUP BY group_purchase.group_id
        ORDER BY group_purchase.timestamp DESC") or die('Query failed: ' . mysqli_error($conn));
}



        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="blog-post">';
            echo '<h5><img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' . $row['name'] . '</h5>';
            echo '<h4>Posted at ' . calculateTimeDifference($row['timestamp']). '</h4>';
            echo '<h3>পণ্যের নাম : ' . $row['title'] . '</h3>';
            
            echo '<p>পণ্যের বিবরণ :' . $row['content'] . '</p>';
            $group_id = $row['group_id'];

            //echo $group_id;

            // Retrieve district information from the user table based on leader_id
            $leader_id = $row['leader_id'];
            $district_query = "SELECT * FROM user WHERE user_id = '$leader_id'";
            $district_result = mysqli_query($conn, $district_query);
            if ($district_result && mysqli_num_rows($district_result) > 0) {
                $district_row = mysqli_fetch_assoc($district_result);
                $district = $district_row['district'];
                echo '
                <div class="district">
                <p>জেলা : ' . $district . '</p>';
               echo' </div>';
                
            } else {
                echo '<p>জেলা : Unknown</p>';
            }
            // Check if the post has an image
            if (!empty($row['p_image'])) {
                echo '<img src="' . $row['p_image'] . '" alt="Post Image">';
            }

            // Form for placing bids
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post" onsubmit="return confirmBid()">';
            echo '<input type="hidden" name="group_id" value="' . $row['group_id'] . '">';
            // Wrapping elements in separate divs for layout
echo '<div class="info-container">';
echo '<div class="quantity-info">Quantity Available: ' . $row['quantity'] . '</div>';
echo '<div class="contributor-info">Number of Contributors: ' . $row['contributor_count'] . '</div>';
echo '</div>';

echo '<div class="info-bid-container">';
echo '<div class="bid-container">';

            echo '<p for="bid_price">Do you want to purchase in a group?Bid here.</p>';
            echo '<input type="number" name="bid_amount" placeholder="Enter the amount you want to bid" required>';
            // Change the button type to "button" to prevent automatic form submission
            echo '<button class="bid_button" type="submit" name="bid" onclick="showConfirmation()">Contribute</button>';
            echo '</div>';
            // Div container for message button
echo '<div class="message-container">';
// Replace 'YOUR_LINK_HERE' with the link you want to direct the user to, including the group_id parameter
echo '<a href="YOUR_LINK_HERE?group_id=' . $row['group_id'] . '"><button class="message_button"><img src="image/Icon/chat.png" alt="chat"></button></a>';
echo '</div>';
echo '</div>';

            echo '</form>';


            //Delete options for comments
            echo '<div class="comments-section">';
            echo '<h1>Comments:</h1>';

            $commentQuery = "SELECT group_purchase_comments.*, user.*
                   FROM group_purchase_comments
                   INNER JOIN user ON group_purchase_comments.user_id = user.user_id
                   WHERE group_id = '$group_id'
                   ORDER BY group_purchase_comments.timestamp DESC";

            $commentResult = mysqli_query($conn, $commentQuery) or die('Comment query failed: ' . mysqli_error($conn));

            while ($comment = mysqli_fetch_assoc($commentResult)):
                echo '<div class="comment">';
                echo '<p><img src="' . $comment['profile_picture'] . '" alt="Profile Picture" class="round-image"> ' . ' <strong>' . $comment['name'] . '</strong>. </p>';

                //echo '<p>By <strong>'.$comment['first_name'].' '.$comment['last_name'].'</strong></p>';
        
                echo '<h2>' . $comment['comment_text'] . '</h2>';
                echo '<div class="comment-container">';
echo '<h3 class="timestamp">' . $comment['timestamp'] . '</h3>';

// Add delete option for comments if the user is the owner
if ($comment['user_id'] == $_SESSION['user_id']) {
    echo '<form class="delete-form" method="post" action="community_post.php">';
    echo '<input type="hidden" name="comment_id" value="' . $comment['comment_id'] . '">';
    echo '<button type="submit" name="delete_comment"><img src="image/Icon/bin.png" alt="bin.png"></button>';
    echo '</form>';
}

echo '</div>';

                echo '</div>';
            endwhile;


echo '<div class="comment_form">';
// Comment form
            echo '<form method="post" action="community_post.php">';
            echo '<input type="hidden" name="group_id" value="' . $row['group_id'] . '">';
            echo '<textarea name="comment_text" placeholder="Write your comment here"required></textarea>';
            echo '<button type="submit" name="submit_comment" value="Submit Comment">Submit Comment</button>';
            echo '</form>';
echo '</div>';
            

            echo '</div>'; // Closing comments-section div
        


            echo '</div>'; // Closing blog-post div
        }
        ?>
    </div>
            
        </div>



        <div class="side-box">
            
        <?php if (isset($_GET['data1']) && isset($_GET['data2']) && isset($_GET['data3'])) {?>
                <div class="post_form">
                    <form id="postForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                        enctype="multipart/form-data">

                        <p class="post_head">গ্রুপের সাথে কিনতে একটি নতুন পোস্ট তৈরি করুন</p>


                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <p>পণ্যের শিরোনাম :<?php echo $product_name; ?></p>
                        <input type="hidden" name="title" placeholder="Post Content" value="<?php echo $product_name; ?>"
                            required><br>
                        <label class="post_form_label">এখানে আপনার পোস্টের বিষয়বস্তু লিখুন :  ***</label>

                        <textarea name="content" placeholder="Post Content"
                            required><?php echo $description; ?></textarea><br>
                        <label class="post_form_label">পরিমাণ :</label>

                        <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>"
                            required><br>
                        <label class="post_form_label">পণ্যের ছবি :</label>

                        <!-- Display the current image -->
                        <?php if (!empty($image_path)): ?>
                            <img src="<?php echo $image_path; ?>" alt="Current Image">
                        <?php endif; ?>

                        <!-- File input for image upload -->
                        <input type="hidden" name="image_path" value="<?php echo $image_path; ?>">
                         <!-- Button to show confirmation popup -->
                        <button type="submit" name="submit_post">পোস্ট জমা দিন</button>
                    </form>
                </div>

            <?php
            }else{
                echo '<div class=""new item><p>Post near BY you</p></div>';
            }
    } else {
        echo "You have to log in to create a post";
    }
    ?>
        </div>
    </div>

    
    <?php

    // Handle bids on posts
    if (isset($_POST['bid'])) {
        $group_id = $_POST['group_id'];
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
                $quantity_remain = $row['quantity'];
                $product_id_group = $row['product_id'];
            }


            // Validate bid quantity
            if (!is_numeric($bid_quantity) || $bid_quantity <= 0) {
                echo "Invalid bid quantity";
                exit();
            }
            $sum = $quantity_remain - $bid_quantity;
            if ($sum >= 0) {
                $product_cart_query = "SELECT * FROM `product` WHERE product_id= '$product_id_group' ";
                        $product_cart_res = mysqli_query($conn, $product_cart_query);
                        while ($row = mysqli_fetch_array($product_cart_res)) {
                            $price_per_unit = $row['price'];
                        }

                        $total_price = $price_per_unit * $bid_quantity;
                // Prepare the INSERT statement
                $insert_query = "INSERT INTO group_purchase_contributor (user_id, group_id, bid, quantity,price) VALUES ('$user_id', '$group_id', 1, '$bid_quantity','$total_price')";

                // Execute the INSERT statement
                if (mysqli_query($conn, $insert_query)) {
                    // Bid successfully inserted, now update the quantity in group_purchase table
                    $update_query = "UPDATE group_purchase SET quantity = quantity - '$bid_quantity', contributors = contributors + 1 WHERE group_id = '$group_id'";

                    if (mysqli_query($conn, $update_query)) {
                        
                        $cart_update_query = "INSERT INTO `cart`(`user_id`, `product_id`, `product_price`, `quantity`, `order_type`,`group_id`) VALUES ('$user_id','$product_id_group','$total_price','$bid_quantity','group','$group_id')";
                        echo $cart_update_query;
                        // Display a success message
                        if (mysqli_query($conn, $cart_update_query)) {
                            echo "The product is added to your cart.";

                        }

                        echo "Your contribution is recorded.";
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
            } else {
                //echo "<script>alert('The number of contributions exceeded the limit!') </script>";
//header("Refresh:0");
    
            }
        }

        $conn->close();
    }
    ?>





<?php 
//function for showing time
// Function to calculate time difference and format it
function calculateTimeDifference($timestamp) {
    // Set the default time zone to Dhaka, Bangladesh
    date_default_timezone_set('Asia/Dhaka');

    // Get the current time
    $currentTime = new DateTime();

    // Convert the database timestamp to a DateTime object
    $dbTime = new DateTime($timestamp);

    // Calculate the difference
    $interval = $currentTime->diff($dbTime);

    // Format the difference
   // Format the difference
$format = '';

if ($interval->y > 0) {
    $format .= '%y years ago';
} elseif ($interval->m > 0) {
    $format .= '%m months ago';
} elseif ($interval->d > 0) {
    $format .= '%d days ago';
} elseif ($interval->h > 0) {
    $format .= '%h hours ago';
} elseif ($interval->i < 1) {
    $format .= 'Just now';
} elseif ($interval->h < 1) {
    $format .= '%i minutes ago';
} elseif ($interval->d < 1) {
    $format .= '%h hours ago';
}else{
    $format.='Listed in future';
}

    // Format the difference and return
    return $interval->format($format);
}
include("footer.php");
?>

</body>

</html>
