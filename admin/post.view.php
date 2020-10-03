<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}

if(isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    $post = $blog->get($id);
}
?>
<?php require_once 'inc/top.inc.php'; ?>
<div class="container-fluid">
        <h3 class="text-center">BLOG POST <?php echo $post->post_id; ?></h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <h3 class="text-center"><?php echo $post->title; ?></h3>
                        <br>
                        <img src="../<?php echo $post->image; ?>" alt="<?php echo $post->title; ?>" class="img-fluid">
                        <br>
                        <?php echo $post->body; ?>
                        <hr>
                        <p><strong>Objavljeno: </strong> <?php echo $post->created; ?></p>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'inc/bottom.inc.php'; ?>

<div class="container">
    
</div>

<?php require_once 'inc/bottom.inc.php'; ?>