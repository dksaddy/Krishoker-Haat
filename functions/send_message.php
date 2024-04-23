<?php
session_start();

include("../template/db_connect.php");

// Check if the user is logged in
if (empty($_SESSION['user_id'])) {
   header("Location: ../login.php"); 
   exit();
}

// Send message
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['send'])) {
   $sender_id = $_SESSION['user_id'];
   $receiver_id = $_POST['receiver_id'];
   $message = mysqli_real_escape_string($conn, $_POST['message']);
   $timestamp = date("Y-m-d H:i:s");

   $query = "INSERT INTO message (sender_id, receiver_id, message, timestamp) 
             VALUES ('$sender_id', '$receiver_id', '$message', '$timestamp')";
   mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));

   header("Location: ../message.php"); // Fixing the header function call
   exit(); // Exiting after redirect
}
?>
