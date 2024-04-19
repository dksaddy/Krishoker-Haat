<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>registration</title>
    <link rel="stylesheet" href="css\registration.css">
</head>
<body>
   <div class="login" >
    <form class="form" action="functions/signup.php" enctype="multipart/form-data" method="post">
        <img class="logo" src="image/image.jpg" alt=""><br>

        <?php
    session_start();
    // Check for error messages
    if(isset($_SESSION['signup_errors'])) {
        foreach($_SESSION['signup_errors'] as $error) {
            echo "<p style='color:red;  text-align: center;'>$error</p>";
        }
        // Clear the error messages after displaying
        unset($_SESSION['signup_errors']);
    } elseif(isset($_SESSION['registration_success'])) {
        echo "<p style='color:green;  text-align: center;'>{$_SESSION['registration_success']}</p>";
        // Clear the success message after displaying
        unset($_SESSION['registration_success']);
    }
?>
<div class="head">
<label for="phone_number">মোবাইল-নম্বর :</label>
        <div class="input-container">
            <input type="text" placeholder="ex:+88017********" name="phone_number" id="phone_number">
            <i class="bx bxs-phone"></i>
        </div>



        <label for="district">Select a district:</label>
        <div class="input-container">
<input type ="text" list="districts" id="district" name="district">

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
</div>




        <label for="password">পাসওয়ার্ড নিশ্চিত করুন : </label>
        <div class="input-container">
            <input type="text" name="password" id="password">
            <i class="bx bxs-lock"></i>
        </div>

        <label for="re_password">পাসওয়ার্ড পুনরায় নিশ্চিত করুন : </label>
        <div class="input-container">
            <input type="text" name="re_password" id="re_password">
            <i class="bx bxs-edit-alt"></i>
        </div>
    </div>
        <div class="checkbox-container">
            <input type="checkbox" id="farmer" name="farmer">
            <label for="farmer">কৃষক</label>
            <input type="checkbox" id="customer" name="customer">
            <label for="customer">ক্রেতা</label>
        </div>

        <div class="mrg">
            <div>
                <input type="checkbox">
            </div>
            <div>
                <p>তথ্য মনে রাখুন</p>
            </div>
        </div>

        <button class="btn" type="submit">জমা দিন</button>
        <p style="margin-left: 20px;  margin-top: 25px; padding-bottom: 10px;">Already have an account?<a class="a2" href="login.php" target="_blank">প্রবেশ করুন</a></p>
        <p></p>
    </form>
   </div>
</body>
</html>

