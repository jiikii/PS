<?php
include "config.php";
session_start();
$method = $_POST['method'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo 'Function not exists';
}

function getAppointments()
{
    global $con;
    $query = $con->prepare("SELECT a.*, u.firstname, u.lastname FROM `appointment` AS a INNER JOIN `user` AS u ON a.patient_id = u.user_id ORDER BY `created` DESC");
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function getAppointmentsCoun()
{
    global $con;

    $name = $_SESSION['user_name'];

    $query = $con->prepare("SELECT a.*, u.firstname, u.lastname FROM `appointment` AS a INNER JOIN `user` AS u ON a.patient_id = u.user_id WHERE a.councilor = ? ORDER BY `created` DESC");
    $query->bind_param('s', $name);
    $query->execute();
    $result = $query->get_result();
    $data = array();
    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function accept()
{
    global $con;

    $name = $_POST['id'];

    $query = $con->prepare("UPDATE `appointment` SET `status` = 2 WHERE `apptid` = ?");
    $query->bind_param('i', $name);
    $query->execute();
    $result = $query->get_result();
    echo 1;
}
function decline()
{
    global $con;

    $name = $_POST['id'];

    $query = $con->prepare("UPDATE `appointment` SET `status` = 3 WHERE `apptid` = ?");
    $query->bind_param('i', $name);
    $query->execute();
    $result = $query->get_result();
    echo 1;
}
function delete()
{
    global $con;

    $name = $_POST['id'];

    $query = $con->prepare("DELETE FROM `appointment` WHERE `apptid` = ?");
    $query->bind_param('i', $name);
    $query->execute();
    $result = $query->get_result();
    echo 1;
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
    $treatm = $_POST['treatm'];
    $query = $con->prepare("INSERT INTO `mentalinfo`(`img`, `descript`, `treatment`) VALUES (?,?,?)");
    $query->bind_param('sss', $images, $description, $treatm);
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
