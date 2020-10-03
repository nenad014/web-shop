<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">DODAJ KATEGORIJU</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-8 offset-md-2">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <label for="cat_name">Ime kategorije</label>
                            <input type="text" name="cat_name" class="form-control">
                            <br>
                            <label for="cat_img">Slika</label>
                            <input type="file" name="cat_img" class="form-control"><br>
                            <input type="submit" class="btn btn-success" name="addCatBtn" value="Dodaj kategoriju">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>