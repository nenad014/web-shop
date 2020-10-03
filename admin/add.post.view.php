<?php
require_once '../startpage.php';

if(!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
}
?>
<?php require_once 'inc/top.inc.php'; ?>
    <div class="container-fluid">
        <h3 class="text-center">DODAJ OBJAVU</h3>
        <br>
        <div class="row">
            <div class="col-md-3">
                <?php require_once 'inc/left.inc.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                            <label>Naslov</label>
                            <input type="text" name="title" class="form-control" required><br>
                            <label>Tekst</label>
                            <textarea name="body" class="form-control" cols="30" rows="10"></textarea><br>
                            <label>Slika</label>
                            <input type="file" name="image" class="form-control"><br>
                            <input type="submit" class="btn btn-success" name="addPostBtn" value="POSTAVI OBJAVU">
                        </form>
                    </div>
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