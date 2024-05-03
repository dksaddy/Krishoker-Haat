<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My bids</title>
    <style>
        /* CSS for styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.first_div {
    color:#99BC85;
     border-top: 3px solid #99BC85;
     border-bottom: 3px solid #99BC85;
    color: white;
    text-align: center;
    padding: 7px 7px;
}
.first_div p{
    font-size: 20px;
    color: #99BC85;
}
.content {
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #99BC85;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #99BC85;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

    </style>
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

 
    <div class="first_div"><p>My Bids</p></div>
    <div class="content">

  

<?php
    if (isset($_GET['group_id'])) {
    // The 'group_id' parameter is set in the URL
    $group_id = $_GET['group_id'];
    // SQL query
    $sql = "SELECT DISTINCT group_purchase.group_id, group_purchase.leader_id, group_purchase.product_id, 
               group_purchase.title, group_purchase.p_image, group_purchase.post_status AS purchase_order_status, 
               group_purchase.timestamp, group_purchase_contributor.quantity, group_purchase_contributor.price, 
               group_purchase_contributor.order_status AS payment_status
        FROM `group_purchase`
        LEFT JOIN `group_purchase_contributor` ON `group_purchase_contributor`.`group_id` = `group_purchase`.`group_id`
        WHERE `group_purchase`.`group_id` = $group_id AND `group_purchase_contributor`.`user_id`=$user_id ";

$result = $conn->query($sql);
?>

<div class="content">
    <table border="1">
        <tr>
            <th>Group ID</th>
            <th>Leader ID</th>
            <th>Product ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Purchase Order Status</th>
            <th>Time Stamp</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment Status</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['group_id']; ?></td>
                    <td><?php echo $row['leader_id']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><img src="<?php echo $row['p_image']; ?>" alt="product_image" style="height: 100px; width: 100px;"></td>
                    <td><?php echo $row['purchase_order_status']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
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

</body>
</html>