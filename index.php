
<?php
	include "inc/header.php";
?>
<?php
	$WorldFestival = $worldfestival->WorldFestivalRandom();
	$WorldFestival2 = $worldfestival->WorldFestivalRandom2();
	$WorldFestival3 = $worldfestival->WorldFestivalRandom3();
	$festival1 = $festival->FestivalRandom();
	$festival2 = $festival->FestivalRandom2();

	
?>
<!-- content -->
<div class="newspaper-x-header-widget-area ">
	<div id="newspaper_x_header_module-2" class="widget newspaper_x_widgets" style="background-color:white">
		<div class="newspaper-x-recent-posts container">
			<ul>

 				<li class="blazy" id="newspaper-x-recent-post-0" style="background-image: url(assets/images/fes7.jpg);background-position: center;background-size: cover;">
					<div class="newspaper-x-post-info">
						<h1>
							<a href="detailreligionfestival.php?id=17">Holi Festival of Colors</a>
						</h1>
							<span class="newspaper-x-category">
								<a href="#">News</a>
							</span>
				</li>
				<li class="blazy" id="newspaper-x-recent-post-1" style="background-image:url(assets/images/fes2.jpg)">
					<div class="newspaper-x-post-info">
						<h6>
							<a href="detailfestival.php?id=17">Halloween </a>
						</h6>
						<span class="newspaper-x-category">
							<a href="#">News</a>
						</span>
				</li>
				<li class="blazy" id="newspaper-x-recent-post-2" style="background-image:url('assets/images/fes3.jpg')">
					<div class="newspaper-x-post-info">
						<h6>
							<a href="detailfestival.php?id=18">Valentine's Day </a>
						</h6>
							<span class="newspaper-x-category">
								<a href="#">News</a>
							</span>
					</div>	
				</li>
			</ul>
		</div>
	</div>
</div>
<!--  -->
<!--  -->
<div class="container site-content ">
	<div class="row">
		<div class="col-md-12 newspaper-x-content newspaper-x-with-sidebar">
			<div id="newspaper_x_widget_posts_a-4" class="widget newspaper_x_widgets">
				<div class="site-content newspaper-spacer-a">
					<div class="row">
						<div class="col-md-12">
							<div class="newspaper-x-recent-posts newspaper-x-recent-posts-a">
								<ul>
								<?php
									if ($WorldFestival) {
										$i = 0;
										while($result = $WorldFestival->fetch_assoc()){
											$i++;
										
									
								?>
									<li class="blazy " id="newspaper-x-recent-post-4" style="background-image:url('uploads/<?=$result['img']?>')">
										<div class="newspaper-x-post-info">
											<h6>
												<a href="detailfestival.php?id=<?=$result['id']?>"><?=$result['name']?></a>
											</h6>
											<span class="newspaper-x-category">
												<a href="#">News</a>
											</span>
											<span class="newspaper-x-date"><?=$format->formatDate($result['time'])?></span>
										</div>
									</li>
								<?php
										}
									}
								?>
								</ul>
							</div> 
						</div> 
					</div> 
				</div> 
			</div>
		</div>
	</div>
