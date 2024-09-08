<?php
include_once('includes/fonctions.php');
$msg = "";
if (isset($_SESSION['user_connected'])) {
  $msg = $_SESSION['user_connected'];
  unset($_SESSION['user_connected']);
}

?>


<!DOCTYPE php>
<php lang="en">

  <?php include_once('includes/head.php') ?>


  <body>


    <?php include_once('includes/header.php') ?>
    <?php if (isset($msg) && !empty($msg)) {
      echo '<div style="text-align:center;" class="alert alert-info">' . $msg . '</div>';
    } ?>

    <div class=" ilyjhtbgrefczds bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
      <div class="hero-section">
        <div class="container text-center wow fadeIn">
          <span class="subhead">Let's make your life happier</span>
          <h1 class="display-4">Healthy Living</h1>
          <a href="#" class="btn btn-primary">Let's Consult</a>
        </div>
      </div>
    </div>


    <div class="bg-light">
      <div class="page-section py-3 mt-md-n5 custom-index">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-4 py-3 py-md-0">
              <div class="card-service wow fadeOut">
                <div class="circle-shape bg-secondary text-white">
                  <span class="mai-chatbubbles-outline"></span>
                </div>
                <p><span>Chatter</span>-avec nos medecins </p>
              </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <div class="card-service wow fadeOut">
                <div class="circle-shape bg-primary text-white">
                  <span class="mai-shield-checkmark"></span>
                </div>
                <p><span>Site</span>-Protection pour la sante</p>
              </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
              <div class="card-service wow fadeOut">
                <div class="circle-shape bg-accent text-white">
                  <span class="mai-basket"></span>
                </div>
                <p><span>Site</span>-Pharmacie</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .page-section -->

      <div class="page-section pb-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 py-3 wow bounceInLeft">
              <h1>Bienvenu sur notre <br> Center</h1>
              <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
                justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro
                consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
              <a href="about.php" class="btn btn-primary">Voir plus</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
              <div class="img-place custom-img-1">
                <img src="../assets/img/bg-doctor.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section">
      <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Nos medecins</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">Dr. Stein Albert</p>
                <span class="text-sm text-grey">Cardiologue</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="../assets/img/doctors/doctor_2.jpg" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">Dr. Alexa Melvin</p>
                <span class="text-sm text-grey">Dental</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                <span class="text-sm text-grey">General Health</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                <span class="text-sm text-grey">General Health</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                <span class="text-sm text-grey">General Health</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-section bg-light">
      <div class="container">
        <h1 class="text-center wow fadeInUp">Dernières nouvelles</h1>
        <div class="row mt-5">
          <div class="col-lg-4 py-2 wow zoomIn">
            <div class="card-blog">
              <div class="header">
                <div class="post-category">
                  <a href="#">Covid19</a>
                </div>
                <a href="blog-details.php" class="post-thumb">
                  <img src="../assets/img/blog/blog_1.jpg" alt="">
                </a>
              </div>
              <div class="body">
                <h5 class="post-title"><a href="blog-details.php">List of Countries without Coronavirus case</a></h5>
                <div class="site-info">
                  <div class="avatar mr-2">
                    <div class="avatar-img">
                      <img src="../assets/img/person/person_1.jpg" alt="">
                    </div>
                    <span>Roger Adams</span>
                  </div>
                  <span class="mai-time"></span> 1 week ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 py-2 wow zoomIn">
            <div class="card-blog">
              <div class="header">
                <div class="post-category">
                  <a href="#">Covid19</a>
                </div>
                <a href="blog-details.php" class="post-thumb">
                  <img src="../assets/img/blog/blog_1.jpg" alt="">
                </a>
              </div>
              <div class="body">
                <h5 class="post-title"><a href="blog-details.php">List of Countries without Coronavirus case</a></h5>
                <div class="site-info">
                  <div class="avatar mr-2">
                    <div class="avatar-img">
                      <img src="../assets/img/person/person_1.jpg" alt="">
                    </div>
                    <span>Roger Adams</span>
                  </div>
                  <span class="mai-time"></span> 1 week ago
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 py-2 wow zoomIn">
            <div class="card-blog">
              <div class="header">
                <div class="post-category">
                  <a href="#">Covid19</a>
                </div>
                <a href="blog-details.php" class="post-thumb">
                  <img src="../assets/img/blog/blog_1.jpg" alt="">
                </a>
              </div>
              <div class="body">
                <h5 class="post-title"><a href="blog-details.php">List of Countries without Coronavirus case</a></h5>
                <div class="site-info">
                  <div class="avatar mr-2">
                    <div class="avatar-img">
                      <img src="../assets/img/person/person_1.jpg" alt="">
                    </div>
                    <span>Roger Adams</span>
                  </div>
                  <span class="mai-time"></span> 1 week ago
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 text-center mt-4 wow zoomIn">
            <a href="blog.php" class="btn btn-primary">Voir plus de nouvelles</a>
          </div>

        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form">
          <div class="row mt-5 ">
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="text" class="form-control" placeholder="Full name">
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
              <input type="text" class="form-control" placeholder="Email address..">
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
              <input type="date" class="form-control">
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
              <select name="departement" id="departement" class="custom-select">
                <option value="general">General Health</option>
                <option value="cardiology">Cardiology</option>
                <option value="dental">Dental</option>
                <option value="neurology">Neurology</option>
                <option value="orthopaedics">Orthopaedics</option>
              </select>
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <input type="text" class="form-control" placeholder="Number..">
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <textarea name="message" id="message" class="form-control" rows="6"
                placeholder="Enter message.."></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
      <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
          <div class="col-lg-4 wow zoomIn">
            <div class="img-banner d-none d-lg-block">
              <img src="../assets/img/mobile_app.png" alt="">
            </div>
          </div>
          <div class="col-lg-8 wow fadeInRight">
            <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
            <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
            <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
          </div>
        </div>
      </div>
    </div> <!-- .banner-home -->

    <footer class="page-footer">
      <div class="container">
        <div class="row px-md-3">
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Company</h5>
            <ul class="footer-menu">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Editorial Team</a></li>
              <li><a href="#">Protection</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>More</h5>
            <ul class="footer-menu">
              <li><a href="#">Terms & Condition</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Join as Doctors</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Our partner</h5>
            <ul class="footer-menu">
              <li><a href="#">One-Fitness</a></li>
              <li><a href="#">One-Drugs</a></li>
              <li><a href="#">One-Live</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-lg-3 py-3">
            <h5>Contact</h5>
            <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
            <a href="#" class="footer-link">701-573-7582</a>
            <a href="#" class="footer-link">healthcare@temporary.net</a>

            <h5 class="mt-3">Social Media</h5>
            <div class="footer-sosmed mt-3">
              <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
              <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
              <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
              <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
              <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
            </div>
          </div>
        </div>

        <hr>

        <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right
          reserved</p>
      </div>
    </footer>
    <?php include('includes/scripts.php') ?>

  </body>

</php>