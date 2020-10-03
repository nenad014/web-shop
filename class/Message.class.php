<?php

class Message {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function receive() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $from = "Od: $name<$email>";
        mail($email, $subject, $message, $from);
    }
}