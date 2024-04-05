<?php
session_start();
include("../template/db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$errors = array('phone_number' => '', 'password'=>'', 'user_type'=>''); 
$phone_number = mysqli_real_escape_string($conn,$_POST["phone_number"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
$re_password = mysqli_real_escape_string($conn,$_POST["re_password"]);
if($password == $re_password){
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
}else{
    $errors['phone_number'] = "Passwords do not match.";
}

// Check if the Phone Number already exists
$checkPhoneNumberStmt = $conn->prepare("SELECT `user_id` FROM `user` WHERE `phone_number` = ?");
$checkPhoneNumberStmt->bind_param("s", $phone_number);

if ($checkPhoneNumberStmt->execute()) {
    $checkResult = $checkPhoneNumberStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Phone Number already exists, handle the error (e.g., redirect back to the registration form with an error message)
        $errors['phone_number'] = 'Phone Number already exists';
        $_SESSION['input_values'] = [
            'phone_number' => $_POST['phone_number'],
            'password' => $_POST['password'],
            're_password' => $_POST['re_password'],
        ];
        
        // Set errors in the session
        $_SESSION['signup_errors'] = $errors;

        // Close the check statement
        $checkPhoneNumberStmt->close();

        // Close the database connection
        $conn->close();
        
        // Redirect back to the signup page
        header("Location: ../registration.php");
        exit(); // Terminate script execution after redirection
    }
} else {
    die("Error executing the statement: " . $checkPhoneNumberStmt->error);
}
if (isset($_POST['farmer']) or  isset($_POST['customer'])) {
if (isset($_POST['farmer'])) {
    $userType = 'farmer';
} else {
    $userType = 'customer';
}
}else{
    $errors['user_type'] = "Please select your user type.";
    // Set errors in the session
    $_SESSION['signup_errors'] = $errors;
    header("Location: ../registration.php");
    exit(); 
}
// Insert user into the database

// Prepare the SQL statement for insertion
$stmt = $conn->prepare("INSERT INTO `user`(`phone_number`,`user_type`,`password`) VALUES (?, ?,?)");

// Check for successful preparation
if ($stmt === false) {
    die("Error in SQL preparation: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("sss", $phone_number,$userType, $hashedPassword);

// Execute the statement
if ($stmt->execute()) {
    // Success
    unset($_SESSION['input_values']);
    unset($_SESSION['signup_errors']); // Clear the errors after displaying

    // Set a success message
    $_SESSION['registration_success'] = 'Registration Successful';

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Redirect back to the signup page
    header("Location: ../login.php");
    exit(); // Terminate script execution after redirection
} else {
    die("Error executing the statement: " . $stmt->error);
}
}
?>
