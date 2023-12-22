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
  <link rel="stylesheet" href="../../style/adminUsers.css">
  <title>Admin Medical Info</title>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- sidebar starts -->

    <div class="background" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 secondary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-hands-helping"></i>M.H COMPANION
      </div>
      <div class="list-group list-group-flush my-3">
        <a href="adminDashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fab fa-hire-a-helper me-2"></i>Dashboard
        </a>
        <a href="adminAppointmentInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-table-list me-2"></i>Appointments
        </a>
        <a href="adminUsers.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-users me-2"></i>Users & Councilors
        </a>
        
        <a href="adminMedicalInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-book-open me-2"></i>Mental Disorder Info
        </a>
      </div>
    </div>

    <!-- sidebar ends -->

    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="dashboard fs-2 m-0">Mental Disorder Information</h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i>Admin
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <li><a href="../../index.php" class="dropdown-item">logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>


      <div id="page-wrapper">
        <section>
          <div class="container">
            <div class="secondbg">
              <div class="container">
                <div class="featuredTitle p-4">
                  <hr>
                  <div class="buttons pt-2">
                    <button class="btn btn-info px-4 text-dark mb-5" data-bs-toggle="modal" data-bs-target="#myModal">ADD </button>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-12 col-lg-3">
                        <div class="col mt-2 mb-3">
                          <input type="search" v-model="searchForMentalInformation" class="form-control" placeholder="Search...">
                        </div>
                      </div>
                    </div>
                    <table class="table table-info">
                      <thead>
                        <th>ID</th>
                        <th>PICTURE</th>
                        <th>DESCRIPTION</th>
                        <th>TREATMENT</th>
                        <th>DATETIME</th>
                        <th>ACTION</th>
                      </thead>
                      <tbody>
                        <tr v-for="me in searchForMental">
                          <td>{{ me.mentid }}</td>
                          <td><img :src="'../../imgs/' + me.img" alt="" width="70" class="rounded"></td>
                          <td>{{ me.descript }}</td>
                          <td>{{ me.treatment }}</td>
                          <td>{{ me.datecreated }}</td>
                          <td>
                            <button @click="deleteMentalInfo(me.mentid)" class="btn btn-sm btn-danger px-5">Delete</button>
                            <button @click="getStaffById(user.id)" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-sm btn-warning mx-1">Edit</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <section>
                    <div class="modal" id="myModal">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">


                          <div class="modal-header">
                            <h4 class="modal-title">ADD INFORMATION</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>


                          <div class="modal-body">
                            <div>
                              <div class="mb-2">
                                <label>Mental Images</label>
                                <input type="file" class="form-control" id="file" name="file"/>
                              </div>
                              <div class="mb-2">
                                <label>Treatment</label>
                                <input type="text" class="form-control" v-model="treatm" id="file" name="file"/>
                              </div>
                              <div class="mb-2">
                                <label>Description</label>
                                <textarea v-model="descript" cols="30" rows="3" class="form-control"></textarea>
                              </div>
                              <div class="mb-2">
                                <button type="button" class="btnAdd btn btn-sm btn-primary" @click="addMentalInformation">Add</button>
                              </div>
                            </div>
                          </div>


                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      </section>


      <!-- JS -->

      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script src="/PS/assets/js/axios.js"></script>
      <script src="/PS/assets/js/vue.3.js"></script>
      <script src="/PS/assets/js/admin.js"></script>

      <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function() {
          el.classList.toggle("toggled")
        }
      </script>
</body>

</html>