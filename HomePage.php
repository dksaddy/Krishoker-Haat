<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>কৃষকের হাট - বাংলাদেশের প্রথম 'F2C' ই-কমার্স সাইট</title>
    <link rel="stylesheet" href="css\Home Page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\footer.css">
</head>

<body>

    <?php 
    include('header.php');
    include("template\db_connect.php");
    ?>


    <div class="slideable-text">
        <p>কৃষকের হাট(F2C) ব্যবসায়িক মডেলের উপর নির্মিত একটি ই-কমার্স প্ল্যাটফর্ম।এই মডেলটি মধ্যস্থতাকারী এবং ঐতিহ্যগত
            সরবরাহ চেইনকে বাদ দিয়ে কৃষকদের সরাসরি গ্রাহকদের সাথে সংযুক্ত করে।কৃষকরা একটি বিস্তৃত বাজারে প্রবেশাধিকার
            লাভ করে।ভোক্তাদের জন্য, কৃষকের হাট অনলাইনে তাজা পণ্য কেনার সুবিধা প্রদান করে।
        </p>
    </div>




    <div class="main_div">


        <div class="first_div">

            <div class="first_div_1">
                <a href="AllProduct.php?data=Fruits">
                    <div>Fruits</div>
                </a>
                <a href="AllProduct.php?data=Vegetable">
                    <div>Vegetable</div>
                </a>
                <a href="AllProduct.php?data=Grain Product">
                    <div>Grain Product</div>
                </a>
                <a href="AllProduct.php?data=Dairy Product">
                    <div>Dairy Product</div>
                </a>
                <a href="AllProduct.php?data=Spices">
                    <div>Spices</div>
                </a>

                <a href="AllProduct.php?data=Farming Tools">
                    <div>Farming Tools</div>
                </a>
                <a href="AllProduct.php?data=Fertilizer">
                    <div>Fertilizer</div>
                </a>
                <a href="AllProduct.php?data=Pesticide">
                    <div>Pesticide</div>
                </a>
                <a href="AllProduct.php?data=Seeds">
                    <div>Seeds</div>
                </a>
            </div>
            <div class="first_div_2">
    <video autoplay loop class="background-video" muted plays-inline>
        <source src="image/vid.mp4" type="video/mp4">
    </video>
</div>


            <div class="first_div_3">
                
                <p>TOP ORDERED PRODUCTS </p>
                    <?php
                    // SQL query
$sql = "SELECT product_id,title, COUNT(*) AS row_count
FROM group_purchase
GROUP BY product_id
ORDER BY row_count DESC
LIMIT 3";

// Execute query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
// Output data of each row
while ($row = $result->fetch_assoc()) {
    echo '<a href="IndividualProduct.php?data=' . $row["product_id"] . '"><div>' . $row["title"] ." ". $row["row_count"] ." ordered" .'</div><br></a>';

}


} else {
echo "No results found";
}


?>

    <p>Top article</p>

<div>

