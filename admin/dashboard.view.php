<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">WELCOME ADMIN</h3>
        <br>
        <div class="row">
            <div class="col-md-2">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">PROIZVODI</div>
                                    <a href="items.view.php" class="card-link">Vidi proizvode</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">KATEGORIJE</div>
                                    <a href="category.view.php" class="card-link">Vidi kategorije</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">POTKATEGORIJE</div>
                                    <a href="subcategory.view.php" class="card-link">Vidi potkategorije</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">KORISNICI</div>
                                    <a href="users.view.php" class="card-link">Vidi korisnike</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">PORUDŽBINE</div>
                                    <a href="orders.view.php" class="card-link">Vidi porudžbine</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">PORUKE</div>
                                    <a href="#" class="card-link">Vidi poruke</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">BLOG</div>
                                    <a href="blog.view.php" class="card-link">Vidi objave</a>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">KOMENTARI</div>
                                    <a href="comments.view.php" class="card-link">Vidi komentare</a>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>