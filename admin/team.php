

<?php

require("dbconnection.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin</title>
    <link rel="icon" type="image/png" sizes="1200x1156" href="assets/img/tut.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><span>Hello Who?</span> </li>
                <li> <a href="appointments.html">Appointments</a></li>
                <li><a href="history.html">Sessions History</a> </li>
                <li> <a href="labs.html">Manage Labs</a></li>
                <li> <a href="#">Profile</a></li>
                <li> <a href="post.html">Post</a></li>
                <li> <a href="users.html">Manage Users</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row" id="top">
                    <div class="col-2 col-lg-1 col-xl-1"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>
                    <div class="col-5 col-sm-4 offset-5 offset-sm-6 offset-md-6 offset-lg-7 offset-xl-7" id="user">
                        <div class="text-right" id="user_info"><a href="../index.php"><i class="fa fa-sign-out"></i></a><img src="assets/img/dev.jpg"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Team</h1>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form METHOD="POST"><!--beginning of form-->
                            <div class="form-row">
                                <div class="col-md-12 col-lg-4 col-xl-3">
                                    <div><label>Upload Team Logo</label>
                                        <div>
											<input type="file" id="logo"  name="logo" accept=".jpg,.jpeg,.png"  class="file" data-browse-on-zone-click="true" onchange="readURL(this);">
										</div>
                                    </div>
                                    <div id="preview-div"><img class="img-fluid profile-picture" id="profile-preview" src="assets/img/unset.png"></div>
                                    <div id="warning"><span id="unsupported">Unsupported format</span></div>
                                </div>
								
                                <div class="col-md-7 col-lg-8 col-xl-9">
                                    <div><label>Team ID<input class="form-control" type="text" name="teamID"></label></div>
                                    <div><label>Team Name<input class="form-control" type="text" name="teamName"></label></div>
                                    <div><label>Team Owner<input class="form-control" type="text" name="teamOwner"></label></div>
									<div><label>Email<input class="form-control" type="email" name="email"></label></div>
									<div><label>landLine<input class="form-control" type="number" name="landline"></label></div>
									
									
									
									
                                    <div><label>Tournament 1<select class="form-control" id="spec" name="tournament1" ><optgroup >
									<option value="None">None</option>
									<option value="Kasi_Knockout">Kasi Knockout</option>
									
									</optgroup>
									</select>
									</label>
									</div>
									
									<div><label>Tournament 2<select class="form-control" id="spec" name="tournament2" ><optgroup >
									<option value="None">None</option>
									<option value="Kasi_Tournament">Kasi Tournament</option>
									
									</optgroup>
									</select>
									</label>
									</div>
                                    
                                </div>
								
								<input class="btn btn-primary btn-submit profile-update"  type="submit" name="submit" value="SUBMIT">
								
								
                            </div></form>
							
							
							
							
							<?php
							
							
							
								if(isset($_POST["submit"]))
								{
									
									$teamName = $_POST["teamName"];
									$teamID = $_POST["teamID"];
									$email = $_POST["email"];
									$landLine = $_POST["landline"];
									$teamOwner = $_POST["teamOwner"];
									$tournament1 = $_POST["tournament1"];
									$tournament2 = $_POST["tournament2"];
									$league ="KASI PREMIER LEAGUE";
									$date = date("y-m-d");
									if(strlen($teamID) <= 4)
									{
										if(filter_var($email,FILTER_VALIDATE_EMAIL))
										{
											if(preg_match( "/^(\+27|0)[1-3][0-9]{8}$/",$landLine ))
											{
												if(preg_match("/^[a-zA-Z]*$/", $teamOwner))
												{
													
													$target_dir = "/teamLogo/";
													$target_file = $target_dir.basename($_FILES["logo"]["name"]);
													$uploadOK=1;
													$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));									
													
													$img_size =$_FILES["logo"]["size"];
													
													$img_tmp =$_FILES['logo']['tmp_name'];
													//allowing certain file size
													if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
													{
														echo '<script type="text/javascript"> alert("Sorry, only JPG,JPEG,PNG AND GIF files are allowed") </script>';
														$uploadOK = 0;
													}
													
													
													
													/*$img_name =$_FILES['logo']['name'];
													$img_size =$_FILES['logo']['size'];
													$img_tmp =$_FILES['logo']['tmp_name'];
													$directory = '/teamLogo/';
													$target_file = $directory.$img_name;*/
													
													
													

														$query= "select * from team WHERE teamName='$teamName' AND teamOwner ='$teamOwner'";
														$query_run = mysqli_query($con,$query);

														if(mysqli_num_rows($query_run)>0)
														{
															// there is already a user with the same username
															echo '<script type="text/javascript"> alert("Team already exists.. Register another team Name") </script>';
														}
														else if(file_exists($target_file))
														{
															echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
															$uploadOK = 0;
														}
														else if($img_size>2097152)
														{
															echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
														}
														else
														{
															move_uploaded_file($img_tmp,$target_file); 	
													
															$insert= "insert into team values('$target_file','$teamID','$teamName','$teamOwner','$email','$landLine','$league','$tournament1','$tournament2','$date')";
															$query_Insert = mysqli_query($con,$insert);

													
															if($query_Insert)
															{
																echo '<script type="text/javascript"> alert("TEAM INSERTED SUCCESSFULLY ") </script>';
																
																$played=0;
																$win=0;
																$draw=0;
																$lose=0;
																$goals_for=0;
																$goals_against=0;
																$goals_diff=0;
																$points=0;
																
																$insert_L= "insert into league values('$teamID', '$played', '$win', '$draw', '$lose', '$goals_for', '$goals_against', '$goals_diff','$points')";
																$query_Insert_L = mysqli_query($con,$insert_L);
																
																
																if($query_Insert_L)
																{
																	echo '<script type="text/javascript"> alert("TEAM INSERTED SUCCESSFULLY IN LEAGUE ") </script>';
																	
																	
																	if($tournament2 != 'None')
																	{
																		$g_played=0;
																		$g_status='';
																		$g_goals=0;
																		
																		
																		$insert_T2= "insert into top8 values('$teamID', '$teamName', '$g_played', '$g_status', '$g_goals')";
																		$query_Insert_T2 = mysqli_query($con,$insert_T2);		
																		
																		if($query_Insert_T2)
																		{
																			echo '<script type="text/javascript"> alert("TEAM INSERTED SUCCESSFULLY IN Kazi Tournament ") </script>';
																		}else{
																			echo '<script type="text/javascript"> alert("Error! Kazi Tournament insert ") </script>';
																		}											
																		
																	}
																	else{
																		echo '<script type="text/javascript"> alert("You only joined the league") </script>';
																	}
																	
																	
																	if($tournament1 != 'None')
																	{
																		$game_played=0;
																		$status='';
																		$goals=0;
																		
																		
																		$insert_T1= "insert into knockout values('$teamID', '$game_played', '$status', '$goals')";
																		$query_Insert_T1 = mysqli_query($con,$insert_T1);
																		
																		if($query_Insert_T1)
																		{
																			echo '<script type="text/javascript"> alert("TEAM INSERTED SUCCESSFULLY IN knockout ") </script>';
																		}else{
																			echo '<script type="text/javascript"> alert("Error! knockout Tournament insert ") </script>';
																		}
																	}
																	
																	
																		
																}else
																{
																	echo '<script type="text/javascript"> alert("Error! League insert ") </script>';
																}
															}
															else
															{
																echo '<script type="text/javascript"> alert("Error! Team insert") </script>';
															}
													
														}
													
												}else
												{
													echo  "<script>alert('Incoreect Name format');</script>";
												}
											}else{
												echo  "<script>alert('Incoreect landLine format');</script>";
											}
										}else{
											echo  "<script>alert('Incoreect email format');</script>";
										}
									}else{
										echo  "<script>alert('The team ID is too long');</script>";
									}
								}
								
							
							
							
							?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>