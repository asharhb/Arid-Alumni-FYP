<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Contact</title>
    <?php include "include/link.php"; ?>

</head>

<body>
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
toastr.success('Thanks for Contacting Us !');
  </script>";
    }

    ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <a href="">Home</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-down">
                <h2 id="contact">Contact For Any Query</h2>
            </div>
            <div class="row align-items-center contact-information">
                <div class="col-md-6 col-lg-3">
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
                <div class="col-md-6 col-lg-3">
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
                <div class="col-md-6 col-lg-3">
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
                <div class="col-md-6 col-lg-3" style="padding-left: 80px">
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
                        <div class="control-group">
                            <input type="text" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>"
                                class="form-control" name="name" id="name" placeholder="Your Name" required="required"
                                data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email"
                                value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ""; ?>"
                                class="form-control" name="email" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
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