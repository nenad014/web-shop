<?php
require_once('../startpage.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/superhero/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">ADMIN LOGIN</h1>
        <br>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="adminLog.php" method="post">
                    <input type="text" name="admin_name" class="form-control"><br>
                    <input type="password" name="admin_pwd" class="form-control"><br>
                    <button type="submit" class="btn btn-success form-control" name="adminLogBtn">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>