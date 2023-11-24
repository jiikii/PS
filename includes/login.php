<?php
    session_start();
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function login(){
        global $con;

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = $con->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $query->bind_param('ss',$email,$password);
        $query->execute();
        $result = $query->get_result();
        $id = '';
        $role = '';

        while($row = $result->fetch_array()){
            $id = $row['user_id'];
            $role = $row['role'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
        }

        
        $query->close();
        $con->close();

        if($role == 1){
            echo 1;
        }else if($role == 2){
            echo 2;
        }else if($role == 3){
            echo 3;
        }else{
            echo 400;
        }
    }

?>






