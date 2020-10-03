<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$allUsers = $users->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">KORISNICI</h3>
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
                                    <th>Korisnik</th>
                                    <th>email</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allUsers as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->user_name; ?></td>
                                        <td><?php echo $user->user_email; ?></td>
                                        <td><a href="user.view.php?user_id=<?php echo $user->user_id; ?>" class="btn btn-info">Vidi</a> <a href="remove.php?user_id=<?php echo $user->user_id; ?>" class="btn btn-danger">Ukloni</a></td>
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