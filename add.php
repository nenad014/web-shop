<?php

require_once 'startpage.php';

if(isset($_POST['addCommentBtn'])) {
    $comments->addPostComment();
}

if(isset($_POST['addCommentOnItemBtn'])) {
    $comments->addItemComment();
}
