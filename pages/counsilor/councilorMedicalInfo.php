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
  <title>Councilor Medical Info</title>
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
        <a href="councilorAppoint.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-table-list me-2"></i>Appointment
        </a>
        <a href="../chat/chats.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-comments me-2"></i>Chat Consultation
        </a>
        <a href="councilorMedicalInfo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="fas fa-book-open me-2"></i>Medical Info
        </a>

      </div>
    </div>

    <!-- sidebar ends -->

    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="dashboard fs-2 m-0">Medical Informations</h2>
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


      <div id="product-app">
        <section>
          <div class="container">
            <div class="secondbg">
              <div class="container">
                <div class="featuredTitle p-4">
                  <!-- <div class="text">
                    <h2 class="fw-bolder">MENTAL DISORDER INFORMATION</h2>
                  </div> -->
                  <hr>
                  <div class="buttons pt-2">
                    <button class="btn btn-info px-4 text-dark mb-5" data-bs-toggle="modal" data-bs-target="#myModal">ADD </button>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-12 col-lg-3">
                        <div class="col mt-2 mb-3">
                          <input type="search" v-model="search" @input="searchUsers(search)" class="form-control" placeholder="Search...">
                        </div>
                      </div>
                    </div>
                    <table class="table table-info">
                      <thead>
                        <th>ID</th>
                        <th>PICTURE</th>
                        <th>DESCRIPTION</th>
                        <th>DATETIME</th>
                        <th>ACTION</th>
                      </thead>
                      <tbody>
                        <tr v-for="user in users">
                          <td>{{ mentid }}</td>
                          <td>{{ img }}</td>
                          <td>{{ descript }}</td>
                          <td>{{ user.dateInserted }}</td>
                          <td>
                            <button @click="getProductById(user.id)" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-sm btn-warning mx-1">Edit</button>
                            <button @click="deleteProduct(user.id)" class="btn btn-sm btn-danger">delete</button>
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
                            <h4 class="modal-title">ADD PRODUCT</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>


                          <div class="modal-body">
                            <form @submit="addProduct" class="userform">
                              <div class="mb-2">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="Product name" name="pname" />
                              </div>
                              <div class="mb-2">
                                <label>Quantity</label>
                                <input type="text" class="form-control" placeholder="Quantity" name="quantity" />
                              </div>
                              <div class="mb-3">
                                <label>Price</label>
                                <input type="text" class="form-control" placeholder="Price" name="price" />
                              </div>
                              <div class="mb-3">
                                <label>Day added</label><br>
                                <select class="form-control" name="day">
                                  <option selected disabled value="select">Select Day</option>
                                  <option value="monday">monday</option>
                                  <option value="tuesday">tuesday</option>
                                  <option value="wednesday">wednesday</option>
                                  <option value="thursday">thursday</option>
                                  <option value="friday">friday</option>
                                  <option value="saturday">saturday</option>
                                  <option value="sunday">sunday</option>
                                </select>
                              </div>
                              <div class="mb-2">
                                <button type="submit" class="btnAdd btn btn-sm btn-primary" data-bs-dismiss="modal">Add</button>
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

                  <section>
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">UPDATE PRODUCT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form @submit="updateProduct" novalidate class="userform">
                              <div class="mb-2">
                                <label>Product Name</label>
                                <input type="text" v-model="pname" class="form-control" placeholder="Product name" name="pname" />
                              </div>
                              <div class="mb-2">
                                <label>Quantity</label>
                                <input type="text" v-model="quantity" class="form-control" placeholder="Quantity" name="quantity" />
                              </div>
                              <div class="mb-3">
                                <label>Price</label>
                                <input type="text" v-model="price" class="form-control" placeholder="Price" name="price" />
                              </div>
                              <div class="mb-2">
                                <button type="submit" class="btnAdd btn btn-sm btn-success" data-bs-dismiss="modal">Update</button>
                              </div>
                            </form>
                          </div>

                          <!-- Modal footer -->
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
      <script src="../assets/js/axios.js"></script>
      <script src="../assets/js/vue.3.js"></script>
      <script src="../assets/js/adminProduct.js"></script>

      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->

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