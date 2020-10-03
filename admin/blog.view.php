<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

$posts = $blog->read();
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">BLOG</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <a href="add.post.view.php" class="btn btn-primary">Dodaj objavu</a>
                        <br><br>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>Objava</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($posts as $post) : ?>
                                    <tr>
                                        <td><?php echo $post->post_id; ?></td>
                                        <td><?php echo $post->title; ?></td>
                                        <td><a href="post.view.php?post_id=<?php echo $post->post_id; ?>" class="btn btn-info">Vidi</a> <a href="update.post.view.php?post_id=<?php echo $post->post_id; ?>" class="btn btn-warning">Uredi</a> <a href="remove.php?post_id=<?php echo $post->post_id; ?>" class="btn btn-danger">Ukloni</a></td>
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