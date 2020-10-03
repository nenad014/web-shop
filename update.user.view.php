<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(!isset($_SESSION['loggedUser'])) {
    header('Location: index.php');
} else {
    $user_id = $_SESSION['loggedUser']->user_id;
    $single = $users->get($user_id);
}
?>


<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>AŽURIRAJ PROFIL</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="dashboard.view.php">AŽURIRAJ PROFIL</a></li>
            </ul>
        </nav>
    </div>
    <h1 class="text-center">WELCOME <?php echo strtoupper($_SESSION['loggedUser']->user_name); ?></h1>
    <br>
    <div class="container">
        <h3>AŽURIRAJ PROFIL</h3>
        <hr>
        <div class="col-md-6 offset-md-3">
            <form action="update.php" method="post">
                <label for=""><strong>Korisničko ime</strong></label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $single->user_name; ?>"><br>
                <label for=""><strong>Email</strong></label>
                <input type="text" class="form-control" name="user_email" value="<?php echo $single->user_email; ?>" disabled><br>
                <label for=""><strong>Telefon</strong></label>
                <input type="text" class="form-control" name="user_phone" value="<?php echo $single->user_phone; ?>"><br>
                <label for=""><strong>Adresa</strong></label>
                <input type="text" class="form-control" name="user_address" value="<?php echo $single->user_address; ?>"><br>
                <label for=""><strong>Adresa isporuke</strong></label>
                <input type="text" class="form-control" name="user_delivery_address" value="<?php echo $single->user_delivery_address; ?>"><br>
                <input type="hidden" name="user_id" value="<?php echo $single->user_id; ?>">
                <input type="submit" value="AŽURIRAJ" name="updateUserBtn" class="btn btn-success form-control">
            </form>
        </div>  
    </div>
    <br>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>