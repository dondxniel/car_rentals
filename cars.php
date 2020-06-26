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
							All Cars				
						</h1>
						<p class="pt-20 pb-20 text-white">
							Have a complete list of cars we have in our parks. Have a pick and contact us!
						</p>
                        <a href="#cars" class="primary-btn text-uppercase">See Cars &nbsp;<span class = "fa fa-sdcgvhbn m,..
                        bvown"></span></a>
					</div>
					
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	

		<?php
			$sql_fetch_cars = "SELECT * FROM cars ";
			$query_fetch_cars = mysqli_query($conn, $sql_fetch_cars);
			while($fetch_cars = mysqli_fetch_assoc($query_fetch_cars)):
		?>
		<!-- Start model Area -->
		<section class="model-area section-gap" id="cars">
			<div class="container">
				<div class="">
					<div class="row align-items-center single-model item">
                        <div class="col-lg-6 model-right">
							<img class="img-fluid" src="<?php echo $fetch_cars['image_url']?>" alt="">
                        </div>
                        
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20"><?php echo $fetch_cars['car_name'] ." ". $fetch_cars['car_model']?></h4>
								<h2>$<?php echo $fetch_cars['price']?><span>/day</span></h2>
							</div>
							<p>
								<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. -->
							</p>
							<p>
								Capacity         : <?php echo $fetch_cars['capacity']?> <br>
								Doors            : <?php echo $fetch_cars['doors']?> <br>
								Air Condition    : <?php echo $fetch_cars['air_condition']?> <br>
								Transmission     : <?php echo $fetch_cars['transmission']?>
							</p>
							<a class="text-uppercase primary-btn" href="rent_car.php?car_id=<?php echo $fetch_cars['id']?>">Book This Car Now</a>
						</div>
					</div>
				</div>
			</div>	
        </section>
		<!-- End model Area -->
		<?php
			endwhile;
		?>
<?php include("./inc/footer.php")?>