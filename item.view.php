<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = $items->get($_GET['id']);
    $komentari = $comments->getFromItem($_GET['id']);
}
?>

<div class="container">
    <div class="col-md-10 offset-md-1">    
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $item->item_img; ?>" alt="<?php echo $item->item_name; ?>" width="100%">
                <br>
                <a href="sizechart.view.php">Tabela veličina</a>  
            </div>
            <div class="col-md-6">
            <form action="cart.php" method="post">
                <h1 class="text-justify"><?php echo $item->item_name; ?></h1>
                <h3><?php echo $item->item_desc; ?></h3>
                <h5>Podaci o proizvodu</h5>
                <hr>
                <p class="text-justify"><?php echo $item->item_info; ?></p>
                <h3 class="text-primary"><?php echo $item->item_price; ?> RSD</h3>
                <br>
                <h5>BOJA: <div class="clr-cont" style="background-color: <?php echo $item->item_color; ?>;"></div> <button class="btn" style="background-color: <?php echo $item->item_color; ?>;"></button></h5> 
                <h5>VELIČINA: <?php
                $sizes = (array_map('trim', array_filter(explode(' ', $item->item_size))));
                foreach($sizes as $size) : ?>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-light">
                        <input type="checkbox" name="size" id="size" value="<?php echo $size; ?>"> <?php echo $size; ?>
                    </label>
                </div>
                
                <?php endforeach; ?></h5>
                <br>
                    <label>Količina</label>
                    <input type="text" name="quantity" value="1" class="form-control"/>
                    <input type="hidden" name="hidden_name" value="<?php echo $item->item_name; ?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $item->item_price; ?>" />
                    <input type="hidden" name="hidden_img" value="<?php echo $item->item_img; ?>" />
                    <input type="hidden" name="hidden_id" value="<?php echo $item->item_id; ?>" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Dodaj u korpu"/>
                </form>    
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-10 offset-md-1">
        <h3>Komentari</h3>
        <hr>
        <?php if(isset($_SESSION['loggedUser'])) : ?>
            <form action="add.php" method="POST">
                <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Ostavite komentar"></textarea><br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['loggedUser']->user_id; ?>">
                <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                <button type="submit" name="addCommentOnItemBtn" class="btn btn-primary">Postavi komentar</button>
            </form><br>
        <?php endif; ?>
        <?php foreach($komentari as $komentar) : ?>
            <div class="card border-info rounded">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $komentar->user_name; ?></h5>
                    <p class="card-text"><?php echo $komentar->comment; ?></p>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>