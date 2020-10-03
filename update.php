<?php

require_once 'startpage.php';

if(isset($_POST['updateUserBtn'])) {
    $users->update();
}