<?php
	include('security.php');
    require_once("connection.php");

	$us = "SELECT unique_id, temp_id FROM users WHERE username = '".$_SESSION['username']."'";
	$uq_query = mysqli_query($con, $us);

	while($row=mysqli_fetch_assoc($uq_query))
	{
		$uuid= $row['unique_id'];
		
	}

	$user = $_SESSION['type_of_user'];
    $query2 = " select * from users where password = '$user'";
    $result2 = mysqli_query($con,$query2);


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

			      <h6 class="font-weight-bolder mb-0">Patient Dashboard</h6>

			     
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
			              <h5 class="mb-1">
			                "ALL KINDS OF CARE FOR ALL KINDS OF PETS"
			              </h5>
			              <p class="mb-0 font-weight-normal text-sm">
			                 Paws-itively Pasionate About Pets 
			                 <span class="fas fa-paw"></span>
			              </p>
			            </div>
			          </div>
			          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
			            <div class="nav-wrapper position-relative end-0">




	 <div class="Add_Appoint d-flex justify-content-center" style="margin-top: 5px; margin-bottom: -25px; margin-left: 70px;">
                <button type="button" id="btnadd" class="btn btn-primary btn-block mb-4" data-bs-toggle="modal" data-bs-target="#Appointment_add">
              Create an Appointment
            </button>
      </div>
		<!-- Modal -->
		<div class="addlock2">
				  <div class="modal fade" id="Appointment_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				      <div class="modal-dialog modal-lg">
				        <div class="modal-content">
				          <div class="modal-header">
				            <h5 class="modal-title" id="exampleModalLabel">Appointment Form</h5>
				            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				          </div>
				          <div class="modal-body" style="background: rgb(217, 217, 217,.7); color: black; text-shadow: none;">

				          	<form action="Bckappt.php" method="post">
				                    <div id="petstit" class="far fa-user-circle"style="color: black;"> Pet Owner's Information</div>
				                <div class="legend"></div>

				            <label for="Oname" class="Oname" style="color: black;">Owner's Name:</label>
				            <input type="Text" id="Oname" name="Owner_Name" placeholder="Surname, First name, MI">

				            <label for="Date" class="ApDate"style="color: black;">Appoinment Date:</label>
				            <input type="date" id="Date" name="Appoinment_Date" style="width: 190px;"><br>

				            <span class="AppT"style="color: black;">Appointment Time:<input type="time" class="form-controlmb-2" placeholder="AppointmentTime" name="Appointment_Time"></span>

				            <label for="Eadd"style="color: black;">Email Address:</label>
				            <input type="Text" id="Eadd" name="Email_address"><br>

				            <label for="Paddress" class="Padd"style="color: black;">Provincial Address:</label>
				            <input type="Text" id="Paddress" name="Provincial_Add"><br>

				            <label for="Cnum" class="Cnum"style="color: black;">Contact Number:</label>
				            <input type="number" id="Cnum" name="Contact_num"><br>

							<input hidden type="text" name="unique_id" value="<?php echo $uuid ?>"><br>
							<input hidden type="text" name="temp_id" value="<?php echo $tempid ?>"><br>
							
				            <div class="legend"></div>
				            <div id="petstit" class="fas fa-paw"style="color: black;"> Pets Information</div>
				            <div class="legend"></div>

				            <label for="Pname" class="Pname"style="color: black;">Pet's Name:</label>
				            <input type="Text" id="Pname" name="Pet_Name" placeholder="Pet Name">

				            <label for="RoA" id="RoA"style="color: black;">Reason of Appointment:</label>
				            <select id="RoaSelect" name="Reason_of_Appointment" style="width: 150px;">
				                <option value="Vaccination">Vaccination</option>
				                <option value="Pet Surgery">Pet Surgery</option>
				                <option value="Consultation">Consultation</option>
				                <option value="Check Up">Check Up</option>
				            </select><br>
				       		<label for="stat" class="Pname"style="color: black;">Status: </label>
				            <select id="Statselect" name="Status_sched"
				            style="color: black;">
				                <option value="In Process" >In Process</option>
				            </select><br>
				            <label for="Number" class="Other"style="color: black;">Other Reasons:</label><br>
				            <textarea name="Other_Reasons" id="Other" rows="3" cols="100" placeholder="Enter Other Reasons "></textarea>
			

				          <div class="modal-footer">
				            <button type="button" class="btn btn-primary btn-block mb" data-bs-dismiss="modal">Close</button>
				            <button type="submit" name="save" class="btn btn-primary">Save Appointment</button>
				      
										          </div>

										  </form>
										</div>
									</div>
								</div>
							</div>
						</div>



			            </div>
			          </div>
			        </div>
			      </div>
			    </div>

			    			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" style="margin-left: 170px;margin-top: 50px; width: 400px;">
	          <div class="card">
	            <div class="card-header p-3 pt-2">
	              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
	                <i class="material-icons opacity-10">weekend</i>
	              </div>
	              <div class="text-end pt-1">
	                <p class="text-sm mb-0 text-capitalize">Total Appointments</p>
	                <h4 class="mb-0">
	                <?php
						require 'connection.php';

						$query = "SELECT app_id FROM appointment ORDER BY app_id";
						$query_run = mysqli_query($con, $query);

						$row = mysqli_num_rows($query_run);
						echo '<h3>'.$row.'</h3>';
					?>
	                </h4>
	              </div>
	            </div>
	            <hr class="dark horizontal my-0">
	            <div class="card-footer p-3">
	              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
	            </div>
	          </div>
	        </div>

			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" style="margin-left: 600px;margin-top: -155px; width: 400px;">
			          <div class="card">
			            <div class="card-header p-3 pt-2">
			              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
			                <i class="material-icons opacity-10">person</i>
			              </div>
			              <div class="text-end pt-1">
			                <p class="text-sm mb-0 text-capitalize">Total Users</p>
			                <h4 class="mb-0">
			                	<?php
									require 'connection.php';

									$query = "SELECT user_id FROM users ORDER BY user_id";
									$query_run = mysqli_query($con, $query);

									$row = mysqli_num_rows($query_run);
									echo '<h3>'.$row.'</h3>';
								?>
			                </h4>
			              </div>
			            </div>
			            <hr class="dark horizontal my-0">
			            <div class="card-footer p-3">
			              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
			            </div>
			          </div>
			        </div>


				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" style="margin-left: 390px;margin-top: 50px; width: 400px;">
				        <div class="card  mb-2">
				  <div class="card-header p-3 pt-2">
				    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
				      <i class="material-icons opacity-10">leaderboard</i>
				    </div>
				    <div class="text-end pt-1">
				      <p class="text-sm mb-0 text-capitalize">Today's Consultation</p>
				      <h4 class="mb-0">
				      	<?php
									require 'connection.php';

									$query = "SELECT consult_id FROM consultation ORDER BY consult_id";
									$query_run = mysqli_query($con, $query);

									$row = mysqli_num_rows($query_run);
									echo '<h3>'.$row.'</h3>';
								?>
				      </h4>
				    </div>
				  </div>

				  <hr class="dark horizontal my-0">
				  <div class="card-footer p-3">
				    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+25% </span>than last month</p>
				  </div>
				</div>
			</div>


</main>

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

<style type="text/css">
	#details{
			width: 300px;
			white-space: nowrap;
		  	overflow: hidden;
		  	text-overflow: ellipsis;
	}
</style>
