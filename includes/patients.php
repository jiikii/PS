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

function bookedAppointment()
{
    global $con;

    $id = $_SESSION['user_id'];

    $query = $con->prepare(bookedAppointmentQuery());
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
    return "SELECT `apptid`, `patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `status`, `type`, `created`, `updated` FROM `appointment` WHERE `patient_id` = ?";
}

function cancelAppointmentQuery()
{
    return "UPDATE `appointment` SET `status`= 5 WHERE `apptid` = ?";
}
