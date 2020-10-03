<?php

class Category {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addCategory() {

        if($_FILES['cat_img']['error']>0) {
            $msg[] = "Greska prilikom ucitavanja slike";
        }
        
        if(!(strtoupper(substr($_FILES['cat_img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['cat_img']['name'],-5))==".JPEG" || strtoupper(substr($_FILES['cat_img']['name'],-4))==".PNG")) {
            $msg[] = "Pogresan tip fajla";
        }
        if(file_exists("../images/" . $_FILES['cat_img']['name'])) {
            $msg[] = "Slika već postoji. Molimo Vas da ne unosite slike sa istim imenom.";
        }
    
        if(!empty($msg)) {
            echo '<b>Greska:-</b><br>';
            foreach ($msg as $k) {
                echo '<li>' . $k;
            }
        } else {
            move_uploaded_file($_FILES['cat_img']['tmp_name'], "../images/" . $_FILES['cat_img']['name']);
            $cat_name = $_POST['cat_name'];
            $cat_img = "images/" . $_FILES['cat_img']['name'];

            $sql = "INSERT INTO category VALUES(NULL, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$cat_name, $cat_img]);

            if($query) {
                header('Location: category.view.php');
            } else {
                header('Location: add.category.view.php');
            }
        }
    }

    public function read() {
        $sql = "SELECT * FROM category";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function get($id) {
        $sql = "SELECT * FROM category WHERE cat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function updateCat() {
        $cat_name = $_POST['cat_name'];
        $cat_id = $_POST['cat_id'];

        $sql = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = $cat_id";
        $query = $this->conn->query($sql);
        
        if($query) {
            header('Location: category.view.php');
        } else {
            header('Location: update.category.view.php');
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM category WHERE cat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: category.view.php');
        }
    }
}