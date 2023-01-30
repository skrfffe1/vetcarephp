<?php 

    require_once("connection.php");

    if(isset($_POST['update_data']))
    {
        $consult_id= $_GET['consult_id'];
        $p_name = $_POST['p_name'];
        $l_name = $_POST['l_name'];
        $examination = $_POST['examination'];
        $test = $_POST['test'];
        $d_diagnosis = $_POST['d_diagnosis'];
        $c_diagnosis = $_POST['c_diagnosis'];
        $treatment = $_POST['treatment'];


        $query = " UPDATE consultation SET p_name = '".$p_name."', l_name = '".$l_name."', examination= '".$examination."', test = '".$test."', d_diagnosis = '".$d_diagnosis."', c_diagnosis = '".$c_diagnosis."', treatment = '".$treatment."' where consult_id= '".$consult_id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo "<script>alert('Successfully update a Consultation!'); window.location='Petinfo.php'</script>";
        }
        else
        {
            echo "<script>alert('An error occured please try again !!!'); window.location='Petinfo.php'</script>";
        }
    }
    else
    {
        echo "<script>window.location='Petinfo.php'</script>";
    }


?>