<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="css\All Product.css?v=<?php echo time(); ?>">
</head>
<body>
   <div>

        <div class="category">

            <div class="category_1">
                <div><input type="checkbox">Fruits</div>
                <div><input type="checkbox">Vegetable</div>
                <div><input type="checkbox">Dry Food</div>
                <div><input type="checkbox">Spices</div>
                <div><input type="checkbox">Farming Tool</div>
                <div><input type="checkbox">Fertilizer</div>
            </div>
            <div class="category_2">
                <div>Sort by:</div>
                <div>
                    <select name="" id="">
                        <option value="0">Select</option>
                        <option value="1">Price Low -> High</option>
                        <option value="1">Price High -> Low</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="product">

            <?php
            include('template\db_connect.php');
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    echo '
                    <div class="parent">
                        <div class="child-1">
                            <img src="'.$image.'" alt="" width="100%" height="100%">
                        </div>
                        <div class="child-2">
                            <div class="child-2-1">
                                <div class="child-2-1-1">'.$name.'</div>
                                <div class="child-2-1-2">৳ '.$price.'</div>
                                <div class="child-2-1-3">প্রতি কেজি</div>
                            </div>
                            <div class="child-2-2">
                                <div class="child-2-2-1"><button class="cart-button"><img src="image\Icon\cart.png" alt=""
                                    width="100%" height="100%"></button></div>
                                <div><button class="buy-button">কিনুন</button></div>
                            </div>
                        </div>
                    </div>'; 

                }//while end
            }else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </div>
   </div>
</body>
</html>