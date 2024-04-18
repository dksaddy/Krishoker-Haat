<?php
include('header.php');
include('template\db_connect.php');

if(isset($_GET['data1']) && isset($_GET['data2']) && isset($_GET['data3'])) {
    // Retrieve the values from the URL parameters
    $product_id = $_GET['data1'];
    $quantity = $_GET['data2'];
    $totalPrice = $_GET['data3'];

    /*// Now you can use these variables as needed
    echo "Product ID: " . $product_id . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Total Price: " . $totalPrice;
*/
    // Fetch seller_id 
$sql_seller_id = "SELECT user_id FROM product WHERE product_id = $product_id";
$result_seller_id = $conn->query($sql_seller_id);
if ($result_seller_id->num_rows > 0) {
    $row = $result_seller_id->fetch_assoc();
    $seller_id = $row['user_id'];
    /*echo $seller_id;*/
    
// Insert order into order_table
$sql_insert_order = "INSERT INTO order_table (buyer_id, seller_id, product_id, `quantity`, `status`, `payment_method`) VALUES ($user_id, $seller_id, $product_id, '$quantity', 'pending', 'COD')";
/*echo $sql_insert_order;*/
if ($conn->query($sql_insert_order) === TRUE) {
    // Set a success message
    $_SESSION['order_success'] = 'Order is placed Successfully';

    // Close the database connection
    $conn->close();

    header("Location: payment.php");
    exit();
} else {
    die("Error executing the statement: " . $conn->error);
}
} else {
echo "Something Went wrong, Please Try again Later.";
}
}


$conn->close();
?>















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* CSS for styling the button */
        .type {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        /* Hover effect */
        .type:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="payment.php" enctype="multipart/form-data" method="post">
    <div>
    <?php 
if(isset($_POST['pay_now'])) {
    if(isset($_SESSION['order_success'])) {
        echo "<p style='color:green;  text-align: center;'>{$_SESSION['order_success']}</p>";
        // Clear the success message after displaying
        unset($_SESSION['order_success']);
    }
}
?>

        </div>
        <button class="type" type="submit"name ="pay_now">Payment</button>
    </form>
</body>
</html>
