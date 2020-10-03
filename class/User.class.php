<?php

class User {

    private $conn;

    public $register_result = NULL;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser() {
        $name = $_POST['register_name'];
        $email = $_POST['register_email'];
        $password = md5($_POST['register_password']);

        $sql = "INSERT INTO users VALUES (NULL, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$name, $email, $password]);

        if($query) {
            $this->register_result = true;
            header('Location: login.register.view.php');
        }
    }

    public function logUser() {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);

        $sql = "SELECT * FROM users WHERE user_email = ? AND user_password = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$email, $password]);

        $loggedUser = $query->fetch(PDO::FETCH_OBJ);
        if($loggedUser != NULL) {
            $_SESSION['loggedUser'] = $loggedUser;
            header('Location: dashboard.view.php');
        } else {
            header('Location: login.register.view.php');
        }
    }

    public function read() {
        $sql = "SELECT * FROM users";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function get($id) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update() {
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $user_delivery_address = $_POST['user_delivery_address'];
        $user_id = $_POST['user_id'];

        $sql = "UPDATE users SET user_name = '$user_name', user_phone = '$user_phone', user_address = '$user_address', user_delivery_address = '$user_delivery_address' WHERE user_id = '$user_id'";
        $query = $this->conn->query($sql);

        if($query) {
            header('Location: login.security.view.php');
        } else {
            header('Location: update.user.view.php');
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: users.view.php');
        }
    }
}