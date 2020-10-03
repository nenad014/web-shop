<?php

class Admin {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function logAdmin() {
        $admin_name = $_POST['admin_name'];
        $admin_pwd = md5($_POST['admin_pwd']);

        $sql = "SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$admin_name, $admin_pwd]);

        $admin = $query->fetch(PDO::FETCH_OBJ);

        if($admin != NULL) {
            $_SESSION['admin'] = $admin;
            header('Location: dashboard.view.php');
        } else {
            header('Location: index.php');
        }
    }  
}