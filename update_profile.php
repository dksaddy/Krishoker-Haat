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
