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
    <link rel="stylesheet" href="../../style/adminDashboard.css">


    <title>Councilor Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <div class="background" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 secondary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-hands-helping"></i>M.H COMPANION
            </div>
            <div class="list-group list-group-flush my-3">

                <a href="councilorDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="	fab fa-hire-a-helper me-2"></i>Dashboard
                </a>
                <a href="counsilorPatient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-users me-2"></i>Patient
                </a>
                <a href="todolist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-table-list me-2"></i>To Do List
                </a>
                <a href="councilorAppoint.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-table-list me-2"></i>Appointment
                </a>
                <a href="../chat/chats.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comments me-2"></i>Chat Consultation
                </a>
                <a href="councilorMedicalInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-book-open me-2"></i>Medical Info
                </a>
                <a href="history.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-book-open me-2"></i>History
                </a>

            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="dashboard fs-2 m-0">Councilor History</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Councilor
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="councilorProfile.php" class="dropdown-item">profile</a></li>
                                <li><a href="#" class="dropdown-item">settings</a></li>
                                <li><a href="../../index.php" class="dropdown-item">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4" id="appointmentCoun">
                <section class="ftco-section">
                    <div class="container bg-light">
                        <div class="row">
                            <div class="col-md-12 border p-5">
                                <h4 class="mb-4">To Do List</h4>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="fw-bold">Reference ID</th>
                                            <th class="fw-bold">Patient Name</th>
                                            <th class="fw-bold">Councilor Name</th>
                                            <th class="fw-bold">Appointment Schedule</th>
                                            <th class="fw-bold">Reason</th>
                                            <th class="fw-bold">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(ap, index) of historys">
                                            <th class="fw-bold">{{1+index++}}</th>
                                            <td>{{ap.lastname}}, {{ap.firstname}}</td>
                                            <td>{{ap.name}}</td>
                                            <td>{{ap.dateappt}} : {{ap.timeappt}}</td>
                                            <td>{{ap.reason}}</td>
                                            <td>{{ap.type == 1 ? 'F2F' : 'Online Meet'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <script src="/PS/assets/js/axios.js"></script>
        <script src="/PS/assets/js/vue.3.js"></script>
        <script src="/PS/assets/js/counci.js"></script>
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