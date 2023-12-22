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
    <link rel="stylesheet" href="../../style/patientAppointment.css">
    <link rel="stylesheet" href="../../style/patientCinfo.css">
    <title>Councilor's Info</title>
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

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="dashboard fs-2 m-0">Councilor's Information</h2>
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

                <div class="content">

                    <div class="container">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-lg-4" v-for="c of councilors">
                                <div class="text-center card-box shadow">
                                    <div class="member-card pt-2 pb-2">
                                        <div class="thumb-lg member-thumb mx-auto"><img :src="'/ps/imgs/'+ c.profile" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                                        <div class="">
                                            <h4 class="text-capitalize">{{c.firstname}}, {{c.lastname}}</h4>
                                            <h4 class="text-capitalize">{{c.email}}</h4>
                                            <p class="text-muted">
                                                Councilor
                                            </p>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-primary col-7" href="../patient/patientAppointment.php" data-bs-toggle="modal" data-bs-target="#setAppoint" @click="getUsername(c.user_id)">View Profile</a>
                                            <a class="btn btn-primary col-7" :href="'../chat/chatroom.php?id=' +c.user_id" >Message</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="setAppoint" tabindex="-1" aria-labelledby="setAppointLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="setAppointLabel">Councilor Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" v-for="s of selectedCouncilors">
                                            <div class="form">
                                                <div class="d-flex justify-content-center">
                                                    <img :src="'/ps/imgs/'+ s.profile" class="rounded-circle img-fluid border" style="height: 300px;" alt="profile-image"><br>
                                                </div>
                                                Firstname: {{!s.firstname ? 'None' :s.firstname}}<br>
                                                Lastname: {{!s.lastname ? 'None':s.lastname}}<br>
                                                Username: {{s.username}}<br>
                                                Email: {{s.email}}<br>
                                                Phone Number: {{s.phoneNumber}}<br>
                                                Location: {{s.location}}<br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Okay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="../../assets/js/axios.js"></script>
        <script src="../../assets/js/vue.3.js"></script>
        <script src="../../assets/js/patient.js"></script>
        <script>
            var el = document.getElementById("wrapper")
            var toggleButton = document.getElementById("menu-toggle")

            toggleButton.onclick = function() {
                el.classList.toggle("toggled")
            }
        </script>
</body>

</html>