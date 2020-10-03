<?php

class Blog {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function add() {
        if($_FILES['image']['error']>0) {
            $msg[] = "Greska prilikom ucitavanja slike";
        }
        
        if(!(strtoupper(substr($_FILES['image']['name'],-4))==".JPG" || strtoupper(substr($_FILES['image']['name'],-5))==".JPEG" || strtoupper(substr($_FILES['image']['name'],-4))==".PNG" || strtoupper(substr($_FILES['image']['name'],-5))==".JFIF")) {
            $msg[] = "Pogresan tip fajla";
        }
        if(file_exists("../images/" . $_FILES['image']['name'])) {
            $msg[] = "Slika već postoji. Molimo Vas da ne unosite slike sa istim imenom.";
        }
    
        if(!empty($msg)) {
            echo '<b>Greska:-</b><br>';
            foreach ($msg as $k) {
                echo '<li>' . $k;
            }
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $_FILES['image']['name']);

            $title = $_POST['title'];
            $body = $_POST['body'];
            $image = "images/" . $_FILES['image']['name'];
            $date = date('Y-m-d');

            $sql = "INSERT INTO posts VALUES (NULL, ?, ?, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$title, $body, $image, $date]);

            $row_count = $query->rowCount();

            if($row_count == 1) {
                header('Location: blog.view.php');
            } else {
                header('Location: add.post.view.php');
            }
        }
    }

    public function read() {
        $sql = "SELECT * FROM posts";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function latest() {
        $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function get($id) {
        $sql = "SELECT * FROM posts WHERE post_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function update() {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $id = $_POST['post_id'];

        $sql = "UPDATE posts SET title = '$title', body = '$body' WHERE post_id = '$id'";
        $query = $this->conn->query($sql);
        
        if($query) {
            header('Location: blog.view.php');
        } else {
            header('Location: update.post.view.php');
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM posts WHERE post_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: blog.view.php');
        } else {
            header('Location: 404.php');
        }
    }
}