<?php
    include "inc/header.php";
?>
<?php
	if (isset($_GET['id'])&&$_GET['id']>0) {
		$id = $_GET['id'];
		$getWorldFestivalById = $worldfestival->getWorldFestivalById($id);
		// $getGalleryById = $gallery->getGalleryById($id);
	}
?>
<!-- body -->
<?php
	if ($getWorldFestivalById) {
        while ($result = $getWorldFestivalById->fetch_assoc()) {
            ?>
	<div id="content" class="container site-content ">
	
	<!-- <div class="row">
			
			 <?php
                if ($getGalleryById) {
                    $i=0;
                    while ($result_gallery = $getGalleryById->fetch_assoc()) {
                        $i ++;
            ?>
			
			<div  class="col-md-3 col-sm-4 col-xs-6 "><img class="img-responsive" src="uploads/<?=$result_gallery['source']?>" /></div>
			
			<?php
    	    		}
				}
			?> 
	</div> -->
	
		<div class="row">
			<div id="primary" class="content-area col-md-12 col-sm-8 col-xs-12 newspaper-x-sidebar">
				<main id="main" class="site-main" role="main">
					<div class="newspaper-x-breadcrumbs">
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
							<a itemprop="url" href="index.php">
								<span itemprop="title">Home </span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a itemprop="url" href="festivalWorld1.php">
								<span itemprop="title">World Festivals</span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span class="breadcrumb-leaf"><?=$result['name']?></span>
					</div>
					<article id="post-73" class="post-73 post type-post status-publish format-standard has-post-thumbnail hentry category-news">
							<header class="entry-header">
								<div class="newspaper-x-image">
									<img width="700" height="490" src="uploads/<?=$result['img']?>" class="attachment-newspaper-x-single-post size-newspaper-x-single-post wp-post-image" alt="" /> 
								</div>
								<div class="newspaper-x-post-meta">
									<div>
										<span class="newspaper-x-category"> 
											<a href="#">Location: </a>
										</span>
										<span class="newspaper-x-date"><?=$result['place']?> </span>
									</div> 
								</div>
								<h2 class="entry-title" style="color: black;"><?=$result['name']?></h2> 
							</header>
							<div class="entry-content">
								<h4><b>Description</b></h4>
								<p>
									<?=$format->paragraph_format($result['description'])?>
								</p>
							</div>
							<div class="entry-content">
							<h4><b>Map</b></h4>
								<p style="color: #001936;">
								<iframe width="100%" src="https://www.google.com/maps?q=<?=$result['latitude']?>,<?=$result['longtitude']?>&h1=es;z=14&output=embed" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>									
								<br> 
								</p>
							</div>
							<div class="entry-content">
								<h4><b>Date</b></h4>
								<p style="color: #001936;">
									The event will held on <?=$format->formatDate($result['time'])?>
								</p> 
								<br>
								<blockquote>
									<p>Go enjoy with us!</p>
								</blockquote>
							</div>
								
							
							
						
					</article>
				</main>
			</div>
		</div>
		
	</div>
<?php
		}
	}
?>
<?php
    include "inc/footer.php";
?>
