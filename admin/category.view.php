<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allCat = $category->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">CATEGORIES</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <a href="add.category.view.php" class="btn btn-primary">Dodaj kategoriju</a>
                        <br><br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>Kategorija</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allCat as $cat) : ?>
                                    <tr>
                                        <td><?php echo $cat->cat_id; ?></td>
                                        <td><?php echo $cat->cat_name; ?></td>
                                        <td><a href="update.category.view.php?id=<?php echo $cat->cat_id; ?>" class="btn btn-warning">Uredi</a> <a href="remove.php?cat_id=<?php echo $cat->cat_id; ?>" class="btn btn-danger">Ukloni</a></td>
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