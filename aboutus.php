<?php
    include "inc/header.php";
?>

<div class="container">
			<div class="newspaper-x-breadcrumbs">
				<span>
					<a itemprop="url" href="../../index.html">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span >
				<a itemprop="url" href="#">
					<span itemprop="title">About Us</span>
				</a>
				</span>
			</div>
		</div>
<!-- --------------------------- -->

<div class="container">
	<div class="about-box">
		<ul>
			<h2><span>About</span> Us</h2>
			<li>
				<p class="text-about">Welcome to our website. right here this website can provide you about world festivals and festivals of religions, just 1 click you can get festival details.
				Books to accompany the festival and other books.
				In addition, you can also bring our members, if you have any questions or are not satisfied with us, you can quickly contact us via phone number: 033 686 8686 or visit Contac Us for support.
				If you find it interesting or satisfied, please rate our website and recommend it to your other acquaintances. Thank you for your contributions.
				I hope you enjoy our website.
				</p>
				<p>Thank you for your contributions.I hope you enjoy our website.</p>
			</li>
		</ul>
		<ul>
			<li>
				<div>1</div>
				<p>Leader</p>
            	<span>Phạm Hòa Nam</span>
            </li>
            <li>
            	<div>2</div>
				<p>Member</p>
            	<span>Chu Anh Tuấn</span>
            </li>
            <li>
            	<div>3</div>
				<p>Member</p>
            	<span>Trần Minh Quang</span>
            </li>
            <li>
            	<div>4</div>
				<p>Member</p>
            	<span>Nguyễn Quang Duy Anh</span>
            </li>
		</ul>
	</div>
</div>
<?php
    include "inc/footer.php";
?>
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap");

.about-box {min-height: 500px;margin-top: 50px;}
.about-box ul {list-style: none;width: 50%;float: left;}
.about-box ul:nth-child(1) {border-right: 1px solid black;}
.about-box ul:nth-child(1) li p:nth-child(2) {font-size: 17px;font-weight: bold;}
.about-box ul:nth-child(1) h2 {font-size: 50px;font-family: 'Roboto', sans-serif;font-weight:bold;}
.about-box ul:nth-child(1) h2 span {color: #1953aa;}
/*2*/
.about-box ul:nth-child(2) {padding-left: 70px;}
.about-box ul:nth-child(2) li div {float: left;background: yellow;width: 50px;height: 50px;border-radius: 50%;text-align: center;padding-top: 10px;color: white;font-size: 20px;font-weight: bold;margin-right: 20px;}
.about-box ul:nth-child(2) li:nth-child(1) div {background: #ffd700;}
.about-box ul:nth-child(2) li:nth-child(2) div {background: #ff7800;}
.about-box ul:nth-child(2) li:nth-child(3) div {background: red;}
.about-box ul:nth-child(2) li:nth-child(4) div {background: purple;}
.about-box ul:nth-child(2) li {margin-bottom: 20px;}
.about-box ul:nth-child(2) li p {margin-bottom: 0px;}
.about-box ul:nth-child(2) li span {font-weight: bold;}
.about-box p {color: black;font-size: 15px;width: 70%;}
p.text-about:first-letter {float: left;color: black!important;padding: 4px 8px 0 0;display: block;color: #336699;font: 60px/50px Georgia, Times, serif;}
</style>
<!-- footer -->
