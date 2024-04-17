

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
    $userId = $_SESSION["user_id"];
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
            VALUES ('$productName', '$category', '$price', '$userId', '$image', '$quantity', '$details')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error adding product: " . $conn->error;
    }
}

?>


<link rel="stylesheet" href="css\userprofile.css">

<link rel="stylesheet" href="css/footer.css">

    <section>
        <div id="cover">
            <div id="profilepicture">
                <img src="image/User/person.jpg" alt="প্রভাত কুন্ডু শাওন image" id="userpicture">
            </div>
            <div id="nameandmobilenumber">
                <div id="name">
                মঈনুল ইসলাম
                </div>
            </div>
        </div>
    </section>
    <section style="display: flex;">
        <div id="menu">
            <h4 style="font-weight: 700;">আমার মেনু</h4>
            <h6>প্রোফাইল আপডেট</h6>
            <h6 style="background-color: green; padding: 10px; border-radius: 10px; color: white;">আমার ড্যাশবোর্ড</h6>
            <h6>আমার প্রিয় ক্রেতা</h6>
            <h6 style="color: red;"><a href="account-delete-page.php">অ্যাকাউন্ট মুছে ফেলুন</a></h6>
            <div id="sign-out-btn">সাইন আউট</div>
        </div>
        <div id="special-products-for-sell">
            <h4>ড্যাশবোর্ড</h4>
            <div style="display: flex; margin-top: 50px;">
               <div class='product dashboardMatrixes'>
                    <h6>
                    আজকের মোট বিক্রয়
                    </h6>
                    <h6>
                    BDT. 6528
                    </h6>
               </div>
               <div class='product dashboardMatrixes'>
                    <h6>নতুন অর্ডার</h6>
                    <h6> 5</h6>
               </div>
               <div class="product dashboardMatrixes">
                <h6>পেন্ডিং অর্ডার</h6>
                <h6>6</h6>
               </div>
            </div>
            <div style="display: flex; margin-top: 50px;">
            <div class='product dashboardMatrixes'>
                    <h6>
                    বিতরণকৃত অর্ডার
                    </h6>
                    <h6>
                    10
                    </h6>
               </div>
               <div class='product dashboardMatrixes'>
                    <h6>সফল ডেলিভারি</h6>
                    <h6> 127</h6>
               </div>
               <div class="product dashboardMatrixes">
                <h6>মোট বিক্রয়</h6>
                <h6>BDT.1 6528</h6>
               </div>
            </div>
            <div id="payment-system">
                <h4>আমার ওয়ালেট</h4>
                <div style="margin-top: 50px; display: flex; justify-content: space-around; padding: 20px;">
                    <div style="display: flex;">
                        <div style="margin-left: 20px;">
                            <img src="image/Icon/pngegg.png" alt="taka" height="90" width="70">
                        </div>
                        <div style="margin-left: 20px;">
                            <div style="height: 100px; width: 150px; background-color: #A4E265; border-radius: 20px; text-align: center; font-weight: 700; line-height: 100px;">
                                2573.14
                            </div>
                        </div>
                    </div>
                    <div style="margin-left: 40px;">
                        <div style="background-color: #A4E265; padding: 5px 20px; font-weight: 700; border-radius: 20px;">টাকা উত্তোলনের জন্য নির্বাচন করুন</div>
                        <div>
                            <div id="payment-method" style="display: flex;">
                                <img src="image/Icon/bkash.jpg" alt="bkash"><img src="image/Icon/Nagad.png" alt="nagad"><img src="image/Icon/rocket.png" alt="rocket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
