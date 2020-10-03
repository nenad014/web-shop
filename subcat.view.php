<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(isset($_GET['id'])) {
    $subcat = $subcategory->getSubcat($_GET['id']);
    $products = $items->getAllItemsFromSubcat($_GET['id']);
}
?>

<div class="container">
    <h3 class="text-center"><?php echo $subcat->subcat_name; ?></h3>
    <br>
    <div class="row">
        <?php foreach($products as $product) : ?>
            <div class="col-md-3">
                <div class="card-deck" style="width: 100%;">
                    <img class="card-img-top" src="<?php echo $product->item_img; ?>" alt="<?php echo $product->item_name; ?>">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $product->item_name; ?></h4>
                        <a href="item.view.php?id=<?php echo $product->item_id; ?>" class="btn btn-info stretched-link form-control">VIDI PROIZVOD</a>
                    </div>
                </div>
                <br>
            </div> 
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>