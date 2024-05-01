<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANK YOU !</title>
    <link rel="stylesheet" href="css\Order Confirmation.css">

</head>

<body>




  
    <div class="central_div">

        <div class="container">
            <div class="left-div"><img src="image\Category\field.png" width="100%">Farmer</div>
            <div class="middle-div"><img src="image\Category\delivery.png" width="100%"></div>
            <div class="right-div"><img src="image\Category\smart-city.png" width="100%">Consumer</div>
        </div>

        <div class="welcome">THANKS FOR SHOPING WITH "KRISHOKER HAAT"</div>

        <form action="OrderConfirmation.php" method="post">

            <button id="myButton" class="hidden" name="go">
                <p>Continue Shopping</p>
                <img src="image\Category\cupid-bow.gif" width="100px" height="80px">
            </button>

        </form>

    </div>


    <?php 
        if (isset($_POST['go'])) {
            echo "<script>window.location.href = 'AllProduct.php?data=all';</script>";
        }
    ?>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var middleDiv = document.querySelector(".middle-div");
            var myButton = document.getElementById("myButton");

            // Wait for animation to complete
            middleDiv.addEventListener("animationend", function () {
                myButton.classList.remove("hidden"); // Show the button
            });
        });






        document.addEventListener("DOMContentLoaded", function () {
            var welcomeText = document.querySelector(".welcome");
            var text = welcomeText.textContent;
            welcomeText.textContent = ""; // Clear the text content

            // Function to animate text like a typewriter
            function typeWriter(text, i) {
                if (i < text.length) {
                    welcomeText.textContent += text.charAt(i);
                    i++;
                    setTimeout(function () {
                        typeWriter(text, i);
                    }, 80); // Adjust typing speed (milliseconds)
                }
            }

            // Start the typewriter animation
            typeWriter(text, 0);
        });


    </script>

</body>

</html>