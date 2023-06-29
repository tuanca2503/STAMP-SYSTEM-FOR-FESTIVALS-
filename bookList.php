<?php
    include "inc/header.php";
?>
<?php

	$bookList = $book->bookList();
	$religionName = $religion->religionList();
?>
<!-- body -->
<div class="container">
	<div class="row">
		<div id="primary" class="newspaper-x-content newspaper-x-archive-page col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<main id="main" class="site-main" role="main">
				<div class="newspaper-x-breadcrumbs">
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
					<a itemprop="url" href="../index.html">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
				<a itemprop="url" href="#">
					<span itemprop="title">Book</span>
				</a>
				</span>
			</div>
				<div class="row"> 

						<?php
						if ($bookList) {
							$i = 0;
							while ($result = $bookList->fetch_assoc()) {
								$i++;
							
						?>
						<div class="col-md-6">
						<article id="post-101" class="post-101 post type-post status-publish format-standard has-post-thumbnail hentry category-editorial">
							<header class="entry-header">
								<div class="newspaper-x-image">
									<a href="detailbook.php?id=<?=$result['id']?>" rel="bookmark">
										<img width="550" height="360" src="uploads/<?=$result['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" />
									</a> 
								</div>
								<h4 class="entry-title">
									<a href="detailbook.php?id=<?=$result['id']?>" rel="bookmark"><?=$result['name']?></a>
								</h4> 
								<div class="newspaper-x-post-meta">
									<div>
									<span class="newspaper-x-category">											
											<a href="#"><i class="fa fa-book" aria-hidden="true">&nbsp;<?=$result['religioname']?></i></a>
										</span>
                                        &nbsp;
                                        <span class="newspaper-x-category"> 
											<a href="#"><i class="fa-solid fa-tag"></i> <?=$result['genre']?></a>
										</span>
                                        &nbsp;
                                        <span class="newspaper-x-category"> 
											<a href="#"><i class="fa-solid fa-tag"></i> <?=$format->currency_format($result['price'])?></a>
										</span>
									</div> 
								</div>
							</header>
							<div class="entry-content">
								<p><?=$format->textShorten($result['description'],200)?></p> 
							</div>
						</article>
						</div>
						<?php
							}
						}
						?>
					
				

				</div>
			</main>
		
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
					<h3>Categories</h3>
					<ul>
						<?php
						if($religionName){
							$i =0;
							while ($resultName = $religionName->fetch_assoc()) {
								$i++;
							
						?>
						<li class="cat-item cat-item-2">
							<a href="bookByReligion.php?idreligion=<?=$resultName['id']?>"><?=$resultName['name']?></a> 
						</li>
						<?php
							}
						}
						?>

					</ul>
				</div>
				<div id="tag_cloud-2" class="widget widget_tag_cloud">
					<h3>Tags</h3>
					<div class="tagcloud">
						<a href="" class="tag-cloud-link tag-link-13 tag-link-position-1" style="font-size: 8pt;" aria-label="business (2 items)">books</a>
						<a href="" class="tag-cloud-link tag-link-16 tag-link-position-2" style="font-size: 8pt;" aria-label="coast (2 items)">interesting</a>
						<a href="" class="tag-cloud-link tag-link-8 tag-link-position-3" style="font-size: 8pt;" aria-label="information (2 items)">information</a>
						<a href="" class="tag-cloud-link tag-link-14 tag-link-position-4" style="font-size: 8pt;" aria-label="life (2 items)">life</a>
						<a href="#" class="tag-cloud-link tag-link-11 tag-link-position-5" style="font-size: 8pt;" aria-label="man (2 items)">festival</a>
						<a href="#" class="tag-cloud-link tag-link-9 tag-link-position-7" style="font-size: 8pt;" aria-label="news (2 items)">news</a>
						<a href="#" class="tag-cloud-link tag-link-15 tag-link-position-8" style="font-size: 8pt;" aria-label="politics (2 items)">hinduism</a>
						<a href="#" class="tag-cloud-link tag-link-12 tag-link-position-9" style="font-size: 8pt;" aria-label="sport (2 items)">buddha</a>
					</div>
				</div> 
			</div>
		</aside>
	</div>
</div>

<!-- end-body -->

<?php
    include "inc/footer.php";
?>