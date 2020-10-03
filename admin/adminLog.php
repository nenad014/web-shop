<?php

require_once '../startpage.php';

if(isset($_POST['adminLogBtn'])) {
    $admin->logAdmin();
}