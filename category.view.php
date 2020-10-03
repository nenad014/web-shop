<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(isset($_GET['id'])) {
    $items = $subcategory->getSubcatByCategory($_GET['id']);
    $kategorija = $category->get($_GET['id']);
}
?>

<div class="container">
    <h3 class="text-center"><?php echo strtoupper($kategorija->cat_name); ?></h3>
    <br>
    <div class="row">
        <?php foreach($items as $item) : ?>
            <div class="col-md-3">
                <div class="card-deck" style="width: 100%;">
                    <img class="card-img-top" src="<?php echo $item->subcat_img; ?>" alt="<?php echo $item->subcat_name; ?>">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $item->subcat_name; ?></h4>
                        <a href="subcat.view.php?id=<?php echo $item->subcat_id; ?>" class="btn btn-info stretched-link form-control">VIDI SVE</a>
                    </div>
                </div>
                <br>
            </div> 
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>