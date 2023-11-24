<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="style/indexx.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>COMPANION</title>
</head>
<body>
<header class="header">

<a href="index.php" class="logo"> <i class="fas fa-heartbeat"></i> <strong>CPC</strong>MENTAL HEALTH CARE COMPANION </a>

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="#about">about</a>
    <a href="#services">services</a>
    <a href="#councilors">councilors</a>
    <a href="# " class="text-dark" data-bs-toggle="modal" data-bs-target="#myModal">login</a>
</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</header>

<section class="home" id="home">

    <div class="image">
        <img src="imgs/health.webp" alt="">
    </div>

    <div class="content">
        <h3>WELCOME DEAR COMPANION</h3>
        <p><b>Here you can talk and address your mental health problems with ease.</p></b>
        <p><b>You don't have to control your thoughts. you just have to stop letting them control you.</p></b>
        <a href="../PS/pages/register.php" class="btn">Get Started!<span class="fas fa-chevron-right"></span> </a>
    </div>

</section>

<!-- home section ends -->



<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="imgs/doctor.jpg" alt="">
        </div>

        <div class="content">
            <h3>MENTAL HEALTH COMPANION</h3>
            <p><b>A mental health companion is a support system that provides emotional and practical assistance to individuals who are struggling with mental health issues. This can be a trained professional such as a therapist, counselor or psychiatrist, or a peer support worker who has lived experience of mental health challenges. Mental health companions can offer a variety of services, such as one-on-one counseling, group therapy, crisis intervention, and coaching on coping skills and self-care strategies. They can also provide resources and referrals to other mental health services and organizations. The aim of a mental health companion is to provide individuals with the support they need to manage their mental health and improve their quality of life.</b></p>
            
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- icons section starts  -->

<section class="icons-container">


    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>How Many Are Suffering ?</h3>
        <p>or more are suffering form mental health</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>Goal</h3>
        <p><b>The goal of a mental health companion is to provide emotional and practical support to individuals who are struggling with mental health issues. This can include helping individuals to better understand their symptoms, learn coping skills and self-care strategies, and navigate the mental health care system. </b></p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>Vision</h3>
        <p><b>The vision of a mental health companion is to promote mental wellness and improve the quality of life for individuals who are experiencing mental health challenges. Mental health companions strive to create a world where individuals can openly and safely talk about their mental health, receive appropriate support and care, and lead fulfilling lives. </b></p>
    </div>

</section>

<!-- icons section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> our <span>services</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Get Reservations</h3>
            <p> More Info</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

     

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Talk With Therapist</h3>
            <p>Get help from Professionals</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

       


        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Survey's and Questionnaire</h3>
            <p>To asses on what type of mental health are you suffering</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- services section ends -->



<!-- doctors section starts  -->

<section class="doctors" id="councilors">

    <h1 class="heading"> our <span>Councilors</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="imgs/guidance.PNG" alt="">
            <h3>GUIDANCE</h3>
            <span>Mrs.</span>
            <div class="share">
            
              
                
            </div>
        </div>

        <div class="box">
            <img src="imgs/nurse1.PNG" alt="">
            <h3>NURSE</h3>
            <span>Mrs.</span>
            <div class="share">
           
                
                
            </div>
        </div>

     

    </div>

</section>

<!-- doctors section ends -->

<!-- appointmenting section starts   -->

<!-- <section class="appointment" id="appointment">

    <h1 class="heading"> <span>appointment</span> now </h1>    

    <div class="row">

        <div class="image">
            <img src="image/appointment101.jpg" alt="">
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php
            if(isset($message)) {
                foreach($message as $message) {
                echo'<p class ="message">'.$message.'</p>';
            }
            }
        ?>
      
         

    </div>

</section> -->

<!-- appointmenting section ends -->




<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#councilors"> <i class="fas fa-chevron-right"></i> Councilors </a>
            <a href="#appointment"> <i class="fas fa-chevron-right"></i> appointment </a>

      
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i>Mental Health Sessions</a>
        
        </div>

        <div class="box">
            <h3>appointment info</h3>
            <a href="#"> <i class="fas fa-phone"></i> 09317842782 </a>
            <a href="#"> <i class="fas fa-envelope"></i> Georgemob45@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Cordova, Gabi  </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        
        </div>

    </div>



    <div id="login-app">
        <section>
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-dialog-centered px-2">
                  <div class="modal-content" style="border-radius: 10px;">
              
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-center text-center">
                      <h2 class="modal-title fw-bold">LOGIN USER</h2>
                    </div>
              
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form @submit="login">
                            <div class="mb-2 mt-3">
                                <label class="fs-2 fw-bold">Email</label>
                                <input type="text"  class="form-control form-control-lg py-4 border-1 border-dark"  placeholder="Email" name="email" />
                            </div>
                            <div class="mb-3 mt-5">
                                <label class="fs-2 fw-bold">Password</label>
                                <input type="password"  class="form-control form-control-lg py-4 border-1 border-dark"  placeholder="Password" name="password" />
                            </div>
                
                            <div class="col justify-content-center text-center d-flex">
                                <button class="loginbtn btn btn-primary me-5 btn-info p-3 px-5 fw-bold fs-5">LOGIN</button>
                            </div>
                            <div class="col mt-1 justify-content-center text-center d-flex mt-3">
                                <a href="/PS/pages/register.php " class="me-5 fs-3 fw-bold">REGISTER</a>
                            </div>
                        </form>
                    </div>
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-primary p-3" data-bs-dismiss="modal">Close</button>
                    </div>
              
                  </div>
                </div>
            </div>
        </section>
    </div>
</section>


    <!-- JS -->
    <script src="assets/js/axios.js"></script>
    <script src="assets/js/vue.3.js"></script>
    <script src="assets/js/login.js"></script>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

