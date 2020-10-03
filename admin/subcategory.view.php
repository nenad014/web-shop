<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allSubCat = $subcategory->getAll();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">POTKATEGORIJE</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <a href="add.subcat.view.php" class="btn btn-primary">Dodaj potkategoriju</a>
                        <br><br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>Potkategorija</th>
                                    <th>Kategorija</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allSubCat as $sub) : ?>
                                    <tr>
                                        <td><?php echo $sub->subcat_id; ?></td>
                                        <td><?php echo $sub->subcat_name; ?></td>
                                        <td><?php echo $sub->cat_name; ?></td>
                                        <td><a href="update.subcat.view.php?subcat_id=<?php echo $sub->subcat_id; ?>" class="btn btn-warning">Uredi</a> <a href="remove.php?subcat_id=<?php echo $sub->subcat_id; ?>" class="btn btn-danger">Ukloni</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>