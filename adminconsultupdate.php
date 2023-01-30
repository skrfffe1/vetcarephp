<?php
	include('security.php');
	require_once("connection.php");

		$query = " select consult_id, p_name, l_name, examination, test, d_diagnosis, c_diagnosis, treatment from consultation";
    $result = mysqli_query($con,$query);

  $user = $_SESSION['type_of_user'];
  $query2 = " select * from users where password = '$user'";


  $result2 = mysqli_query($con,$query2);

  $consult_id = $_GET['GetID'];
  $query = " select * from consultation where consult_id='".$consult_id."'";
  $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
        {
            $consult_id= $row['consult_id'];
            $p_name = $row['p_name'];
            $l_name = $row['l_name'];
            $examination = $row['examination'];
            $test = $row['test'];
            $d_diagnosis = $row['d_diagnosis'];
            $c_diagnosis = $row['c_diagnosis'];
            $treatment = $row['treatment'];
        }


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
				  <a class="nav-link text-white " href="dashboard.php">
				    
				      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				        <i class="fa fa-cubes"></i>
				      </div>
				    
				    <span class="nav-link-text ms-1">Dashboard</span>
				  </a>
				</li>

				<li class="nav-item">
				  <a class="nav-link text-white " href="appointment.php">
				    
				      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				        <i class="fa fa-heartbeat"></i>
				      </div>
				    
				    <span class="nav-link-text ms-1">Appointment</span>
				  </a>
				</li>

				<li class="nav-item">
				  <a class="nav-link text-white " href="assessment.php">
				    
				      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				        <i class="fas fa-dna"></i>
				      </div>
				    
				    <span class="nav-link-text ms-1">Pre-Assessment</span>
				  </a>
				</li>

				<li class="nav-item">
				  <a class="nav-link text-white " href="consultation.php">
				    
				      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				        <i class="fas fa-user-md"></i>
				      </div>
				    
				    <span class="nav-link-text ms-1">Consultation</span>
				  </a>
				</li>

				<li class="nav-item">
				  <a class="nav-link text-white " href="Petinfo.php">
				    
				      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
				        <i class="fas fa-feather"></i>
				      </div>
				    
				    <span class="nav-link-text ms-1">Pet Information</span>
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
				              <a class="nav-link text-white " href="accusers.php?GetID=<?php echo $user_id ?>">
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

		      <h6 class="font-weight-bolder mb-0">Admin Consultation</h6>
		      
		    </nav>
		</div>
	</nav>
</main>


<div class="container-fluid px-2 px-md-4" style="margin-left: 300px;width: 1100px;">
			      <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
			        <span class="mask  bg-gradient-primary  opacity-6" ></span>
			      </div>
			      <div class="card card-body mx-3 mx-md-4 mt-n6">
			        <div class="row gx-4 mb-2">
			          <div class="col-auto">
			          </div>
			          <div class="col-auto my-auto">
			            <div class="h-100" id="form">
			            	<form action="adminconsulupdate_back.php?consult_id=<?php echo $consult_id ?>" method="post">
									<h5 class="font-weight-bolder mb-0 text-center">Consultation Form</h5>
									<br>
								  <!-- 2 column grid layout with text inputs for the first and last names -->
								  <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								        <input type="text" id="accin" name="p_name" class="form-control" value="<?php echo $p_name?>"  />
								        <label class="form-label" for="form6Example1">Pet name</label>
								      </div>
								    </div>
								    <div class="col">
								      <div class="form-outline">
								        <input type="text" id="accin" name="l_name" class="form-control" value="<?php echo $l_name?>" />
								        <label class="form-label" for="form6Example2">Last name</label>
								      </div>
								    </div>
								  </div>

								  <!-- Text input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="examination" id="accin" rows="3"><?php echo $examination?></textarea>
								    <label class="form-label" for="form6Example3">Examination</label>
								  </div>

								  <!-- Text input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control"  name="test" id="accin" rows="3"><?php echo $test?></textarea>
								    <label class="form-label" for="form6Example4">Test</label>
								  </div>

								  <!-- Email input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="d_diagnosis" id="accin" rows="3"><?php echo $d_diagnosis?></textarea>
								    <label class="form-label" for="form6Example5">Differential Diagnosis</label>
								  </div>

								  <!-- Number input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="c_diagnosis" id="accin" rows="3"><?php echo $c_diagnosis?></textarea>
								    <label class="form-label" for="form6Example6">Consult Diagnosis</label>
								  </div>

								  <!-- Message input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control"  name="treatment" id="accin" rows="4"><?php echo $treatment?></textarea>
								    <label class="form-label" for="form6Example7">Treatment</label>
								  </div>


								  <button type="submit" name="update_data" class="btn btn-primary btn-block mb-4" id="btn1" onclick="return confirm('Do you want to Update consultation?')">Update Consultation</button>
								  <!-- Submit button -->
							</form>

			            </div>
			          </div>
			          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
			            <div class="nav-wrapper position-relative end-0">



			            	
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>



<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>




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


<style>
	body{
		overflow: auto;
	}
		.form-control{
			background-color: rgb(230, 230, 230, .8);
			color: black;
		}
		.form-control:focus {
		  	background-color: rgb(230, 230, 230, .7);
			color: black;
		}
		.labels{
			color: black;
		}
		#accin{
			background-color: rgb(230, 230, 230, .8);
			color: black;
			padding-left: 5px;
		}
		#accin option{
			color: black;
		}
		.text-right{
			width: 2000px;
		}
		#btn1{
			margin-left: 780px;
		}
		.form-label{
			color: black;
		}

</style>
