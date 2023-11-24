<?php 
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function addProduct(){
        global $con;

        $pname = $_POST['pname'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $day = $_POST['day'];
        

        
        $query = $con->prepare("call sp_addProduct(?,?,?,?)");
        $query->bind_param('siis',$pname,$quantity,$price,$day);
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

    function getProduct(){
        global $con;
        $query = $con->prepare("SELECT * FROM tbl_product");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function deleteProduct(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("DELETE FROM tbl_product where id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $query->close();
        $con->close();
    }

    function getProductById(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("SELECT * FROM tbl_product where id = ?");
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

    function updateProduct(){
        global $con;

        $pname = $_POST['pname'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE tbl_product set pname = ?, quantity = ?, price = ? where id = ?");
        $query->bind_param('siii',$pname,$quantity,$price,$id);
        $query->execute();
        echo 1;
        $query->close();
        $con->close();
    }

    function searchUsers(){
        global $con;
        $query = $con->prepare(" SELECT * FROM tbl_product ");
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