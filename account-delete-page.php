
<?php include('header.php') ?>
<?php require('template\db_connect.php') ?>

<?php
    if (isset($_POST['yes'])) {
        $user_id = $_SESSION['user_id'];
    
        // SQL query to delete the user's account
        $sql = "DELETE FROM user WHERE user_id = $user_id";
    
        if ($conn->query($sql) === TRUE) {
            // Account deletion successful
            // End session
            session_destroy();
            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            // Account deletion failed
            echo "Error deleting account: " . $conn->error;
        }
    }
    if(isset($_POST['no'])){
        header("location: HomePage.php");
        exit();
    }
?>



    <div style="background-color: #eee; padding: 3%; margin: 20vh 20vw; border-radius: 10px;">
        <h3>Are you sure that you want to delete the account?</h3>
        <p>If yes, keep in mind that you will lose your all data</p>
        <form action="" method = "POST">
            <button name="yes">Yes</button>
            <button name="no">No</button>
        </form>    
    </div>
</body>
</html>