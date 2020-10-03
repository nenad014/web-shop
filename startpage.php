<?php

// Stripe API konfiguracija
define('STRIPE_API_KEY', 'sk_test_51HQzw1Hg39G2fS9PAEX4MfJGF1Tu3SCcBTF8H6GcVLy2mjNmfMbnXjoY7JDZYWS4HoRMZJLvQl9QP3u9FOT4nsJ600czFIvRTJ');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51HQzw1Hg39G2fS9P4SIulqqubc9mD0pnST6V9w9c164nVWhhPfrideg1oKjF3kvxeKSgSJyCrhXC7gXvjNDuXl3V00ZqkJ5DRg');

session_start();

require_once 'class/Connection.class.php';
require_once 'class/Category.class.php';
require_once 'class/Subcategory.class.php';
require_once 'class/Items.class.php';
require_once 'class/Admin.class.php';
require_once 'class/User.class.php';
require_once 'class/Cart_Item.class.php';
require_once 'class/Orders.class.php';
require_once 'class/Blog.class.php';
require_once 'class/Comments.class.php';

$db = new Connection();
$conn = $db->getConnection();

$category = new Category($conn);
$subcategory = new Subcategory($conn);
$items = new Items($conn);
$admin = new Admin($conn);
$users = new User($conn);
$cart_item = new Cart_Item($conn);
$orders = new Orders($conn);
$blog = new Blog($conn);
$comments = new Comments($conn);