<?php

class Orders {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addOrder() {
        $user_id = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $delivery_address = $_POST['delivery_address'];
        $payment = $_POST['payment'];
        $cc_name = $_POST['cc-name'];
        $cc_number = $_POST['cc-number'];
        $cc_expiration = $_POST['cc-expiration'];
        $cc_cvv = $_POST['cc-cvv'];
        $products = $_POST['products'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $grand_total = $_POST['grand_total'];
        $date = date('Y-m-d');

        $sql = "INSERT INTO orders VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$user_id, $fname, $lname, $email, $phone, $address, $delivery_address, $payment, $cc_name, $cc_number, $cc_expiration, $cc_cvv, $products, $item_id, $quantity, $grand_total, $date]);

        if($query) {
            header('Location: index.php');
        } else {
            header('Location: checkout.view.php');
        }
    }

    public function allOrdersFromUser($id) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function read() {
        $sql = "SELECT * FROM orders";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function get($id) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }
}