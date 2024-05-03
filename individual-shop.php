<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css\All Product.css?v=<?php echo time(); ?>">
<?php include('template\db_connect.php'); ?>
<?php include('header.php') ?>  


<h1 style="margin: 30px 0px 0px 30px">My Shop</h1>

<?php 

if (!empty($_SESSION['user_id'])) {
    echo "<p style='margin: 5px 0px 20px 40px'> <b>- " . $fetch['name'] . "</b> </p>";
}
?>


<section style="margin: 20px;">
    <?php 

    // taking user id from session

    if (!empty($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
    }

    echo "<h3 style='margin: 50px 0px;'>Products</h3>";
    
    // SQL query to select data from product table
$sql = "SELECT * FROM product WHERE user_id = '$userID'";

//  Execution of SQL query
$result = $conn->query($sql);

echo"<div style='display: grid; grid-template-columns: auto auto auto auto; margin-left: 30px'>";
    // Check for individual products and display them
    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            $product_id = $product['product_id'];
            $name = $product['p_name'];
            $image = $product['image'];
            $price = $product['price'];
            echo '
        <div class="parent" style="padding: 15px;">
        <div class="child-1">
            <img src="'.$image.'" alt="'.$name.'" width="100%" height="100%">
        </div>

        <div class="child-2">
            <div class="child-2-1">'.$name.'</div>
            <div class="child-2-2">৳'.$price.'/kg</div>
            <div style="display: flex; margin-top: 5px;"> 
                <form action="update-product.php">
                    <div style="display: flex">
                    <input type="text" name = "productID" value="'.$product_id.'" style="display: none;">
                    <input type="submit" name="update-product" value="Update" style="padding: 10px 15px; background-color: orange; margin-right: 5px; border: none; border-radius: 10px;">
                    </div>
                </form>
                <form method="post">
                    <input type="submit" name="delete-product" value="Delete" style="padding: 10px 15px; background-color: red; border: none; border-radius: 10px;">
                </form>
            </div>
        </div>
    </div>
        '; 
    }
} else {
    echo "No products found.";
}
echo "</div>";

if(isset($_POST['delete-product'])){
    // Delete SQL command..
    $sql = "DELETE FROM product WHERE product_id = $product_id";
    $conn -> query($sql);
}

    ?>
</section>




<?php include('footer.php') ?>  