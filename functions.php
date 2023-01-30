<?php

require("connection.php");

function getUsersData($id)
{
    $array = array();
    $q = mysqli_query("SELECT * FROM users WHERE user_id =" .$id);

    while ($row = mysqli_fetch_assoc($q)) {
        
        $array['user_id'] = $row['user_id'];
        $array['unique_id'] = $row['unique_id'];
        $array['temp_id'] = $row['temp_id'];
        $array['name'] = $row['name'];
        $array['username'] = $row['username'];
        $array['type_of_user'] = $row['type_of_user'];
        $array['email'] = $row['email'];
        $array['num'] = $row['num'];

    }

    return $array;
}

function getID($username)
{
    $q = mysqli_query("SELECT id FROM users WHERE username = '".$username."'");

    while ($row = mysqli_fetch_assoc($q)) {
        
        return $row['user_id'];
    }
}