<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni</title>
    <?php include "include/link.php"; ?>

</head>

<body>
    <!-- Nav Bar Start -->
    <?php include "include/navbar.php"; ?>
    <?php
    include('include/connection.php');
    if (isset($_REQUEST['btn'])) {
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $msg = mysqli_real_escape_string($conn, $_REQUEST['Message']);

        $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$msg')";
        mysqli_query($conn, $sql);

        echo "<script>
        toastr.success('Thanks for contacting us our team contact you soon!');
  </script>";
    }

    ?>

    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/carousel-1.jpg" alt="Image" />
                    </div>
                    <div class="carousel-text" data-aos="fade-up">
                        <h1>Our <span>Alumni Our</span> Pride</h1>
                        <p>Arid University Barani Institute Sahiwal</p>


                        <?php if (!isset($_SESSION["id"])) { ?>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="alumni-form.php" data-aos="fade-up">Register as Alumni</a>
                                <a class="btn custom-btn" href="student-form.php" data-aos="fade-up">Register as
                                    Student</a>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION["id"])) { ?>
                            <h1>Welcome,
                                <?php echo $_SESSION[
                                    "name"
                                ]; ?> <span></span>
                            </h1>

                        <?php } ?>


                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/carousel-2.jpg" alt="Image" />
                    </div>
                    <div class="carousel-text" data-aos="fade-up">
                        <h1>
                            A legacy of excellence, <span>our alumni inspire pride</span> in
                            every stride.
                        </h1>
                        <p>
                            Any institutions' alumni are key to its growth. We are focused
                            on giving a global experience to our students.
                        </p>
                        <?php if (!isset($_SESSION["id"])) { ?>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="alumni-form.php" data-aos="fade-up">Register as Alumni</a>
                                <a class="btn custom-btn" href="student-form.php" data-aos="fade-up">Register as
                                    Student</a>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION["id"])) { ?>
                            <h1>Welcome,
                                <?php echo $_SESSION[
                                    "name"
                                ]; ?> <span></span>
                            </h1>

                        <?php } ?>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/carousel-3.jpg" alt="Image" />
                    </div>
                    <div class="carousel-text" data-aos="fade-up">
                        <h1>
                            The pride of our institution
                            <span>walks among us in the</span> form of our esteemed alumni.
                        </h1>
                        <p>
                            Nobody is bothered about an institution more than its alumni
                        </p>
                        <?php if (!isset($_SESSION["id"])) { ?>
                            <div class="carousel-btn">
                                <a class="btn custom-btn" href="alumni-form.php" data-aos="fade-up">Register as Alumni</a>
                                <a class="btn custom-btn" href="student-form.php" data-aos="fade-up">Register as
                                    Student</a>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION["id"])) { ?>
                            <h1>Welcome,
                                <?php echo $_SESSION[
                                    "name"
                                ]; ?> <span></span>
                            </h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="zoom-in-right">
                    <div class="about-img">
                        <div class="about-img-container">
                            <img src="img/about.jpg" alt="Your Image" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-header" data-aos="zoom-in-left">
                            <h2>About Us</h2>
                        </div>
                        <div class="about-text" data-aos="fade-up">
                            <p>
                                We realise that choosing the right university-level course and
                                where to study can be a challenge, which is why Arid
                                University Barani Institue offers everything you’ll need to
                                make the right decision on your future.
                            </p>
                            <p>
                                Our reputation in delivering high quality HE, in a wide range
                                of vocational and academic courses, as well our partnerships
                                with prestigious awarding institutions, spans over 20 years.
                            </p>
                            <a class="btn custom-btn" target="_blank"
                                href="https://baraniinstitute.edu.pk/bis/login.php" data-aos="fade-right">BIS LMS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Login popup -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal-box">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content clearfix">
                                <div class="modal-body">
                                    <div class="container-panda pan">
                                        <form class="form-panda">
                                            <select required class="form-select" name="type"
                                                aria-label="Default select example">
                                                <option value="">Select Type</option>
                                                <option value="1">Alumni</option>
                                                <option value="2">Student</option>
                                            </select>
                                            <label for="username">Username:</label>
                                            <input type="text" id="username" placeholder="Username here..." />
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" placeholder="Password here..." />
                                            <button>Login</button>
                                        </form>
                                        <div class="ear-l"></div>
                                        <div class="ear-r"></div>
                                        <div class="panda-face">
                                            <div class="blush-l"></div>
                                            <div class="blush-r"></div>
                                            <div class="eye-l">
                                                <div class="eyeball-l"></div>
                                            </div>
                                            <div class="eye-r">
                                                <div class="eyeball-r"></div>
                                            </div>
                                            <div class="nose"></div>
                                            <div class="mouth"></div>
                                        </div>
                                        <div class="hand-l"></div>
                                        <div class="hand-r"></div>
                                        <div class="paw-l"></div>
                                        <div class="paw-r"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login popup -->

    <!-- Mission vision Start -->
    <div class="food">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="food-item">
                        <img src="img/mission-requirements.svg" class="mission" alt="mission" />
                        <h2>Mission</h2>
                        <p>
                            Get mutual benefit between the Alumni and The Arid University
                            Barani Institute by providing a wide range of quality services,
                            benefits , networking and engaging the students in different
                            activities that will encourage them to stay in touch with the
                            University.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-right">
                    <div class="food-item">
                        <img src="img/vision.png" class="mission" alt="vision" />
                        <h2>Vision</h2>
                        <p>
                            We believe in empowering our youth with professional
                            capabilities for enabling them to contribute towards the
                            sustainable socio-economic progress of the country and for the
                            greater good of mankind, regionally as well as globally.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <div class="food-item">
                        <img src="img/goals.png" class="mission" alt="goals" />
                        <h2>Goals</h2>
                        <p>
                            The University’s goal is to be among the top 1000 best
                            universities in the world and among the top 3 universities in
                            Pakistan by the year 2024. The University will bring Engineering
                            as well in addition to build a state of the art Technology Park.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Mission vision End -->

    <!-- Team Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-down">
                <h2>Our Alumni</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-right">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/zain.png" alt="Image" />
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Zain Ur Rehman</h2>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-right">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/kainaat.png" alt="Image" />
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Kainaat Moon</h2>
                            <p>Allied Bank Limited</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-right">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/hamza.png" alt="Image" />
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Hamza Ali</h2>
                            <p>Creative Design Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-right">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="img/zeeshan.png" alt="Image" />
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Zeeshan Javed</h2>
                            <p>Enterpneur</p>
                        </div>
                    </div>
                </div>

                <a class="btn custom-btn" style="margin: auto" href="gallery.html" data-aos="fade-down">
                    View More <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="testimonial">
        <div class="section-header text-center" data-aos="fade-down">
            <h2>Testimonial</h2>
        </div>
        <div class="container">
            <div class="owl-carousel testimonials-carousel">
                <?php
                include("include/connection.php");
                $qry = "SELECT * FROM feedback WHERE `status`=0  ";
                $res = mysqli_query($conn, $qry);

                while ($a = mysqli_fetch_array($res)) { ?>
                    <div class="testimonial-item" data-aos="flip-up">
                        <div class="testimonial-img">
                            <img src="<?php echo $a['img'] ?>" alt="Image" class="test-img" />
                        </div>
                        <p>
                            <?php echo $a['msg'] ?>
                        </p>
                        <h2>
                            <?php echo $a['name'] ?>
                        </h2>
                        <h3>
                            <?php echo $a['post'] ?>
                        </h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Upcoming Events -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-down">
                <h2>Upcoming Events</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="blog-item">
                        <div class="blog-img" data-aos="fade-right">
                            <img src="img/sports.jpg" alt="Blog" class="event-img" />
                        </div>
                        <div class="blog-content" data-aos="fade-up">
                            <h2 class="blog-title">Sports Week</h2>
                            <div class="blog-meta">
                                <p><i class="far fa-user"></i>Admin</p>
                                <p><i class="fab fa-xbox"></i>Sports</p>
                                <p><i class="far fa-calendar-alt"></i>10-Jan-2024</p>
                                <p><i class="far fa-clock"></i>10:00 Am</p>
                            </div>
                            <div class="blog-text">
                                <p>
                                    Arid University organized an exhilarating sports week,
                                    fostering teamwork and athleticism among students. The event
                                    featured diverse sports, promoting a healthy and vibrant
                                    campus culture.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="blog-item">
                        <div class="blog-img" data-aos="fade-right">
                            <img src="img/annual-dinner.jpg" alt="Blog" class="event-img" />
                        </div>
                        <div class="blog-content" data-aos="fade-up">
                            <h2 class="blog-title">Annual Dinner</h2>
                            <div class="blog-meta">
                                <p><i class="far fa-user"></i>Admin</p>
                                <p><i class="far fa-list-alt"></i>Food</p>
                                <p><i class="far fa-calendar-alt"></i>22 January 2024</p>
                                <p><i class="far fa-clock"></i>12:00 Am</p>
                            </div>
                            <div class="blog-text">
                                <p>
                                    Arid organized a spectacular Annual Dinner for its students,
                                    fostering a vibrant atmosphere of camaraderie. The event
                                    featured delightful cuisine, entertainment, and memorable
                                    moments.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events End -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-down">
                <h2 id="contact">Contact For Any Query</h2>
            </div>
            <div class="row align-items-center contact-information">
                <div class="col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Address</h3>
                            <p>
                                520، B-7 Jail Rd, Sahiwal, Sahiwal District, Punjab 57000,
                                Pakistan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>03351118383</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p>info@baraniinstitute.edu.pk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" style="padding-left: 80px" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-share follow"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Follow Us</h3>
                            <div class="contact-social">
                                <a href="https://www.facebook.com/Baraniswl/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://www.youtube.com/@baraniinstituteofsciences6207" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                                <a href="https://www.instagram.com/explore/locations/993064257/barani-institute-of-sciences-sahiwal/?next=%2Fesmibal%2Ftagged%2F"
                                    target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row contact-form">
                <div class="col-md-6" data-aos="fade-right">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3431.9637950921!2d73.09190697429798!3d30.663147988994524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922b7dc32d1c8d5%3A0xb84801bcc0f860ed!2sBarani%20Institute%20of%20Sciences%20Sahiwal%20Campus%2C%20JV%20of%20PMAS%20Arid%20Agriculture%20University%20RWP.!5e0!3m2!1sen!2s!4v1684422681840!5m2!1sen!2s"
                        width="100%" height="330px" frameborder="0" style="border: 0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <div id="success"></div>
                    <form method="POST">
                        <div class="control-group" data-aos="fade-right">
                            <input type="text" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>"
                                class="form-control" name="name" id="name" placeholder="Your Name" required="required"
                                data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group" data-aos="fade-right">
                            <input type="email"
                                value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ""; ?>"
                                class="form-control" name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group" data-aos="fade-right">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group" data-aos="fade-right">
                            <textarea class="form-control" id="message" name="Message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn custom-btn" name="btn" type="submit" id="sendMessageButton">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php include "include/footer.php"; ?>
    <?php include "include/script.php"; ?>

</body>

</html>