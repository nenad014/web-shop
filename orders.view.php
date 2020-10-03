<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(!isset($_SESSION['loggedUser'])) {
    header('Location: index.php');
} else {
    $user_id = $_SESSION['loggedUser']->user_id;
    $porudzbina = $orders->allOrdersFromUser($user_id);
}
?>


<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>MOJE PORUDŽBINE</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="dashboard.view.php">MOJE PORUDŽBINE</a></li>
            </ul>
        </nav>
    </div>
    <h1 class="text-center">WELCOME <?php echo strtoupper($_SESSION['loggedUser']->user_name); ?></h1>
    <br>
    <div class="container">
        <h3>MOJE PORUDŽBINE</h3>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Broj porudžbine</th>
                    <th>Stavke porudžbine</th>
                    <th>Iznos porudžbine</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($porudzbina as $order) : ?>
                    <tr>
                        <td><?php echo $order->order_id; ?></td>
                        <td><?php echo $order->products; ?></td>
                        <td><?php echo $order->grand_total; ?> RSD</td>
                        <td><?php echo $order->created; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>