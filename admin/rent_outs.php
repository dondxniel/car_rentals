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
							All Rent Outs			
						</h1>
						<p class="pt-20 pb-20 text-white">
							See a complete list of cars that have been rented out.
						</p>
                        <a href="#cars" class="primary-btn text-uppercase">See Rent Outs &nbsp;<span class = "fa fa-sdcgvhbn m,..
                        bvown"></span></a>
					</div>
					
				</div>
			</div>					
		</section>
		<!-- End banner Area -->	

		<?php
			// Code to change the delivery status
			// if(isset($_GET['change_status']) && isset($_GET['rent_id'])){
			// 	if(!empty($_GET['change_status']) && !empty($_GET['rent_id'])){
			// 		$id = $_GET['rent_id'];
			// 		$status = $_GET['change_status'];
			// 		if($status == "arriving"){
			// 			$new_status = "arrived";
			// 		}elseif($status == "arrived"){
			// 			$new_status = "arriving";
			// 		}else{
			// 			header("location: logout.php");
			// 		}
			// 		$sql_change_status = "UPDATE rent_outs SET delivery_status = '".$new_status."' WHERE id = '".$id."'";
			// 		$query_change_status = mysqli_query($conn, $sql_change_status);
			// 		// echo "done";
			// 	}
			// }

            $sql_get_rent_outs = "SELECT * FROM rent_outs";
            $query_get_rent_outs = mysqli_query($conn, $sql_get_rent_outs);
            while($fetch_rent_outs = mysqli_fetch_assoc($query_get_rent_outs)):
        ?>
		<!-- Start model Area -->
		<section class="model-area section-gap" id="cars">
			<div class="container">
                <?php
                    $sql_get_car_details = "SELECT * FROM cars WHERE id = '".$fetch_rent_outs['car_id']."'";
                    $query_get_car_details = mysqli_query($conn, $sql_get_car_details);
                    $fetch_car_details = mysqli_fetch_assoc($query_get_car_details);
                ?>		
				<div class="">
					<div class="row align-items-center single-model item">
                        <div class="col-lg-6 model-right">
							<img class="img-fluid" src="<?php echo ".".$fetch_car_details['image_url']?>" alt="">
                        </div>
                        
						<div class="col-lg-6 model-left">
							<div class="title justify-content-between d-flex">
								<h4 class="mt-20"><?php echo $fetch_car_details['car_name'] . " " . $fetch_car_details['car_model']?></h4>
								<h2>$<?php echo $fetch_car_details['price']?><span>/day</span></h2>
							</div>
							<p>
                                Renter's Name    : <?php echo $fetch_rent_outs['renters_name']?><br>
                                Renter's Email   : <?php echo $fetch_rent_outs['renters_email']?><br>
                                Phone Number     : <?php echo $fetch_rent_outs['renters_phone_number']?><br>
                                Rent Date        : <?php echo $fetch_rent_outs['rent_date']?><br>
                                Return Date      : <?php echo $fetch_rent_outs['return_date']?><br>
								Capacity         : <?php echo $fetch_car_details['capacity']." persons"?> <br>
								Doors            : <?php echo $fetch_car_details['doors']?> <br>
								Air Condition    : <?php echo $fetch_car_details['air_condition']?> <br>
								Transmission     : <?php echo $fetch_car_details['transmission']?>
							</p>
							
								<?php
									// Code to change the type of button that gets displayed
									// if($fetch_rent_outs['delivery_status'] == "arriving"){
									// 	echo "<a class='text-uppercase primary-btn' href='rent_outs.php?change_status=arrived&rent_id=".$fetch_rent_outs['id']."'>Arrived</a>";
									// }else{
									// 	echo "<a class='text-uppercase primary-btn' href='rent_outs.php?change_status=arriving&rent_id=".$fetch_rent_outs['id']."'>Arriving</a>";
									// }
								?>
							
						</div>
						
					</div>
												
				</div>
			</div>	
        </section>
        <?php
            endwhile;
        ?>
        <!-- <div style = "padding: 30px;" class = "text-center">
            <a class="text-uppercase primary-btn" href="#">See More...</a>
        </div> -->
<?php include("./inc/footer.php")?>