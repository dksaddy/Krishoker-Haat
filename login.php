<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>কৃষকের হাট লগইন</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<div class="login">
<form class="form" action="functions/login.php" enctype="multipart/form-data" method="post">
        <img class="logo" src="image/image.jpg" alt=""><br>
         <!-- Display errors if any -->
      <?php
      session_start();
      if (isset($_SESSION['login_errors'])) {
          $errors = $_SESSION['login_errors'];
          echo '<div class="error-message">';
          echo '<p>' . $errors['phone_number'] . '</p>';
          echo '<p>' . $errors['password'] . '</p>';
          echo '</div>';
          unset($_SESSION['login_errors']); // Clear the errors after displaying
      }
      ?>
        <label>মোবাইল-নম্বর</label>
        <input type="text" placeholder="ex:+88017********" style="height: 30px;" name ="phone_number"><i class="bx bxs-phone"></i><br>
        <label>পাসওয়ার্ড</label>
        <input type="text" placeholder="Type your password" style="height: 30px; width: 300px;"name ="password"><i class="bx bxs-lock"></i> <br>
        <p style="display: flex; justify-content: right; margin-top: -10px;"><a class="a2" href="#" target="_blank">পাসওয়ার্ড ভুলে গেছেন?</a></p>

        <div class="mrg">
            <div>
                <input style="margin-top: 12px;" type="checkbox">
            </div>
            <div>
                <p style="margin-left: 5px; font-size: 11px;">তথ্য মনে রাখুন</p>
            </div>
        </div>
        <button class="btn" type="submit"name ="login">প্রবেশ করুন</button>
        <p style="margin-left: 20px; margin-top: 25px;">Don't have an account?<a class="a2" href="registration.php" target="_blank">নিবন্ধন করুন</a></p>
        <p></p>
    </form>
</div>

</body>
</html>
