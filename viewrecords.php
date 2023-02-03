<?php 
  include('security.php');
  require_once("connection.php");

  $queryEachConsult = "SELECT * FROM consultation";
  $injectAboveQuery = mysqli_query($con, $queryEachConsult);

  $unique_id = $_GET['GetID'];
  $query = "SELECT * FROM consultation WHERE unique_id = '".$unique_id."'";
  $result = mysqli_query($con, $query);

  $display = $_GET['GetID'];
  $querydisplay = "SELECT * FROM consultation WHERE unique_id = '".$unique_id."'";
  $displayUserInfo = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($displayUserInfo)) {
    $displayName = $row['owner_name'];
    $displayUserCode = $row['unique_id'];
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
    $('#table1').DataTable({
      paging: false,
      searching: false
    });

});
</script>


</head>
  <body class="g-sidenav-show  bg-gray-100">

  
      <main class="main-content border-radius-lg ">
        
        <!-- Navbar -->

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
                  <h6 class="font-weight-bolder mb-0 text-center">Consultation Records</h6>
                  <table id="table1" class="table-dark table-sm table-bordered " style="text-align: center;">
                  <div class="row">
                        <div class="col">
                            <h6> Name: <?= $displayName ?>  ID: <?= $displayUserCode ?></h6>
                            <h6></h6> 
                        </div>
                        <div class="col">
                            
                        </div>
                  </div>
                
                      <thead >
                        
                          <tr>
                            <th scope="col" class="A-act">Exam. Date</th>
                            <th scope="col" class="A-act" id="A-act1">Action</th>
                          </tr>
                      </thead>
                     <?php                       
                         while($row=mysqli_fetch_assoc($result))
                            {   
                              $consult_id = $row['consult_id'];
                              $owner_name= $row['owner_name'];
                              $unique_id = $row['unique_id'];
                              $exam_date = $row['exam_date'];                     
                    ?>
                <tr class="table table-dark table-striped table-sm table-bordered" style="color: black;">
                   
                   
                    <td><?php echo $exam_date ?></td>
                    <td><a class="btn btn-xs btn-info" href="docviewconsult.php?GetID=<?php echo $unique_id ?>">View Data</a>
                        <a class="btn btn-xs btn-warning" href="docconsultupdate.php?GetID=<?php echo $unique_id ?>">Update</a>
                    </td>         
                    
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
      damping: '0.5',

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
