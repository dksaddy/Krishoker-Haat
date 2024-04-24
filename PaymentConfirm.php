<?php
    if (isset($_GET['carts']) && isset($_GET['bill']) && isset($_GET['img']) ) {
        $cart = $_GET['carts'];
        $totalPrice = $_GET['bill'];
        $info_img = $_GET['img'];
        $data = unserialize(urldecode($cart));

        print_r($data);
        echo $totalPrice;
        echo $info_img;

        
    }

?>