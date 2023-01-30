<?php 

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $app_id= $_GET['app_id'];
        $owner_name = $_POST['owner_name'];
        $appointment_time = $_POST['appointment_time'];
        $appointment_date = $_POST['appoinment_date'];
        $email_address = $_POST['email_address'];
        $provincial_Add = $_POST['provincial_Add'];
        $contact_num = $_POST['contact_num'];
        $pet_name = $_POST['pet_name'];
        $reason_of_appointment = $_POST['reason_of_appointment'];
        $status_sched = $_POST['status_sched'];
        $other_reasons = $_POST['other_reasons'];

        $query = " UPDATE appointment SET owner_name = '".$owner_name."', appointment_time = '".$appointment_time."', appoinment_date= '".$appointment_date."', email_address = '".$email_address."', provincial_Add = '".$provincial_Add."', contact_num = '".$contact_num."', pet_name = '".$pet_name."', reason_of_appointment = '".$reason_of_appointment."', status_sched = '".$status_sched."', other_reasons = '".$other_reasons."' where app_id= '".$app_id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo "<script>alert('Successfully update an Appointment!'); window.location='Recepappointment.php'</script>";
        }
        else
        {
            echo "<script>alert('An error occured please try again !!!'); window.location='Recepappointment.php'</script>";
        }
    }
    else
    {
        echo "<script>window.location='Recepappointment.php'</script>";
    }


?>