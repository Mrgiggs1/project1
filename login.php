<?php
	SESSION_START();
	require("dbconnection.php");
	require("header.php");
	
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
      <title>login</title>
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
							<h3>login As</h3>
							
						</div>
					</div>
				</div>
			</div>
		</div>
			
      <div class="row" style="align: center">
         <dir class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
            <figure><img  src="images/loginLogo.jpg"/></figure>
         </dir>
          <dir class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="about_box">
               <h3>Login</h3>
				<form method="post">			
				
					<input type="radio" name="login" value = "Admin">Admin
					<input type="radio" name="login" value = "Student">Student
					<div class="data">Enter E-Mail ID:</div><input type="email" required id="email" size="30" maxlength="30" name="email"/>
					
					<div class="data">Enter Password:</div></td><td><input type="password"  required id="pw" size="30" maxlength="30" name="pw"><br>
					<input type="checkbox" required id="agree" name="agree" value="agree">
                    <label for="periph1">Agree to Terms and Conditions</label>
					<br>
					<input class="btn btn-info mt-2" type="submit" name="submit" value="Login">
					<br>
					<span><a href="forgotPass.php">Forgot Password</a></span>
				</form>
         </dir> 
      </div>
   </div>


	<?php
			if(isset($_POST['submit']))
			{
				if(isset($_POST['login']))
				{
							
						$login = $_POST['login'];
						$email = $_POST['email'];
						$pw = $_POST['pw'];
						if($login == "Admin")
						{
							$sel = "select * from users where email='".$email."' AND password = '".$pw."' AND role = '".$login."'";
							$query = mysqli_query($con,$sel);
							$line = mysqli_fetch_assoc($query);
							
							if($line)
							{
								$_SESSION['email']= $line['email'];								
								$email = $_SESSION['email'];
								echo '<script type="text/javascript"> alert("Admin successfully logged in") </script>';
								echo '<script>
									window.location.href="admin/profile.html";
								</script>
								';								
							}
							else{
								echo '<script type="text/javascript"> alert("wrong admin email and password") </script>';
							}
						}
						else if($login =="Student")
						{
							
							$sel_event = "select * from users where email='".$email."' AND password = '".$pw."' AND role = '".$login."'";
							$query1 = mysqli_query($con,$sel_event);
							$line = mysqli_fetch_assoc($query1);
							if($line)
							{
								$_SESSION['email']= $line['email'];								
								$email = $_SESSION['email'];
								echo '<script type="text/javascript"> alert("Student successfully logged in") </script>';
								echo '<script>
									window.location.href="student.php";
								</script>
								';						
							}
							else{
								echo '<script type="text/javascript"> alert("wrong Student email and password") </script>';
							}
						}
						
						
				}
					else{
					echo '<script type="text/javascript"> alert("Choose A Role") </script>';				
				}
			}
	?>

	<!---footer-->
	<?php
	require("footer.php");
	?>
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