</div>
<div class="container site-content ">
		<!-- Last News -->
		<div id="newspaper_x_widget_posts_c-2" class="widget newspaper_x_widgets">
			<h3 class="widget-title">
					<span>Lastest Festivals</span>
			</h3>
			<div class="row newspaper-x-layout-c-row">
			<?php
				if($WorldFestival2){
					$i = 0;
					while ($result2 = $WorldFestival2 ->fetch_assoc()) {
						$i ++;
				
			?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="newspaper-x-blog-post-layout-c">
						<div class="newspaper-x-image">
							<a href="detailfestival.php?id=<?=$result2['id']?>">
								<img width="550" height="360" src="uploads/<?=$result2['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" /> 
							</a>
						</div>
						<div class="newspaper-x-title">
							<h4>
								<a href="detailfestival.php?id=<?=$result2['id']?>"><?=$result2['name']?></a>
							</h4>
						</div>
						<span class="newspaper-x-category">
							<a href="#">News</a>
						</span>
						<span class="newspaper-x-date"><?=$format->formatDate($result2['time'])?></span>
						<div class="newspaper-x-content"><i><?=$format->textShorten($result2['description'],200)?></i>
						</div>
					</div>
				</div>
				<?php
				
					}
				}
			?>
				
			</div>
		</div><!-- end last news-->
		

		<!--festival of religions  -->
		<div id="newspaper_x_widget_posts_b-3" class="widget newspaper_x_widgets"> 
			<h3 class="widget-title">
				<span>Festival Of Religions</span>
			</h3> 
			<div class="row newspaper-x-layout-b-row">
			<?php
				if($festival1){
						$i=0;
					while ($result3 = $festival1->fetch_assoc()) {
						$i ++;
					
			?>
				<div class="col-md-4 col-xs-6">
					<div class="newspaper-x-blog-post-layout-b">
						<div class="newspaper-x-image">
							<a href="detailreligionfestival.php?id=<?=$result3['id']?>">
								<img width="550" height="50%" src="uploads/<?=$result3['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" /> 
							</a>
						</div>
						<div class="newspaper-x-title">
							<h4>
								<a href="detailreligionfestival.php?id=<?=$result3['id']?>"><?=$result3['name']?></a>
							</h4>
						</div>
						<span class="newspaper-x-author">
							<a href="#"><?=$result3['religioname']?></a>
						</span>
						<span class="newspaper-x-date"><?=$format->formatDate($result3['time'])?></span>
						<div class="newspaper-x-content">
								<i><?=$format->textShorten($result3['description'],200)?></i>
						</div>
					</div>
				</div>
				<?php
					}
				}	
				?>
			</div>
		</div> <!-- end -->

		<!--  -->
		<div id="newspaper_x_widget_posts_d-3" class="widget newspaper_x_widgets"> 
			<div class="row newspaper-x-layout-b-row">
			<?php
                if ($festival2) {
                    $i=0;
                    while ($result3 = $festival2->fetch_assoc()) {
                        $i ++; ?>
				<div class="col-md-4 col-xs-6 ">
					<div class="newspaper-x-blog-post-layout-b border">
						<div class="row">
							<div class="col-sm-5 col-xs-12">
								<div class="newspaper-x-image">
									<a href="detailreligionfestival.php?id=<?=$result3['id']?>">
										<img width="550" height="360" src="uploads/<?=$result3['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" />
									</a>
								</div>
							</div>
							<div class="col-sm-7 col-xs-12">
								<div class="newspaper-x-title">
									<h3>
										<a href="detailreligionfestival.php?id=<?=$result3['id']?>"><?=$result3['name']?></a>
									</h3>
								</div>
								<span class="newspaper-x-date"><?=$format->formatDate($result3['time'])?></span>
							</div>
						</div>
					</div>
				</div>
			<?php
                    }
                }
			?>
				
				
			</div>
		</div>
	<!--  -->
	<section class="newspaper-x-after-content-area">
		<div class="row">
			<div class="col-xs-12 newspaper-x-after-content-sidebar">	
				<div id="newspaper_x_widget_posts_b-4" class="widget newspaper_x_widgets"> 
					<h3 class="widget-title">
						<span>World Festival</span>
					</h3> 
					<div class="row newspaper-x-layout-b-row">
					<?php
                    if ($WorldFestival3) {
                        $i=0;
                        while ($result4 = $WorldFestival3->fetch_assoc()) {
                            $i ++; ?>
						<div class="col-md-3 col-xs-6">
							<div class="newspaper-x-blog-post-layout-b">
								<div class="newspaper-x-image">
									<a href="detailfestival.php?id=<?=$result4['id']?>">
										<img width="550" height="360" src="uploads/<?=$result4['img']?>" class="attachment-newspaper-x-recent-post-big size-newspaper-x-recent-post-big wp-post-image" alt="" /> 
									</a>
								</div>
								<div class="newspaper-x-title">
									<h4>
										<a href="detailfestival.php?id=<?=$result4['id']?>"><?=$result4['name']?></a>
									</h4>
								</div>
								<span class="newspaper-x-author">
									<a href="#"><?=$result4['place']?></a>
								</span>
								<span class="newspaper-x-date"><?=$format->formatDate($result4['time'])?></span>
								<div class="newspaper-x-content">
									<i><?=$format->textShorten($result4['description'],200)?></i>
								</div>
							</div>
						</div>
					<?php
                        }
                    }
					?>	
					</div>
				</div>
				<!--  -->
			</div>
		</div> <!-- row-->
	</section><!--newspaper-x-after-content-area -->	
</div> <!--col-md-12 newspaper-x-content newspaper-x-with-sidebar-->


<?php
	include "inc/footer.php";
?>

