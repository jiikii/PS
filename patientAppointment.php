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
    <link rel="stylesheet" href="../../style/patientAppt.css">
    <title>Appointment</title>
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

                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="formbold-main-wrapper d-flex justify-content-center align-items-center vh-80">
                                    <div class="form">
                                        <div class="formbold-mb-5  ">
                                            <label for="name" class="formbold-form-label">Name</label>
                                            <input type="name" v-model="name" placeholder="Name" class="formbold-form-input" />
                                        </div>

                                        <div class="flex flex-wrap formbold--mx-3">
                                            <div class="w-full sm:w-half formbold-px-3">
                                                <div class="formbold-mb-5 w-full">
                                                    <label for="date" class="formbold-form-label"> Date </label>
                                                    <input type="date" name="date" id="date" class="formbold-form-input" v-model="date" />
                                                </div>
                                            </div>
                                            <div class="w-full sm:w-half formbold-px-3">
                                                <div class="formbold-mb-5">
                                                    <label for="time" class="formbold-form-label"> Time </label>
                                                    <input type="time" name="time" id="time" class="formbold-form-input" v-model="time" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="formbold-mb-5">
                                            <label for="name" class="formbold-form-label">Councilor</label>
                                            <input type="text" v-model="councilor" placeholder="Councilor" class="formbold-form-input" />
                                        </div>

                                        <div class="formbold-mb-5">
                                            <label for="name" class="formbold-form-label">Type</label>
                                            <select v-model="type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="F2F">Face To Face</option>
                                                <option value="Meet">Virtual Meeting</option>
                                            </select>
                                        </div>

                                        <div class="formbold-mb-5">
                                            <label for="name" class="formbold-form-label">Reason</label>
                                            <textarea v-model="reason" cols="30" rows="5" class="form-control"></textarea>
                                        </div>

                                        <div>
                                            <button class="formbold-btn" type="button" @click="saveBooking">Book Appointment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/patient.js"></script>
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