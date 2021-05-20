<?php
	SESSION_START();
	require("header.php");
	require("dbconnection.php");
	
	
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sign Up</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Student Register</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form METHOD="POST">
                        <div class="row">
                            <div>
								<figure><img style="width:400px; height:600px" src="images/tut.png"/></figure>
							</div>
							<div style="text-align:right;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                                <input class="form-control" placeholder="Last name" type="text" name="lName">						
                                <input class="form-control" placeholder="First Name" type="text" name="fName">
                                <input class="form-control" placeholder="Email" type="email" name="email">
                                <input class="form-control" placeholder="Password" type="password" name="password">
                                <input class="form-control" placeholder="ID" type="number" name="id">
                                <input class="form-control" placeholder="Address" type="text" name="address">
								
								<div class=" col-md-12">
								<input class="btn btn-info mt-2" type="submit" name="submit">
								</div>
                            </div>
							
                            
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
    <?php
		if(isset($_POST['submit']))
		{								
			$lName = $_POST["lName"];
			$fName = $_POST["fName"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$ID = $_POST["id"];
			
			$address = $_POST["address"];
			$role = "Student";
			$created_date = date("Y-m-d");
			
			$sel = "select * from users where ID='".$ID."'";
			$query = mysqli_query($con,$sel);
			
			if(mysqli_num_rows($query))
			{
				echo '<script type="text/javascript"> alert("The user ID has already been used") </script>';				
			}
			else
			{
				if( strlen($ID) <13 || strlen($ID) > 13)
				{
					echo '<script type="text/javascript"> alert("Your ID must be 13 Numbers") </script>';
				}
				else
				{
					$reg = "INSERT into users values('$lName','$fName','$email','$password','$role','$ID','$address','$created_date')";
					$que = mysqli_query($con,$reg);
					
					if(mysqli_num_rows($que))
					{
						echo '<script type="text/javascript"> alert("Student Successfully Registered") </script>';
					}
					else{
						echo '<script type="text/javascript"> alert("Student unsuccessfully Registered") </script>';
					}
				}
				
			}
		}
	?>
      <!---footer-->
	<?php
	require("footer.php");
	?>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>