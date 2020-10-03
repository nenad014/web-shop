<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allOrders = $orders->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">PORUDŽBINE</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>Korisnik</th>
                                    <th>Ime i prezime</th>
                                    <th>email</th>
                                    <th>Iznos</th>
                                    <th>Datum</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allOrders as $order) : ?>
                                    <tr>
                                        <td><?php echo $order->id; ?></td>
                                        <td><?php echo $order->user_id; ?></td>
                                        <td><?php echo $order->fname; ?> <?php echo $order->lname; ?></td>
                                        <td><?php echo $order->email; ?></td>
                                        <td><?php echo $order->grand_total; ?> RSD</td>
                                        <td><?php echo $order->created; ?></td>
                                        <td><a href="order.view.php?id=<?php echo $order->id; ?>" class="btn btn-info">Vidi</a> <a href="#" class="btn btn-danger">Ukloni</a></td>
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