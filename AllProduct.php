<?php
include('template/db_connect.php'); // Ensure you have a connection to the database

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="css\All Product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>
    <?php include("header.php") ?>

    

    <div class="dropdown-container">
        <div class="dropdown">
        
        <form action="AllProduct.php" method="post">
    <select name="category">
        <option> একটি বিভাগ নির্বাচন করুন</option>
        <option value="new">নতুন পণ্য</option>
        <option value="high">দাম উচ্চ থেকে কম</option>
        <option value="low">দাম কম থেকে বেশি</option>
        <option value="best">Best Selling</option>
    </select>
    <button type="submit">Sort Now</button>
</form>

        </div>




        <div class="slideable-text">
        <p>কৃষকের হাটে স্বাগতম।</p>
    </div>


        <div class="search">
        <form action="AllProduct.php" method="GET">
        <input type="text" name="search" placeholder="পণ্য খুজুন..." required>
        <button type="submit">খুজুন</button>
        </form>
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


//sort functionality start


$category = isset($_POST['category']) ? $_POST['category'] : '';
//echo $category;

// Modify the query based on the category
if (($category == "new") || ($category == "high") || ($category == "low")) {
    $sql1 = "SELECT * FROM product";
    // Add a ORDER BY clause to sort by price, newest first or oldest last
switch ($category) {
        case 'new':
            $sql1 .= " ORDER BY timestamp DESC"; // Newest products first
            break;
        case 'high':
            $sql1 .= " ORDER BY price DESC"; // Price from high to low
            break;
        case 'low':
            $sql1 .= " ORDER BY price ASC"; // Price from low to high
            break;
        //case 'best':
            //$sql1 .= " ORDER BY timestamp DESC"; // Best-selling products first
          //  break;
        default:
            // If an invalid category is provided, default sorting by timestamp
            $sql1 .= " ORDER BY timestamp DESC"; 
            break;
    }

//echo $sql1;
// Execute the query
$result = $conn->query($sql1);

// Check for results and display them
if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $product_id = $product['product_id'];
        $name = $product['p_name'];
        $image = $product['image'];
        $price = $product['price'];
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
    }
} else {
    echo "No products found.";
}
}
//search functionality Start
                if (isset($_GET['search'])) {
                    $search_term = $_GET['search'];
                
                    // SQL query with a prepared statement
                    $stmt = $conn->prepare("SELECT * FROM `product` WHERE p_name LIKE CONCAT('%', ?, '%')");
                    $stmt->bind_param("s", $search_term);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['product_id'];
                            $name = $row['p_name'];
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
                        }
                
                
                
                
                   /* if ($result->num_rows > 0) {
                        // Display each product found
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>";
                            echo "Product Name: " . htmlspecialchars($row['p_name']) . "<br>";
                            echo "Description: " . htmlspecialchars($row['description']) . "<br>";
                            echo "Price: $" . htmlspecialchars($row['price']);
                            echo "</p>";
                        }*/
                    } else {
                        echo "<p>No products found that match your search criteria.</p>";
                    }
                
                    $stmt->close();
                }
                $conn->close();
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
                $name = $row['p_name'];
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