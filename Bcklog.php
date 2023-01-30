<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = " SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($con,$query);

        if ($row=mysqli_fetch_assoc($result)){
            if($row['password']==$password && $row['type_of_user']== "Admin")
            {
                    $_SESSION['type_of_user'] = $password;
                    header("location:Dashboard.php");
                    exit();
            }
            elseif($row['password']==$password && $row['type_of_user']== "Doctor")
            {
                $_SESSION['type_of_user'] = $password;
                header("location: DoctorDashboard.php");
                    exit();
            }
            elseif($row['password']==$password && $row['type_of_user']== "Receptionist")
            {
                $_SESSION['type_of_user'] = $password;
                header("location: ReceptionistDashboard.php");
                    exit();
            }
            elseif($row['password']==$password && $row['type_of_user']== "Patient")
            {
                $_SESSION['username'] = $username;
                $_SESSION['type_of_user'] = $password;
                header("location: PatientDashboard.php");
                    exit();
            }
                else
                    echo "<script>alert('Invalid Password. Please try Again!'); window.location='login.php'</script>";
                }
                else
                    echo "<script>alert('Invalid Username. Please try Again!'); window.location='login.php'</script>";
        }