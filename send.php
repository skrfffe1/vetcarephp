<?php

    require_once("connection.php");

    if(isset($_POST['send']))
    {
        if(empty($_POST['to_id']) || empty($_POST['messages']))
        {
            echo ' Please Fill in the Blanks ';
            header("location: Docpetinfo.php");
        }
        else
        {
            $to_id = $_POST['to_id'];
            $messages = $_POST['messages'];


            $query = "insert into notification (to_id, messages) values('$to_id','$messages')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<script>alert('Successfully Send a Message!'); window.location='Recepappointment.php'</script>";
            }
            else
            {
                echo "<script>alert('An Error occured. Please try Again!'); window.location='Recepappointment.php'</script>";
            }
        }
    }
    else
    {
        header("location: Recepappointment.php");
    }



?>