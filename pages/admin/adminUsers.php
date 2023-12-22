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
  <title>Users & Councilors</title>
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
          <h2 class="dashboard fs-2 m-0">Users & Councilors</h2>
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


      <div id="addStaff-app">
        <section>
          <div class="container">
            <div class="secondbg">
              <hr>
              <div class="container bg-light" style="height: 610px; overflow-y: scroll">
                <div class="featuredTitle p-4">
                  <div class="text d-flex justify-content-between">
                    <h2 class="fw-bolder">Users & Councilors</h2>
                    <button class="btn btn-sm btn-primary px-5" data-bs-toggle="modal" data-bs-target="#addCoun">Add Councilor</button>
                    <div class="modal fade" id="addCoun" tabindex="-1" aria-labelledby="addCounLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addCounLabel">Add Councilor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form @submit="saveUser" class="userform">
                              <h3 class="text-center">Add Councilor</h3>
                              <div class="col mb-2">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                              </div>
                              <div class="col mb-2">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                              </div>
                              <div class="col mb-2">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <div class="col mb-2 visually-hidden">
                                <select name="role" class="form-control">
                                  <option value="3">Doctor(as Councilor)</option>
                                </select>
                              </div>
                              <div class="col mb-2">
                                <button class="float-end btn col-4 btn-md btn-info px-3">Register</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <hr>
                  <div>
                    <table class="table table-info">
                      <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>EMAIL</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <tr v-for="(user,index) in users">
                          <td>{{ 1 + index++ }}</td>
                          <td>{{ user.username }}</td>
                          <td>{{ user.email }}</td>
                          <td>{{ user.status == 1 ? 'Active' : 'Banned' }}</td>
                          <td>{{ user.role == 2 ? 'Patient' : 'Councilor'}}</td>

                          <td>
                            <button @click="getStaffById(user.id)" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-sm btn-warning mx-1">Edit</button>
                            <button @click="deleteStaff(user.id)" class="btn btn-sm btn-danger">delete</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <section>
                    <div class="modal" id="exampleModalToggle">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">


                          <div class="modal-header">
                            <h4 class="modal-title">UPDATE STAFF</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>


                          <div class="modal-body">
                            <form @submit="updateStaff" novalidate class="userform">
                              <div class="col mb-2">
                                <label>Username</label>
                                <input type="text" v-model="username" class="form-control" name="username" placeholder="Username">
                              </div>
                              <div class="col mb-2">
                                <label>Email</label>
                                <input type="text" v-model="email" class="form-control" name="email" placeholder="Email">
                              </div>
                              <div class="col mb-2 ">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                  <option value="0">Select Role</option>
                                  <option value="2">Patient</option>
                                  <option value="3">Counsilor</option>
                                </select>
                              </div>
                              <div class="mb-2">
                                <button type="submit" class="btnAdd btn btn-sm btn-success" data-bs-dismiss="modal">update</button>
                              </div>
                            </form>
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
    </div>

    </section>

    <!-- JS -->
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/adminStaff.js"></script>
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