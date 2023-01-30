<?php

    require_once("connection.php");
    
        if(isset($_GET['Del']))
                 {
                     $consult_id = $_GET['Del'];
                     $query = "Delete from consultation where consult_id = '".$consult_id."'";
                     $result = mysqli_query($con,$query);
                     if($result)
                     {
                         echo "<script>alert('Successfully deleted a consultation record!'); window.location='petinfo.php'</script>";
                     }
                     else
                     {
                         echo "<script>alert('An Error occured please try again!'); window.location='petinfo.php'</script>";
                     }
                }
                 else
                 {
                     echo "<script>alert('Successfully update an Appointment!'); window.location='petinfo.php'</script>";
                 }
?>
