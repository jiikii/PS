<?php
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }


    function getTotalUser(){
        global $con;
        $query = $con->prepare("SELECT COUNT(*) AS result FROM user WHERE role != 1");
        $query->execute();
        $result = $query->get_result();
        $count = 0;

        while($row = $result->fetch_array())
        {
            $count = $row['result'];
        }
        echo $count;
    }

?>