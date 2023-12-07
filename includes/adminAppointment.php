<?php
include "config.php";

$method = $_POST['method'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo 'Function not exists';
}

function getAppointments()
{
    global $con;
    $query = $con->prepare("SELECT * FROM `appointment` ORDER BY `created` DESC");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function addMentalInformation()
{
    global $con;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/PS/imgs/";
    $images = '';
    if (isset($_FILES['file']['name'])) {

        $finalfile = $location .$_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $finalfile)) {
            $images = $_FILES['file']['name'];
        }
    }
    
    $description = $_POST['description'];
    $query = $con->prepare("INSERT INTO `mentalinfo`(`img`, `descript`) VALUES (?,?)");
    $query->bind_param('ss', $images, $description);
    $query->execute();
    $result = $query->get_result();
    if (!$result) {
        echo 1;
        $query->close();
        $con->close();
    } else {
        echo 2;
        $query->close();
        $con->close();
    }
}

function deleteMentalInfo()
{
    global $con;
    
    $id = $_POST['id'];
    $query = $con->prepare("DELETE FROM `mentalinfo` WHERE `mentid` = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    if (!$result) {
        echo 1;
        $query->close();
        $con->close();
    } else {
        echo 2;
        $query->close();
        $con->close();
    }
}

function getMentalInformation()
{
    global $con;
    $query = $con->prepare("SELECT * FROM `mentalinfo`");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
