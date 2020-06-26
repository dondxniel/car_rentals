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
                    Add Cars			
                </h1>
                <p class="pt-20 pb-20 text-white">
                    Add new cars to the database to increase the possibility of you piquing a prospective customer's interest with an exotic collection.
                </p>
                
            </div>
            <div class="col-lg-5  col-md-6 header-right">
                <h4 class="text-white pb-30">Enter Car Details</h4>
                <?php
                    //to display "successfully uploaded" if a car was just added
                    if(isset($_GET['uploaded'])){
                        echo "<p class = 'text-primary'>Upload Successful.</p>";
                    }
                    if(isset($_POST['name']) && isset($_POST['model']) && isset($_POST['capacity']) && isset($_POST['doors']) && isset($_POST['ac']) && isset($_POST['transmission']) && isset($_FILES['car_image']) && isset($_POST['price'])){
                        if(!empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['capacity']) && !empty($_POST['doors']) && !empty($_POST['ac']) && !empty($_POST['transmission']) && !empty($_FILES['car_image']) && !empty($_POST['price'])){
                            $car_name = $_POST['name'];
                            $car_model = $_POST['model'];
                            $capacity = $_POST['capacity'];
                            $doors = $_POST['doors'];
                            $ac = $_POST['ac'];
                            $transmission = $_POST['transmission'];
                            $car_image = $_FILES['car_image']; 
                            $price = $_POST['price'];

                            //Getting the  file extension
                            $file_name_array = explode('.', $car_image['name']);
                            $file_extension = strtolower(end($file_name_array));
                            //Checking if what is being uploaded is an actual image.
                            $allowed_extensions = array('jpg', 'png', 'jpeg');
                            if(in_array($file_extension, $allowed_extensions)){
                                if($car_image['error'] === 0){
                                    $file_new_name = uniqid($file_name_array[0], true).'.'.$file_extension;
                                    $file_destination = './cars_images/'.$file_new_name;

                                    //Send the file to the new directory
                                    if(move_uploaded_file($car_image['tmp_name'], '.'.$file_destination)){
                                        	 	 	 	 	 	 
                                        $sql_upload_car_data = "INSERT INTO cars (car_name, car_model, capacity, doors, air_condition, transmission, price, image_url) VALUES ('".$car_name."', '".$car_model."', '".$capacity."', '".$doors."', '".$ac."', '".$transmission."', '".$price."', '".$file_destination."')";
                                        $query_upload_car_data = mysqli_query($conn, $sql_upload_car_data);
                                        
                                        header("location: add_cars.php?uploaded=1");
                                    }else{
                                        echo "<p class = 'text-danger'>Error uploading file</p>";
                                    }
                                }else{
                                    echo "<p class = 'text-danger'>Error uploading file</p>";
                                }
                            }else{
                                echo "<p class = 'text-danger'>Please, only attempt uploading images of extension 'jpg', 'jpeg', 'png'</p>";    
                            }
                            
                        }else{
                            echo "<p class = 'text-danger'>You can't add a car until you fill the form completely</p>";
                        }
                    }
                    
                ?>
                <form class="form" action = "add_cars.php" method = "POST" enctype = "multipart/form-data">
                    <div class="from-group">
                        <input class="form-control txt-field" type="text" name="name" placeholder="Car Name">
                        <input class="form-control txt-field" type="text" name="model" placeholder="Car Model">
                        <input class="form-control txt-field" type="text" name="capacity" placeholder="Capacity">
                        <input class="form-control txt-field" type="text" name="doors" placeholder="Doors">
                        <input class="form-control txt-field" type="text" name="ac" placeholder="Air Condition">
                        <div  class="default-select" id="default-select">
                            <select name= "transmission">
                                <option value="" >--Select Transmission--</option>
                                <option value="automatic">Automatic</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <input class="form-control txt-field" type="number" name="price" placeholder="Price per day" style = "margin-top: 15px">
                        <div class="form-group row" style = "margin-top: 15px">
                            <div class="col-md-6 wrap-left">
                                <div class="default-select" id="default-select">
                                    <input type="text" placeholder = "Select Car image" disabled class="form-control txt-field">
                                </div>
                            </div>
                            <div class="col-md-6 wrap-right">
                                <div class="input-group dates-wrap">                                              
                                    <input type="file" class="form-control txt-field" name="car_image">								
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Add</button>
                        </div>
                    </div>
                </form>
            </div>											
        </div>
    </div>					
</section>
<?php include("./inc/footer.php")?>