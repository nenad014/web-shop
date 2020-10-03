<?php

require_once 'startpage.php';

if(isset($_POST['signupBtn'])) {
    $users->registerUser();
}

if(isset($_POST['logBtn'])) {
    $users->logUser();
}