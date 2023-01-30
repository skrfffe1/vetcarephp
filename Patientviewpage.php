<?php 
  include('security.php');
  require_once("connection.php");

  $user = $_SESSION['type_of_user'];
  $query2 = " select * from users where password = '$user'";


  $result2 = mysqli_query($con,$query2);

  $app_id = $_GET['GetID'];
  $query = " select * from appointment where app_id='".$app_id."'";
  $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
        {
            $app_id= $row['app_id'];
            $Owner_Name = $row['owner_name'];
            $appointment_time = $row['appointment_time'];
            $appointment_date = $row['appoinment_date'];
            $email_address = $row['email_address'];
            $provincial_Add = $row['provincial_Add'];
            $contact_num = $row['contact_num'];
            $pet_name = $row['pet_name'];
            $reason_of_appointment = $row['reason_of_appointment'];
            $status_sched = $row['status_sched'];
            $other_reasons = $row['other_reasons'];
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
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/Style1.css"type="text/css" media="all">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link id="pagestyle" href="./assets/css/Material-dashboard.css?v=3.0.4" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

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

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true ">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">

      <h6 class="font-weight-bolder mb-0">Patient Form Appointment</h6>
      
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
                    

<h6 class="font-weight-bolder mb-0 text-center">Appointment Records</h6>
    <div class="row">
      <div class="col-md">
        <div class="Patientviewinfo">
          <div class="legend"></div>
                    <div id="petstit1" class="far fa-user-circle"> Pet Owner's Information</div>
                        <div class="legend"></div>

                    <label for="Oname" class="Oname1">Owner's Name:</label>
                    <input readonly type="Text" id="Oname1" name="Owner_Name" placeholder="" value="<?php echo $Owner_Name?>" >

                    <label for="Date" class="AppDate1">Appoinment Date:</label>
                    <input readonly type="text" id="Date1" name="Appoinment_Date" value="<?php echo $appointment_date ?>"><br>

                    <span class="AppT1">Appointment Time:<input readonly type="text" class="apt1" name="Appointment_Time" value="<?php echo $appointment_time ?>"></span>

                    <label for="Eadd" class="Eadd1">Email Address:</label>
                    <input readonly type="Text" id="Eadd1" name="Email_address" value="<?php echo $email_address ?>" ><br>

                    <label for="Paddress" class="Padd1">Provincial Address:</label>
                    <input readonly type="Text" id="Paddress1" name="Provincial_Add" value="<?php echo $provincial_Add ?>"><br>

                    <label for="Cnum" class="Cnum1">Contact Number:</label>
                    <input readonly type="number" id="Cnum1" name="Contact_num" value="<?php echo $contact_num ?>"><br>

                    <div class="legend"></div>
                    <div id="petstit1" class="fas fa-paw"> Pets Information</div>
                    <div class="legend"></div>

                    <label for="Pname" class="Pname1">Pet's Name:</label>
                    <input readonly type="Text" id="Pname1" name="Pet_Name" value="<?php echo $pet_name ?>">

                    <label for="RoA"class="Roa1">Reason of Appointment:</label>
                    <input readonly type="Text" id="Roa1" name="reason_of_appointment" value="<?php echo $reason_of_appointment ?>"><br>

                  <label for="stat" class="stat1">Status: </label>
                  <input readonly type="Text" id="stat1" name="Status_sched" value="<?php echo $status_sched ?>"><br>

                    <label for="Number" class="Other1">Other Reasons:</label><br>
                    <textarea readonly name="Other_Reasons" id="Other1" rows="3" cols="120"><?php echo $other_reasons ?></textarea>

                    <a href="patientappointment.php" id="btnreturn" class="btn btn-secondary">Return</a>
        </div>
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
  <style type="text/css">
    body{
      overflow: auto;
    }
    .Patientviewinfo
    {
      width: 802px;
      background-color: #e6e6e6;
      margin-top: 20px;
      margin-left: 50px;
      margin-bottom: 20px;
    }
    .legend{
      margin-left: 1px;
    }
    #petstit1{
      margin-left: 15px;
      color: black;
      font-weight: bold;
    }
    .Oname1
    {
      margin-left: 20px;
      color: black;
      font-size: 13px;
    }
    #btnreturn{
      margin-left: 700px;
    }
    .AppDate1{
      color: black;
      font-size: 13px;
    }
    .AppT1{
      margin-left: 20px;
      color: black;
      font-size: 13px;
    }
    .Eadd1{
      color: black;
      font-size: 13px;
    }
    .Padd1{
      margin-left: 20px;
      color: black;
      font-size: 13px;
    }
    .Cnum1{
      margin-left: 20px;
      color: black;
      font-size: 13px;
    }
    .Pname1{
      margin-left: 20px;
      color: black;
      font-size: 13px;      
    }
    .Roa1{
      color: black;
      font-size: 13px; 
    }
    .stat1{
      margin-left: 20px;
      color: black;
      font-size: 13px; 
    }
    .Other1{
      margin-left: 20px;
      margin-top: 20px;
      color: black;
      font-size: 13px;       
    }
    #Oname1{
      font-size: 13px;
    }
    #Date1{
      font-size: 13px;
      width: 250px;
      margin-left: 10px;
      border: none;
    }
    #Oname1{
      width: 250px;
      margin-left: 30px;
      border: none;
    }
    .apt1{
      width: 250px;
      margin-left: 10px;
      margin-top: 12px;
      border: none;
    }
    #Eadd1{
      font-size: 13px;
      width: 250px;
      margin-left: 33px;
      border: none;
    }
    #Paddress1{
      width: 630px;
      margin-left: 10px;
      font-size: 13px;
      margin-top: 12px;
      border: none;
    }
    #Cnum1{
      width: 250px;
      margin-left: 20px;
      margin-top: 12px;
      font-size: 13px;
      border: none;
    }
    #Pname1{
      width: 250px;
      margin-left: 20px;
      margin-top: 12px;
      font-size: 13px;
      border: none;
    }
    #Roa1{
      width: 200px;
      margin-left: 15px;
      margin-top: 12px;
      font-size: 13px;
      border: none;
    }
    #stat1{
      width: 250px;
      margin-left: 50px;
      margin-top: 12px;
      font-size: 13px;
      border: none;
    }
    #Other1
    {
      font-size: 13px;
      margin-bottom: 20px;
      margin-left: 23px;
      border: none;
    }
        #details{
      width: 300px;
      white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
  </style>
</html>