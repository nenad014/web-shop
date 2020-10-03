<?php

class Cart_Item {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addToCart() {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];
        $total = $item_price * $quantity;
        $date = date('Y-m-d');

        $sql = "INSERT INTO cart_items VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$user_id, $item_id, $quantity, $item_price, $total, $date]);

        $cnt = $query->rowCount();

        if($cnt == 1) {
            header('Location: cart.view.php');
        } else {
            header('Location: item.view.php');
        }
    }

    public function getCartItemsFromUser($id) {
        // TREBA ODRADITI BOLJE QUERY
        $sql = "SELECT *, items.item_name, items.item_img, items.item_price FROM cart_items INNER JOIN items ON cart_items.item_id = items.item_id WHERE cart_items.user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getSum($arr) {
        if(isset($arr)) {
            $sum = 0;
            foreach($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf($sum);
        }
    }

    public function subTotalByUser($id, $cid) {
        $sql = "SELECT cart_items.quantity*items.item_price AS total_price FROM cart_items INNER JOIN items ON cart_items.item_id = items.item_id WHERE cart_items.user_id = ? AND cart_items.cart_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id, $cid]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function removeCartItem() {
        $id = $_POST['id'];

        $sql = "DELETE FROM cart_items WHERE cart_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);

        if($query) {
            header('Location: cart.view.php');
        }
    }

    public function clearCart($id) {
        $sql = "DELETE FROM cart_items WHERE user_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
    }
}