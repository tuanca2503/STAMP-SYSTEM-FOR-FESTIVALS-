<?php
    include "inc/header.php";
?>
<?php
	if (isset($_GET['idreligion'])) {
		$id = $_GET['idreligion'];
		$getReligionFestival = $festival->getReligionFestival($id);
		$getReligionById = $religion->getReligionById($id);
	}
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
					<span itemprop="title">Festival of Religions</span>
				</a>
				</span>
				<?php
					if ($getReligionById) {
                        while ($result_name=$getReligionById->fetch_assoc()) {
                            # code...
                        
                ?>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a itemprop="url" href="">
					<span itemprop="title"><?=$result_name['name']?></span>
				</a>
				</span>
				<?php
                        }
					}
				?>
			</div>
			<div class="row">
				<!--  -->
				<?php
					if ($getReligionFestival) {
						$i=0;
						while ($result =$getReligionFestival->fetch_assoc() ) {
							$i++;
						
				?>
				<div class="col-md-6">
					<article id="post-108" class="post-108 post type-post status-publish format-standard has-post-thumbnail hentry category-editorial">
						<header class="entry-header">
							<div class="newspaper-x-image">
								<a href="detailreligionfestival.php?id=<?=$result['id']?>" rel="bookmark">
									<img width="550" height="360" src="uploads/<?=$result['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" />
								</a> 
							</div>
							<h4 class="entry-title">
								<a href="detailreligionfestival.php?id=<?=$result['id']?>" rel="bookmark"><?=$result['name']?></a>
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
	</div>
</div>

<?php
include "inc/footer.php";
?>