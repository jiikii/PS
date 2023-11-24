<?php 
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function addStaff(){
        global $con;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        
        $query = $con->prepare("call sp_registerUser(?,?,?,?)");
        $query->bind_param('ssss',$username,$email,$password,$role);
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


    function getStaff(){
        global $con;
        $query = $con->prepare("SELECT * FROM user WHERE role != 1");
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function deleteStaff(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("DELETE FROM user where user_id = ?");
        $query->bind_param('i',$id);
        $query->execute();
        $query->close();
        $con->close();
    }

    function getStaffById(){
        global $con;
        $id = $_POST['id'];
        $query = $con->prepare("SELECT * FROM user where user_id = ?");
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

    function updateStaff(){
        global $con;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $id = $_POST['id'];

        $query = $con->prepare("UPDATE user set username = ?, email = ?, role = ?  where user_id = ?");
        $query->bind_param('sssi',$username,$email,$role,$id);
        $query->execute();
        echo 1;
        $query->close();
        $con->close();
    }

?>