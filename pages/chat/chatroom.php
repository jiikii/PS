<?php

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
    <div class="container-fluid overflow-hidden bg-white vh-100" id="chatHub">
        <div class="container-xxl py-5">
            <section>
                <div class="container py-2">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="card" id="chat1" style="border-radius: 15px;">
                                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    <a href="chats.php" class="text-white fw-bold"><</a>
                                            <p class="mb-0 fw-bold">{{fullname}}</p>
                                            <a href="chats.php" class="text-white fw-bold">x</a>
                                </div>
                                <div class="card-body">
                                    <div class="chats overflow-auto" style="height: 250px;">
                                        <div v-for="a of allMessage" :class="a.sender != <?php echo $_SESSION['user_id'] ?> ? 'd-flex flex-row justify-content-start mb-4' : 'd-flex flex-row justify-content-end mb-4'">
                                            <div v-if="a.sender == <?php echo $_SESSION['user_id'] ?>" class="d-flex">
                                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{{a.message}}</p>
                                                </div>
                                                <img :src="'/ps/imgs/'+a.sendPic" class="rounded-circle me-2" alt="avatar 1" style="width: 45px; height: 100%;">
                                            </div>
                                            <div v-if="a.sender != <?php echo $_SESSION['user_id'] ?>" class="d-flex">
                                                <img :src="'/ps/imgs/'+a.sendPic" class="rounded-circle me-2" alt="avatar 1" style="width: 45px; height: 100%;">
                                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{{a.message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mt-3">
                                        <textarea class="form-control" id="textAreaExample" rows="4" v-model="message" placeholder="Test your Messages"></textarea>
                                        <button class="btn btn-sm btn-primary mt-3 px-4" @click="thisId">Send</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <script src="../../Assets/assets/js/main.js"></script>
    <script src="../../assets/js/axios.js"></script>
    <script src="../../assets/js/vue.3.js"></script>
    <script src="../../assets/js/chat.js"></script>
</body>

</html>