</div>


                </div>
                
            </div>
       
        </div>
        <!--First Div End -->




        <div class="grand_1">

            <?php
            // SQL query to fetch data
          $sql = "SELECT * FROM product LIMIT 6";
            $result = $conn->query($sql);
            $product_id = array();

            if ($result->num_rows > 0) {
            // Output data of each row.
                while($row = $result->fetch_assoc()) {
                    $product_id = $row['product_id'];
                    $name = $row['p_name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $timestamp  = $row["timestamp"];
                    echo '
                    <a href="IndividualProduct.php?data='.$product_id.'">
                        <div class="parent">

                            <div class="child-1">
                                <img src="'.$image.'" alt="" width="100%" height="100%">
                            </div>

                            <div class="child-2">   
                                <div class="child-2-1-1">'.$name.'</div>
                                <div class="child-2-1-2">৳' .$price.' /kg</div>
                                
                                <div class="child-2-1-3">' . "<p>Listed " . calculateTimeDifference($timestamp) . "</p>" . '</div> 
                          </div>

                        </div> 
                    </a>';

                }//while end

            } else {
            echo "0 results";
            }

            // Close connection
            $conn->close();
            ?>

        </div>
        <!--Grand Div End -->


        <div class="all_product_btn">
            <a href="AllProduct.php?data=all">
                <div>All Product</div>
            </a>
        </div>

        <div style="margin-top: 10px; background: white; letter-spacing: 10px;
                word-spacing: 15px; text-align: center;color:#99BC85; border-top: 3px solid #99BC85;
                border-bottom: 3px solid #99BC85;">
            <h1>Selective Category</h1>
        </div>




        <!--................Product Category Start .....................-->
        <div class="grand">


            <!--.............Consumer Section...............-->

            <div class="product_parent">

                <div class="product_child_1">
                    <div style="padding-bottom: 5px;">
                        <img src="image\Category\consumer.png" width="70px" height="70px">
                    </div>
                    <h2 style="color:#99BC85;">Consumer</h2>
                </div>

                <div class="product_child_2">

                    <a href="AllProduct.php?data=Fruits">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\fruits.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Fruits">Fruits</a></div>
                    </div>
                    </a>

                    <a href="AllProduct.php?data=Vegetable">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\vegetable.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Vegetable">Vegetable</a></div>
                    </div>
                    </a>

                    <a href="AllProduct.php?data=Grain Product">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\grain food.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Grain%20Product">Grain Product</a></div>
                    </div>
                    </a>

                    <a href="AllProduct.php?data=Dairy Product">
                        <div class="product_child_2_1">
                        <div><img src="image\Category\dairy-products.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Dairy%20Product">Dairy</a></div>
                    </div>
                    </a>

                   <a href="AllProduct.php?data=Spices">
                   <div class="product_child_2_1">
                        <div><img src="image\Category\spice.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Spices">Spices</a></div>
                    </div>
                   </a>


                </div> <!-- product_child_2 End-->


            </div> <!-- Parent End-->


            <!--......................Consumer Section.......................-->


            <div class="product_parent">

                <div class="product_child_1">
                    <div style="padding-bottom: 5px;">
                        <img src="image\Category\farmer.png" width="70px" height="70px">
                    </div>
                    <h2 style="color:#99BC85;">Farmer</h2>
                </div>

                <div class="product_child_2">

                    <a href="AllProduct.php?data=Farming Tools">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\tools.png"></div>
                        <div style="text-align: center"><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Farming%20Tools">Tools</a></div>
                    </div>
                    </a>

                    <a href="AllProduct.php?data=Fertilizer">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\fertilizer.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Fertilizer">Fertilizer</a></div>
                    </div>
                    </a>

                   <a href="AllProduct.php?data=Pesticide">
                   <div class="product_child_2_1">
                        <div><img src="image\Category\pesticide.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Pesticide">Pesticide</a></div>
                    </div>
                   </a>

                    <a href="AllProduct.php?data=Seeds">
                    <div class="product_child_2_1">
                        <div><img src="image\Category\seeds.png"></div>
                        <div><a href="http://localhost/Krishoker-Haat/AllProduct.php?data=Seeds">Seeds</a></div>
                    </div>
                    </a>


                </div> <!-- product_child_2 End-->


            </div> <!-- Parent End-->

        </div> <!-- Grand End-->
        <!--.....................Product Category End .......................-->


        <div style="margin: 50px 0 10px; background: white; letter-spacing: 10px;
                word-spacing: 15px; text-align: center; color:#99BC85; border-top: 3px solid #99BC85;
                border-bottom: 3px solid #99BC85;">
            <h1>Farmer Of The Month</h1>
        </div>

        <!--Card Model start-->
        <div class="farmer-parent">

            <?php
                for ($i=0; $i < 5; $i++) { 
                    echo '
                    <div class="farmer-child">

                        <div><img class="farmer-child-1" src="image/Farmer/Karim Mia.jpg" alt=""></div>
                        <div class="farmer-child-2">করিম মিয়া</div>
                        <div class="farmer-child-3">পাবনা</div>

                    </div>
                    ';
                }
            ?>

        </div>
        <!--Card Model End-->





    </div> <!-- Main Div End -->

<?php 
//function for showing time
// Function to calculate time difference and format it
function calculateTimeDifference($timestamp) {
    // Set the default time zone to Dhaka, Bangladesh
    date_default_timezone_set('Asia/Dhaka');

    // Get the current time
    $currentTime = new DateTime();

    // Convert the database timestamp to a DateTime object
    $dbTime = new DateTime($timestamp);

    // Calculate the difference
    $interval = $currentTime->diff($dbTime);

    // Format the difference
   // Format the difference
$format = '';

if ($interval->y > 0) {
    $format .= '%y years ago';
} elseif ($interval->m > 0) {
    $format .= '%m months ago';
} elseif ($interval->d > 0) {
    $format .= '%d days ago';
} elseif ($interval->h > 0) {
    $format .= '%h hours ago';
} elseif ($interval->i < 1) {
    $format .= 'Just now';
} elseif ($interval->h < 1) {
    $format .= '%i minutes ago';
} elseif ($interval->d < 1) {
    $format .= '%h hours ago';
}else{
    $format.='Listed in future';
}

    // Format the difference and return
    return $interval->format($format);
}
?>

    <?php include('footer.php')?>

</body>

</html>