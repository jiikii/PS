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
    <link rel="stylesheet" href="../../style/patientRecord.css">
    <title>Records</title>
</head>

<body>
    <div id="patient-user">
        <div class="d-flex" id="wrapper">
            <div class="background" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 secondary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-hands-helping"></i>M.H COMPANION
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="PatientDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-gauge me-2"></i>Dashboard
                    </a>
                    <a href="PatientAppointment.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-house me-2"></i>Book Appointment
                    </a>
                    <a href="patientRecord.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-table-list me-2"></i>Appointment Record
                    </a>
                    <a href="patientCinfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-paw me-2"></i>Councilor's Info
                    </a>
                    <a href="patientChat.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-users me-2"></i>Chat Consultation
                    </a>
                    <a href="patientMedicalInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-users me-2"></i>Medical Info
                    </a>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="dashboard fs-2 m-0">Appointment Records</h2>
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
                                    <li><a href="#" class="dropdown-item">profile</a></li>
                                    <li><a href="#" class="dropdown-item">settings</a></li>
                                    <li><a href="../../index.php" class="dropdown-item">logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="mt-5 mx-5"></div>
                <main class="content">
                    <section class="ftco-section">
                        <div class="container bg-light">
                            <div class="row">
                                <div class="col-md-12 border p-5">
                                    <h4 class="mb-4">List of Appointments</h4>
                                    <table class="table border">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">Reference Id</th>
                                                <th class="fw-bold">Appointment Schedule</th>
                                                <th class="fw-bold">Reason</th>
                                                <th class="fw-bold">Request Councilor</th>
                                                <th class="fw-bold">Type</th>
                                                <th class="fw-bold">Status</th>
                                                <th class="fw-bold">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="ap of bookedAppointments">
                                                <th class="fw-bold">{{ ap.apptid }}</th>
                                                <td>{{ StringDate(ap.dateappt) }} - {{ StringTime(ap.timeappt) }}</td>
                                                <td>{{ ap.reason }}</td>
                                                <td>{{ ap.councilor }}</td>
                                                <td>{{ ap.type }}</td>
                                                <td>{{ ap.status == 1 ? 'Pending' : ap.status == 2 ? 'Booked' : ap.status == 3 ? 'Decline' : 'Cancelled' }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" @click="selectedBooked(ap.apptid)" data-bs-target="#exampleModal">Cancel Appointment</a>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered text-dark">
                                                            <div class="modal-content" v-for="sba of SelectedBookedAppointments">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure want to cancel this appointment?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" @click="cancel(sba.apptid)">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/patient.js"></script>
=======




>>>>>>> 724d5d4288a8ad9e982e3e9695bb8897e7ba0428
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function() {
            el.classList.toggle("toggled")
        }
    </script>
</body>

</html>