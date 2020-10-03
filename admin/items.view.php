<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allItms = $items->getAll();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">ITEMS</h3>
        <br>
        <div class="row">
            <div class="col-md-2">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <a href="add.item.view.php" class="btn btn-primary">Dodaj proizvod</a>
                        <br><br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Slika</th>
                                    <th>Proizvod</th>
                                    <th>Opis</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allItms as $item) : ?>
                                    <tr>
                                        <td><img src="../<?php echo $item->item_img; ?>" style="width:75px"></td>
                                        <td><?php echo $item->item_name; ?></td>
                                        <td><?php echo $item->item_desc; ?></td>
                                        <td><a href="update.item.view.php?id=<?php echo $item->item_id; ?>" class="btn btn-warning">Uredi</a> <a href="remove.php?item_id=<?php echo $item->item_id; ?>" class="btn btn-danger">Ukloni</a></td>
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