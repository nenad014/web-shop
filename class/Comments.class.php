<?php

class Comments {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function read() {
        $sql = "SELECT *, users.user_name, items.item_name FROM comments INNER JOIN users ON comments.user_id = users.user_id INNER JOIN items ON comments.item_id = items.item_id";
        $query = $this->conn->query($sql);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function getFromPost($id) {
        $sql = "SELECT * FROM comments INNER JOIN users ON comments.user_id = users.user_id  WHERE comments.post_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function addPostComment() {
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];
        $user_id = $_POST['user_id'];

        $sql = "INSERT INTO comments VALUES (NULL, :comment, NULL, :post_id, :user_id)";
        $query = $this->conn->prepare($sql);
        $query->execute(["comment"=>$comment, "post_id"=>$post_id, "user_id"=>$user_id]);
        $row_count = $query->rowCount();

        if($row_count == 1) {
            header('Location: post.view.php?id='.$post_id);
        } else {
            header('Location: 404.php');
        }
    }

    public function getFromItem($id) {
        $sql = "SELECT * FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE comments.item_id = ?";
        $query = $this->conn->prepare($sql);
        $query->execute([$id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function addItemComment() {
        $comment = $_POST['comment'];
        $item_id = $_POST['item_id'];
        $user_id = $_POST['user_id'];

        $sql = "INSERT INTO comments VALUES (NULL, :comment, :item_id, NULL, :user_id)";
        $query = $this->conn->prepare($sql);
        $query->execute(["comment"=>$comment, "item_id"=>$item_id, "user_id"=>$user_id]);
        $row_count = $query->rowCount();

        if($row_count == 1) {
            header('Location: item.view.php?id='.$item_id);
        } else {
            header('Location: 404.php');
        }
    }
}