<?php
session_start();
include "connection.php";

if(!$_SESSION['type_of_user'])
{
    header('Location: login.php');
}

?>