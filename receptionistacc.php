<?php 

    require_once("connection.php");

    if(isset($_POST['save_profile']))
    {
        $user_id= $_GET['user_id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type_of_user = $_POST['type_of_user'];
        $email = $_POST['email'];
        $num = $_POST['num'];

        $query = " UPDATE users SET name = '".$name."', username = '".$username."', password= '".$password."', type_of_user = '".$type_of_user."', email = '".$email."', num = '".$num."' where user_id= '".$user_id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo "<script>alert('Successfully Save your profile!'); window.location='receptionistdashboard.php'</script>";
        }
        else
        {
            echo "<script>alert('An error occured please try again !!!'); window.location='receptionistdashboard.php'</script>";
        }
    }
    else
    {
        echo "<script>window.location='receptionistdashboard.php'</script>";
    }


?>