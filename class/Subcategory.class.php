<?php

class Subcategory {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addSubcategory() {
        if($_FILES['subcat_img']['error']>0) {
            $msg[] = "Greska prilikom ucitavanja slike";
        }
        
        if(!(strtoupper(substr($_FILES['subcat_img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['subcat_img']['name'],-5))==".JPEG" || strtoupper(substr($_FILES['subcat_img']['name'],-4))==".PNG")) {
            $msg[] = "Pogresan tip fajla";
        }
        if(file_exists("../images/" . $_FILES['subcat_img']['name'])) {
            $msg[] = "Slika već postoji. Molimo Vas da ne unosite slike sa istim imenom.";
        }
    
        if(!empty($msg)) {
            echo '<b>Greska:-</b><br>';
            foreach ($msg as $k) {
                echo '<li>' . $k;
            }
        } else {
            move_uploaded_file($_FILES['subcat_img']['tmp_name'], "../images/" . $_FILES['subcat_img']['name']);

            $subcat_name = $_POST['subcat_name'];
            $cat_name = $_POST['cat_name'];
            $subcat_img = "images/" . $_FILES['subcat_img']['name'];

            $sql = "INSERT INTO subcategory VALUES(NULL, ?, ?, ?)";
            $query = $this->conn->prepare($sql);
            $query->execute([$cat_name, $subcat_name, $subcat_img]);

            if($query) {
                header('Location: subcategory.view.php');
            } else {
                header('Location: add.subcat.view.php');
            }
        }
    }

    public function getAll() {
        $sql = "SELECT *, category.cat_id, category.cat_name FROM subcategory INNER JOIN category ON subcategory.cat_id = category.cat_id ORDER BY subcat_name ASC";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function getSubcat($id) {
        $sql = "SELECT * FROM subcategory WHERE subcat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function getSubcatByCategory($id) {
        $sql = "SELECT * FROM subcategory  WHERE cat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function updateSub() {
        $subcat_name = $_POST['subcat_name'];
        $subcat_id = $_POST['subcat_id'];

        $sql = "UPDATE subcategory SET subcat_name = '$subcat_name' WHERE subcat_id = $subcat_id";
        $query = $this->conn->query($sql);
        
        if($query) {
            header('Location: subcategory.view.php');
        } else {
            header('Location: update.subcat.view.php');
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM subcategory WHERE subcat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: subcategory.view.php');
        }
    }
}