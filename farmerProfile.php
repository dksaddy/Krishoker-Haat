

<?php include('header.php') ?>
<?php require('template\db_connect.php') ?>

<?php


?>


<link rel="stylesheet" href="css\userprofile.css">

<link rel="stylesheet" href="css/footer.css">

    <section>
        <div id="cover">
            <div id="profilepicture">
                <img src="image/User/person.jpg" alt="প্রভাত কুন্ডু শাওন image" id="userpicture">
            </div>
            <div id="nameandmobilenumber">
                <div id="name">
                মঈনুল ইসলাম
                </div>
            </div>
        </div>
    </section>
    <section style="display: flex;">
        <div id="menu">
            <h4 style="font-weight: 700;">আমার মেনু</h4>
            <h6>প্রোফাইল আপডেট</h6>
            <h6 style="background-color: green; padding: 10px; border-radius: 10px; color: white;">আমার ড্যাশবোর্ড</h6>
            <h6>আমার প্রিয় ক্রেতা</h6>
            <h6 style="color: red;"><a href="account-delete-page.php">অ্যাকাউন্ট মুছে ফেলুন</a></h6>
            <div id="sign-out-btn">সাইন আউট</div>
        </div>
        <div id="special-products-for-sell">
            <h4>ড্যাশবোর্ড</h4>
            <div style="display: flex; margin-top: 50px;">
               <div class='product dashboardMatrixes'>
                    <h6>
                    আজকের মোট বিক্রয়
                    </h6>
                    <h6>
                    BDT. 6528
                    </h6>
               </div>
               <div class='product dashboardMatrixes'>
                    <h6>নতুন অর্ডার</h6>
                    <h6> 5</h6>
               </div>



               <?php
                    $total_pendings = 0;
                    $select_pendings = mysqli_query($conn, "SELECT * FROM `order_table` WHERE status = 'pending' AND seller_id = $user_id;
                    ") or die('query failed');

                    if (mysqli_num_rows($select_pendings) > 0) {
                        $total_pendings = mysqli_num_rows($select_pendings);


                    }
                    ?>


               <div class="product dashboardMatrixes">
                <h6>পেন্ডিং অর্ডার</h6>
                <h6><?= $total_pendings; ?></h6>
                <a href="#" class="btn">see orders</a>
               </div>
            </div>
            <div style="display: flex; margin-top: 50px;">
            <div class='product dashboardMatrixes'>
                    <h6>
                    বিতরণকৃত অর্ডার
                    </h6>
                    <h6>
                    10
                    </h6>
               </div>
               <div class='product dashboardMatrixes'>
                    <h6>সফল ডেলিভারি</h6>
                    <h6> 127</h6>
               </div>
               <div class="product dashboardMatrixes">
                <h6>মোট বিক্রয়</h6>
                <h6>BDT.1 6528</h6>
               </div>
            </div>
            <div id="payment-system">
                <h4>আমার ওয়ালেট</h4>
                <div style="margin-top: 50px; display: flex; justify-content: space-around; padding: 20px;">
                    <div style="display: flex;">
                        <div style="margin-left: 20px;">
                            <img src="image/Icon/pngegg.png" alt="taka" height="90" width="70">
                        </div>
                        <div style="margin-left: 20px;">
                            <div style="height: 100px; width: 150px; background-color: #A4E265; border-radius: 20px; text-align: center; font-weight: 700; line-height: 100px;">
                                2573.14
                            </div>
                        </div>
                    </div>
                    <div style="margin-left: 40px;">
                        <div style="background-color: #A4E265; padding: 5px 20px; font-weight: 700; border-radius: 20px;">টাকা উত্তোলনের জন্য নির্বাচন করুন</div>
                        <div>
                            <div id="payment-method" style="display: flex;">
                                <img src="image/Icon/bkash.jpg" alt="bkash"><img src="image/Icon/Nagad.png" alt="nagad"><img src="image/Icon/rocket.png" alt="rocket">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php') ?>
