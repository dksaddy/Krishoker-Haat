<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <!-- <link rel="stylesheet" href="css/update_user_profile.css"> -->
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="row my-5">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center"><div class="card" style="width:200px" >

 <!-- Display current profile information -->
          <?php
            if ($fetch['profile_picture'] == '') {
                echo '<img src="image/default-avatar.png" class="card-img-top" alt="...">';
                
            } else {
                echo '<img src="'.$fetch['profile_picture'].'" class="card-img-top" alt="...">';
                
            }
         ?>



  
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo $fetch['name']; ?></h5>
    
  </div>
</div></div>
        </div>
    </div>

    <div class="container">
        
    <form class="row g-3 mb-5" action="functions/userProfileUpdate.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputPassword4"value="<?php echo $fetch['name']; ?>" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4"value="<?php echo $fetch['email']; ?>"name="email">
  </div>
  
  <div class="col-3">
    <label for="inputAddress" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php echo $fetch['phone_number']; ?>" name="address">
  </div>
  <div class="col-3 text-dark">
  <label for="inputState" class="form-label">District</label>
    <select id="inputState" class="form-select" name= "district">
      
      <option selected><?php echo $fetch['district']; ?></option>
<option value="Bandarban">Bandarban</option>
<option value="Barguna">Barguna</option>
<option value="Barishal">Barishal</option>
<option value="Bhola">Bhola</option>
<option value="Bogura">Bogura</option>
<option value="Brahmanbaria">Brahmanbaria</option>
<option value="Chandpur">Chandpur</option>
<option value="Chattogram">Chattogram</option>
<option value="Chuadanga">Chuadanga</option>
<option value="Cumilla">Cumilla</option>
<option value="Cox's Bazar">Cox's Bazar</option>
<option value="Dhaka">Dhaka</option>
<option value="Dinajpur">Dinajpur</option>
<option value="Faridpur">Faridpur</option>
<option value="Feni">Feni</option>
<option value="Gaibandha">Gaibandha</option>
<option value="Gazipur">Gazipur</option>
<option value="Gopalganj">Gopalganj</option>
<option value="Habiganj">Habiganj</option>
<option value="Jamalpur">Jamalpur</option>
<option value="Jashore">Jashore</option>
<option value="Jhalokati">Jhalokati</option>
<option value="Jhenaidah">Jhenaidah</option>
<option value="Joypurhat">Joypurhat</option>
<option value="Khagrachari">Khagrachari</option>
<option value="Khulna">Khulna</option>
<option value="Kishoreganj">Kishoreganj</option>
<option value="Kurigram">Kurigram</option>
<option value="Kushtia">Kushtia</option>
<option value="Lakshmipur">Lakshmipur</option>
<option value="Lalmonirhat">Lalmonirhat</option>
<option value="Madaripur">Madaripur</option>
<option value="Magura">Magura</option>
<option value="Manikganj">Manikganj</option>
<option value="Meherpur">Meherpur</option>
<option value="Moulvibazar">Moulvibazar</option>
<option value="Munshiganj">Munshiganj</option>
<option value="Mymensingh">Mymensingh</option>
<option value="Naogaon">Naogaon</option>
<option value="Narail">Narail</option>
<option value="Narayanganj">Narayanganj</option>
<option value="Narsingdi">Narsingdi</option>
<option value="Natore">Natore</option>
<option value="Netrokona">Netrokona</option>
<option value="Nilphamari">Nilphamari</option>
<option value="Noakhali">Noakhali</option>
<option value="Pabna">Pabna</option>
<option value="Panchagarh">Panchagarh</option>
<option value="Patuakhali">Patuakhali</option>
<option value="Pirojpur">Pirojpur</option>
<option value="Rajbari">Rajbari</option>
<option value="Rajshahi">Rajshahi</option>
<option value="Rangamati">Rangamati</option>
<option value="Rangpur">Rangpur</option>
<option value="Satkhira">Satkhira</option>
<option value="Shariatpur">Shariatpur</option>
<option value="Sherpur">Sherpur</option>
<option value="Sirajganj">Sirajganj</option>
<option value="Sunamganj">Sunamganj</option>
<option value="Sylhet">Sylhet</option>
<option value="Tangail">Tangail</option>
<option value="Thakurgaon">Thakurgaon</option>

    </select>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="<?php echo $fetch['address']; ?>" name="address">
  </div>
  <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupFile01">Upload</label>
  <input type="file" class="form-control" id="inputGroupFile01" name="profile_picture">
</div>
  <div class="col-12 d-flex align-items-center justify-content-center">
    <button type="submit" class="btn btn-success"name="update_profile" value="Update Profile">Update Profile</button>
  </div>
</form>
       
    </div>
</div>
    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
