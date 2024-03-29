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
    <link rel="stylesheet" href="../../style/adminAppointmentInfo.css">
    <title>Patient Info</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- sidebar starts -->

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

        <!-- sidebar ends -->

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="dashboard fs-2 m-0">Patient Info</h2>
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
                                <li><a href="../../index.php" class="dropdown-item">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="mt-5 mx-5"></div>
            <main class="content" id="appointmentCoun">
                <section class="ftco-section">
                    <div class="container bg-light">
                        <div class="row">
                            <div class="col-md-12 border p-5">
                                <h4 class="mb-4">List of Patient</h4>
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th class="text-center fw-bold">Reference</th>
                                            <th class="text-center fw-bold">Username</th>
                                            <th class="text-center fw-bold">Status</th>
                                            <th class="text-center fw-bold">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(ap, index) of appointments">
                                            <th class="text-center" class="fw-bold">{{1+index++}}</th>
                                            <td class="text-center" class="text-capitalize">{{ap.name}}</td>
                                            <td class="text-center">{{ap.status == 2 ? 'Booked': ap.status == 1 ? 'Pending' : 'Decline'}}</td>
                                            <td class="text-center">
                                                <a :href="'../chat/chatroom.php?id='+ap.patient_id" class="me-1 btn btn-primary btn-sm text-white">Message</a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#sendtodolist" @click="getPiD(ap.patient_id)" class="me-1 btn btn-primary btn-sm text-white">Send To Do List</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="sendtodolist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">To Do List</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row mb-3">
                                                    <label class="col-lg-12 col-form-label form-label" for="fullname"> To Do's  <span class="text-danger"> * </span>:</label>
                                                    <div class="col-lg-12">
                                                        <textarea class="form-control" id="message" name="message" rows="4" v-model="description" placeholder="Enter Description todo"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" @click="descriptionGet" class="btn btn-primary">Send Todo's</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
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