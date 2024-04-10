

<?php include('header.php') ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/userprofile.css">
    <link rel="stylesheet" href="css/footer.css">


    <section>
        <div id="cover">
            <div id="profilepicture">
                <img src="image/User/person.jpg" alt="প্রভাত কুন্ডু শাওন image" id="userpicture">
            </div>
            <div id="nameandmobilenumber">
                <div id="name">
                    প্রভাত কুন্ডু শাওন
                </div>
                <div id="mobile">
                    +8801321098087
                </div>
            </div>
        </div>
    </section>
    <section style="display: flex;">
        <div id="menu">
            <h4 style="font-weight: 700;">আমার মেনু</h4>
            <h6>প্রোফাইল আপডেট</h6>
            <h6>ক্রয় ইতিহাস</h6>
            <h6>সাহায্য কুপন</h6>
            <h6>আমার প্রিয় বিক্রেতা</h6>
            <h6 style="color: red;">অ্যাকাউন্ট মুছে ফেলুন</h6>
            <div id="sign-out-btn">সাইন আউট</div>
        </div>
        <div id="special-products-for-sell">
            <h4>বিশেষ বিক্রয় পণ্য</h4>
            <div style="display: flex; margin-top: 50px;">
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
                </div>
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
                </div>
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
                </div>
            </div>
            <div style="display: flex; margin-top: 50px;">
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
                </div>
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
                </div>
                <div class="product">
                    <img src="image/Product/papaya.jpg" alt="papaya">
                    <h5>Original Price : 50 Taka</h5>
                    <h5>Offer Price : 40 Taka</h5>
                    <div style="display: flex;">
                        <div class="buy">কিনুন</div>
                        <div class="addtocart">কার্টে যোগ করুন</div>
                    </div>
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
