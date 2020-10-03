<?php
    $allCat = $category->read();
?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">Web Shop</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">POČETNA</a>
      </li>
      <?php foreach($allCat as $cat) : ?>
      <li class="nav-item">
        <a class="nav-link" href="category.view.php?id=<?php echo $cat->cat_id; ?>"><?php echo strtoupper($cat->cat_name); ?></a>
      </li>
      <?php endforeach; ?>
      <li class="nav-item">
        <a class="nav-link" href="about.view.php">O NAMA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.view.php">KONTAKT</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <?php if(isset($_SESSION['loggedUser'])) :
        $user_id = $_SESSION['loggedUser']->user_id;
        $cartItems = $cart_item->getCartItemsFromUser($user_id);
      ?>
      <li class="nav-item"><a href="dashboard.view.php" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> <?php echo strtoupper($_SESSION['loggedUser']->user_name); ?></a></li>
      <li class="nav-item"><a href="cart.view.php" class="nav-link"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <?php echo count($cartItems); ?></a></li>
      <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> ODJAVA</a></li>
      <?php else : ?>
        <li class="nav-item"><a href="cart.view.php" class="nav-link"><i class="fa fa-shopping-basket" aria-hidden="true"></i> 0</a></li>
      <li class="nav-item"><a href="login.register.view.php" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> PRIJAVA | REGISTRACIJA</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>