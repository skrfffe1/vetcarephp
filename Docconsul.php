<?php
	include('security.php');
	require_once("connection.php");

	$user = $_SESSION['type_of_user'];
	$query2 = " select * from users where password = '$user'";
	$result2 = mysqli_query($con,$query2);

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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
						  <a class="nav-link text-white " href="DoctorDashboard.php">
						    
						      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fa fa-cubes"></i>
						      </div>
						    
						    <span class="nav-link-text ms-1">Dashboard</span>
						  </a>
						</li>

						<li class="nav-item">
						  <a class="nav-link text-white " href="https://skrfffe1-vetcare-main-h328ip.streamlit.app">
						    
						      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fas fa-dna"></i>
						      </div>
						    
						    <span class="nav-link-text ms-1">Pre-Assessment</span>
						  </a>
						</li>

						<li class="nav-item">
						  <a class="nav-link text-white " href="Docconsul.php">
						    
						      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
						        <i class="fas fa-user-md"></i>
						      </div>
						    
						    <span class="nav-link-text ms-1">Consultation</span>
						  </a>
						</li>


						<li class="nav-item">
						  <a class="nav-link text-white " href="Docpetinfo.php">
						    
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
                    ?>
              <a class="nav-link text-white " href="Docaccusers.php?GetID=<?php echo $user_id ?>">
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

		      <h6 class="font-weight-bolder mb-0">Doctor Consultation</h6>
		      
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
			            <div class="h-100">
			            		<form action="consul_back.php" method="post">
									
									<h5 class="font-weight-bolder mb-0 text-center">Consultation Form</h5>
									
									<br>
								  <!-- 2 column grid layout with text inputs for the first and last names -->
								  <div class="row mb-4">
								    <div class="col">
								      <div class="form-outline">
								        <input type="text" id="ownername" name="owner_name" class="form-control" value="" required />
								        <label class="form-label" for="form6Example1">Owner Name</label>
								      </div>
								    </div>
								    <div class="col">
								      <div class="form-outline">
								        <input onkeyup="GetDetail(this.value)" type="text" id="user_id" name="unique_id" class="form-control" value="" required />
								        <label class="form-label" for="form6Example2">ID Code</label>
								      </div>
								    </div>
								  </div>

								  <!-- Text input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="examination" id="examination" rows="3" value="" required></textarea>
								    <label class="form-label" for="form6Example3">Examination</label>
								  </div>

								  <!-- Text input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control"  name="test" id="test" rows="3" value="" required></textarea>
								    <label class="form-label" for="form6Example4">Test</label>
								  </div>

								  <!-- Email input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="d_diagnosis" id="dd" rows="3" value="" required></textarea>
								    <label class="form-label" for="form6Example5">Differential Diagnosis</label>
								  </div>

								  <!-- Number input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control" name="c_diagnosis" id="cd" rows="3" value="" required></textarea>
								    <label class="form-label" for="form6Example6">Consult Diagnosis</label>
								  </div>

								  <!-- Message input -->
								  <div class="form-outline mb-4">
								    <textarea class="form-control"  name="treatment" id="treatment" rows="4" value="" required></textarea>
								    <label class="form-label" for="form6Example7">Treatment</label>
								  </div>

								  <!-- Submit button -->
								  <button type="submit" name="confirm_data" class="btn btn-primary btn-block mb-4" id="btn1" onclick="return confirm('Do you want to confirm consultation?')">Confirm Consultation</button>
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

		<script>

				function GetDetail(str){
							if (str.length == 0) {
								document.getElementById("ownername").value = "";
								document.getElementById("test").value = "";
								document.getElementById("examination").value = "";
								document.getElementById("dd").value = "";
								document.getElementById("cd").value = "";
								document.getElementById("treatment").value = "";
								return;
							}
							else{
				
								// Creates a new XMLHttpRequest object
								var xmlhttp = new XMLHttpRequest();
								xmlhttp.onreadystatechange = function () {
				
									// Defines a function to be called when
									// the readyState property changes
									if (this.readyState == 4 && 
											this.status == 200) {
										
										// Typical action to be performed
										// when the document is ready
										var myObj = JSON.parse(this.responseText);
				
										// Returns the response data as a
										// string and store this array in
										// a variable assign the value 
										// received to first name input field
										
										document.getElementById
										("ownername").value = myObj[0];
										
										// Assign the value received to
										// last name input field
										document.getElementById
										("examination").value = myObj[1];

										document.getElementById
										("dd").value = myObj[2];

										document.getElementById
										("cd").value = myObj[3];

										document.getElementById
										("test").value = myObj[4];

										document.getElementById
										("treatment").value = myObj[5];
									}
								};
				
								// xhttp.open("GET", "filename", true);
								xmlhttp.open("GET", "request.php?unique_id=" + str, true);
								
								// Sends the request to the server
								xmlhttp.send();
							}
				}


		</script>


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
		.text-right{
			width: 2000px;
		}
		#btn1{
			margin-left: 750px;
		}
		.form-label{
			color: black;
		}
</style>
