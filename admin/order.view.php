<?php

require_once '../startpage.php';

if(isset($_GET['id'])) {
    $single = $orders->get($_GET['id']);
}
?>

<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">PORUDŽBINA BROJ <?php echo $single->id; ?></h3>
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
                            <tr>
                                <td><strong>Poručilac: </strong></td>
                                <td><?php echo $single->fname; ?> <?php echo $single->lname; ?></td>
                            </tr>
                            <tr>
                                <td><strong>email: </strong></td>
                                <td><?php echo $single->email; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Broj telefona: </strong></td>
                                <td><?php echo $single->phone; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Adresa: </strong></td>
                                <td><?php echo $single->address; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Adresa isporuke: </strong></td>
                                <td><?php echo $single->delivery_address; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Način plaćanja: </strong></td>
                                <td><?php echo $single->payment; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Artikli: </strong></td>
                                <td>
                                    <?php echo $single->products; ?>
                                </td>
                                <td>
                                    <?php echo $single->quantity; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Iznos porudžbine: </strong></td>
                                <td><?php echo $single->grand_total; ?> RSD</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>