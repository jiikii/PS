<?php 
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function getChartProduct(){
        global $con;
        $query = $con->prepare("call sp_chartProduct()");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function getChartProductReceived(){
        global $con;
        $query = $con->prepare("call sp_chartProductReceived()");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }
?>