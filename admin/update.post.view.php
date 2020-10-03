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
        <h3 class="text-center">BLOG POST <?php echo $post->id; ?></h3>
        <br>
        <div class="row">
            <div class="col-md-2">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <label>Naslov</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $post->title; ?>"><br>
                            <label>Tekst</label>
                            <textarea name="body" class="form-control" cols="30" rows="10"><?php echo $post->body; ?></textarea><br>
                            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                            <input type="submit" class="btn btn-warning" name="updatePostBtn" value="AŽURIRAJ OBJAVU">
                        </form>                        
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('body');
    </script>
<?php require_once 'inc/bottom.inc.php'; ?>