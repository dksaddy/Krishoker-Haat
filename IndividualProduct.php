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

    $product_id =  $_GET['data1'];
    $sql = "SELECT * FROM product WHERE product_id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $category = $row['category'];
            $price = $row['price'];
            $image = $row['image'];
            $farmer = $row['user_id'];
            $description = $row['description'];
            $quantity = $row['quantity'];
        }

    } else {
        echo "0 results";
    }
    
    // Close the connection
    $conn->close();
    

    ?>


    <div class="main_div">

        <div class="left_div">
            <div style="font-weight: bold; font-size: 40px"> <?php echo $name?> </div>
            <div style="display: flex; gap: 80px;">
                <p>Category: <?php echo $category?> </p>
                <p>Farmer: <?php echo $farmer?> </p>
            </div>
            <div><img src="<?php echo $image?>" alt="" width="100%" height="100%"></div>
        </div>

        <div class="right_div">
            <form id="quantityForm" action="IndividualProduct.php" method="post">
                <div style="font-weight: bold; margin-top: 60px">Quantity (kg)</div>

                <div style="display: flex; gap: 20px">
                    <div><button type="button" id="minusButton" name="minus" onclick="decrementQuantity()">-</button></div>
                    <div><input type="text" id="quantityInput" name="quantity" disabled value="1"></div>
                    <div><button type="button" id="plusButton" name="plus" onclick="incrementQuantity()">+</button></div>
                </div>

                <div style="margin: 20px 0 0 60px">
                Remaining: <input type="text" id="remaining" name="remaining" disabled value="<?php echo $quantity - 1?>"> (kg)
                </div>

                <div style="margin-right: 40px">
                Price: <input type="text" id="pricePerUnit" name="pricePerUnit" disabled value="<?php echo $price?>"> 
                </div>

                <div style="margin-left: 20px">
                Total Price: <input type="text" id="totalPrice" name="totalPrice" disabled value="<?php echo $price?>"> 
                </div>

                <div><button name="cart" class="cart_btn">Add to Cart</button></div>
            </form>
        </div>

    </div>

    <div class="main_div_2">
        <div>
            <h1>Product Description</h1>
            <p> <?php echo $description?> </p>
        </div>
    </div>


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

    </script>


</body>

</html>