<?php
    include "inc/header.php";
?>
<?php
	if (isset($_GET['id'])&&$_GET['id']>0) {
		$id = $_GET['id'];
		$getReligionFestivalById = $festival->getReligionFestivalById($id);
		// $getGalleryByReligionId = $gallery->getGalleryByReligionId($id);
	}
?>
<!-- body -->
<?php
	if ($getReligionFestivalById) {
        while ($result = $getReligionFestivalById->fetch_assoc()) {
            ?>
	<div id="content" class="site-content container">
	<!-- <div class="row">
			<?php
                if ($getGalleryByReligionId) {
                    $i=0;
                    while ($result_gallery = $getGalleryByReligionId->fetch_assoc()) {
                        $i ++;
            ?>
			
			<div  class="col-md-3 col-sm-4 col-xs-6 "><img class="img-responsive" src="uploads/<?=$result_gallery['source']?>" /></div>
			
			<?php
    	    		}
				}
			?>
	</div> -->
		<div class="row">
			<div id="primary" >
				<main id="main" class="site-main" role="main">
					<div class="newspaper-x-breadcrumbs">
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
							<a itemprop="url" href="index.php">
								<span itemprop="title">Home </span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a itemprop="url" href="#">
								<span itemprop="title">Festival of Religions</span>
							</a>
						</span>
						<span class="newspaper-x-breadcrumb-sep">/</span>
						<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a itemprop="url" href="#">
								<span itemprop="title"><?=$result['religioname']?></span>
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
									<?=$result['description']?>
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
<!--  -->
<?php
		}
	}
?>
<?php
    include "inc/footer.php";
?>