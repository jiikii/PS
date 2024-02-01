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
    <title>Chat</title>
</head>

<body>
    <div class="container-fluid bg-white p-0 vh-100" id="chatHub">
        <section id="chatHub">
            <div class="container py-4 mt-1">
                <h1 class="logo me-auto me-lg-0"><a href="../index.php" class="nav-link"> MENTAL INFO </a></h1>
                <div class="row">
                    <div class=" d-flex justify-content-center align-items-center">
                        <div class="card col-lg-8 col-12" id="chat3" style="border-radius: 15px;">
                            <div class="card-body">
                                <a href="../index.php" class="p-2">Back</a>
                                <div data-mdb-perfect-scrollbar="true" class="mt-4" style="position: relative; height: 500px; overflow-y: scroll;">
                                    <ul class="list-unstyled mb-0">
                                        <li class="p-2 border-bottom" v-for="al of allUsers">
                                            <a :href="'chatroom.php?id='+al.sender" class="d-flex justify-content-between">
                                                <div class="d-flex flex-row">
                                                    <div>
                                                        <img :src="'/ps/imgs/'+al.sendPic" alt="avatar" class="border shadow rounded-circle d-flex align-self-center me-3" width="50" height="50">
                                                        <span class="badge bg-success badge-dot"></span>
                                                    </div>
                                                    <div class="pt-1">
                                                        <p class="small text-muted text-capitalize">{{al.lastname}}, {{al.firstname}}</p>
                                                        <p class="small text-muted text-capitalize">{{al.message}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li class="p-2 border-bottom" v-if="allUsers.length === 0">
                                            <a href="../index.php" class="d-flex justify-content-between">
                                                <div class="text-center">
                                                    No Message Yet
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../Assets/assets/js/main.js"></script>
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/chat.js"></script>
</body>

</html>