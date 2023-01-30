<?php

    require_once("connection.php");
    
        if(isset($_GET['Del']))
                 {
                     $consult_id = $_GET['Del'];
                     $query = "Delete from consultation where consult_id = '".$consult_id."'";
                     $result = mysqli_query($con,$query);
                     if($result)
                     {
                         echo "<script>alert('Successfully deleted an Appointment!'); window.location='appointment.php'</script>";
                     }
                     else
                     {
                         echo "<script>alert('An Error occured please try again!'); window.location='appointment.php'</script>";
                     }
                }
                 else
                 {
                     echo "<script>alert('Successfully update an Appointment!'); window.location='appointment.php'</script>";
                 }
?>
