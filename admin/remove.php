<?php

require_once '../startpage.php';

if(isset($_GET['cat_id'])) {
    $category->remove($_GET['cat_id']);
}

if(isset($_GET['item_id'])) {
    $items->remove($_GET['item_id']);
}

if(isset($_GET['subcat_id'])) {
    $subcategory->remove($_GET['subcat_id']);
}

if(isset($_GET['post_id'])) {
    $blog->remove($_GET['post_id']);
}

if(isset($_GET['user_id'])) {
    $users->remove('user_id');
}