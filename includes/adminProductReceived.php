<?php 
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function addProductReceived(){
        global $con;

        $supplier = $_POST['supplier'];
        $productn = $_POST['productn'];
        $quant = $_POST['quant'];
        $rprice = $_POST['rprice'];
        $dayAdd = $_POST['day_add'];
        

        
        $query = $con->prepare("call sp_addProductReceived(?,?,?,?,?)");
        $query->bind_param('ssiis',$supplier,$productn,$quant,$rprice,$dayAdd);
        $query->execute();
        $result = $query->get_result();
        $data = "";
        while($row = $result->fetch_array())
        {
            $data = $row[0];
        }
        echo $data;
        $query->close();
        $con->close();
    }

    function getProductReceived(){
        global $con;
        $query = $con->prepare("SELECT * FROM tbl_product_received");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function deleteProductReceived(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("DELETE FROM tbl_product_received where id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $query->close();
        $con->close();
    }

    function getProductReceivedById(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("SELECT * FROM tbl_product_received where id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function updateProductReceived(){
        global $con;

        $supplier = $_POST['supplier'];
        $productn = $_POST['productn'];
        $quant = $_POST['quant'];
        $rprice = $_POST['rprice'];
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE tbl_product_received set supplier = ?, productn = ?, quant = ?, rprice = ?  where id = ?");
        $query->bind_param('ssiii',$supplier,$productn,$quant,$rprice,$id);
        $query->execute();
        echo 1;
        $query->close();
        $con->close();
    }

    function searchUsers(){
        global $con;
        $query = $con->prepare(" SELECT * FROM tbl_product_received ");
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