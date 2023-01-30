<?php

    require_once("connection.php");

    if(isset($_POST['confirm_data']))
    {
        if(empty($_POST['owner_name']) || empty($_POST['unique_id']) || empty($_POST['examination']) || empty($_POST['test']) || empty($_POST['d_diagnosis']) || empty($_POST['c_diagnosis']) || empty($_POST['treatment']))
        {
            echo ' Please Fill in the Blanks ';
            header("location: Docpetinfo.php");
        }
        else
        {   
            $unique_id = $_POST['unique_id'];
            $owner_name = $_POST['owner_name'];
            $examination = $_POST['examination'];
            $test = $_POST['test']; 
            $d_diagnosis = $_POST['d_diagnosis'];
            $c_diagnosis = $_POST['c_diagnosis'];
            $treatment = $_POST['treatment'];

            $query = "INSERT INTO consultation (unique_id, owner_name, examination, test, d_diagnosis, c_diagnosis, treatment) values('$unique_id','$owner_name','$examination', '$test', '$d_diagnosis', '$c_diagnosis', '$treatment')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<script>alert('Successfully Confirmed a consultation!'); window.location='Docpetinfo.php'</script>";
            }
            else
            {
                echo "<script>alert('An Error occured. Please try Again!'); window.location='Docpetinfo.php'</script>";
            }
        }
    }
    else
    {
        header("location: Docpetinfo.php");
    }



?>