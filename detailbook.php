
<?php
	// error_reporting(0);
    include "inc/header.php";
?>
<?php
	if (isset($_GET['id'])&&$_GET['id']>0) {
		$id = $_GET['id'];
		$getABookById = $book->getABookById($id);
		$getSameCategoryBook = $book->getSameCategoryBook($id);
	}
?>
<?php
	if (isset($_POST['quantity'])&&$_POST['quantity']) {
		$quantity = $_POST['quantity'];
		$addTocart = $cart->addToCart($quantity,$id);
	}
?>
<?php
	if (isset($_POST['bookid'])&&$_POST['bookid']) {
		$idwishlist = $_POST['bookid'];
		$addToWishList = $wishlist->addToWishList($idwishlist);
	}
?>
<!-- body -->

<div class="container">
	<div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<main id="main" class="site-main" role="main">
			<?php
				if ($getABookById) {
					while ($result=$getABookById->fetch_assoc()) {
						# code...
				
			?>
			<div class="newspaper-x-breadcrumbs">
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
							<a itemprop="url" href="index.php">
								<span itemprop="title">Home </span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a itemprop="url" href="bookList.php">
								<span itemprop="title">Book</span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span class="breadcrumb-leaf"><?=$result['name']?></span>
						<br>
						<?php
						if (isset($addToWishList)) {
							echo $addToWishList;
						}
						?>
						<?php 
							if (isset($addTocart)) {
								echo $addTocart;
							}
						?>
			</div>
			<br>	
        	<div class="row">
			
               <div class="col-md-4 col-sm-12 item-photo">
                    <img style="max-width:100%;" src="uploads/<?=$result['img']?>" />
                </div>
                <div class="col-md-4 col-sm-12" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?=$result['name']?></h3>    
                    <h5 style="color:#337ab7"><?=$result['author']?></h5>
        
                    <!-- Precios -->
                    <h6 class="title-price"><small>Price</small></h6>
                    <h3 style="margin-top:0px;"><?=$format->currency_format($result['price'])?></h3>

        
                    <!-- Detalles especificos del producto -->
                    <div class="section">                  
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>
					
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>Published date</small></h6>                    
                        <div>
                            <div class="attr2"><?=$format->formatDate($result['release_date'])?></div>
                        </div>
						<h6 class="title-attr"><small>Language</small></h6>                    
                        <div>
                            <div class="attr2"><?=$result['language']?></div>
                        </div>
						<h6 class="title-attr"><small>Genre</small></h6>                    
                        <div>
                            <div class="attr2"><?=$result['genre']?></div>
                        </div>
                    </div>   
                                    
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
						<form  method="post">
							<div class="section" style="padding-bottom:20px;">
							<h6 class="title-attr"><small>Order</small></h6>                    
							<div>            
								<input name="quantity" type="number" min="1" required />
							</div>
							</div>
							<button type="submit" class="btn btn-success" style="width:150px"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to cart</button>
							
						</form>
						<br>
						<form method ="post">
							<input name="bookid" type="hidden" value="<?=$result['id']?>"  />
							<button type="submit" class="btn btn-danger"><span style="margin-right:20px" class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>Add to wishlist</button>
						</form>

                    </div>                                        
                </div>
				<aside id="secondary" class="widget-area col-lg-4 col-md-4 col-sm-4 newspaper-x-sidebar" role="complementary">
			<div class="newspaper-x-blog-sidebar">
				<div id="search-4" class="widget widget_search">
					<form role="search" method="get" id="searchform">
						<label>
							<span class="screen-reader-text">Search for:</span>
								<input class="search-field" placeholder="Search..." value="" name="s" type="search">
						</label>
						<button class="search-submit" value="Search" type="submit">
							<span class="fa fa-search"></span>
						</button>
					</form>
				</div>
				<div id="categories-5" class="widget widget_categories">
					<h3>For You</h3>
					<ul>
						<?php
						if($getSameCategoryBook){
							$i =0;
							while ($resultName = $getSameCategoryBook->fetch_assoc()) {
								$i++;
							
						?>
						<li class="cat-item cat-item-2">
							<a href="detailbook.php?id=<?=$resultName['id']?>"><?=$resultName['name']?></a> 
						</li>
						<?php
							}
						}
						?>

					</ul>
				</div>
				
			</div>
		</aside>
		                          
        
                <div class="col-md-12">
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
							
                          <?=$result['description']?>
                        
                            </small>
                        </p>
                        
                    </div>
                </div>		
            </div>
			<?php
				}
			}
			?>
		</main>
	</div>
</div>     

<?php
    include "inc/footer.php";
?>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>