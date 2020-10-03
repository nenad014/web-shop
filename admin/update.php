<?php

require_once '../startpage.php';

if(isset($_POST['updateCatBtn'])) {
    $category->updateCat();
}

if(isset($_POST['updateSubcatBtn'])) {
    $subcategory->updateSub();
}

if(isset($_POST['updateItemBtn'])) {
    $items->update();
}

if(isset($_POST['updatePostBtn'])) {
    $blog->update();
}