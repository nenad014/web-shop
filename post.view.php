<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
if(isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    $post = $blog->get($id);
    $komentari = $comments->getFromPost($id);
}
?>

<div class="container">
    <div class="col-md-10 offset-md-1">
        <h1 class="text-center"><?php echo $post->title; ?></h1>
        <br>
        <img src="<?php echo $post->image; ?>" alt="<?php echo $post->title; ?>" class="img-fluid">
        <br>
        <?php echo $post->body; ?>
        <hr>
        <p><strong>Objavljeno: </strong> <?php echo $post->created; ?></p>
    </div>
    <br>
    <div class="col-md-10 offset-md-1">
        <h3>Komentari</h3>
        <hr>
        <?php if(isset($_SESSION['loggedUser'])) : ?>
            <form action="add.php" method="POST">
                <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Ostavite komentar"></textarea><br>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['loggedUser']->user_id; ?>">
                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                <button type="submit" name="addCommentBtn" class="btn btn-primary">Postavi komentar</button>
            </form><br>
        <?php endif; ?>
        <?php foreach($komentari as $komentar) : ?>
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $komentar->user_name; ?></h5>
                    <p class="card-text"><?php echo $komentar->comment; ?></p>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>