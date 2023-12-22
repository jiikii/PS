<?php
include '../../includes/config.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../../assets/js/json2.js"></script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
    <link rel="stylesheet" href="../../style/style1.css" media="screen">
    <link rel="stylesheet" href="../../style/adminDashboard.css">


    <title>Patient Dashboard</title>
</head>

<body>
    <div id="patient-user">

        <div class="d-flex" id="wrapper">

            <!-- sidebar starts -->

            <div class="background" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 secondary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-hands-helping"></i>M.H COMPANION
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="PatientDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fab fa-hire-a-helper me-2"></i>Dashboard
                    </a>
                    <a href="PatientAppointment.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-table-list me-2"></i>Book Appointment
                    </a>
                    <a href="patientRecord.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-bookmark me-2"></i>Appointment Record
                    </a>
                    <a href="patientCinfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-info-circle me-2"></i>Councilor's Info
                    </a>
                    <a href="../chat/chats.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-comments me-2"></i>Chat Consultation
                    </a>
                    <a href="patientMedicalInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-book-open me-2"></i>Medical Info
                    </a>
                </div>
            </div>

            <!-- sidebar ends -->

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="dashboard fs-2 m-0">Book Appointment</h2>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Patient
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="patientProfile.php" class="dropdown-item">profile</a></li>
                                    <li><a href="#" class="dropdown-item">settings</a></li>
                                    <li><a href="../../index.php" class="dropdown-item">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="d-flex justify-content-center align-items-center my-auto">
                        <div id="calendar" style="max-width: 1260px; width: 100%; max-height: 600px; height: 100%" class="bg-light text-dark p-3 shadow rounded"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/vendors/theme.js"></script>
    <script src="../../assets/vendors/fullcalendar.js"></script>
    <script src="../../assets/vendors/moment.js"></script>
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/patient.js"></script>
</body>

</html>