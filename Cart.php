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

        ?>






        <form action="Cart.php" method="post" onsubmit="enableInput()">

            <div class="cart_parent">

                <?php

                    include('template\db_connect.php');
                    $sql = "SELECT * FROM cart WHERE user_id = $user_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $cart_id = $row['cart_id'];
                            $product_id = $row['product_id'];
                            $price = $row['product_price'];
                            $quantity = $row['quantity'];

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



            </div>
            <!--cart Parent End -->


            <div class="proceed_parent">
                <div style="letter-spacing: 5px;  font-family: TeX Gyre Termes Math, serif;">BILL:</div>
                <div><input type="text" name="total" id="total" value="0" disabled></div>
                <div><button name="proceed">Proceed <img src="image\Icon\right-arrow.png" width="30px" height="30px"></button></div>
            </div>

        </form>


    </div> <!-- Central Div End-->






    <script>
        // Select all checkboxes with class 'chose-checkbox'
        var checkboxes = document.querySelectorAll('.chose-checkbox');

        // Add event listener to each checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var totalInput = document.getElementById('total');
                var newValue = parseFloat(totalInput.value);
                var price = parseFloat(this.getAttribute('dataPrice')); // Get the price associated with the checkbox
        
                // If the checkbox is checked, add the total value of the item
                if (this.checked) {
                newValue += price;
                } else {
                // If the checkbox is unchecked, subtract the total value of the item
                newValue -= price;
                }


                // Update the value of the total input
                totalInput.value = newValue; // Round to 2 decimal places
            });
        });



        function enableInput() {
        // Enable the disabled input field just before submitting the form
        document.getElementById("total").disabled = false;
        }



        window.addEventListener('load', function() {
            document.querySelectorAll('.chose-checkbox').forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });

    </script>

    

</body>

</html>