<?php 
    session_start();  
    if(!isset($_SESSION['user_id'])){
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">   
    <link rel="stylesheet" href="../style/adminDashboard.css">
    <title>Admin Product Received</title>
</head>
<body>
    <section class="bg">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
              <a class="navbar-brand" href="../pages/adminDashboard.php"><img class="logo" src="../imgs/logo.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-dark"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-items-center justify-content-center gap-2">
                <li class="nav-item">
                    <a class="nav-link inven fw-bold" href="../pages/adminDashboard.php">INVENTORY</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../pages/adminProduct.php">PRODUCT</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../pages/adminProductReceived.php">PRODUCT RECEIVED</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../pages/adminStaff.php">STAFF'S</a>
                  </li>
                  <li class="nav-item dropdown">
                    <p class="text-success dropdown-toggle pt-3" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></p>
                  
                    <ul class="dropdown-menu dropdown-menu-white">
                      <li><a class="dropdown-item text-danger" href="../includes/logout.php">Log out</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div id="productReceived-app">
            <section>
              <div class="container">
                  <div class="secondbg">
                    <div class="container">
                      <div class="featuredTitle p-4">
                        <div class="text">
                          <h2 class="fw-bolder">PRODUCT RECEIVED</h2>
                        </div>
                        <hr>
                        <div class="buttons pt-2">
                          <button class="btn btn-info px-4 text-dark mb-5" data-bs-toggle="modal" data-bs-target="#myModal">ADD PRODUCT RECEIVED</button>
                        </div>
                        <div>
                          <div class="row">
                            <div class="col-12 col-lg-3">
                              <div class="col mt-2 mb-3">
                                <input type="search" v-model="search" @input="searchUsers(search)" class="form-control" placeholder="Search...">
                              </div>
                            </div>
                          </div>
                          <table class="table table-info ">
                            <thead>
                              <th>ID</th>
                              <th>SUPPLIER</th>
                              <th>PRODUCT NAME</th>
                              <th>QUANTITY</th>
                              <th>PRICE</th>
                              <th>DAY ADDED</th>
                              <th>DATETIME</th>
                              <th>ACTION</th>
                            </thead>
                            <tbody>
                              <tr v-for="user in users">
                                <td>{{ user.id }}</td>
                                <td>{{ user.supplier }}</td>
                                <td>{{ user.productn }}</td>
                                <td>{{ user.quant }}</td>
                                <td>{{ user.rprice }}</td>
                                <td>{{ user.day_add }}</td>
                                <td>{{ user.dateInserted }}</td>
                                <td>
                                  <button @click="getProductReceivedById(user.id)" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-sm btn-warning mx-1">Edit</button>
                                  <button  @click="deleteProductReceived(user.id)" class="btn btn-sm btn-danger">delete</button>
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
                                  <h4 class="modal-title">ADD PRODUCT RECEIVED</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            
                                
                                <div class="modal-body">
                                  <form @submit="addProductReceived" class="userform">
                                    <div class="mb-2">
                                      <label>Supplier</label>
                                      <input type="text"  class="form-control"  placeholder="Supplier" name="supplier" required>
                                    </div>
                                    <div class="mb-2">
                                      <label>Product Name</label>
                                      <input type="text"  class="form-control"  placeholder="Product name" name="productn" required>
                                    </div>
                                    <div class="mb-2">
                                      <label>Quantity</label>
                                      <input type="text"  class="form-control"  placeholder="Quantity" name="quant" required>
                                    </div>
                                    <div class="mb-3">
                                      <label>Price</label>
                                      <input type="text"  class="form-control"  placeholder="Price" name="rprice" required>
                                    </div>
                                    <div class="mb-3">
                                      <label>Day added</label><br>
                                      <select class="form-control" name="day_add">
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
                                      <button type="submit" class="btnAdd btn btn-sm btn-primary" data-bs-dismiss="modal" >Add</button>
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
                          <div class="modal" id="exampleModalToggle">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                            
                                
                                <div class="modal-header">
                                  <h4 class="modal-title">UPDATE PRODUCT RECEIVED</h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            
                                
                                <div class="modal-body">
                                  <form @submit="updateProductReceived" class="userform">
                                    <div class="mb-2">
                                      <label>Supplier</label>
                                      <input type="text" v-model="supplier" class="form-control"  placeholder="Supplier" name="supplier" />
                                    </div>
                                    <div class="mb-2">
                                      <label>Product Name</label>
                                      <input type="text"  v-model="productn" class="form-control"  placeholder="Product name" name="productn" />
                                    </div>
                                    <div class="mb-2">
                                      <label>Quantity</label>
                                      <input type="text" v-model="quant" class="form-control"  placeholder="Quantity" name="quant" />
                                    </div>
                                    <div class="mb-3">
                                      <label>Price</label>
                                      <input type="text" v-model="rprice"  class="form-control"  placeholder="Price" name="rprice" />
                                    </div>
                                    <div class="mb-2">
                                      <button type="submit" class="btnAdd btn btn-sm btn-success" data-bs-dismiss="modal" >update</button>
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
    </section>

    <!-- JS -->
    <script src="../assets/js/axios.js"></script>
    <script src="../assets/js/vue.3.js"></script>
    <script src="../assets/js/adminProductReceived.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>