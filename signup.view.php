<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<div class="container-fluid">
    <h1 class="text-center">SIGN UP</h1>
    <br>
    <div class="col-md-6 offset-md-3">
        <form action="login.register.php" method="post">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required><br>
            <input class="form-control" type="email" name="email" placeholder="You Email" required><br>
            <input class="form-control" type="password" name="password" placeholder="Your Password" required><br>
            <input class="form-control btn btn-primary" type="submit" name="signupBtn" value="Sign Up">
        </form>
        <br>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>