<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>	
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					
								
					<!-- Start model Area -->
					<section class="model-area section-gap" id="cars" style = "color: #fff; width: 100%;">
						<div class="container">
							<?php
								if(isset($_SESSION['renters_id'])):
									$renters_id = $_SESSION['renters_id'];
									$get_rent_details = "SELECT * FROM rent_outs WHERE id = '".$renters_id."'";
									$query_rent_details = mysqli_query($conn, $get_rent_details);
									$fetch_rent_details = mysqli_fetch_assoc($query_rent_details);

									$get_car_details = "SELECT * FROM cars WHERE id = '".$fetch_rent_details['car_id']."'";
									$query_car_details = mysqli_query($conn, $get_car_details);
									$fetch_car_details = mysqli_fetch_assoc($query_car_details);
								
							?>	
							<div class="">
								<div class="row align-items-center single-model item">
									<div class="col-md-6">
										<div class="col-lg-6 model-right">
											<img class="img-fluid" src="<?php echo $fetch_car_details['image_url']?>" alt="" style = "border-radius : 5px">
										</div>
										
										<div class="col-lg-6 model-left">
											<div class="title justify-content-between d-flex">
												<h4 class="mt-20" style = "color: white"><?php echo $fetch_car_details['car_name'] . " " . $fetch_car_details['car_model']?></h4>
												<!-- <h2>$149<span>/day</span></h2> -->
											</div>
											<!-- <p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
											</p> -->
											<p>
												Capacity         : <?php echo $fetch_car_details['capacity']?> <br>
												Doors            : <?php echo $fetch_car_details['doors']?> <br>
												Air Condition    : <?php echo $fetch_car_details['air_condition']?> <br>
												Transmission     : <?php echo $fetch_car_details['transmission']?> <br>
												Delivery Status     : <?php echo $fetch_rent_details['delivery_status']?>
											</p>
											
										</div>
									</div>
									<div class="col-md-6 header-right">
										<h4 class="text-white pb-30">Leave Your Reviews</h4>
										<?php
											if(isset($_POST['stars']) && isset($_POST['review'])){
												if(!empty($_POST['stars']) && !empty($_POST['review'])){
													$sql_user = "SELECT * FROM rent_outs WHERE id = '".$_SESSION['renters_id']."'";
													$query_user = mysqli_query($conn, $sql_user);
													$fetch_user = mysqli_fetch_assoc($query_user);

													$stars = $_POST['stars'];
													$review = $_POST['review'];
													$user_name = $fetch_user['renters_name'];
													$user_email = $fetch_user['renters_email'];
													$date = date("d-m-Y");

													$sql_save_review = "INSERT INTO reviews (senders_name, sender_email, number_of_stars, review, date) VALUES ('".$user_name."', '".$user_email."', '".$stars."', '".$review."', '".$date."')";

													$query_save_review = mysqli_query($conn, $sql_save_review);

												}else{
													echo "<p class = 'text-danger'>Complete filling the form before submitting</p>";
												}
											}
										?>
										<form class="form" role="form" autocomplete="off" method = "POST" method = "rent_details.php">
											<div class="star">
												<span class="fa fa-star" id = "starOne" onclick="starOne()"></span>
												<span class="fa fa-star" id = "starTwo" onclick="starTwo()"></span>
												<span class="fa fa-star" id = "starThree" onclick="starThree()"></span>
												<span class="fa fa-star" id = "starFour" onclick="starFour()"></span>
												<span class="fa fa-star" id = "starFive" onclick="starFive()"></span>
											</div>				
											<div class="from-group">
												<input type="hidden" id = "stars" name = "stars">
												<textarea class = "form-control" name="review" id="" cols="10" rows="1"></textarea>
											</div>
											<br>
											<div class="form-group row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Send Review</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- <div class="row">
									
								</div>							 -->
							</div>
							<?php
								else:
									header("location: login.php");
								endif;
							?>
						</div>	
					</section>
					
									
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	


<?php include("./inc/footer.php")?>