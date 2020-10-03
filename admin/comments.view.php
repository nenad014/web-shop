<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$komentari = $comments->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">KOMENTARI</h3>
        <br>
        <div class="row">
            <div class="col-md-2">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Komentar</th>
                                    <th>Proizvod</th>
                                    <th>Korisnik</th>
                                    <th>Akcija</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($komentari as $komentar) : ?>
                                    <tr>
                                        <td><?php echo $komentar->comment; ?></td>
                                        <td><?php echo $komentar->item_name; ?></td>
                                        <td><?php echo $komentar->user_name; ?></td>
                                        <td><a href="" class="btn btn-danger">Ukloni</a></td>
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