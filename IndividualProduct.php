<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual product</title>
    <link rel="stylesheet" href="css\Individual Product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>
    <?php 
    include('header.php');
    include('template\db_connect.php');

   $product_id = 0;
   if (isset($_GET['data'])) {
    $product_id = $_GET['data'];
   }

    
    $sql = "SELECT * FROM `product` WHERE product_id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $category = $row['category'];
            $price = $row['price'];
            $farmer = $row['user_id'];
            $image = $row['image'];
            $quantity = $row['quantity'];
            $description = $row['description'];

            echo '
            <div class="main_div">

                <div class="left_div">
                    <div style="font-weight: bold; font-size: 40px">'.$name.'</div>
                    <div style="display: flex; gap: 80px;">
                        <p>Category: '.$category.' </p>
                        <p>Farmer: '.$farmer.' </p>
                    </div>
                    <div><img src="'.$image.'" alt="" width="100%" height="100%"></div>
                </div>

                <div class="right_div">
                    <form id="quantityForm" action="IndividualProduct.php?data='.$product_id.'" method="post" onsubmit="enableInput()">
                        <div style="font-weight: bold; margin-top: 60px">Quantity (kg)</div>

                        <div style="display: flex; gap: 20px">
                            <div><button type="button" id="minusButton" name="minus" onclick="decrementQuantity()">-</button></div>
                            <div><input type="text" id="quantityInput" name="quantity" disabled value="1"></div>
                            <div><button type="button" id="plusButton" name="plus" onclick="incrementQuantity()">+</button></div>
                        </div>

                        <div style="margin: 20px 0 0 60px">
                            Remaining: <input type="text" id="remaining" name="remaining" disabled
                            value="'.($quantity - 1).'"> (kg)
                        </div>

                        <div style="margin-right: 40px">
                            Price: <input type="text" id="pricePerUnit" name="pricePerUnit" disabled value="'.$price.'">
                        </div>

                        <div style="margin-left: 20px">
                            Total Price: <input type="text" id="totalPrice" name="totalPrice" disabled value="'.$price.'">
                        </div>

                        <button name="cart" class="cart_btn">Add to Cart</button>
                    </form>

                </div>

            </div>

            <div class="main_div_2">
                <div>
                    <h1>Product Description</h1>
                    <p> '.$description.' </p>
                </div>
            </div>';
        }


        if (isset($_POST['cart'])) {
             $product_id = (int)$product_id;
            $quantity = (int)$_POST['quantity'];
            $totalPrice = (float)$_POST['totalPrice'];

            // Prepare the SQL statement
            $sql = "INSERT INTO `cart`(`product_id`, `product_price`, `quantity`) 
            VALUES ($product_id, $totalPrice, $quantity)";

            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href = 'AllProduct.php';</script>";
                exit; // Make sure to exit after the redirect to prevent further execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }



    } else {
    echo "0 results";
    }

    // Close the connection
    $conn->close();


    ?>

    <?php include('footer.php')?>




    <script>
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var remaining = document.getElementById("remaining");
        var totalPrice = document.getElementById("totalPrice");
        var pricePerUnit = document.getElementById("pricePerUnit").value;

        var currentQuantity = parseInt(quantityInput.value);
        var quantityOutput = parseInt(remaining.value);

        if (!isNaN(currentQuantity) && quantityOutput > 0) {
            quantityInput.value = currentQuantity + 1;
            remaining.value = quantityOutput - 1;

            // Calculate total price
            var totalPriceValue = (currentQuantity + 1) * pricePerUnit;
            totalPrice.value = totalPriceValue; // Ensure total price has 2 decimal places

        } else {
            quantityInput.value = 1; // If no value is present or remaining quantity is 0, set it to 1
            totalPrice.value = pricePerUnit; // Reset total price to price per unit
        }
    }


    function decrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var remaining = document.getElementById("remaining");
        var totalPrice = document.getElementById("totalPrice");
        var pricePerUnit = document.getElementById("pricePerUnit").value;

        var currentQuantity = parseInt(quantityInput.value);
        var quantityOutput = parseInt(remaining.value);

        if (!isNaN(currentQuantity) && currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
            remaining.value = quantityOutput + 1;

            // Calculate total price
            var totalPriceValue = (currentQuantity - 1) * pricePerUnit;
            totalPrice.value = totalPriceValue; // Ensure total price has 2 decimal places

        } else {
            quantityInput.value = 1; // Ensure quantity doesn't go below 1
            totalPrice.value = pricePerUnit; // Reset total price to price per unit
        }
    }


    function enableInput() {
            // Enable the disabled input field just before submitting the form
            document.getElementById("quantityInput").disabled = false;
            document.getElementById("totalPrice").disabled = false;
    }

    </script>


</body>

</html>