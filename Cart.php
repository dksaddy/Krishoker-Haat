<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css\Cart.css">
</head>

<body>

    <?php 
    include("header.php");
    $prob = "<div class=movin_cart> <img src=image\Icon\cart.png width=25px> </div>";
    ?>





    <div class="central_div">

        <?php

        if(isset($_POST['dlt_btn'])) {
            if(isset($_POST['chose'])) {
                $selected_values = $_POST['chose'];

                foreach($selected_values as $value) {
                    $sql = "DELETE FROM cart WHERE cart_id = $value";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }

                }
                $conn->close();

            } else {
            $prob = "Please Select the product";
            }
        }




        if(isset($_POST['proceed'])) {
            if(isset($_POST['chose'])) {
                $selected_values = $_POST['chose'];
                
                $dataString = urlencode(serialize($selected_values));

                $total = $_POST['total'];
                echo "<script>window.location.href = 'blank.php?carts=$dataString&bill=$total';</script>";


            }else {
                $prob = "Please Select the product";
            }
        }

        



        if(isset($_POST['dlt_btn1'])) {
            if(isset($_POST['chose1'])) {
                $selected_values = $_POST['chose1'];

                foreach($selected_values as $value) {
                    $sql = "DELETE FROM cart WHERE cart_id = $value";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }

                }
                $conn->close();

            } else {
            $prob = "Please Select the product";
            }
        }


       



       


        if(isset($_POST['proceed1'])) {
            if(isset($_POST['chose1'])) {
                $selected_values = $_POST['chose1'];
                
                $dataString = urlencode(serialize($selected_values));

                $total = $_POST['total1'];
                echo "<script>window.location.href = 'blank.php?carts=$dataString&bill=$total';</script>";


            }else {
                $prob = "Please Select the product";
            }
        }





        ?>






        <form action="Cart.php" method="post" onsubmit="enableInput()">

            <div class="cart_grand">

                <div class="cart_parent">

                    <?php

                    include('template\db_connect.php');
                    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND order_type = 'individual'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $cart_id = $row['cart_id'];
                            $product_id = $row['product_id'];
                            $price = $row['product_price'];
                            $quantity = $row['quantity'];
                            $order_type = $row['order_type'];

                            $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                            $result_1 = $conn->query($sql_1);
                            if ($result_1->num_rows > 0) {
                                $row_1 = $result_1->fetch_assoc();

                                $image = $row_1['image'];
                                $product_name = $row_1['p_name'];
                                $seller_id = $row_1['user_id'];
                            }

                            $sql_2 = "SELECT * FROM user WHERE user_id = $seller_id";
                            $result_2 = $conn->query($sql_2);
                            if ($result_2->num_rows > 0) {
                                $row_2 = $result_2->fetch_assoc();
                
                                $seller_name = $row_2['name'];
                
                            }

                            echo '

                            <div class="holder">

                                <div style="padding: 5px">'.$prob.'</div>


                                <div class="cart_card">

                                    <div class="first_portion">
                                        <input type="checkbox" name="chose[]" class="chose-checkbox" value="'.$cart_id.'" dataPrice="'.$price.'">
                                    </div>

                                    <div class="middle_portin">
                                        <div style="height: 100px"><img src="'.$image.'" width="100%" height="100%"></div>
                                        <div style="margin-top: 5px">'.$product_name.'</div>
                                        <div style="margin: 5px 0 5px">'.$order_type.'</div>
                                    </div>

                                    <div class="last_portion">
                                        <div>'.$seller_name.'</div>
                                        <div>Qty: '.$quantity.'</div>
                                        <div>Unit: '.$price / $quantity.'</div>
                                        <div>Total: '.$price.'</div>
                                        <div style="display: flex; justify-content: flex-end; margin-right: 10px">
                                            <button name="dlt_btn"><img src="image\Icon\bin.png" width="20px"></button>
                                        </div>
                                    </div>


                                </div>

                            </div> <!--Holder End -->
            
                            ';

                        }//while end

                    }else {
                    echo "0 results";
                    }

                    $conn->close();


                    ?>

                    <div class="proceed_parent">
                        <div style="letter-spacing: 5px;  font-family: TeX Gyre Termes Math, serif;">BILL:</div>
                        <div><input type="text" name="total" id="total" value="0" disabled></div>
                        <div>
                            <button name="proceed">Proceed <img src="image\Icon\right-arrow.png" width="30px" height="30px"></button> 
                        </div>
                    </div>
                    

                

                </div> <!--cart Parent End -->










                <div class="cart_parent">

                    <?php

                    include('template\db_connect.php');
                    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND order_type = 'group'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $cart_id = $row['cart_id'];
                            $product_id = $row['product_id'];
                            $price = $row['product_price'];
                            $quantity = $row['quantity'];
                            $order_type = $row['order_type'];

                            $sql_1 = "SELECT * FROM product WHERE product_id = $product_id";
                            $result_1 = $conn->query($sql_1);
                            if ($result_1->num_rows > 0) {
                                $row_1 = $result_1->fetch_assoc();

                                $image = $row_1['image'];
                                $product_name = $row_1['p_name'];
                                $seller_id = $row_1['user_id'];
                            }

                            $sql_2 = "SELECT * FROM user WHERE user_id = $seller_id";
                            $result_2 = $conn->query($sql_2);
                            if ($result_2->num_rows > 0) {
                                $row_2 = $result_2->fetch_assoc();
                
                                $seller_name = $row_2['name'];
                
                            }

                            echo '

                            <div class="holder">

                                <div style="padding: 5px">'.$prob.'</div>


                                <div class="cart_card">

                                    <div class="first_portion">
                                        <input type="checkbox" name="chose1[]" class="chose-checkbox1" value="'.$cart_id.'" dataPrice="'.$price.'">
                                    </div>

                                    <div class="middle_portin">
                                        <div style="height: 100px"><img src="'.$image.'" width="100%" height="100%"></div>
                                        <div style="margin-top: 5px">'.$product_name.'</div>
                                        <div style="margin: 5px 0 5px">'.$order_type.'</div>
                                    </div>

                                    <div class="last_portion">
                                        <div>'.$seller_name.'</div>
                                        <div>Qty: '.$quantity.'</div>
                                        <div>Unit: '.$price / $quantity.'</div>
                                        <div>Total: '.$price.'</div>
                                        <div style="display: flex; justify-content: flex-end; margin-right: 10px">
                                            <button name="dlt_btn1"><img src="image\Icon\bin.png" width="20px"></button>
                                        </div>
                                    </div>


                                </div>

                            </div> <!--Holder End -->
            
                            ';

                        }//while end

                    }else {
                    echo "0 results";
                    }

                    $conn->close();


                    ?>

                    <div class="proceed_parent">
                        <div style="letter-spacing: 5px;  font-family: TeX Gyre Termes Math, serif;">BILL:</div>
                        <div><input type="text" name="total1" id="total1" value="0" disabled></div>
                        <div>
                            <button name="proceed1">Proceed <img src="image\Icon\right-arrow.png" width="30px" height="30px"></button> 
                        </div>
                    </div>
                    

                

                </div> <!--cart Parent End -->



                

            </div> <!--Cart grand-->



        </form>


    </div> <!-- Central Div End-->






