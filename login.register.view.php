<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<div class="container-fluid">
    <h1 class="text-center">PRIJAVA / REGISTRACIJA</h1>
    <br>
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">PRIJAVA</h3>
                <br>
                <form action="login.register.php" method="post">
                    <input class="form-control" type="email" name="login_email" placeholder="Vaš e-mail" required><br>
                    <input class="form-control" type="password" name="login_password" placeholder="Vaša lozinka" required><br>
                    <input class="form-control btn btn-success" type="submit" name="logBtn" value="PRIJAVA">
                </form>
                <br>
            </div>
            <div class="col-md-6">
                <h3 class="text-center">REGISTRACIJA</h3>
                <br>
                <form action="login.register.php" method="post">
                    <input type="text" name="register_name" class="form-control" placeholder="Vaše ime" required><br>
                    <input class="form-control" type="email" name="register_email" placeholder="Vaš e-mail" required><br>
                    <input class="form-control" type="password" name="register_password" placeholder="Vaša lozinka" required><br>
                    <input class="form-control btn btn-primary" type="submit" name="signupBtn" value="REGISTRACIJA">
                </form>
                <?php if($users->register_result) : ?>
                <div class="alert alert-succes">
                Uspešna registracija! Ulogujte se.
                </div>
                <?php endif; ?>
                <br>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>