<?php

    require_once("connection.php");

    $length = 7;
    $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $generated_id = substr(str_shuffle($str), 0, $length); 

    if(isset($_POST['submit']))
    {
        if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['type_of_user']))
        {
            echo "<script>alert('Invalid Password. Please try Again!'); window.location='register.php'</script>";
        }
        else
        {
            $unique_id = $generated_id;
            $temp_id = $generated_id;
            $name = $_POST['name'];
            $username = $_POST['username'];
            $type_of_user = $_POST['type_of_user'];
            $password = $_POST['password'];

            $query = " insert into users (unique_id, temp_id, name, username, type_of_user, password) values('$unique_id','$temp_id', '$name','$username', '$type_of_user', '$password')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo "<script>alert('You have Succesfully Created an Account!'); window.location='login.php'</script>";
            }
            else
            {
                echo "<script>alert('An Error occured. Please try Again!'); window.location='login.php'</script>";
            }
        }
    }
    else
    {
        header("location:login.php");
    }



?>