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

    $query = $con->prepare("SELECT a.*, u.firstname, u.lastname FROM `appointment` AS a INNER JOIN `user` AS u ON a.patient_id = u.user_id WHERE a.councilor = ? AND a.status != 10 ORDER BY `created` DESC");
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

    $id = $_POST['id'];
    $query = $con->prepare("UPDATE `appointment` SET `status` = 10 WHERE `apptid` = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    echo 1;
}


function descriptionGet()
{
    global $con;

    $description = $_POST['description'];
    $id = $_SESSION['user_id'];
    $pid = $_POST['pid'];

    $query = $con->prepare('INSERT INTO `todos`(`councilor_id`, `patient_id`, `description`) VALUES (?,?,?)');
    $query->bind_param('iis', $id, $pid, $description);

    $query->execute();
    $result = $query->get_result();

    if(!$result){
        echo 200;
    }else{
        echo 400;
    }
    
    $query->close();
    $con->close();

}

function history()
{
    global $con;

    $query = $con->prepare("SELECT a.*, u.firstname, u.lastname, u.username FROM `appointment` AS a INNER JOIN `user` AS u ON a.patient_id = u.user_id WHERE a.status = 10 ORDER BY `created` DESC");

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

        $finalfile = $location . $_FILES['file']['name'];
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

function getCouncilorToDo()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare('SELECT u_councilor.username as ucouncilor, u_patient.username as upatient, t.description, t.status, t.created_at, t.updated_at, t.todo_id FROM `todos` as t INNER JOIN `user` as u_councilor ON t.councilor_id = u_councilor.user_id INNER JOIN `user` as u_patient ON t.patient_id = u_patient.user_id WHERE u_councilor.user_id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    echo json_encode($data);
}


function returnCouncilorUsername()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare('SELECT username FROM user WHERE user_id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $data = null;

    while ($row = $result->fetch_array()) {
        $data = $row['username'];
    }

    echo $data;
}
