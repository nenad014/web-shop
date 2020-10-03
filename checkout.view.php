<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<?php
    if(!isset($_SESSION['loggedUser'])) {
        header('Location: login.register.view.php'); 
    } else {
        $_SESSION['loggedUser']->user_id = $user_id;
        $korisnik = $users->get($user_id);
    }
?>

<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>PORUDŽBINA</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="checkout.view.php">PORUDŽBINA</a></li>
            </ul>
        </nav>
    </div>
    <br>
    <div class="container">
    <form action="order.php" method="post" id="paymentFrm">
        <div class="row">
            <div class="col-md-6">
                <h3>ADRESA ZA ISPORUKU</h3>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">Ime *</label>
                        <input type="text" class="form-control" name="fname" required value="">
                    </div>
                    <div class="col-md-6">
                        <label for="lname">Prezime *</label>
                        <input type="text" class="form-control" name="lname" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">email *</label>
                        <input type="email" class="form-control" name="email" id="email" required value="<?php echo $korisnik->user_email; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Broj telefona *</label>
                        <input type="text" class="form-control" name="phone" required value="<?php echo $korisnik->user_phone; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="address">Adresa *</label>
                        <input type="text" class="form-control" name="address" required value="<?php echo $korisnik->user_address; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="delivery_address">Adresa isporuke *</label>
                        <input type="text" class="form-control" name="delivery_address" required value="<?php echo $korisnik->user_delivery_address; ?>">
                    </div>
                </div>
                <br>
                <h3>NAČIN PLAĆANJA</h3>
                <br>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="payment" value="card">Karticom                       
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="payment" value="Cash on delivery">Pouzećem
                </div>
                <hr>
                <div id="forma">
                <p class="text-info">* Napomena: Ukoliko plaćate pouzećem, ova polja Vam nisu potrebna</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-name">Ime i prezime *</label>
                            <input type="text" name="cc-name" id="name" class="form-control" placeholder="Ime i prezime na kartici">
                        </div>
                        <div class="col-md-6">
                            <label for="cc-number">Broj kartice *</label>
                            <input type="text" name="cc-number" id="card_number" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="cc-expiration">Datum isticanja *</label>
                            <input type="text" class="form-control" name="cc-expiration" id="card_expiry">
                        </div>
                        <div class="col-md-3">
                            <label for="cc-cvv">CVV *</label>
                            <input type="text" class="form-control" name="cc-cvv" id="card_cvc">
                        </div>
                        <div class="col-md-6">
                            <div class="payment-icon">
                                <ul>
                                    <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                    <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                    <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                    <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                    <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <h3>REZIME KORPE</h3>
                <br>
                <?php if(isset($_COOKIE['shopping_cart'])) {
                    $total = 0;
                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                    $cart_data = json_decode($cookie_data, true);
                    foreach($cart_data as $keys => $values) : ?>
                    <tr>
                        <td><img src="<?php echo $values['item_img']; ?>" style="width:75px"></td>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td><?php echo $values["item_price"]; ?> RSD</td>
                        <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> RSD</td><br>
                    </tr>
                    <?php
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
                    endforeach;
                    ?>
                <br>
                <div class="card text-center">
                <h3>UKUPNO</h3>
                <hr>
                <p><strong><?php echo number_format($total, 2); ?> RSD</strong></p>
                <input type="hidden" name="item_id" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_id'] . ' '; } ?>">
                <input type="hidden" name="products" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_name'] . ' '; } ?>">
                <input type="hidden" name="quantity" value="<?php foreach($cart_data as $k=>$v) {
                        echo $v['item_quantity'] . ' '; } ?>"> 
                <input type="hidden" name="grand_total" value="<?php echo number_format($total, 2); ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <button type="submit" class="btn btn-success" name="orderBtn">NARUČI</button>
                </div>
                <br>
                <?php
                } ?>
                
            </div>
        </div>
    </form>
    </div>
</div>

<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>

<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}
</script>

<?php require_once 'inc/bottom.inc.php'; ?>