<script>
    // Add event listener to the "Proceed" button
    document.querySelectorAll('button[name="proceed"], button[name="proceed1"]').forEach(function(button) {
    button.addEventListener('click', function() {
        // Update the total input field
        var totalInput = document.getElementById('total');
        var newValue = 0;
        document.querySelectorAll('.chose-checkbox:checked').forEach(function(checkbox) {
            newValue += parseFloat(checkbox.getAttribute('dataPrice'));
        });
        totalInput.value = newValue;

        // Update the total1 input field
        var totalInput1 = document.getElementById('total1');
        var newValue1 = 0;
        document.querySelectorAll('.chose-checkbox1:checked').forEach(function(checkbox) {
            newValue1 += parseFloat(checkbox.getAttribute('dataPrice'));
        });
        totalInput1.value = newValue1;

        // Enable the disabled input field
        document.getElementById("total").disabled = false;
        document.getElementById("total1").disabled = false;
    }); 
    });




    // Add event listener to the checkboxes
    document.querySelectorAll('.chose-checkbox, .chose-checkbox1').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        // Update the total input field
        var totalInput = document.getElementById('total');
        var newValue = 0;
        document.querySelectorAll('.chose-checkbox:checked').forEach(function(checkbox) {
            newValue += parseFloat(checkbox.getAttribute('dataPrice'));
        });
        totalInput.value = newValue;

        // Update the total1 input field
        var totalInput1 = document.getElementById('total1');
        var newValue1 = 0;
        document.querySelectorAll('.chose-checkbox1:checked').forEach(function(checkbox) {
            newValue1 += parseFloat(checkbox.getAttribute('dataPrice'));
        });
        totalInput1.value = newValue1;
    });
    });




    window.addEventListener('load', function() {
            document.querySelectorAll('.chose-checkbox').forEach(function(checkbox) {
                checkbox.checked = false;
        });
    });

    window.addEventListener('load', function() {
            document.querySelectorAll('.chose-checkbox1').forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });
</script>


    









</body>

</html>