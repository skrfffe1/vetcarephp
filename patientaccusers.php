<?php
	include('security.php');
	require_once("connection.php");

  $user = $_SESSION['type_of_user'];
  $query2 = " select * from users where password = '$user'";


  $result2 = mysqli_query($con,$query2);

  $user_id = $_GET['GetID'];
  $query = "select * from users where user_id='".$user_id."'";
  $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
        {
            $user_id= $row['user_id'];
            $name = $row['name'];
            $username = $row['username'];
            $password = $row['password'];
            $type_of_user = $row['type_of_user'];
            $email = $row['email'];
            $num = $row['num'];
        }

    $user3 = $_SESSION['type_of_user'];
	$query6 = " select user_id from users where password = '$user3'";
	$result6 = mysqli_query($con,$query6);

	while($row=mysqli_fetch_assoc($result6))
	{
		$user_id3= $row['user_id'];
	}

    $sql_get = mysqli_query($con, "Select * from notification where status = 0 and to_id = $user_id3");
    $count = mysqli_num_rows($sql_get);

?>
<!DOCTYPE html>
<html lang="en">
  <head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Vetcare Pet Clinic Dashboard</title>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
<link rel="stylesheet" href="css/Style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/Style1.css">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link id="pagestyle" href="./assets/css/Material-dashboard.css?v=3.0.4" rel="stylesheet" />

		</head>
		  <body class="g-sidenav-show  bg-gray-100">
		     <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">



		  <div class="sidenav-header">
		    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		    <a class="navbar-brand m-0">
		      <span class="fas fa-paw" id="logo" style="color: white; text-align: center;"></span>

		      <span class="ms-1 font-weight-bold text-white" id="namelogo">Vetcare</span>

		      <span class="ms-1 font-weight-bold text-white" id="namelogo2">Pet Clinic</span>

		    </a>
		  </div>
		  <hr class="horizontal light mt-0 mb-2">
		  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
		    <ul class="navbar-nav">
		      
		             
						  
						<li class="nav-item">
						  <a class="nav-link text-white " href="PatientDashboard.php">
						    
						      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fa fa-cubes"></i>
						      </div>
						    
						    <span class="nav-link-text ms-1">Dashboard</span>
						  </a>
						</li>

						<li class="nav-item">
						  <a class="nav-link text-white " href="patientappointment.php">
						    
						      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fa fa-heartbeat"></i>
						      </div>
						    
						    <span class="nav-link-text ms-1">Appointment</span>
						  </a>
						</li>

				            <li class="nav-item">
				              <?php                       
				                         while($row=mysqli_fetch_assoc($result2))
				                            {
				                                $user_id= $row['user_id'];
				                                $name = $row['name'];
				                                $username = $row['username'];
				                                $password = $row['password'];
				                                $type_of_user = $row['type_of_user'];
				                                $email = $row['email'];
				                                $num = $row['num'];
				                    ?>
				              <a class="nav-link text-white " href="patientaccusers.php?GetID=<?php echo $user_id ?>">
				                <?php 
				                         }  
				                    ?> 
				                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				                    <i class="fas fa-user-nurse"></i>
				                  </div>
				                  
				                
				                <span class="nav-link-text ms-1">Account Users</span>
				              </a>
				            </li>


						<li class="nav-item nav-link text-white ">
							<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fa fa-spinner"></i>
						      </div>
	
						  <form action="Logbck.php" method="POST"> 
							      <button type="submit" name="logout_btn" style="background-color: transparent; border-color: transparent; color: white;margin-left: -5px;">Logout</button>
							</form>
						</li>


			</ul>
			</div>
		 </aside>

		     <main class="main-content border-radius-lg ">
        <!-- Navbar -->

			<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
			  <div class="container-fluid py-1 px-3">
			    <nav aria-label="breadcrumb">

			      <h6 class="font-weight-bolder mb-0">Account Details</h6>
			      
			    </nav>

			    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

			      <div class="ms-md-auto pe-md-3 d-flex align-items-center">

			      </div>
			      <ul class="navbar-nav  justify-content-end">
			        <li class="nav-item d-flex align-items-center">

		<li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='far fa-bell' style='font-size:20px'></i>
            <span class="badge badge-danger" id="count" style="border-radius: 50%; background-color: red; font-size: 8px;
            position: relative; top: -10px; left: -10px"><?php echo $count; ?></span>
          </a>

          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
                  <div class="d-flex flex-column justify-content-center">
                    
                    <?php
                    	$user = $_SESSION['type_of_user'];
					    $query5 = " select user_id from users where password = '$user'";
					    $result5 = mysqli_query($con,$query5);

					    while($row=mysqli_fetch_assoc($result5))
				        {
				            $user_id= $row['user_id'];
				        }

    					$sql_get1 = mysqli_query($con, "Select notification.messages from notification where notification.status=0 and notification.to_id = $user_id ");

                    	if(mysqli_num_rows($sql_get1)>0)
                    	{
                    		while ($result3 = mysqli_fetch_assoc($sql_get1))
                    		{
                    			echo '<a class="dropdown-item text-danger" id="details" href="#">'.$result3['messages'].'</a>';
                    			echo '<div class="dropwdown-divider"></div>';
                    		}
                    	}
                    	else
                    	{
                    		echo '<span style="color: red;"> Sorry no messages !!!</span>';
                    	}

                      ?>
                  </div>
            </li>
          </ul>
        </li>



			        </li>

			      </ul>
			    </div>
			  </div>
			</nav>


			<div class="container-fluid px-2 px-md-4" style="width: 1100px;">
			      <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
			        <span class="mask  bg-gradient-primary  opacity-6" ></span>
			      </div>
			      <div class="card card-body mx-3 mx-md-4 mt-n6">
			        <div class="row gx-4 mb-2">
			          <div class="col-auto">
			          </div>
			          <div class="col-auto my-auto">
			            <div class="h-100">
			              <div class="container rounded bg-white mt-5 mb-5">
			    <div class="row">
			        <div class="col-md border-right">
			            <div class="d-flex flex-column align-items-center text-center p-1 py-3"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $name?></span><span class="text-black-50"><?php echo $email?></span><span> </span></div>
			        </div>

			        <div class="col-md-5 border-right" style="margin-right: 150px;">
			            <div class="p-3 py-5">
			            	<form action="patientacc.php?user_id=<?php echo $user_id ?>" method="POST">
			                <div class="d-flex justify-content-between align-items-center mb-3">
			                    <h4 class="text-right">Account Details</h4>
			                </div>
			                <div class="row mt-2">
			                    <div class="col-md-6"><label class="labels">Name</label>
			                    	<input type="text" class="form-control" id="accin" placeholder="" name="name" value="<?php echo $name?>">
			                    </div>

			                    <div class="col-md-6"><label class="labels">Username</label><input type="text" name="username" id="accin" class="form-control" value="<?php echo $username?>" placeholder=""></div>
			                </div>
			                <div class="row mt-3">
			                	<div class="col-md-12"><label class="labels">Contact Number:</label><input type="text" name="num" id="accin" class="form-control" placeholder="" value="<?php echo $num?>"></div>
			                	<div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" id="accin" class="form-control" placeholder="" value="<?php echo $email?>"></div>
			                    <div class="col-md-12"><label class="labels">Password</label><input type="text" name="password" id="accin" class="form-control" placeholder="" value="<?php echo $password?>"></div>
			                    <div class="col-md-12"><label class="labels">Type of user</label>

			                    <select id="accin" name="type_of_user" class="form-control" placeholder="" name="type_of_user" value="<?php echo $type_of_user?>" style = "background-color: rgb(230, 230, 230, .7);">
                                <option value="" disabled>Select Type of users</option>
                                <option value="Patient">Patient</option>
                            </select>


			                   </div>

			                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="save_profile" onclick="return confirm('Do you want to save your profile?')">Save Profile</button></div>
			            </div>
			        </form>
			        </div>
			    </div>

			</div>
			</div>

			            </div>
			          </div>
			          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
			            <div class="nav-wrapper position-relative end-0">






		<!--   Core JS Files   -->
		<script src="./assets/js/core/popper.min.js" ></script>
		<script src="./assets/js/core/bootstrap.min.js" ></script>
		<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
		<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>


			</main>

		<script>
		  var win = navigator.platform.indexOf('Win') > -1;
		  if (win && document.querySelector('#sidenav-scrollbar')) {
		    var options = {
		      damping: '0.5'
		    }
		    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		  }
		</script>

		<!-- Github buttons -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>


		<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
		  </body>
		</html>


<style type="text/css">
			body{
		overflow: auto;
		}
		.form-control{
			background-color: rgb(230, 230, 230, .7);
			color: black;
		}
		.form-control:focus {
		  border-color: #FF0000;
		  color: white;
		}
		.labels{
			color: black;
		}
		#accin{
			padding-left: 5px;
		}
		#accin option{
			color: black;
		}
		#details{
			width: 300px;
			white-space: nowrap;
		  	overflow: hidden;
		  	text-overflow: ellipsis;
		}
</style>