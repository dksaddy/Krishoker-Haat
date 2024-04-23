<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/update_user_profile.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <?php include('header.php') ?>
    <?php
        include("template/db_connect.php");
        // Fetch user information from the database
        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }

    ?>

    <div class="container">
        <div class="profile">
            <!-- Display current profile information -->
            <?php
            if ($fetch['profile_picture'] == '') {
                echo '<img src="image/default-avatar.png">';
            } else {
                echo '<img src="'.$fetch['profile_picture'].'">';
            }
            ?>
            <h3><?php echo $fetch['name']; ?></h3>
            <form action="functions/userProfileUpdate.php" method="post" enctype="multipart/form-data">
                <!-- Add input fields for updating information -->
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter your name here" value="<?php echo $fetch['name']; ?>" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" name="phone_number" placeholder="Enter your phone number here" value="<?php echo $fetch['phone_number']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your Email here" value="<?php echo $fetch['email']; ?>" required>

                <label for="address">District:</label>
                <input type ="text" list="districts" id="district" name="district"value="<?php echo $fetch['district']; ?>" required>

<datalist id="districts">
  <option value="Bandarban">
  <option value="Barguna">
  <option value="Barishal">
  <option value="Bhola">
  <option value="Bogura">
  <option value="Brahmanbaria">
  <option value="Chandpur">
  <option value="Chattogram">
  <option value="Chuadanga">
  <option value="Cumilla">
  <option value="Cox's Bazar">
  <option value="Dhaka">
  <option value="Dinajpur">
  <option value="Faridpur">
  <option value="Feni">
  <option value="Gaibandha">
  <option value="Gazipur">
  <option value="Gopalganj">
  <option value="Habiganj">
  <option value="Jamalpur">
  <option value="Jashore">
  <option value="Jhalokati">
  <option value="Jhenaidah">
  <option value="Joypurhat">
  <option value="Khagrachari">
  <option value="Khulna">
  <option value="Kishoreganj">
  <option value="Kurigram">
  <option value="Kushtia">
  <option value="Lakshmipur">
  <option value="Lalmonirhat">
  <option value="Madaripur">
  <option value="Magura">
  <option value="Manikganj">
  <option value="Meherpur">
  <option value="Moulvibazar">
  <option value="Munshiganj">
  <option value="Mymensingh">
  <option value="Naogaon">
  <option value="Narail">
  <option value="Narayanganj">
  <option value="Narsingdi">
  <option value="Natore">
  <option value="Netrokona">
  <option value="Nilphamari">
  <option value="Noakhali">
  <option value="Pabna">
  <option value="Panchagarh">
  <option value="Patuakhali">
  <option value="Pirojpur">
  <option value="Rajbari">
  <option value="Rajshahi">
  <option value="Rangamati">
  <option value="Rangpur">
  <option value="Satkhira">
  <option value="Shariatpur">
  <option value="Sherpur">
  <option value="Sirajganj">
  <option value="Sunamganj">
  <option value="Sylhet">
  <option value="Tangail">
  <option value="Thakurgaon">
</datalist>    
                <label for="address">Address:</label>
                <input type="text" name="address" placeholder="Enter your address here" value="<?php echo $fetch['address']; ?>" required>

                <label for="file-input">Select an image : </label>
                    <input type="file" name="profile_picture">

                <!-- Add more input fields for other information -->

                <button type="submit" name="update_profile" value="Update Profile">Update Profile</button>
            </form>
        </div>
    </div>
</div>
    <?php include('footer.php') ?>
</body>
</html>
