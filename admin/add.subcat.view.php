<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allCat = $category->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">DODAJ POTKATEGORIJU</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-8 offset-md-2">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <label for="subcat_name">Naziv potkategorije</label>
                            <input type="text" name="subcat_name" class="form-control">
                            <label for="cat_name">Glavna kategorija</label>
                            <select name="cat_name" class="form-control">
                                <?php foreach($allCat as $cat): ?>
                                    <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="subcat_img">Slika</label>
                            <input type="file" name="subcat_img" class="form-control">
                            <br>
                            <input type="submit" class="btn btn-success" name="addSubcatBtn" value="Dodaj potkategoriju">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>