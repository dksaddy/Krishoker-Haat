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


        <form action="Cart.php" method="post">

            <div class="cart_parent">

                <div class="holder">

                    <div style="padding-left:38px">Error msg</div>

                    <div class="cart_card">

                        <div class="first_portion">
                            <input type="checkbox" name="chose[]" id="chose" value="Saddy">
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
                            <div style="display: flex; justify-content: flex-end; margin-right: 10px">
                                <button name="dlt_btn"><img src="image\Icon\bin.png" width="20px"></button>
                            </div>
                        </div>

                    </div>




                </div>

                

            </div>

            <p>Error Message</p>

            <div class="proceed_parent">
                <div>Total:</div>
                <div><input type="text" name="total" id="total" value="12" disabled></div>
                <div><button>Proceed <img src="image\Icon\right-arrow.png" width="30px" height="30px"></button></div>
            </div>

        </form>

        <?php
if(isset($_POST['dlt_btn'])) {
    if(isset($_POST['chose'])) {
        $selected_values = $_POST['chose'];
        foreach($selected_values as $value) {
            echo $value . "<br>";
            // Here you can process each selected value as needed
        }
    } else {
        echo "No checkboxes were selected.";
    }
}
?>



    </div>

</body>

</html>