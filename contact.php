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
                    Contact Us				
                </h1>
                <p class="pt-20 pb-20 text-white">
                    Contact our wonderful customer support team with your inquiries or complaints about our products or services.
                </p>
                
            </div>
            <div class="col-lg-5  col-md-6 header-right">
                <h4 class="text-white pb-30">Send Us A Message</h4>
                <?php
                    if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['message'])){
                        if(!empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['phone']) && !empty($_GET['message'])){
                            $name = $_GET['name'];
                            $email = $_GET['email'];
                            $phone = $_GET['phone'];
                            $message = $_GET['message'];
                            $date = date("d-m-Y");

                            $sql_send = "INSERT INTO contact_us_messages(senders_name, senders_email, phone_number, message, date) VALUES('".$name."', '".$email."', '".$phone."', '".$message."', '".$date."')";
                            $query_send = mysqli_query($conn, $sql_send);

                        }else{
                            echo "<p class = 'text-danger'>Fill the form completely before submitting</p>";
                        }
                    }
                ?>
                <form class="form" role="form" autocomplete="off" method = "GET" action = "contact.php">
                    <div class="from-group">
                        <input class="form-control txt-field" type="text" name="name" placeholder="Your name">
                        <input class="form-control txt-field" type="email" name="email" placeholder="Email address">
                        <input class="form-control txt-field" type="tel" name="phone" placeholder="Phone number">
                        <textarea class = "form-control" style = "margin-bottom: 20px" name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Send</button>
                        </div>
                    </div>
                </form>
            </div>											
        </div>
    </div>					
</section>
<?php include("./inc/footer.php")?>