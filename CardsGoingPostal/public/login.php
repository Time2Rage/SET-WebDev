<?php 
    require_once "../layout/loginHeader.php";
    require_once "../lib/User.php";
    require "../src/common.php";

    $User = new User(escape($_POST['email']), escape($_POST['password']));
    
    if(isset($_POST['login'])){        
       $User->login();
    }
    else if (isset($_POST['create'])){
        $User->create();
    }
?>


    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up" style="padding-top: 50px;">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>About us </h2>
                    <h3>More things about us </h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>
                       God man how much do you want to know
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> This is an example line </li>
                        <li><i class="ri-check-double-line"></i> This is an example line  </li>
                        <li><i class="ri-check-double-line"></i> This is an example line  </li>
                    </ul>
                    <p class="fst-italic">
                        Finally, the last line
                    </p>
                </div>
            </div>
        </div>
    </section><!-- End About Us Section -->


    <!-- ======= Account Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">


            <!-- == Login section == -->
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2> Login </h2>

                    <form method="post">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>

                        <input type="submit" name="login" value="Submit">
                    </form>
                </div>


                <!-- == Create section == -->
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <form method="post">
                        <h2> Create account </h2>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" required>
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" required>

                        <input type="submit" name="create" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Account Section -->





<?php include "../layout/footer.php"; ?> 