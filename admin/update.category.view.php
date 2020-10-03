<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

if(isset($_GET['id'])) {
    $cat = $category->getCategory($_GET['id']);
}

?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">UPDATE CATEGORY</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-8 offset-md-2">
                        <form action="update.php" method="post">
                            <label for="cat_name">Category name</label>
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $cat->cat_name;?>">
                            <br>
                            <input type="hidden" name="cat_id" value="<?php echo $cat->cat_id; ?>">
                            <input type="submit" class="btn btn-success" name="updateCatBtn" value="Update Category">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>