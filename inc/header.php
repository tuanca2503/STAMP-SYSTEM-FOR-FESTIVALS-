<?php
	
	include_once "lib/session.php";
	Session::init();
?>
<?php
	include_once "./lib/database.php";
	include_once "./helpers/format.php";
	
	spl_autoload_register(function($className){
		include_once "./classes/".$className.".php";
		// include_once "./classes/".$className.".php";
	});

	$database = new Database();
	$format = new Format();
	$cart = new Cart();
	$user = new User();
	$festival = new Festival();
	$worldfestival = new WorldFestival();
	$book = new Book();
	$religion = new Religion();
	$gallery = new Gallery();
	$wishlist = new Wishlist();
	$bill =new Bill();
	$feedback = new Feedback();

?>
<?php
	$countWishList = $wishlist->CountItems();
	$countCart =  $cart->CountItems();
?>
<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
	Session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home - Festival</title>
</head>
<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@1,300&family=Roboto+Serif:wght@300&family=Roboto:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
<!-- css -->
<link rel="icon" type="image/png" sizes="32x32" href="./assets/festival-icon.png">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- top -->
<body class="home page-template-default page page-id-6 wp-custom-logo elementor-default elementor-kit-147">
	<div id="page" class="site">
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<section class="newspaper-x-news-ticker">
							<span class="newspaper-x-module-title" style="background: transparent;">
								<h7 class="c-l">Festival On You Hand</h7>
								<!-- <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-bullhorn fa-stack-1x fa-inverse"></i>
								</span> -->
							</span>
							
							
						</section>
					</div>
	<!-- search -->
					<div class="col-lg-7">
						<form role="search" method="get" id="searchform">
							<label>
								<span class="screen-reader-text">Search for:</span>
									<input class="search-field" placeholder="Search..." value="" name="s" type="search">
							</label>
							<button class="search-submit" value="Search  " type="submit">
								<span class="fa fa-search"></span>
							</button>
						</form>
			
						
							<div class="box-1" >
								<ul>
									<li>
										<a href="wishlist.php">
											<i class="fa-solid fa-heart"></i>
											<div class="item"><?=Session::get('wishlist')?></div>
										</a>
									</li>
									<li>
										<a href="cart.php">
											<i class="fa-solid fa-cart-shopping"></i>
											<div class="item"><?=Session::get('cart')?></div>
										</a>
									</li>
									<?php
										if ((Session::get('username') == null)) {																					
									?>
									<li>
										<a href="login.php">
										<i class="fa fa-user" aria-hidden="true"></i>&nbsp;
										<span>Login</span>
										<div class="item2">.</div>
										</a>
									</li>
									
									<?php
										}else{		
									?>
									<li>
										<a href="login.php">
										<!-- <i class="fa fa-user" aria-hidden="true"></i>&nbsp; -->
										<span>Hi, <?=Session::get('fullname')?></span>
										<div class="item2">.</div>
										</a>
									</li>									
									<li>
										<a href="?action=logout">
										<i class="fa fa-sign-out" aria-hidden="true"></i>
										<div class="item2">.</div>
										</a>
									</li>
									<?php
										}
									?>
								</ul>
							</div>
							<style>			
								.box-1 { float: right; }
								.box-1 ul {position: unset!important;padding-top: 10px!important;}
								.box-1 ul li a {line-height: 1;}
								.box-1 ul li i {cursor: pointer;}

								.box-1 ul li .item {font-size: 10px;text-align: center;height: 10px;width: 10px;background: red;border-radius: 50%;top: -20px;color: white;}
								.box-1 ul li .item2{font-size: 10px;text-align: center;height: 10px;width: 10px;background: #0d1b35;border-radius: 50%;top: -20px;color: #0d1b35;}

								.box-1 ul li:nth-child(1) .item {right: -13px;position: relative;}
								.box-1 ul li:nth-child(2) .item {right: -15px;position: relative;}
								.box-1 ul li:nth-child(1) .item2 {right: -15px;position: relative;}
								.box-1 ul li:nth-child(2) .item2 {right: -15px;position: relative;}


								/**/
							</style>
							
					</div> 
				</div>
			</div>
		</div>
	</div>
</body>
<!-- toggle -->
<header id="masthead" class="site-header" role="banner">
	<div class="site-branding container">
		<div class="row">
			<div class="col-md-4 header-logo">
				<a href="#" class="custom-logo-link" rel="home" aria-current="page">
					<img width="185" height="55" src="assets/images/logo.jpg" class="custom-logo" alt=""/>
				</a>
			</div>
		</div>
	</div>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="fa fa-bars"></span>
					</button>
					<div class="menu-primary-menu-container">
						<ul id="primary-menu" class="menu">
							<li id="menu-item-127" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-127">
								<a href="index.php" aria-current="page">Home</a>
							</li>
							<li id="menu-item-128" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-128"><a href="#">Festival</a>
								<ul class="sub-menu">
									<li id="menu-item-129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-129">
										<a href="#">Festival of religions</a>
											<ul class="sub-menu">
												<?php
												$religionList = $religion->religionList();
												if ($religionList) {
													while ($result = $religionList->fetch_assoc()) {
														# code...
													
												?>
												<!--  -->
												<li id="menu-item-136" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-136">
													<a href="festivalbyReligion.php?idreligion=<?=$result['id']?>"><?=$result['name']?></a>
												</li>
												<?php
													}
												}
												?>
												
												<!--  -->
											</ul>
									</li>
									
									<li id="menu-item-131" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-131">
										<a href="festivalWorld1.php">World Festivals</a>
									</li>
								</ul>
							</li>
							<li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
								<a href="bookList.php">Book</a>
							</li>
							<li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
								<a href="aboutus.php">About us</a>
							</li>
							<li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
								<a href="contact.php">Contact</a>
							</li>
							<!-- <li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135">
								<a href="login.php">Account</a>
							</li>
							
							<li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140">
								<a href="cart.php">Cart</a> -->
								<!-- <ul class="sub-cart">
									<div class="cart-box">
										<div class="container">
											<div class="product-box">
												<div class="container" style="width: 100px;">
													<img src="book/book-image/b1.jpeg">
												</div>
												<div class="container" style="text-align:center;">
												<a href="#">Muôn kiếp nhân sinh</a>
												</div>
											</div>	
										</div>
									</div>			
								</ul> -->
							</li>
							<!-- <li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140">
								<a href="wishlist.php">Wishlist</a>
							</li> -->
							<!-- <li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140">
								<a href="contact.php">Contact us</a>
							</li> -->
							<li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140">
								<a href="feedback.php">Feedback</a>
							</li>
							<li id="menu-item-140" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140">
								<a href="gallery.php?action=all">Gallery</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>

<!-- end-header -->