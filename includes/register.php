<?php 
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function saveUser(){
        global $con;

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $ph = $_POST['ph'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];
        
        $query = $con->prepare("INSERT INTO user (`firstname`,`lastname`,`username`,`phoneNumber`, `email`, `password`, `role`) VALUES (?,?,?,?,?,?,?)");
        $query->bind_param('sssssss',$fname, $lname, $username,$ph,$email,$password,$role);

        $query->execute();

        $result = $query->get_result();

        if(!$result){
            echo 200;
        }else{
            echo $result;
        }
        $query->close();
        $con->close();

    }

?>