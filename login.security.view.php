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
        <h1>NALOG I BEZBEDNOST</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="dashboard.view.php">NALOG I BEZBEDNOST</a></li>
            </ul>
        </nav>
    </div>
    <h1 class="text-center">WELCOME <?php echo strtoupper($_SESSION['loggedUser']->user_name); ?></h1>
    <br>
    <div class="container">
        <h3>NALOG I BEZBEDNOST</h3>
        <hr>
        <div class="col-md-6 offset-md-3">
            <table>
                <tr>
                    <td><strong>Korisničko ime: </strong></td>
                    <td><?php echo $single->user_name; ?></td>
                </tr>
                <tr>
                    <td><strong>email: </strong></td>
                    <td><?php echo $single->user_email; ?></td>
                </tr>
            </table>
            <a href="update.user.view.php?id=<?php echo $single->user_id; ?>" class="btn btn-primary form-control">UREDI PROFIL</a>
        </div>  
    </div>
    <br>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>