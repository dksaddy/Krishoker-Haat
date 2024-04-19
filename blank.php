<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\blank.css">
    <title>Payment OG</title>
</head>
<body>
    <?php
    if (isset($_GET['carts']) && isset($_GET['bill'])) {
        $cart = $_GET['carts'];
        $totalPrice = $_GET['bill'];
        $data = unserialize(urldecode($cart));
        print_r($data);
        echo $totalPrice;
    }
    ?>

    <div class="central_div">

        <div class="main_div">

            <div class="right">

                <div class="list_card">
                    <div><img src="image\Product\orange.jpg" width="100px"></div>
                    <div>Name</div>
                    <div>Quantity</div>
                    <div>price</div>
                    <div>Farmer</div>
                </div>

            </div>



            <div class="left">

            <label>Mobile Banking</label>
            <div class="banking_div">
    
                <div class="option_div">
                    <input type="radio">
                    <img src="image\Icon\bkash.jpg" width="100px" alt="">
                </div>
    
                <div class="option_div">
                    <input type="radio">
                    <img src="image\Icon\Nagad.png" width="100px" alt="">
                </div>
    
                <div class="option_div">
                    <input type="radio">
                    <img src="image\Icon\rocket.png" width="100px" alt="">
                </div>
    
            </div>
    
            <label>Card Banking</label>
            <div class="banking_div">
    
                <div class="option_div">
                    <input type="radio">
                    <img src="image\Icon\master card.png" width="100px" alt="">
                </div>
    
                <div class="option_div">
                    <input type="radio">
                    <img src="image\Icon\visa card.jpg" width="100px" alt="">
                </div>
    
            </div>


            <label>Wallet Banking</label>
            <div class="banking_div">
    
                <div class="option_div">
                    <input type="radio">
                    <div class="wallet">
                        <input type="text" value="20000" disabled>
                    </div>
                </div>
    
            </div>


            <label>Cash On Delivery</label>
            <div class="banking_div">
    
                <div class="option_div">
                    <input type="radio" name="payment_option" value="cod">
                    <img src="image\Icon\cod.png" width="100px">
                </div>
    
            </div>


            <div>Error</div>
            <div class="banking_div">
            
                <div class="option_div">
                    <div style="font-size: 20px; padding-top: 5px">Payable Amount</div>
                    <input type="text" id="payment">
                    <button>Payment</button>
                </div>
    
            </div>


        </div>





    </div>

</body>
</html>