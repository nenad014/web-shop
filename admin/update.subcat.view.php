<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

if(isset($_GET['id'])) {
    $subcat = $subcategory->getSubcat($_GET['id']);
}
$allCat = $category->getAll();

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
                        <form action="update.subcat.php" method="post" enctype="multipart/form-data">
                            <label for="subcat_name">Subcategory name</label>
                            <input type="text" name="subcat_name" class="form-control" value="<?php echo $subcat->subcat_name; ?>">
                            <label for="cat_name">Main category</label>
                            <select name="cat_name" class="form-control">
                                <?php foreach($allCat as $cat): ?>
                                    <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="subcat_img">Subcategory image</label>
                            <input type="file" name="subcat_img" class="form-control">
                            <br>
                            <input type="hidden" name="subcat_id" value="<?php echo $subcat->subcat_id; ?>">
                            <input type="submit" class="btn btn-success" name="updateSubcatBtn" value="Update Subcategory">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>