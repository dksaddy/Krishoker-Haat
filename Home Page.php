<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css\Home Page.css">
    <link rel="stylesheet" href="css\footer.css">
</head>
<body>

   <?php include('header.php')?>

    <h3>বিক্রি করা হবে</h3>
    <!--Card Model start-->
    <div class="grand_1">
        <?php
        for ($i=0; $i <4 ; $i++) { 
            echo '
            <div class="parent">
                <div class="child-1">
                    <img src="image\Product\papaya.jpg" alt="" width="100%" height="100%">
                </div>
                <div class="child-2">
                    <div class="child-2-1">
                        <div class="child-2-1-1">পেঁপে</div>
                        <div class="child-2-1-2">৳ ১০০</div>
                        <div class="child-2-1-3">প্রতি কেজি</div>
                    </div>
                    <div class="child-2-2">
                        <div class="child-2-2-1"><button class="cart-button"><img src="image\Icon\cart.png" alt="" width="100%" height="100%"></button></div>
                        <div><button class="buy-button">কিনুন</button></div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <!--Card Model start-->

    <h3>সর্বাধিক বিক্রিত পণ্য</h3>
    <!--Card Model start-->
    <div class="grand_1">
        <?php
        for ($i=0; $i<4 ; $i++) { 
            echo '<div class="parent">
            <div class="child-1">
                <img src="image\Product\orange.jpg" alt="" width="100%" height="100%">
            </div>
            <div class="child-2">
                <div class="child-2-1">
                    <div class="child-2-1-1">কমলা</div>
                    <div class="child-2-1-2">৳ ১০০</div>
                    <div class="child-2-1-3">প্রতি কেজি</div>
                </div>
                <div class="child-2-2">
                    <div class="child-2-2-1"><button class="cart-button"><img src="image\Icon\cart.png" alt="" width="100%" height="100%"></button></div>
                    <div><button class="buy-button">কিনুন</button></div>
                </div>
            </div>
        </div>';
        }
        ?>
    </div>
    <!--Card Model End-->
   


    <!--...............................Product Category Start .............................-->
    <h3>পণ্য বিভাগ</h3>
    <div class="grand">

        <!--Card Model start-->
        <div class="product_parent">
            <div class="product_child_1">
                <img src="image\Category\Farming Material.jpg" alt="" width="100%" height="100%">
            </div>
            <div class="product_child_2">
                <div class="product_child_2_1">কৃষি উপকরণ:</div>
                <div>বীজ</div>
                <div>সার</div>
                <div>কীটনাশক</div>
                <div>যন্ত্রপাতি</div>
            </div>
        </div>
        <!--Card Model End-->

        <!--Card Model start-->
        <div class="product_parent">
            <div class="product_child_1">
                <img src="image\Category\Fruits.jpg" alt="" width="100%" height="100%">
            </div>
            <div class="product_child_2">
                <div class="product_child_2_1">মৌসুমি ফল:</div>
                <div>আম</div>
                <div>লিচু</div>
                <div>কাঁঠাল</div>
            </div>
        </div>
        <!--Card Model End-->

        <!--Card Model start-->
        <div class="product_parent">
            <div class="product_child_1">
                <img src="image\Category\Vegetable.jpg" alt="" width="100%" height="100%">
            </div>
            <div class="product_child_2">
                <div class="product_child_2_1">কৃষি পণ্য:</div>
                <div>শস্য ছাটা</div>
                <div>শাকসবজি</div>
                <div>অন্যান্য পণ্য</div>
            </div>
        </div>
        <!--Card Model End-->

    </div>
    <!--...............................Product Category End .............................-->



    <h3>মাস সেরা চাষী</h3>
    <!--Card Model start-->
    <div class="farmer-parent">
        <div class="farmer-child">
            <div><img class="farmer-child-1" src="image/Farmer/Karim Mia.jpg" alt=""></div>
            <div class="farmer-child-2">করিম মিয়া</div>
            <div class="farmer-child-3">পাবনা</div>
        </div>
    </div>
    <!--Card Model End-->

    <?php include('footer.php')?>

</body>
</html>