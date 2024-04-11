<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Page</title>
    <link rel="stylesheet" href="css\Wallet Recharge.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>
<body>

    <?php include("header.php")?>

    <div class="main_container">

        <div class="side_card">
            <div><img src="image\User\person.jpg" width="100px" alt=""></div>
            <div>Nazmul Hasan</div>
            <div>Current Balance: <input type="text" value="20, 000"></div>
        </div>

        <div class="main_div">
            <h1>Recharge Wallet</h1>

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
    
            <label>Additional Information</label>
            <div class="info_div">
    
                <div class="info_field">
                    <div style="margin-left: 15px;">Amount</div>
                    <input type="text">
                </div>
    
                <div class="info_field">
                    <div>Password</div>
                    <input type="text">
                </div>
    
                <button class="recharge_btn">Recharge</button>
                
            </div>
    
        </div>
        
    </div>
    <?php include("footer.php")?>
</body>
</html>