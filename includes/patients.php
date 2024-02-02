<?php
include "config.php";
session_start();
$method = $_POST['method'];
if (function_exists($method)) {
    call_user_func($method);
} else {
    echo 'Function not exists';
}

function saveBooking()
{
    global $con;

    $id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];
    $councilor = $_POST['councilor'];
    $type = $_POST['type'];

    $query = $con->prepare(saveBookingQuery());
    $query->bind_param('issssss', $id, $name, $date, $time, $reason, $councilor, $type);

    $query->execute();

    $result = $query->get_result();

    if (!$result) {
        echo 200;
    } else {
        echo $result;
    }
    $query->close();
    $con->close();
}

function getMyId()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare(getMyIdQuery());
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $query->close();
    $con->close();
}

function bookedAppointment()
{
    global $con;

    $query = $con->prepare(bookedAppointmentQuery());
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $query->close();
    $con->close();
}

function bookedAppointmentAll()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare(bookedAppointmentAllQuery());
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $query->close();
    $con->close();
}

function councillor()
{
    global $con;

    $query = $con->prepare(councillorQuery());
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $query->close();
    $con->close();
}

function mentalInfo()
{
    global $con;

    $query = $con->prepare(mentalInfoQuery());
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $query->close();
    $con->close();
}

function getPatientToDo()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare('SELECT u_councilor.username as ucouncilor, u_patient.username as upatient, t.description, t.status, t.created_at, t.updated_at, t.todo_id FROM `todos` as t INNER JOIN `user` as u_councilor ON t.councilor_id = u_councilor.user_id INNER JOIN `user` as u_patient ON t.patient_id = u_patient.user_id WHERE u_patient.user_id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    $data = array();

    while ($row = $result->fetch_array()) {
        $data[] = $row;
    }

    echo json_encode($data);
}


function donetodocheck()
{
    global $con;

    $id = $_POST['id'];

    $query = $con->prepare('UPDATE `todos` SET `status`= 1 WHERE `todo_id` = ?');
    $query->bind_param('i', $id);
    $query->execute();

    $result = $query->get_result();

    if (!$result) {
        echo 200;
    } else {
        echo $result;
    }
    
    $query->close();
    $con->close();
}

function cancelAppointment()
{
    global $con;

    $id = $_POST['id'];

    $query = $con->prepare(cancelAppointmentQuery());
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();

    if (!$result) {
        echo 200;
    } else {
        echo $result;
    }

    $query->close();
    $con->close();
}

//Queries
function saveBookingQuery()
{
    return "INSERT INTO `appointment`(`patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `type`) VALUES (?,?,?,?,?,?,?)";
}

function bookedAppointmentQuery()
{
    return "SELECT `apptid`, `patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `status`, `type`, `created`, `updated` FROM `appointment` WHERE `status` != 5";
}

function bookedAppointmentAllQuery()
{
    return "SELECT `apptid`, `patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `status`, `type`, `created`, `updated` FROM `appointment` WHERE `patient_id` = ?";
}

function cancelAppointmentQuery()
{
    return "UPDATE `appointment` SET `status`= 5 WHERE `apptid` = ?";
}

function getMyIdQuery()
{
    return "SELECT user_id FROM user WHERE user_id = ?";
}

function councillorQuery()
{
    return "SELECT * FROM `user` WHERE `role` = 3";
}

function mentalInfoQuery()
{
    return "SELECT * FROM `mentalinfo`";
}
