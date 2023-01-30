<?php

    require_once("connection.php");

    if(isset($_POST['confirm_data']))
    {
        if(empty($_POST['p_name']) || empty($_POST['l_name']) || empty($_POST['examination']) || empty($_POST['test']) || empty($_POST['d_diagnosis']) || empty($_POST['c_diagnosis']) || empty($_POST['treatment']))
        {
            echo ' Please Fill in the Blanks ';
            header("location: Petinfo.php");
        }
        else
        {
            $p_name = $_POST['p_name'];
            $l_name = $_POST['l_name'];
            $examination = $_POST['examination'];
            $test = $_POST['test'];
            $d_diagnosis = $_POST['d_diagnosis'];
            $c_diagnosis = $_POST['c_diagnosis'];
            $treatment = $_POST['treatment'];

            $query = "insert into consultation (p_name, l_name, examination, test, d_diagnosis, c_diagnosis, treatment) values('$p_name','$l_name','$examination', '$test', '$d_diagnosis', '$c_diagnosis', '$treatment')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<script>alert('Successfully Confirmed a consultation!'); window.location='Petinfo.php'</script>";
            }
            else
            {
                echo "<script>alert('An Error occured. Please try Again!'); window.location='Petinfo.php'</script>";
            }
        }
    }
    else
    {
        header("location: Petinfo.php");
    }



?>