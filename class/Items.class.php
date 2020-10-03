<?php

class Items {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function add() {

        if($_FILES['item_img']['error']>0) {
            $msg[] = "Greska prilikom ucitavanja slike";
        }
        
        if(!(strtoupper(substr($_FILES['item_img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['item_img']['name'],-5))==".JPEG" || strtoupper(substr($_FILES['item_img']['name'],-4))==".PNG" || strtoupper(substr($_FILES['item_img']['name'],-5))==".JFIF")) {
            $msg[] = "Pogresan tip fajla";
        }
        if(file_exists("../images/" . $_FILES['item_img']['name'])) {
            $msg[] = "Slika već postoji. Molimo Vas da ne unosite slike sa istim imenom.";
        }
    
        if(!empty($msg)) {
            echo '<b>Greska:-</b><br>';
            foreach ($msg as $k) {
                echo '<li>' . $k;
            }
        } else {
            move_uploaded_file($_FILES['item_img']['tmp_name'], "../images/" . $_FILES['item_img']['name']);

        $item_name = $_POST['item_name'];
        $item_desc = $_POST['item_desc'];
        $item_info = $_POST['item_info'];
        $item_price = $_POST['item_price'];
        foreach($_POST['size'] as $value) {
            $item_size .= $value . ' ';
        }
        $item_img = "images/" . $_FILES['item_img']['name'];
        $item_cat = $_POST['item_cat'];
        $item_subcat = $_POST['item_subcat'];
        $date = date('Y-m-d');

        $sql = "INSERT INTO items VALUES(NULL, ?, ?, ?, ?, ?, ? ,?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$item_cat, $item_subcat, $item_name, $item_desc, $item_info, $item_price, $item_size, $item_img, $date]);
        $row_count = $query->rowCount();

            if($row_count == 1) {
                header('Location: items.view.php');
            } else {
                header('Location: add.item.view.php');
            }
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM items";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function latest() {
        $sql = "SELECT * FROM items ORDER BY item_id DESC LIMIT 8";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function get($id) {
        $sql = "SELECT * FROM items WHERE item_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function getAllItemsFromSubcat($id) {
        $sql = "SELECT * FROM items WHERE subcat_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function update() {
        $item_name = $_POST['item_name'];
        $item_desc = $_POST['item_desc'];
        $item_info = $_POST['item_info'];
        $item_price = $_POST['item_price'];
        foreach($_POST['size'] as $value) {
            $item_size .= $value . ' ';
        }
        $item_cat = $_POST['item_cat'];
        $item_subcat = $_POST['item_subcat'];
        $date = date('Y-m-d');
        $item_id = $_POST['item_id'];

        $sql = "UPDATE items SET item_name = '$item_name', item_desc = '$item_desc', item_info = '$item_info', item_price = '$item_price',
                item_size = '$item_size', item_date = '$date', cat_id = '$item_cat', subcat_id = '$item_subcat' WHERE item_id = '$item_id'";
        $query = $this->conn->query($sql);
        
        if($query) {
            header('Location: items.view.php');
        } else {
            header('Location: update.item.view.php');
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM items WHERE item_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: items.view.php');
        }
    }
}

