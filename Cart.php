<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css\Cart.css">
</head>
<body>
    <div class="central_div">

        <?php
            for ($i=0; $i <10 ; $i++) { 
                echo '
                <div class="cart_card">
            
                    <div class="first_portion">
                        <input type="checkbox" name="chose[]" id="chose">
                    </div>

                    <div class="middle_portin">
                        <div><img src="image\Product\orange.jpg" width="100%"></div>
                        <div>Name: lala seed mola lop kol jkolp jikol</div>
                    </div>

                    <div class="last_portion">
                        <div>Farmer Name</div>
                        <div>Quantity</div>
                        <div>Price</div>
                        <div>Total</div>
                        <div><button>Delete</button></div>
                    </div>

                </div>';
            }
            
        ?>

    </div>
    
</body>
</html>