<?php

require_once '../startpage.php';

if(isset($_GET['post_id'])) {
    $blog->remove($_GET['post_id']);
}