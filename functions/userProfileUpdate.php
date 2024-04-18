<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Redirect or handle the case where there's no user_id
    exit;
}

if (isset($_POST['update_profile'])) {
    include("../template/db_connect.php");

    // Validate and sanitize input data
    $update_name = mysqli_real_escape_string($conn, $_POST['name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['email']);
    $update_address = mysqli_real_escape_string($conn, $_POST['address']);
    $update_user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        // Your existing code for handling the image upload
        $uploadDir = '../image/profile_picture';

        // Ensure the directory exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadFile = $uploadDir . '/' . basename($_FILES['profile_picture']['name']);

        // Check if the file already exists
        if (file_exists($uploadFile)) {
            echo "File already exists.";
            // Handle this case as needed
        }

        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
            echo "Image uploaded successfully.";
            $updatedImage = substr($uploadFile, 3); // Set the image path
        } else {
            echo "Error uploading image.";
        }
        
        // Update user information using a prepared statement
        $update_query = "UPDATE `user` SET `name`=' $update_name',`email`='$update_email',`address`='$update_address',`user_type`='$update_user_type',`profile_picture`='$updatedImage' WHERE user_id = $user_id";
    } else {
        // Update user information without changing the image path
        $update_query = "UPDATE `user` SET `name`=' $update_name',`email`='$update_email',`address`='$update_address',`user_type`='$update_user_type' WHERE user_id = $user_id";
    }
    // Execute the statement
    if (mysqli_query($conn, $update_query)) {
        echo "Record updated successfully";
        header("Location: ../userProfile.php");
    } else {
        echo "Error executing the statement: " . mysqli_error($conn);
    }
}
    // Close the database connection
    mysqli_close($conn);
?>
