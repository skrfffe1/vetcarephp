<?php

    $request_id = $_REQUEST['unique_id'];

    if ($request_id !== "") {
       
        $checkUserExistence = "SELECT * FROM consultation WHERE unique_id = '$request_id'";
        $query = mysqli_query($con, $checkUserExistence);	
        
        while ($row = mysqli_fetch_assoc($query)) {
            
            $ownerName = $row["owner_name"];
            $examination = $row["examination"];	
            $d_diagnosis = $row["d_diagnosis"];
            $c_diagnosis = $row['c_diagnosis'];
            $test = $row["test"];
            $treatment = $row['treatment'];

        }

        $result = array("$ownerName", "$examination", "$ddiagnosis", "$d_diagnosis", "$c_diagnosis", "$test", "$treatment");

        $myJSON = json_encode($result);
        echo $myJSON;
       
    }

?>
