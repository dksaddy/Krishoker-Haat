<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual product</title>
    <link rel="stylesheet" href="css\Individual Product.css">
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
                <div style="font-weight: bold; margin-top: 40px">Quantity (kg)</div>

                <div style="display: flex; gap: 20px">
                    <div><button type="button" id="minusButton" name="minus" onclick="decrementQuantity()">-</button></div>
                    <div><input type="text" id="quantityInput" name="quantity" disabled value="1"></div>
                    <div><button type="button" id="plusButton" name="plus" onclick="incrementQuantity()">+</button></div>
                </div>

                <div style="margin-right: 40px">Remaining:</div>
                <div style="margin-right: 40px">Price: <?php echo "৳ " . $price?> </div>
                <div style="margin-right: 40px">Total Price: </div>
                <div><button name="cart" class="cart_btn">Add to Cart</button></div>
            </form>
        </div>

    </div>

    <div class="main_div_2">
        <div>
            <h1>Product Description</h1>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et ipsam temporibus
                repudiandae magni. Exercitationem, reprehenderit? Recusandae eligendi in,
                obcaecati sed, distinctio magnam doloremque adipisci repudiandae nam non
                magni suscipit eius!
            </p>
        </div>
    </div>


    <?php include('footer.php')?>




    <script>
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentQuantity = parseInt(quantityInput.value);
        if (!isNaN(currentQuantity)) {
            quantityInput.value = currentQuantity + 1;
        } else {
            quantityInput.value = 1; // If no value is present, set it to 1
        }
    }

    function decrementQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentQuantity = parseInt(quantityInput.value);
        if (!isNaN(currentQuantity) && currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        } else {
            quantityInput.value = 1; // Ensure quantity doesn't go below 1
        }
    }
    </script>


</body>

</html>