<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">   
    <link rel="stylesheet" href="../style/register.css">   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register | page</title>
</head>
<body class="body">
    <div id="register-app">
        <section>
            <div class="container">
                <div class="image">
                    <img class="logo" src="../imgs/logo.png" alt="">
                </div>
                <div class="row p-3">
                    <div class="secondbg col-12 col-lg-5 bg-body shadow py-4 px-3">
                        <form @submit="saveUser" class="userform">
                            <h3 class="text-center">REGISTER</h3>
                            <div class="col mb-2">
                                <!-- Default Value  -->
                                <input type="text" class="form-control visually-hidden" value="0" name="fname" placeholder="Username">
                            </div>
                            <div class="col mb-2">
                                <!-- Default Value  -->
                                <input type="text" class="form-control visually-hidden" value="0" name="lname" placeholder="Username">
                            </div>
                            <div class="col mb-2">
                                <!-- Default Value  -->
                                <input type="text" class="form-control visually-hidden" value="0" name="ph" placeholder="Username">
                            </div>
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
                            <div class="col mb-2">
                                <select name="role" class="form-control" readonly>
                                    <option value="2">User(as Patient)</option>
                                    <!-- <option value="3">Doctor(as Councilor)</option> -->
                                </select>
                            </div>
                            <div class="col mb-2">
                                <button class="registerbtn btn btn-sm btn-info px-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="../assets/js/axios.js"></script>
    <script src="../assets/js/vue.3.js"></script>
    <script src="../assets/js/register.js"></script>
</body>
</html>