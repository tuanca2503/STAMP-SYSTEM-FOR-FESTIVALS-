<?php
    include "inc/header.php";
?>
<?php
	$WorldFestivalPage3 = $worldfestival->WorldFestivalPage3();
?>
<div class="container">
	<div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
					<span itemprop="title">World Festivals</span>
				</a>
				</span>
			</div>
			<div class="row">
				<?php
                    if ($WorldFestivalPage3) {
                        $i=0;
                        while ($result =$WorldFestivalPage3->fetch_assoc()) {
                            $i++; ?>
				<div class="col-md-6">
					<article id="post-108" class="post-108 post type-post status-publish format-standard has-post-thumbnail hentry category-editorial">
						<header class="entry-header">
							<div class="newspaper-x-image">
								<a href="detailfestival.php?id=<?=$result['id']?>" rel="bookmark">
									<img width="550" height="360" src="uploads/<?=$result['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" />
								</a> 
							</div>
							<h4 class="entry-title">
								<a href="detailfestival.php?id=<?=$result['id']?>" rel="bookmark"><?=$result['name']?></a>
							</h4> 
							<div class="newspaper-x-post-meta">
								<div>
									<span class="newspaper-x-category"> 
										<a href="#">News</a>
									</span>
									<span class="newspaper-x-date"><?=$format->formatDate($result['time'])?></span>
								</div> 
							</div>
						</header>
						<div class="entry-content">
							<p><?=$format->textShorten($result['description'],400)?></p> 
						</div>
						<footer class="entry-footer"></footer>
					</article>
				</div>
			<?php
                        }
                    }
						
			?>	
			</div>
			
		</main>
		<!-- --------------------------------------------- -->
		<nav class="navigation posts-navigation" aria-label="Posts">
					<h2 class="screen-reader-text">Posts navigation</h2>
					<div class="nav-links">
						<div class="nav-previous">
							<a href="festivalWorld1.php"><i class="fa-solid fa-arrow-left"></i> Back to main</a>
						</div>
					</div>
				</nav>
		<!-- ------------------------------ -->
	</div>
</div>

<?php
    include "inc/footer.php"; 
?>