<?php

require_once 'startpage.php';

if(isset($_POST['orderBtn'])) {
    $orders->addOrder();
    setcookie("shopping_cart", "", time() - 3600);
}