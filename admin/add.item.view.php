<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allCat = $category->read();
$allSubCat = $subcategory->getAll();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">DODAJ PROIZVOD</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-8 offset-md-2">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <label for="item_name">Naziv proizvoda</label>
                            <input type="text" name="item_name" class="form-control">
                            <label for="item_desc">Opis proizvoda</label>
                            <input type="text" name="item_desc" class="form-control">
                            <label for="item_info">Informacije o proizvodu</label>
                            <textarea name="item_info" class="form-control" cols="30" rows="10"></textarea>
                            <label for="item_price">Cena</label>
                            <input type="text" name="item_price" class="form-control">
                            <label for="item_size">Veličina</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="size[]" value="XS">XS
                                    <input type="checkbox" class="form-check-input" name="size[]" value="S">S
                                    <input type="checkbox" class="form-check-input" name="size[]" value="M">M
                                    <input type="checkbox" class="form-check-input" name="size[]" value="L">L
                                    <input type="checkbox" class="form-check-input" name="size[]" value="XL">XL
                                    <input type="checkbox" class="form-check-input" name="size[]" value="2XL">2XL
                                    <input type="checkbox" class="form-check-input" name="size[]" value="3XL">3XL
                                    <input type="checkbox" class="form-check-input" name="size[]" value="4XL">4XL
                                    <input type="checkbox" class="form-check-input" name="size[]" value="5XL">5XL
                                    <br>
                                    <input type="checkbox" class="form-check-input" name="size[]" value="36">36
                                    <input type="checkbox" class="form-check-input" name="size[]" value="38">38
                                    <input type="checkbox" class="form-check-input" name="size[]" value="40">40
                                    <input type="checkbox" class="form-check-input" name="size[]" value="42">42
                                    <input type="checkbox" class="form-check-input" name="size[]" value="44">44
                                    <input type="checkbox" class="form-check-input" name="size[]" value="46">46
                                    <input type="checkbox" class="form-check-input" name="size[]" value="48">48
                                    <br>
                                    <input type="checkbox" class="form-check-input" name="size[]" value="25">25
                                    <input type="checkbox" class="form-check-input" name="size[]" value="26">26
                                    <input type="checkbox" class="form-check-input" name="size[]" value="27">27
                                    <input type="checkbox" class="form-check-input" name="size[]" value="28">28
                                    <input type="checkbox" class="form-check-input" name="size[]" value="29">29
                                    <input type="checkbox" class="form-check-input" name="size[]" value="30">30
                                    <br>
                                    <input type="checkbox" class="form-check-input" name="size[]" value="36">36
                                    <input type="checkbox" class="form-check-input" name="size[]" value="37">37
                                    <input type="checkbox" class="form-check-input" name="size[]" value="38">38
                                    <input type="checkbox" class="form-check-input" name="size[]" value="39">39
                                    <input type="checkbox" class="form-check-input" name="size[]" value="40">40
                                    <input type="checkbox" class="form-check-input" name="size[]" value="41">41
                                    <input type="checkbox" class="form-check-input" name="size[]" value="42">42
                                    <input type="checkbox" class="form-check-input" name="size[]" value="43">43
                                    <input type="checkbox" class="form-check-input" name="size[]" value="44">44
                                    <input type="checkbox" class="form-check-input" name="size[]" value="45">45
                                    <input type="checkbox" class="form-check-input" name="size[]" value="46">46
                                </label>
                            </div><br>
                            <label for="item_img">Slika proizvoda</label>
                            <input type="file" name="item_img" class="form-control">
                            <label for="item_cat">Glavna kategorija</label>
                            <select name="item_cat" class="form-control">
                                <?php foreach($allCat as $cat): ?>
                                    <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="item_subcat">Potkategorija</label>
                            <select name="item_subcat" class="form-control">
                                <?php foreach($allSubCat as $subcat): ?>
                                    <option value="<?php echo $subcat->subcat_id; ?>"><?php echo $subcat->subcat_name; ?></option>
                                <?php endforeach; ?>
                            </select><br>
                            <input type="submit" class="btn btn-success" name="addItemBtn" value="Add Item">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'item_info' );
    </script>
<?php require_once 'inc/bottom.inc.php'; ?>