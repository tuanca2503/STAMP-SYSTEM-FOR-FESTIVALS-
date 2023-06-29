<?php
    include "inc/header.php";
?>
<?php
    $showCart=$cart->showCart();
?>
<?php
    if (isset($_POST['username'])&& $_POST['username']) {
        $insertBill = $bill->insertBill($_POST);
    }
?>

	<div class="container">
			<div class="newspaper-x-breadcrumbs">
				<span>
					<a itemprop="url" href="../index.html">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span >
				<a itemprop="url" href="#">
					<span itemprop="title">Login</span>
				</a>
				</span>
				<br>
				<?php
                    if(isset($insertBill)){
                        echo $insertBill;
                    }
                ?>
			</div>
		</div>
        <?php
                if (Session::get('username')!=null) {
                    # code...
                
            ?>
        <div class="container bg-light">
            <main>
                <div class="py-5 text-center">
                <h2>Checkout form</h2>
                </div>

                <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">My cart</span>
                    <span class="badge bg-primary rounded-pill"><?=Session::get('cart')?></span>
                    </h4>
                    <ul class="list-group mb-3">
                    <?php
                        $today = date("d/m/Y");
                        if ($showCart) {
                            $i = 0;
                            while ($result = $showCart->fetch_assoc()) {
                                $i++;
                        
                        
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <img src="uploads/<?=$result['img']?>" width="50" height="20"/><br><br>
                        
                        <h6 class="my-0"><?=$result['name']?></h6>
                        <small class="text-muted"><?=$result['author']?></small>
                        </div>
                        <span class="text-muted"><?=$format->currency_format($result['price'])?> x <?=$result['quantity']?></span>
                    </li>
                    <?php
                        }
                        }
                    ?>
                    
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>LUONVUITUOI</small>
                        </div>
                        <span class="text-success">0đ</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Temporary amount</span>
                        <?=Session::get('temporaryamount')?>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>VAT (10%)</span>
                        <?=Session::get('vat')?>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Shipping (5%) </span>
                        <?=Session::get('shipping')?>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (VND)</span>
                        <strong><?=Session::get('total')?></strong>
                    </li>
                    </ul>

                    <form class="card p-2">
                    <div class="input-group">
                        <input required type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                    </form>
                </div>

                <!-- Form -->
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form name="frm" class="needs-validation" novalidate method="post">
                    <div class="row g-3"> 
                        <div class="col-sm-12">
                        <label for="fullname" class="form-label">Full name</label>
                        <input onclick="check();" name="fullname" required type="text" class="form-control" id="fullname" placeholder="Pham Hoai Nam" value="<?=Session::get('fullname')?>">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                        </div>

                        
                        <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input  onclick="check();" name="username" type="text" class="form-control" id="username" placeholder="Username" required value="<?=Session::get('username')?>">
                        <div class="invalid-feedback">
                            Your username is required.
                            </div>
                        </div>
                        </div>
                        
                        <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                        <input  onclick="check();" required name="email" type="email" class="form-control" id="email" placeholder="you@example.com" value="<?=Session::get('email')?>">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="telephone" class="form-label">Telephone <span class="text-muted"></span></label>
                        <input  onclick="check();" required name="telephone"  type="telephone" class="form-control" id="telephone" placeholder="0915142xxx" value="<?=Session::get('telephone')?>">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input  onclick="check();" name="address" type="text" class="form-control" id="address" placeholder="1234 Main St" required value="<?=Session::get('address')?>">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                        </div>
                        <input type="hidden" class="form-control" id="orderdate" placeholder="" name="orderdate" required value="<?=date("m/d/Y");?>">
                        <input type="hidden" class="form-control" id="orderdate" placeholder="" name="adminid" required value="<?=Session::get('id')?>">

                    </div>

                    <hr class="my-4">


                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                        <input  onclick ="pay();" id="credit" name="paymentMethod" type="radio" class="form-check-input" value="creditcard" checked required>
                        <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                        <input  onclick ="pay();" id="visa" name="paymentMethod" type="radio" class="form-check-input" value="visa" required >
                        <label class="form-check-label" for="debit">Visa</label>
                        </div>
                        <div class="form-check">
                        <input  onclick ="pay();" id="paypal" name="paymentMethod" type="radio" class="form-check-input" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                        <div class="form-check">
                        <input onclick ="pay();" id="cash" name="paymentMethod" type="radio" class="form-check-input" value="cash" required >
                        <label class="form-check-label" for="cash">Cash</label>
                        </div>
                    </div>

                    <div class="row gy-3" id="cardChoice" >
                        <div class="col-md-6">
                        <label for="cc-name" class="form-label">Name on card</label>
                        <input name="cardname" type="text" class="form-control" id="cc-name" placeholder="" >
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                        </div>

                        <div class="col-md-6">
                        <label for="cc-number" class="form-label">Credit card number</label>
                        <input name="cardnumber" type="text" class="form-control" id="cc-number" placeholder="" >
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                        </div>

                        <div class="col-md-3">
                        <label for="cc-expiration" class="form-label">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" >
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                        </div>

                        <div class="col-md-3">
                        <label for="cc-cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" >
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                        </div>
                    </div>

                    <hr style="color:white" class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Pay</button>
                    </form>
                </div>
                </div>
            </main>
        </div>
        <?php
            }else{
                echo"<br><h1 class='text-center'>Please <a href='login.php'>log in</a> or <a href='register.php'>register</a> to make payment!</h1><br>";
            }
        ?>
      
        
<?php
    include "inc/footer.php";
?>
<style>
 .container {
  max-width: 960px;
}
</style>
<script>
    function pay(){
        var y = document.getElementById('cardChoice');
        var x = document.getElementById('cash');

        if (x.checked == true) {
            y.style.display = "none";
        }
        else{
            y.style.display = "block";
        }

    }
    function check(){
        var text = "If you want to change information details, you have to go update profile! ";
        if (confirm(text) == true) {
            text = window.location='updateAccount.php?id=<?=Session::get('id')?>';
        } else {
            text = "You canceled!";
        }
    }
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
