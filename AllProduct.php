<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\All Product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>
    <?php include("header.php") ?>
 
    <div class="dropdown-container">
        <div class="dropdown">
        <select name="category">
  <option value="new">New Arrival</option>
  <option value="high">High to Low</option>
  <option value="low">Low to High</option>
  <option value="best">Best Selling</option>
</select>

        </div>
        <div class="dropdown">
        <select name="category">
  <option value="new">New Arrival</option>
  <option value="high">High to Low</option>
  <option value="low">Low to High</option>
  <option value="best">Best Selling</option>
</select>

        </div>
    </div>
    <div class="container_for_product">

        <div class="category">

            <a href="AllProduct.php?data=all">
                <div class="filter_btn" style="font-weight: bold">All Product</div>
            </a>

            <a href="AllProduct.php?data=Fruits">
                <div class="filter_btn">Fruits</div>
            </a>
            <a href="AllProduct.php?data=Vegetable">
                <div class="filter_btn">Vegetable</div>
            </a>
            <a href="AllProduct.php?data=Grain Product">
                <div class="filter_btn">Grain Product</div>
            </a>
            <a href="AllProduct.php?data=Dairy Product">
                <div class="filter_btn">Dairy Product</div>
            </a>
            <a href="AllProduct.php?data=Spices">
                <div class="filter_btn">Spices</div>
            </a>
                

            <a href="AllProduct.php?data=Farming Tools">
                <div class="filter_btn">Farming Tools</div>
            </a>
            <a href="AllProduct.php?data=Fertilize">
                <div class="filter_btn">Fertilize</div>
            </a>
            <a href="AllProduct.php?data=Pesticide">
                <div class="filter_btn">Pesticide</div>
            </a>
            <a href="AllProduct.php?data=Seeds">
                <div class="filter_btn">Seeds</div>
            </a>

        </div>

        <div class="product_container">
            <?php
                if (isset($_GET['data'])) {
                    $category = $_GET['data'];
                    if ($category === 'all') 
                        $sqlinput = "SELECT * FROM product";
                    else $sqlinput = "SELECT * FROM product WHERE category = '$category'";

                    show($sqlinput);
                }

            ?>
        </div>

    </div>


    <?php include("footer.php")?>

</body>

</html>


<?php

function show ($sqlinput) {
include('template\db_connect.php');
        $sql = $sqlinput;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];

                echo '
                <a class="card_link" href="IndividualProduct.php?data='.$product_id.'">
                <div class="parent">
                <div class="child-1">
                    <img src="'.$image.'" alt="" width="100%" height="100%">
                </div>

                <div class="child-2">
                    <div class="child-2-1">'.$name.'</div>
                    <div class="child-2-2">৳'.$price.' /kg</div>
                </div>
            </div>
                </a>
                '; 

            }//while end
        }else {
            echo "0 results";
        }
        $conn->close();
}

?>

</body>

</html>