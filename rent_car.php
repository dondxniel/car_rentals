<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>	
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					<div class="banner-content col-lg-7 col-md-6 ">
						<h6 class="text-white ">Finish processing your rent of the</h6>
						<h1 class="text-white text-uppercase">
							<?php
								$sql_car = "SELECT * FROM cars WHERE id = '".$_GET['car_id']."'";
								$query_car = mysqli_query($conn, $sql_car);
								$fetch_car = mysqli_fetch_assoc($query_car);

								echo $fetch_car['car_name']." ".$fetch_car['car_model'];
							?>
							
						</h1>
						<p class="pt-20 pb-20 text-white">
							Your speedy satisfaction is our utmost priority!
						</p>
                        <a href="cars.php" class="primary-btn text-uppercase">Choose Another Car</a>
					</div>
					<div class="col-lg-5  col-md-6 header-right">
						<h4 class="text-white pb-30">Process Rent</h4>
						<?php 
							if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['pick_up_date']) && isset($_POST['return_date']) && isset($_POST['car_id'])){
								if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['pick_up_date']) && !empty($_POST['return_date']) && !empty($_POST['car_id'])){
									$name = $_POST['name'];
									$email = $_POST['email'];
									$phone = $_POST['phone'];
									$password = $_POST['password'];
									$pick_up_date = $_POST['pick_up_date'];
									$return_date = $_POST['return_date'];
									$car_id = $_POST['car_id'];
									$date = date('m-d-Y');
									$delivery_status = "arriving";
									

									$sql_save_rent = "INSERT INTO rent_outs(renters_name, renters_email, renters_phone_number, rent_date, pick_up_date, return_date, password, car_id, delivery_status) VALUES('".$name."', '".$email."', '".$phone."', '".$date."', '".$pick_up_date."', '".$return_date."', '".$password."', '".$car_id."', '".$delivery_status."')";
									$query_save_rent = mysqli_query($conn, $sql_save_rent);
									
									header("location: rent_car.php?car_id=".$car_id."&message="."CAR SUCCESSFULLY RENTED OUT!");
								}else{
									echo "<p class = 'text-danger'>Complete filling the form before submitting</p>";
								}

							}
							if(isset($_GET['message'])){
								echo "<p class = 'text-primary'>".$_GET['message']."</p>";
							}
						?>
						<form class="form" role="form" autocomplete="off" method = "POST" action = "rent_car.php">
													    
							<div class="from-group">
								<input type = "hidden" value = "<?php echo $_GET['car_id']?>" name = "car_id">
								<input class="form-control txt-field" type="text" name="name" placeholder="Your name">
								<input class="form-control txt-field" type="email" name="email" placeholder="Email address">
								<input class="form-control txt-field" type="tel" name="phone" placeholder="Phone number">
								<input class="form-control txt-field" type="password" name="password" placeholder="Password">

								<!-- Pick up date -->
								<div class="form-group row">
							        <div class="col-md-6 wrap-left">
								       	<input type="text" class = "form-control"  placeholder = "Pick Up Date" disabled >
							        </div>
							        <div class="col-md-6 wrap-right">
										<div class="input-group dates-wrap">                                          
											<input id="" class="dates form-control" id="exampleAmount" placeholder = "Date & time" type="date" name = "pick_up_date">                        
											<div class="input-group-prepend">
												<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
											</div>											
										</div>
							        </div>
								</div>
								
								<!-- Drop Off Date -->
								<div class="form-group row">
							        <div class="col-md-6 wrap-left">
								       	<input type="text" class = "form-control"placeholder = "Drop Off Date" disabled >
							        </div>
							        <div class="col-md-6 wrap-right">
										<div class="input-group dates-wrap">                                          
											<input id="datepicker" class="dates form-control" id="exampleAmount" placeholder = "Date & time" type="date" name = "return_date" >                        
											<div class="input-group-prepend">
												<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
											</div>											
										</div>
							        </div>
								</div>
								
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Book</button>
								</div>
							</div>
						</form>
					</div>		
                </div>
                
			</div>					
		</section>
		<!-- End banner Area -->	


<?php include("./inc/footer.php")?>