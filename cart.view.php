<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(isset($_SESSION['loggedUser'])) {
    $user_id = $_SESSION['loggedUser']->user_id;
}
?>


<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>MOJA KORPA</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="cart.view.php">MOJA KORPA</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
    <br>
    <table class="table table-bordered">
                <tr>
                    <th width="10%">Slika</th>
                    <th width="30%">Proizvod</th>
                    <th width="10%">Količina</th>
                    <th width="20%">Cena</th>
                    <th width="15%">Ukupno</th>
                    <th width="5%">Akcija</th>
                </tr>
                <?php
                    if(isset($_COOKIE['shopping_cart'])) {
                        $total = 0;
                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                        $cart_data = json_decode($cookie_data, true);
                        foreach($cart_data as $keys => $values) { ?>
                <tr>
                    <td><img src="<?php echo $values['item_img']; ?>" style="width:75px"></td>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td><?php echo $values["item_price"]; ?> RSD</td>
                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> RSD</td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn btn-outline-danger"> <i class="fa fa-times" aria-hidden="true"></i></a></td>
                </tr>
                        <?php
                            $total = $total + ($values['item_quantity'] * $values['item_price']);
                        } ?>
                <tr>
                    <td colspan="4" align="right"><b>UKUPNO: </b></td>
                    <td align="right"><?php echo number_format($total, 2); ?> RSD</td>
                    <td><a href="checkout.view.php" class="btn btn-success">NARUČI</a></td>
                    
                </tr>
                    <?php
                    } else {
                        echo '
                        <tr>
                        <td colspan="5" align="center">Nemate stavki na kartici</td>
                        </tr>
                        ';
                    } ?>
            </table>
            </table>             
            </div>
        </div>
    </div>
    <br>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>