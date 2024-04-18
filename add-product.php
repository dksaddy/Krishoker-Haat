

<?php include('header.php') ?>
<?php require('template\db_connect.php') ?>

<?php
//comment...

// Check if the form is submitted
if (isset($_POST["submit"])){
    // Retrieve form data
    $productName = $_POST["name-of-the-product"];
    $category = isset($_POST['category-of-the-product']) ? $_POST['category-of-the-product'] : false;
    $price = $_POST["price-of-the-product"];
    $quantity = $_POST["amount-of-the-product"];
    $details = $_POST["details-of-the-product"];
    // Assuming you have a session variable for user_id
    // Assuming file upload for product photo and saving the file to a directory
    $imageName = $_FILES["photo-of-the-product"]["name"];
    $image = "image/Product/" . $imageName;

    // Move uploaded file to destination
    move_uploaded_file($_FILES["photo-of-the-product"]["tmp_name"], $image);

    // Escape inputs to prevent SQL injection
    $productName = mysqli_real_escape_string($conn, $productName);
    $category = mysqli_real_escape_string($conn, $category);
    $details = mysqli_real_escape_string($conn, $details);

    // Insert the product into the database
    $sql = "INSERT INTO product (name, category, price, user_id, image, quantity, description)
            VALUES ('$productName', '$category', '$price', '$user_id', '$image', '$quantity', '$details')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error adding product: " . $conn->error;
    }
}

?>



<link rel="stylesheet" href="css/footer.css">


    <section style="background-color: #eee; padding: 5%;">
    <h3 style="text-align: center;">Add a new Product</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name-of-the-product">পণ্যের নামঃ </label>
            <input type="text" name="name-of-the-product" id="name-of-the-product" required>
            <br><br>
            <label for="category-of-the-product">পণ্যের ক্যাটেগরিঃ</label>

            <select name="category-of-the-product" id="category-of-the-product" required>
            <option value="Fruits">Fruits</option>
            <option value="Vegetable">Vegetable</option>
            <option value="Grain Product">Grain Product</option>
            <option value="Dairy Product">Dairy Product</option>
            <option value="Spices">Spices</option>
            <option value="Pesticide">Pesticide</option>
            <option value="Seeds">Seeds</option>
            </select>
            <br><br>
            <label for="price-of-the-product">পণ্যের দামঃ  </label>
            <input type="text" name="price-of-the-product" id="price-of-the-product" required><br><br>
            <label for="amount-of-the-product">পণ্যের পরিমানঃ  </label>
            <input type="text" name="amount-of-the-product" id="amount-of-the-product" required><br><br>
            <label for="details-of-the-product">পণ্যের বিবরণীঃ </label>
            <textarea name="details-of-the-product" id="details-of-the-product" cols="100" rows="3" required></textarea>
            <br><br>
            <label for="photo-of-the-product">পণ্যের ছবিঃ </label>
            <input type="file" name="photo-of-the-product" id="photo-of-the-product" required><br><br>
            <input type="submit" name="submit" id="submit">
        </form>
    </section>
    <?php include('footer.php') ?>
