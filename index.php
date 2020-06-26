<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>	
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					<div class="banner-content col-lg-7 col-md-6 ">
						<h6 class="text-white ">the Royal Essence of Journey</h6>
						<h1 class="text-white text-uppercase">
							Relaxed Journey Ever				
						</h1>
						<p class="pt-20 pb-20 text-white">
							<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. -->
						</p>
						<a href="cars.php" class="primary-btn text-uppercase">View Available Cars</a>
					</div>
					<!-- <div class="col-lg-5  col-md-6 header-right">
						<h4 class="text-white pb-30">Register With Us</h4>
						<form class="form" role="form" autocomplete="off">
													    
							<div class="from-group">
								<input class="form-control txt-field" type="text" name="name" placeholder="Your name">
								<input class="form-control txt-field" type="email" name="email" placeholder="Email address">
								<input class="form-control txt-field" type="tel" name="phone" placeholder="Phone number">
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Register</button>
								</div>
							</div>
						</form>
					</div>  -->
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	

		<!-- Start reviews Area -->
		<section class="reviews-area section-gap" id="review">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text text-center">
						<h1>Customer Reviews</h1>
						<p class="mb-10 text-center">
							Who are in extremely love with eco friendly system.
						</p>
					</div>
				</div>					
				<div class="row">
					<?php 
						$sql_reviews = "SELECT * FROM reviews";
						$query_reviews = mysqli_query($conn, $sql_reviews);
						while($fetch_reviews = mysqli_fetch_assoc($query_reviews)):

					?>
					<div class="col-lg-4 col-md-6">
						<div class="single-review">
							<h4><?php echo $fetch_reviews['senders_name']?></h4>
							<p>
								<?php echo $fetch_reviews['review']?>
							</p>
							<div class="star">
								<!-- <span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span> -->
								<?php 
									$number_of_stars = $fetch_reviews['number_of_stars'];
									$null_stars = 0;
									while($number_of_stars){
										echo "<span class='fa fa-star checked'></span>";
										$number_of_stars--;
										$null_stars++;
									}
									$null_stars = 5 - $null_stars;
									while($null_stars){
										echo "<span class='fa fa-star'></span>";
										$null_stars--;
									}
									
								?>
							</div>
						</div>
					</div>
					<?php
						endwhile;
					?>
				</div>
			</div>	
		</section>
		<!-- End reviews Area -->
		

		<!-- Start model Area -->
		<!-- <section class="model-area section-gap" id="cars">
			<div class="container">
				<div class="row d-flex justify-content-center pb-40">
					<div class="col-md-8 pb-40 header-text">
						<h1 class="text-center pb-10">Choose your Desired Car Model</h1>
						<p class="text-center">
							Who are in extremely love with eco friendly system.
						</p>
					</div>
				</div>				
				<div class="">
					<div class="row align-items-center single-model item">
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20">Audi 3000 msi</h4>
								<h2>$149<span>/day</span></h2>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</p>
							<p>
								Capacity         : 04 Person <br>
								Doors            : 04 <br>
								Air Condition    : Dual Zone <br>
								Transmission     : Automatic
							</p>
							<a class="text-uppercase primary-btn" href="#">Book This Car Now</a>
						</div>
						<div class="col-lg-6 model-right">
							<img class="img-fluid" src="img/car.jpg" alt="">
						</div>
					</div>
												
				</div>
			</div>	
		</section> -->
		<!-- End model Area -->

<?php include("./inc/footer.php")?>