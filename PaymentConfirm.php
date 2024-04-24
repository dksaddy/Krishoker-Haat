<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confimation</title>
</head>
<body>
    <?php
        if (isset($_GET['carts']) && isset($_GET['bill']) && isset($_GET['img']) ) {
            $cart = $_GET['carts'];
            $totalPrice = $_GET['bill'];
            $info_img = $_GET['img'];
            $data = unserialize(urldecode($cart));

            print_r($data);
            echo $totalPrice;
            
            if ($info_img === 'bkash') {
                $img = "image\Icon\bkash.jpg";
            }
        
        }

    ?>

    <div class="centarl_div">

        <div class="payment_container">

            <div class="upper"><img src="<?php echo $img?>" alt=""></div>

            <form action="PaymentConfirm.php" method="post">

                <div class="lower"> 
                    <input type="text" name="" id="">
                </div>

            </form>

        </div>

    </div>
</body>
</html>