<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Group Details</title>
    <link rel="stylesheet" href="css/mygroup.css">
    <link rel="stylesheet" href="css/footer.css">


</head>
<body>
<?php 
        
        include("template/db_connect.php");
        ?>
        <?php include("header.php");
    
   /* if(empty($_SESSION['user'])){ 
        header( "Location: login.php");  
        exit(); 
    }*/?>

 
    <div class="first_div"><p>My Group Dashboard</p></div>

  <?php
  if (isset($_GET['group_id'])) {
    // The 'group_id' parameter is set in the URL
    $group_id = $_GET['group_id'];
    $group_sql ="SELECT * FROM group_purchase WHERE group_id =$group_id";
    $group_result = mysqli_query($conn,$group_sql);
    while ($row = mysqli_fetch_assoc($group_result)) {
       $product_id =  $row["product_id"];
       $title =$row['title'];
       $image = $row['p_image'];
       $timestamp =$row['timestamp'];
       $contributor= $row['contributors'];
       $quantity = $row['quantity'];
       $group_wallet=$row['group_wallet'];
       $status =$row['post_status'];
    }
  }
  ?>
<div class="parent">
<div class="child_div">
        <p>Group ID : <?php echo $group_id ?></p>
        <p>Total Number of Contributors : <?php echo $contributor ?></p>
        <p>Post Created at : <?php echo $timestamp ?></p>
        <p>Quantity : <?php echo $quantity?></p>
    </div>

    <div class="child_div2">
    <img src="<?php echo $image ?>" alt="product_image">
    </div>
    <div class="child_div1">
    <p>Product Title : <?php echo $title ?></p>
    <p>Product ID : <?php echo $product_id ?></p>
    <p>Group Wallet : <?php echo $group_wallet?></p>
    <p>Order Status : <?php echo $status?></p>
    </div>
    
    </div>
    <div class="content_head">
    <p>My Group Members list</p>
    </div>
<div class="content">
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Time Stamp</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment Status</th>
            <th>Send Message</th>
        </tr>
        <?php
    if (isset($_GET['group_id'])) {
    // The 'group_id' parameter is set in the URL
    $group_id = $_GET['group_id'];
    // SQL query
    $sql = "SELECT DISTINCT 
    group_purchase.group_id, 
    group_purchase.leader_id, 
    group_purchase.product_id, 
    group_purchase.title, 
    group_purchase.p_image, 
    group_purchase.post_status AS purchase_order_status, 
    group_purchase.timestamp, 
    group_purchase_contributor.user_id,
    group_purchase_contributor.quantity, 
    group_purchase_contributor.price, 
    group_purchase_contributor.order_status AS payment_status 
FROM 
    `group_purchase` 
LEFT JOIN 
    `group_purchase_contributor` ON `group_purchase_contributor`.`group_id` = `group_purchase`.`group_id` 
WHERE 
    `group_purchase`.`group_id` = 43;
";
$result = $conn->query($sql);
?>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td><a href="#"><img src="image/Icon/chat.png" alt="chat"style="height:30px;width:30px;"></a></td>

                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="10">No data found</td></tr>
        <?php endif; 
echo '</table>';
echo '</div>';

// Close connection
$conn->close();

} else {
    echo "Nothing to show,Thank you";
}
?>
<?php include("footer.php"); ?>
</body>
</html>