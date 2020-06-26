<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>	
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					
					<div class="col-lg-5  col-md-6 header-right">
						<h4 class="text-white pb-30">Login</h4>
						<?php 
							if(isset($_POST['email']) && isset($_POST['password'])){
								if(!empty($_POST['email']) && !empty($_POST['password'])){
									$email = $_POST['email'];
									$password = $_POST['password'];

									$sql_check_email = "SELECT * FROM rent_outs WHERE renters_email = '".$email."'";
									$query_check_email = mysqli_query($conn, $sql_check_email);
									$fetch_check_email = mysqli_fetch_assoc($query_check_email);
									if(mysqli_num_rows($query_check_email)){
										if($fetch_check_email['password'] == $password){
											$_SESSION['renters_id'] = $fetch_check_email['id'];
											header("location: rent_details.php");
										}else{
											echo "<p class = 'text-danger'>Wrong Password</p>";
										}
									}else{
										echo "<p class = 'text-danger'>Details Doesn't exist</p>";
									}
								}else{
									echo "<p class = 'text-danger'>Fill both feilds before trying to login</p>";
								}
							}
						?>
						
						<form class="form" role="form" autocomplete="off" method = "POST" action = "login.php"> 
													    
							<div class="from-group">
								
								<input class="form-control txt-field" type="email" name="email" placeholder="Email address">
								<input class="form-control txt-field" type="password" name="password" placeholder="Password">
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Login</button>
								</div>
							</div>
						</form>
					</div>											
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	


<?php include("./inc/footer.php")?>