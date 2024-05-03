<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\blank.css">
    <link rel="stylesheet" href="css\footer.css">
    <title>Payment</title>
</head>

<body>
    <?php 
    include('header.php');
    include('template\db_connect.php');
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $balance = $row['curr_balance'];
    }
    ?>

<?php
    if (isset($_GET['carts']) && isset($_GET['bill'])) {
        $cart = $_GET['carts'];
        $totalPrice = $_GET['bill'];
        $data = unserialize(urldecode($cart));

        
    }
    ?>

    <div class="central_div">

        <div class="main_div">

            <div class="right">
            <h1>PRODUCT LIST</h1>

                <?php
                include('template\db_connect.php');
                foreach ($data as $cart_id) {
                    $sql = "SELECT * FROM cart WHERE cart_id = $cart_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        $product_id = $row['product_id'];
                        $quantity = $row['quantity'];
                        $price = $row['product_price'];

                        $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                        $result_1 = $conn->query($sql_1);
                        if ($result_1->num_rows > 0) {
                            $row_1 = $result_1->fetch_assoc();

                            $p_name = $row_1['p_name'];
                            $image = $row_1['image'];
                        }

                    } //result checking if clause.

                    echo '
                    <div class="list_card">
                        <div><img src="'.$image.'" width="100px"></div>
                        <div>'.$p_name.'</div>
                        <div>Qty: '.$quantity.'</div>
                        <div>Unit: '.$price / $quantity.'</div>
                        <div>Total: '.$price.'</div>
                    </div>
                    
                    ';
                }

                $conn->close();
                
                ?>

            </div>


            <div class="left">
                <h1>PAYMENT METHODS</h1>

                <form action="blank_1.php" method="post">
                     <!-- Serialize the cart data and pass it as a hidden input -->
                     <input type="hidden" name="carts" value="<?php echo isset($data) ? urlencode(serialize($data)) : ''; ?>">
                    <!-- Pass the total price as a hidden input -->
                    <input type="hidden" name="bill" value="<?php echo isset($totalPrice) ? $totalPrice : ''; ?>">

                    <label>Mobile Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="bkash">
                            <img src="image\Icon\bkash.jpg" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="nagad">
                            <img src="image\Icon\Nagad.png" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="rocket">
                            <img src="image\Icon\rocket.png" width="100px" alt="">
                        </div>

                    </div>

                    <label>Card Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="master">
                            <img src="image\Icon\master card.png" width="100px" alt="">
                        </div>

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="visa">
                            <img src="image\Icon\visa card.jpg" width="100px" alt="">
                        </div>

                    </div>


                    <label>Wallet Banking</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="wallet">
                            <div class="wallet">
                                <input type="text" value="<?php echo $balance?>" disabled>
                            </div>
                        </div>

                    </div>


                    <label>Cash On Delivery</label>
                    <div class="banking_div">

                        <div class="option_div">
                            <input type="radio" name="payment_option" value="cod">
                            <img src="image\Icon\cod.png" width="100px">
                        </div>

                    </div>


                    <div><!--Error msg--></div>
                    <div class="banking_div">

                        <div class="option_div">
                        <div style="font-size: 18px; padding-top: 8px; font-weight: bold">Payable Amount:</div>
                            <input id="amount" type="text" name="bill" value="<?php if(isset($_GET['bill'])) echo $_GET['bill'];?>" disabled>
                            <button name="payment">Payment</button>
                        </div>

                    </div>



                </form>

                <?php
                    if (isset($_POST['payment'])) {
                        if (isset($_POST['payment_option'])) {

                            if ($_POST['payment_option'] === 'bkash') {
                                $info = "bkash";
                                prosess($info, $user_id);

                            }elseif ($_POST['payment_option'] === 'nagad') {
                                $info = "nagad";
                                prosess($info, $user_id);

                            }elseif ($_POST['payment_option'] === 'rocket') {
                                $info = "rocket";
                               prosess($info, $user_id);
                                
                            }elseif ($_POST['payment_option'] === 'master') {
                                $info = "master";
                                prosess($info, $user_id);

                            }elseif ($_POST['payment_option'] === 'visa') {
                                $info = "visa";
                                prosess($info, $user_id);


                            }elseif ($_POST['payment_option'] === 'wallet') {
                                $data = unserialize(urldecode($_POST['carts']));
                                $totalPrice = $_POST['bill'];
                                $new_balance = $balance - $totalPrice;
                                
                                include('template\db_connect.php');
                                foreach($data as $cart_id){
                                    $sql = "SELECT * FROM cart WHERE cart_id = $cart_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();

                                        $product_id = $row['product_id'];
                                        $quantity = $row['quantity'];
                                        $group_id =  $row['group_id'];

                                        $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                                        $result_1 = $conn->query($sql_1);
                                        if ($result_1->num_rows > 0) {
                                            $row_1 = $result_1->fetch_assoc();

                                            $seller_id = $row_1['user_id'];
                                        }

                                    } //result checking if clause.


                                    // Prepare the SQL statement
                                    $insertSql = "INSERT INTO `group_order_table`(group_id, seller_id, product_id, quantity, delivery_status, payment_method) 
                                    VALUES ($group_id, $seller_id, $product_id, $quantity, 'pending', 'wallet')";

                                    if ($conn->query($insertSql) === TRUE) {

                                        $group_purchase_sql = "SELECT group_wallet FROM group_purchase WHERE group_id = $group_id";
                                        $group_purchase_result = $conn->query($group_purchase_sql);
                                        $group_purchase_row =  $group_purchase_result->fetch_assoc();

                                        $final_payment = $group_purchase_row['group_wallet'] + $totalPrice;

                                        $group_purchase_update_sql = "UPDATE group_purchase SET group_wallet = $final_payment WHERE group_id = $group_id";

                                        if ($conn->query($group_purchase_update_sql) === TRUE) {
                                            $updateSql = "UPDATE user SET curr_balance = $new_balance WHERE user_id = $user_id";
                                            
                                            if ($conn->query($updateSql) === TRUE) {
                                                
                                                $group_purchase_contributor_sql = "UPDATE group_purchase_contributor SET order_status = 'paid' WHERE group_id = $group_id AND user_id = $user_id";

                                                if ($conn->query($group_purchase_contributor_sql) === TRUE) {
                                                    
                                                    $delete_sql = "DELETE FROM cart WHERE cart_id = $cart_id";

                                                    if ($conn->query($delete_sql) === TRUE) {

                                                        echo "<script>window.location.href = 'OrderConfirmation.php';</script>";
                                                    }else {
                                                        echo "Error: " . $sql . "<br>" . $conn->error;
                
                                                    }  //delete from cart
                                                }else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
            
                                                }  //update
                                            }else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
        
                                            }  //update

                                        }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                        }  //delete

                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                    }  //insert


                                } //foreach Loop

                                $conn->close();


                                
                            }elseif ($_POST['payment_option'] === 'cod') {
                                $info = "cod";
                                prosess($info, $user_id);

                            } //else if end.






                        } //Payment option



                    }
                ?>


            </div>


        </div>

    </div> <!--Central div-->


    <?php

    function prosess($method, $user_id) {
        $data = unserialize(urldecode($_POST['carts']));
                                $totalPrice = $_POST['bill'];
                                include('template\db_connect.php');

                                foreach($data as $cart_id){
                                    $sql = "SELECT * FROM cart WHERE cart_id = $cart_id";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();

                                        $product_id = $row['product_id'];
                                        $quantity = $row['quantity'];
                                        $group_id =  $row['group_id'];


                                        $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                                        $result_1 = $conn->query($sql_1);
                                        if ($result_1->num_rows > 0) {
                                            $row_1 = $result_1->fetch_assoc();

                                            $seller_id = $row_1['user_id'];
                                        }

                                    } //result checking if clause.


                                     // Prepare the SQL statement
                                    $insertSql = "INSERT INTO `group_order_table`(group_id, seller_id, product_id, quantity, delivery_status, payment_method) 
                                    VALUES ($group_id, $seller_id, $product_id, $quantity, 'pending', '$method')";

                                    if ($conn->query($insertSql) === TRUE) {

                                        $group_purchase_sql = "SELECT group_wallet FROM group_purchase WHERE group_id = $group_id";
                                        $group_purchase_result = $conn->query($group_purchase_sql);
                                        $group_purchase_row =  $group_purchase_result->fetch_assoc();

                                        $final_payment = $group_purchase_row['group_wallet'] + $totalPrice;

                                        $group_purchase_update_sql = "UPDATE group_purchase SET group_wallet = $final_payment WHERE group_id = $group_id";

                                        if ($conn->query($group_purchase_update_sql) === TRUE) {
                                            
                                                
                                            $group_purchase_contributor_sql = "UPDATE group_purchase_contributor SET order_status = 'paid' WHERE group_id = $group_id AND user_id = $user_id";

                                            if ($conn->query($group_purchase_contributor_sql) === TRUE) {
                                                    
                                                $delete_sql = "DELETE FROM cart WHERE cart_id = $cart_id";

                                                if ($conn->query($delete_sql) === TRUE) {
                                                        
                                                    echo "<script>window.location.href = 'OrderConfirmation.php';</script>";
                                                }else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                
                                                }  //delete from cart
                                            }else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
            
                                            }  //update

                                        }else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                        }  //delete

                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;

                                    }  //insert



                                } //foreach Loop

                                $conn->close();
    }
    
    ?>

    <?php include('footer.php')?>

</body>

</html>