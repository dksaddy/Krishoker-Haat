<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\Filter Page.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php include("header.php") ?>

    <div class="container_for_product">

        <div class="category">
                <a href="FilterPage.php?data=Fruits"><div>Fruits</div></a>
                <a href="FilterPage.php?data=Vegetable"><div>Vegetable</div></a>
                <a href="FilterPage.php?data=Grain Product"><div>Grain Product</div></a>
                <a href="FilterPage.php?data=Dairy Product"><div>Dairy Product</div></a>
                <a href="FilterPage.php?data=Spices"><div>Spices</div></a>
                
                <a href="FilterPage.php?data=Farming Tools"><div>Farming Tools</div></a>
                <a href="FilterPage.php?data=Fertilize"><div>Fertilize</div></a>
                <a href="FilterPage.php?data=Pesticide"><div>Pesticide</div></a>
                <a href="FilterPage.php?data=Seeds"><div>Seeds</div></a>
        </div>

        <div class="product_container">
            <?php
                if (isset($_GET['data'])) {
                    $category = $_GET['data'];
                    $sqlinput = "SELECT * FROM product";
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
                    <div class="child-2-2">৳ '.$price.' / kg</div>
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