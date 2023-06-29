<?php
include "inc/header.php";
?>
<?php
	if (isset($_POST['username'])&&$_POST['username']) {
		$registerAccount = $user->registerAccount($_POST);
	}
?>
		<div class="container">
			<div class="newspaper-x-breadcrumbs">
				<span>
					<a itemprop="url" href="index.php">
						<span itemprop="title">Home </span>
					</a>
				</span>
				<span class="newspaper-x-breadcrumb-sep">/</span>
				<span >
				<a itemprop="url" href="#">
					<span itemprop="title">Register</span>
				</a>
				</span>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
					<h4 class="card-title mt-3 text-center">Register</h4>
					<p class="text-center">Get started with your free account</p>
					
						<?php
							if(isset($registerAccount)){
								echo $registerAccount;
							}
						?>
					
					<p class="divider-text">
						<span class="bg-light">OR</span>
					</p>
				<form  name="form" method="post" onsubmit="return Validate()">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i> </span>
						</div>
						<input required name="fullname" class="form-control" placeholder="Fullname" type="text">
					</div> <!-- form-group// --><br>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i> </span>
						</div>
						<input required name="username" class="form-control" placeholder="Username" type="text">
					</div> <!-- form-group// --><br>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input required name="email" class="form-control" placeholder="Email address" type="email">
					</div> <!-- form-group// --><br>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-home"></i> </span>
						</div>
						<input required name="address" class="form-control" placeholder="Address" type="text">
					</div> <!-- form-group// --><br>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input required name="telephone" class="form-control" placeholder="Phone number" type="text" >
					</div> <br>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input required pattern="[a-zA-Z0-9]{6,10}" class="form-control" placeholder="Create password" type="password" name="password" id="password"> 
					</div> <!-- form-group// --><br>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input required pattern="[a-zA-Z0-9]{6,10}" class="form-control" placeholder="Confirm password" type="password" name="confirmpassword" id="confirmpassword" > 
					</div> <!-- form-group// --><br>    

					<div class="form-group" style="margin-left: 30% ">
						<button class="btn btn-primary btn-block" type="submit">Create Account</button> 
					</div> <!-- form-group// --> <br>     

					<p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
				</form>
			</article>
			</div> <!-- card.// -->
		</div> 
</div> 

<?php
	include "inc/footer.php";
?>
<script>
	 function Validate() {
        with(form){
			var sdt = /^0\d{9,10}$/;
			if(sdt.test(telephone.value)==false){
				alert('Telephone must include 9 or 10 numbers and not include words!');
				return false;
			}
			if (password.value != confirmpassword.value) {
            	alert("Passwords do not match.");
            	return false;
        	}
        	return true;
		}
    }
</script>
<style>
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}


</style>
