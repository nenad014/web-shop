<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>KONTAKT</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="contact.view.php">KONTAKT</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10 offset-md-1 mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 contact-left">
                <h3>INFORMACIJE</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate.</p>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Adresa: 25 Astor Pl, NY 10003, USA</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> Telefon: +1 212-982-4589</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> Email: info@gmail.com</p>
            </div>
            <div class="col-md-9">
                <h3>POSTAVITE PITANJE</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio justo, ultrices ac nisl sed, lobortis porta elit. Fusce in metus ac ex venenatis ultricies at cursus mauris.</p>
                <form action="#" method="post">
                    <input type="text" name="name" class="form-control" placeholder="Ime"><br>
                    <input type="email" name="email" class="form-control" placeholder="Email"><br>
                    <input type="text" name="subject" class="form-control" placeholder="Naslov"><br>
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Poruka"></textarea><br>
                    <button type="submit" name="sendMsg" class="btn btn-primary">POŠALJI PORUKU</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/bottom.inc.php'; ?>