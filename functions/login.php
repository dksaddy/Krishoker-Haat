<?php
session_start();
include("../template/db_connect.php");

$errors = array('phone_number' => '', 'password' => '');

if (isset($_POST["login"])) {
    $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $password = $_POST["password"];

    // Fetch hashed password and user type from the database based on the entered email
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `phone_number` = ? ");

    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("s", $phone_number);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPasswordFromDatabase = $row['password'];

            // Verify the entered password using password_verify
            if (password_verify($password, $hashedPasswordFromDatabase)) {
                  $user_id = $row['user_id'];
                 $_SESSION["user_id"] = $user_id;
                    header("Location: ../HomePage.php");
                exit();
            } else {
                $errors['password'] = 'Invalid password';
            }
        } else {
            $errors['phone_number'] = 'Invalid phone number or password';
        }
    } else {
        $errors['phone_number'] = 'Error executing the statement: ' . $stmt->error;
    }

    // Set errors in the session
    $_SESSION['login_errors'] = $errors;

    // Redirect back to the login page
    header("Location: ../login.php");
    exit;
}
?>