<?php

    require_once("connection.php");
if(isset($_GET['Del']))
         {
             $ID = $_GET['Del'];
             $query = "Delete from app where id = '".$id."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                echo "<script>alert('Successfully delete an Appointment!'); window.location='appointment.php'</script>";
                 header("location:appointment.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:appointment.php");
         }
?>
