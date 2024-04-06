<?php
session_start();
session_unset(); // Unset all session variables
session_destroy();

//echo "Error";
header("location: ../HomePage.php");


?>