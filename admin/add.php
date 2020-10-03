<?php

require_once '../startpage.php';

if(isset($_POST['addItemBtn'])) {
    $items->add();
}

if(isset($_POST['addCatBtn'])) {
    $category->addCategory();
}

if(isset($_POST['addSubcatBtn'])) {
    $subcategory->addSubcategory();
}

if(isset($_POST['addPostBtn'])) {
    $blog->add();
}