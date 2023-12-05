
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style/patientProfile.css">
    <link rel="stylesheet" href="../../style/adminDashboard.css">
    <title>Patient Profile</title>
</head>
<body>

<div class="d-flex" id="wrapper">

<!-- sidebar starts -->

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


<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <br>
                      <p class="text-secondary mb-1">Patient</p>
                      <p class="text-muted font-size-sm">Cordova, Cebu City</p>
                      <div class="text-center"><a class="btn btn-primary"><input type="file" name="file"/></a></div>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
               
              </div>
            </div>
            
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      John Doe
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (320) 380-4539
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Cordova, Cebu city
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-15">
                    <div class="text-center"><a class="btn btn-primary" href="../patient/editProfile.php">Edit</a></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>
    
</body>
</html>