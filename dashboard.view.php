<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(!isset($_SESSION['loggedUser'])) {
    header('Location: index.php');
}
?>


<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>MOJ NALOG</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="dashboard.view.php">MOJ NALOG</a></li>
            </ul>
        </nav>
    </div>
    <h1 class="text-center">WELCOME <?php echo strtoupper($_SESSION['loggedUser']->user_name); ?></h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <i class="fa fa-gift text-center" aria-hidden="true" style="font-size: 64px;"></i>
                    <a href="orders.view.php" class="text-center">Vaše porudžbine</a>
                    <p class="text-center">Pratite vaše porudžbine</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <i class="fa fa-lock text-center" aria-hidden="true" style="font-size: 64px;"></i>
                    <a href="login.security.view.php" class="text-center">Nalog i bezbednost</a>
                    <p class="text-center">Uredite vaš nalog</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <i class="fa fa-map-marker text-center" aria-hidden="true" style="font-size: 64px;"></i>
                    <a href="user.address.view.php" class="text-center">Vaša adresa</a>
                    <p class="text-center">Unesite ili izmenite vašu adresu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <i class="fa fa-credit-card text-center" aria-hidden="true" style="font-size: 64px;"></i>
                    <a href="payment.options.view.php" class="text-center">Opcije plaćanja</a>
                    <p class="text-center">Uredite ili dodajte opcije plaćanja</p>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>