<?php
session_start();

if ($_SESSION['role'] == 2) {
    header('location: patient/patientDashboard.php');
}else if($_SESSION['role'] == 1){
    header('location: admin/index.php');
}
?>