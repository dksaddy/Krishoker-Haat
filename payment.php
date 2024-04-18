<?php
include('../template\db_connect.php');
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    exit;
}
if (isset($_GET['data1'])) {
    $product_id = $_GET['data1'];
   }
   if (isset($_GET['data2'])) {
    $quantity = $_GET['data2'];
   }
   if (isset($_GET['data3'])) {
    $totalPrice = $_GET['data1'];
   }
echo $product_id;

// Fetch seller_id 
$sql_seller_id = "SELECT user_id FROM product WHERE product_id = $product_id";
$result_seller_id = $conn->query($sql_seller_id);

if ($result_seller_id->num_rows > 0) {
    $row = $result_seller_id->fetch_assoc();
    $seller_id = $row['user_id'];

    // Insert order into order_table
    $sql_insert_order = "INSERT INTO order_table (buyer_id, seller_id, product_id, `quantity`, `status`, `payment_method`) VALUES ($user_id, $seller_id, $product_id, `$quantity`, `pending`, `COD`)";
    if ($conn->query($sql_insert_order) === TRUE) {
            // Set a success message
            $_SESSION['order_success'] = 'Order is placed Successfully';
        
            // Close the statement
            $sql_insert_order->close();
        
            // Close the database connection
            $conn->close();
        
           
            header("Location: ../payment.php");
            exit(); 
        } else {
            die("Error executing the statement: " . $stmt->error);
   }
        
} else {
    echo "Something Went wrong ,Please Try again Later.";
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
        <button class="type" type="submit">Payment</button>
    </form>
</body>
</html>
