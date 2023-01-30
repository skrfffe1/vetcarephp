<?php 
  include('security.php');
  require_once("connection.php");

  $us = "SELECT unique_id FROM users WHERE username = '".$_SESSION['username']."'";
	$uq_query = mysqli_query($con, $us);

	while($row=mysqli_fetch_assoc($uq_query))
	{
		$uuid= $row['unique_id'];
	}

  $query = "SELECT * FROM appointment WHERE unique_id = '$uuid' ";
  $result = mysqli_query($con,$query);

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
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style1.css"type="text/css" media="all">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link id="pagestyle" href="./assets/css/Material-dashboard.css?v=3.0.4" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script type="text/javascript">
  $(document).ready(function () {
    $('#table1').DataTable();
});
</script>


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
                                $user_id= $row['unique_id'];
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

      <h6 class="font-weight-bolder mb-0">Patient Appointment</h6>
      
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
<!-- End Navbar -->

<!-- Start of dashboard coding-->

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
                    
      
        <div class="row ">
                <div class="col-lg">
                  <h6 class="font-weight-bolder mb-0 text-center">Appointment Records</h6>
                  <table id="table1" class="table-dark table-sm table-bordered " style="text-align: center;">
                          <thead >
                            <tr>
                              <th scope="col" class="A-own">Owner Name</th>
                              <th scope="col" class="A-cont">Contact Number</th>
                              <th scope="col" class="A-act">Status</th>
                              <th scope="col" class="A-act">Action</th>
                            </tr>
                            </thead>
                     <?php                       
                         while($row=mysqli_fetch_assoc($result))
                            {
                                $app_id= $row['unique_id'];
                                $Owner_Name = $row['owner_name'];
                                $Contact_num = $row['contact_num'];
                                $Status_sched = $row['status_sched'];
                    ?>

                <tr class="table table-dark table-striped table-sm table-bordered" style="color: black;">
                    <td><?php echo $Owner_Name ?></td>
                    <td><?php echo $Contact_num ?></td>
                    <td><?php echo $Status_sched ?></td>
                    <td><a class="btn btn-xs btn-info" href="Patientviewpage.php?GetID=<?php echo $app_id ?>">View Data</a></td>


                </tr> 
                    <?php 
                         }  
                    ?> 
      </table>



                </div>
            </div>
</div>

                  </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                  <div class="nav-wrapper position-relative end-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>

</main>

<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>




<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>



<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc --><script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
  </body>
</html>

<style>
    body{
      overflow: auto;
  }
  #table1{
    margin-left: 0px;
    width: 950px;
  }
  #table1 th{
    width: 10%;
  }
  table tr{
    font-size: 15px;
  }
      #details{
      width: 300px;
      white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
  #table1_length select{
    width: 60px;
  }
</style>
