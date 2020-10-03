<?php
$latest = $items->latest();
$kategorije = $category->read();
$posts = $blog->latest();
?>

<div class="container-fluid">
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/banner-1.jpg" class="d-block w-100" alt="banner1">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center">MUŠKA KOLEKCIJA</h3>
                    <p class="text-center">See how your users experience your website in realtime or view trends to see any changes in performance over time.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="images/banner-2.jpg" class="d-block w-100" alt="banner2">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center">ŽENSKA KOLEKCIJA</h3>
                    <p class="text-center">See how your users experience your website in realtime or view trends to see any changes in performance over time.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="images/banner-03.jpg" class="d-block w-100" alt="banner3">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-center">Welcome To e-Shop</h3>
                    <p class="text-center">See how your users experience your website in realtime or view trends to see any changes in performance over time.</p>
                </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container-fluid promo mt-5 mb-5">
    <h2 class="text-center">Sve za nju, njega i njih</h2>
    <br>
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <?php foreach($kategorije as $kategorija) : ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="<?php echo $kategorija->cat_img; ?>" alt="Avatar" style="width:300px;height:300px;">
                                </div>
                                <div class="flip-card-back">
                                    <h1><?php echo $kategorija->cat_name; ?></h1>
                                    <p class="text-center">Pogledajte sve artikle iz naše ponude</p>
                                    <a href="category.view.php?id=<?php echo $kategorija->cat_id; ?>" class="btn btn-info">VIDI</a>
                                </div>
                            </div>
                        </div><br>
                    </div> 
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid products mt-5 mb-5">
        <div class="container latest py-5">
            <h2 class="text-center">Najnovije</h2>
            <hr>
            <div class="owl-carousel owl-theme">
            <?php foreach($latest as $item) : ?>
                <div class="item py-2">
                    <div class="product">
                        <a href="item.view.php?id=<?php echo $item->item_id; ?>"><img src="<?php echo $item->item_img; ?>" alt="<?php echo $item->item_name; ?>" class="img-fluid"></a>
                        <div class="text-center mt-3">
                            <h3><?php echo $item->item_name; ?></h3>
                            <div class="price py-2">
                                <span><?php echo $item->item_price; ?> RSD</span>
                            </div>
                            <a href="item.view.php?id=<?php echo $item->item_id; ?>" class="btn btn-info font-size-12">Vidi proizvod</a>  
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid blog mt-5 mb-5">
        <h3 class="text-center">Blog</h3>
        <br>
        <div class="container">
            <div class="row">
                <?php foreach($posts as $post): ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $post->image; ?>" alt="Card image" style="width:100%">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $post->title; ?></h4>
                                <p class="card-text text-justify"><?php echo substr($post->body, 0, 150); ?>...</p>
                                <a href="post.view.php?post_id=<?php echo $post->post_id; ?>" class="btn btn-info stretched-link">Pročitaj post</a>
                            </div>
                            <div class="card-footer"><?php echo $post->created; ?></div>
                        </div><br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>  
    </div>
    <div class="container-fluid support">
        <div class="col-md-10 offset-md-1 text-center">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <span class="fa fa-truck"></span>
                    <h4>BESPLATNA DOSTAVA</h4>
                    <p>Besplatna dostava za kupce na teritoriji Srbije.</p>
                </div><br>
                <div class="col-md-4 col-sm-12">
                    <span class="fa fa-clock-o"></span>
                    <h4>POVRAĆAJ NOVCA ZA 30 DANA</h4>
                    <p>Mogućnost reklamacija i povraćaj novca za 30 dana.</p>
                </div><br>
                <div class="col-md-4 col-sm-12">
                    <span class="fa fa-phone"></span>
                    <h4>PODRŠKA 24/7</h4>
                    <p>Korisnički centar za nove kupce.</p>
                </div><br>
            </div>
        </div> 
    </div>
    <div class="container testemonials mt-5 mb-5">
        <h2 class="text-center">TESTEMONIALS</h2>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="testimonial p-3 bg-dark text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/4DEiXLa.jpg" width="50">
                    <h5>Jane Doe</h5>
                </div>
            </div><br>
            <div class="col-md-4 col-sm-12">
                <div class="testimonial p-3 bg-dark text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/nbO4gwx.jpg" width="50">
                    <h5>Tony Sam</h5>
                </div>
            </div><br>
            <div class="col-md-4 col-sm-12">
                <div class="testimonial p-3 bg-dark text-center rounded"><img src="https://i.imgur.com/lU2pDQv.png" width="40">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p><img class="rounded-circle" src="https://i.imgur.com/xbWPOrc.jpg" width="50">
                    <h5>Marry Doe</h5>
                </div>
            </div><br>
        </div>
        <br>
    </div>
</div>