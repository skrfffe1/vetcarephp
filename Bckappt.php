<?php

    require_once("connection.php");
    
    if(isset($_POST['save']))
    {
        if(empty($_POST['Owner_Name']) || empty($_POST['Appoinment_Date']) || empty($_POST['Appointment_Time']) || empty($_POST['Email_address']) || empty($_POST['Provincial_Add']) || empty($_POST['Contact_num'])|| empty($_POST['Pet_Name'])|| empty($_POST['Reason_of_Appointment'])|| empty($_POST['Other_Reasons']))
        {
            echo ' Please Fill in the Blanks ';
            header("location: patientappointment.php");
        }
        else
        {

            $unique_id = $_POST['unique_id'];
            $temp_id = $_POST['unique_id'];
            $Owner_Name = $_POST['Owner_Name'];
            $Appoinment_Date = $_POST['Appoinment_Date'];
            $Appointment_Time = $_POST['Appointment_Time'];
            $Email_address = $_POST['Email_address'];
            $Provincial_Add = $_POST['Provincial_Add'];
            $Contact_num = $_POST['Contact_num'];
            $Pet_Name = $_POST['Pet_Name'];
            $Reason_of_Appointment = $_POST['Reason_of_Appointment'];
            $Status_sched = $_POST['Status_sched'];
            $Other_Reasons = $_POST['Other_Reasons'];

            $query = " INSERT INTO appointment (unique_id, temp_id, Owner_Name, Appoinment_Date, Appointment_Time, Email_address, Provincial_Add, Contact_num, Pet_Name, Reason_of_Appointment, Status_sched, Other_Reasons) values('$unique_id', '$temp_id', '$Owner_Name','$Appoinment_Date','$Appointment_Time', '$Email_address', '$Provincial_Add', '$Contact_num', '$Pet_Name', '$Reason_of_Appointment', '$Status_sched', '$Other_Reasons')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<script>alert('Successfully Save an Appointment!'); window.location='patientappointment.php'</script>";
            }
            else
            {
                echo "<script>alert('An Error occured. Please try Again!'); window.location='patientappointnment.php'</script>";
            }
        }
    }
    else
    {
        header("location: patientdashboard.php");
    }



?>