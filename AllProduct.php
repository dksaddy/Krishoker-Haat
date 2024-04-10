<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>
    <link rel="stylesheet" href="css\All Product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>
    <?php include("header.php") ?>

    <div class="container_for_product">

        <div class="category">
            <form action="AllProduct.php" method="post">
                <div class="filter_btn"><button name="all">All Products</button></div>
                <h3>Consumer</h3>
                <div class="filter_btn"><button name="fruits">Fruits</button></div>
                <div class="filter_btn"><button name="vegetable">Vegetable</button></div>
                <div class="filter_btn"><button name="dryFood">Dry Food</button></div>
                <div class="filter_btn"><button name="spices">Spices</button></div>
                <h3>Farmer</h3>
                <div class="filter_btn"><button name="farmingTool">Farming Tool</button></div>
                <div class="filter_btn"><button name="fertilizer">Fertilizer</button></div>
            </form>
        </div>

        <div class="product">
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (isset($_POST['fruits'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Fruits'";
                        show($sqlinput);
                    
                    }else if (isset($_POST['vegetable'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Vegetable'";
                        show($sqlinput);
    
                    }else if (isset($_POST['all'])) {
                        $sqlinput = "SELECT * FROM product";
                        show($sqlinput);
    
                    }else if (isset($_POST['dryFood'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Dry Food'";
                        show($sqlinput);
    
                    }else if (isset($_POST['spices'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Spices'";
                        show($sqlinput);
    
                    }else if (isset($_POST['farmingTool'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Farming Tools'";
                        show($sqlinput);
    
                    }else if (isset($_POST['fertilizer'])) {
                        $sqlinput = "SELECT * FROM product WHERE category = 'Fertilizer'";
                        show($sqlinput);
                    }
    
                } else {
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
                    <a class="card_link" href="IndividualProduct.php?data1='.$product_id.'">
                    <div class="parent">
                    <div class="child-1">
                        <img src="'.$image.'" alt="" width="100%" height="100%">
                    </div>

                    <div class="child-2">
                        <div class="child-2-1-1">'.$name.'</div>
                        <div class="child-2-1-2">৳ '.$price.'</div>
                        <div class="child-2-1-3">প্রতি কেজি</div>
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
