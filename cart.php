<?php
	include "inc/header.php";
?>
<?php
	$showCart = $cart->showCart();
	
	if (isset($_POST['quantity'])&&$_POST['quantity']) {
		$quantity = $_POST['quantity'];
		$id = $_POST['id'];
		$updateQuantityCart = $cart->updateQuantityCart($id,$quantity);
	}
?>
<?php
	if (isset($_GET['idwishlist'])&&$_GET['idwishlist']>0) {
		$idwishlist = $_GET['idwishlist'];
		$addToWishList = $wishlist->addToWishList($idwishlist);
	}
?>
<?php
	if (isset($_GET['id'])&&$_GET['id']>0) {
		$idcart = $_GET['id'];
		$deleteCart = $cart->deleteCart($idcart);
	}
?>
<!-- end-head -->
	<!--  -->
		<div class="container">
				
			<div class="newspaper-x-breadcrumbs">
				<span>
					<a itemprop="url" href="index.php">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span>
				<a itemprop="url" href="#">
					<span itemprop="title">Cart</span>
				</a>
				</span>
				<br>
				<?php 
					if (isset($addToWishList)) {
						echo $addToWishList;
					}			
				?>
				<div class="py-5 text-center">
     			<h2>My Cart</h2>
    			</div>
			</div>
		</div>
		<br>
		<div class="container">
  <!-- Section: Design block -->
			<section class="">
				<div class="row gx-lg-5">
				<div class="col-lg-8 mb-4 mb-md-0">
					<!-- Section: Product list -->
					<section class="mb-5">
					<!-- Single item -->
					<?php
						if($showCart){
							$items =  array();
							$i=0;
							$total = 0;					
							while ($result = $showCart->fetch_assoc()) {
							$total += $result['price']*$result['quantity'];
							$i++;
						
					?>
					<div class="row border-bottom mb-4">
						<div class="col-md-2 mb-4 mb-md-0">
						<div class="bg-imag	ripple rounded-5 mb-4 overflow-hidden d-block" data-ripple-color="light">
							<img
								src="uploads/<?=$result['img']?>"
								class="w-100"
								alt=""
								/>
							<a href="#!">
							<div class="hover-overlay">
								<div
									class="mask"
									style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
							</div>
							</a>
						</div>
						</div>

						<div class="col-md-8 mb-4 mb-md-0">
						<p class="fw-bold"><?=$result['name']?></p>
						<p class="mb-1">
							<span class="text-muted me-2">Author:</span><span><?=$result['author']?></span>
						</p>
						<p>
							<span class="text-muted me-2">Language:</span
							><span><?=$result['language']?></span>
						</p>
						

						<p class="mb-4">
							<a href="?id=<?=$result['id']?>" class="text-muted pe-3 border-end"><small><i class="fas fa-trash me-2"></i>Remove</small></a>
							<a href="?idwishlist=<?=$result['bookid']?>" class="text-muted ps-3"><small><i class="fas fa-heart me-2"></i>Add to wishlist</small></a>
							
						</p>
						</div>
					

						<div class="col-md-2 mb-4 mb-md-0">
						<div class="form-outline mb-4">
							<label class="form-label" for="typeNumber"><b>Quantity</b></label>
							<form method="post">							
								<input name="quantity" type="number" class="form-control" value="<?=$result['quantity']?>" min="1" style="width: 78px" />
								<br>
								<input type="hidden" name="id" value="<?=$result['id']?>"/>
								<button type="submit" class="btn btn-primary" >Update</button>
							</form>
						</div>
						<div class="form-outline mb-4">
							<label class="form-label" for="typeNumber"><b>Price</b></label>
							<h5 class="mb-2">			
							<span class="align-middle"><?=$format->currency_format($result['price']*$result['quantity'])?></span>
							</h5>
						</div>
						
						
						
						</div>
					</div>
					<?php
						}	
					}
					?>
					<!-- Single item -->

					<!-- Single item -->
					
					<!-- Single item -->

					<!-- Single item -->
					
					<!-- Single item -->
					</section>
					<!-- Section: Product list -->

					<!-- Section: Details -->
					<section class="">
					<div class="mb-5">
						<p class="text-primary">
						<i class="fas fa-info-circle mr-1"></i> Do not delay the
						purchase, adding items to your cart does not mean booking
						them.
						</p>
					</div>

					<div class="mb-5">
						<h5 class="mb-4">Expected shipping delivery</h5>

						<p class="mb-0">Thu., 12.03. - Mon, 16.03.</p>
					</div>

					<div>
						<h5 class="mb-4">We accept</h5>

						<img
							class="mr-2"
							width="45px"
							src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
							alt="Visa"
							/>
						<img
							class="mr-2"
							width="45px"
							src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
							alt="American Express"
							/>
						<img
							class="mr-2"
							width="45px"
							src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
							alt="Mastercard"
							/>
						<img
							class="mr-2"
							width="45px"
							src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
							alt="PayPal acceptance mark"
							/>
					</div>
					</section>
					<!-- Section: Details -->
				</div>

				<div class="col-lg-4 mb-4 mb-md-0">
					<!-- Section: Summary -->
					<section class="shadow-4 p-4 rounded-5 mb-4">
					<h5 class="mb-5 "><b>The total amount of <?=Session::get('cart')?> items</b></h5>

					<div class="d-flex justify-content-between mb-3">
						<span>Temporary amount </span>
					<?php if(isset($total)){?>
						<span><?=$format->currency_format($total)?></span>
					</div>
					<div class="d-flex justify-content-between">
						<span>Shipping Fee(5%)</span>
						<span><?=$format->currency_format(($total*5)/100)?></span>
					</div>
					
					<div class="d-flex justify-content-between">
						<span>VAT (10%)</span>
						<span><?=$format->currency_format(($total*10)/100)?></span>
					</div>
					<hr class="my-4" />
					<div class="d-flex justify-content-between fw-bold mb-5">
						<span>Total (including VAT, Shipping) </span>
						<span><?=$format->currency_format($total+($total*10)/100+($total*10)/100)?></span>
					</div>
					
					<button type="button" class="btn btn-primary btn-rounded w-100">
						<a href="billconfirm.php" style="color:white">Got to check out</a>
					</button>
					</section>
					<!-- Section: Summary -->

					<!-- Section: Summary -->
					<section class="shadow-4 p-4 rounded-5">
					<h5 class="mb-4">Apply promo code</h5>

					<div class="d-flex align-items-center">
						<input type="text"	class="form-control rounded me-1"placeholder="Promo code"/>
						<button type="button" class="btn btn-default btn-rounded overflow-visible">Apply</button>
					</div>
					</section>
					<!-- Section: Summary -->
				</div>
				<?php
				Session::set('temporaryamount',$format->currency_format($total));
				Session::set('shipping',$format->currency_format(($total*5)/100));
				Session::set('vat',$format->currency_format(($total*10)/100));
				Session::set('total',$format->currency_format($total+($total*10)/100+($total*10)/100));

				?>
				<?php
				}else{
				?>
					<button type="button" class="btn btn-primary btn-rounded w-100">
						Got to checkout
					</button>
					</section>
					<!-- Section: Summary -->

					<!-- Section: Summary -->
					<section class="shadow-4 p-4 rounded-5">
					<h5 class="mb-4">Apply promo code</h5>

					<div class="d-flex align-items-center">
						<input type="text"	class="form-control rounded me-1"placeholder="Promo code"/>
						<button type="button" class="btn btn-default btn-rounded overflow-visible">Apply</button>
					</div>
					</section>
				<?php } ?>
				</div>
			</section>
  <!-- Section: Design block -->
		</div>
</div>


<?php
	include "inc/footer.php";
?>
