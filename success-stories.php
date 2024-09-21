<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Success Stories</title>
    <?php include "include/link.php"; ?>

</head>

<body>
    <?php include "include/navbar.php"; ?>

    <?php
    include('include/connection.php');
    if (isset($_REQUEST['btn'])) {
        $department = $_REQUEST['department'];
        $name = $_REQUEST['name'];
        $grad_year = $_REQUEST['grad_year'];
        $img = $_FILES['img'];
        $des = mysqli_real_escape_string($conn, $_REQUEST['des']);
        $uploadDirectory = 'files/';

        $uploadedFile = $uploadDirectory . uniqid() . "_" . $img['name'];
        move_uploaded_file($img['tmp_name'], $uploadedFile);

        $sql = "INSERT INTO `story`(`name`, `grad_year`, `department`, `des`,`img`) VALUES ('$name','$grad_year','$department','$des','$uploadedFile')";
        mysqli_query($conn, $sql);

        echo "<script>
toastr.success('Thanks for sharing your success story with us!');
  </script>";
    }

    ?>

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-down">
                    <h2>Success Stories</h2>
                </div>
                <div class="col-12" data-aos="fade-right">
                    <a href="">Home</a>
                    <a href="">Success Stories</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Stories Start -->
    <?php if (isset($_SESSION["id"])) { ?>
        <div class="booking">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header" data-aos="fade-right">
                                <h2>Hi ! Alumni Share Your Success Stories With Us</h2>
                            </div>
                            <div class="about-text" data-aos="fade-right">
                                <p>
                                    The Arid University Barani Institute acknowledges alumni as
                                    invaluable assets and endeavors to establish an alumni
                                    database through its Career Services and Corporate Linkages
                                    department. This initiative aims to gather comprehensive
                                    information on Arid graduates, encompassing personal details,
                                    education, training, and employment history.
                                </p>
                                <p>
                                    This data will be stored in a repository, facilitating the
                                    generation of insightful reports on in-demand jobs, urgent
                                    hiring needs, and industry preferences for
                                    barani-institute-of-sciences-sahiwal graduates. The
                                    implementation of the alumni database fosters strong
                                    connections, encouraging alumni participation in university
                                    affairs, promoting the institution's reputation globally, and
                                    enhancing engagement in events like homecomings and other
                                    university activities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="booking-form">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" name="name"
                                            value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>"
                                            class="form-control" placeholder="Name" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="grad_year"
                                            placeholder="Graduation Year" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="far fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text"
                                            value="<?php echo isset($_SESSION['DepartmentofGraduation']) ? $_SESSION['DepartmentofGraduation'] : ""; ?>"
                                            class="form-control" name="department" placeholder="Department"
                                            required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fa fa-user-graduate"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group time" id="time" data-target-input="nearest">
                                        <textarea id="success-description" name="des"
                                            placeholder="Write some description about your success..." rows="2"
                                            required="required"></textarea>
                                        <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="far fa-edit"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group date" id="date" data-target-input="nearest">
                                        <div id="upload-container">
                                            <input type="file" id="file-input" name="img" accept="image/*" required
                                                onchange="displayImage()" />
                                            <label for="file-input" id="custom-label">Upload Your Picture</label>
                                            <img id="selected-image" alt="" />
                                        </div>
                                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i style="margin-top: 0.4rem" class="fas fa-image"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn custom-btn" name="btn" type="submit">Share</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stories End -->
    <?php } ?>
    <!-- Success Stories -->
    <br><br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="booking-content">
                    <div class="section-header" data-aos="fade-down">
                        <h2>Latest Alumni Stories</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <?php
        include("include/connection.php");
        $qry = "SELECT * FROM story  where status=0   ";
        $res = mysqli_query($conn, $qry);

        while ($a = mysqli_fetch_array($res)) { ?>



            <div class="alumni-card">
                <div class="alumni-info">
                    <img src="<?php echo $a['img'] ?>" alt="Alumni 1" data-aos="flip-left" />
                    <h2 data-aos="flip-left">
                        <?php echo $a['name'] ?>
                    </h2>
                    <p data-aos="flip-left">Graduation :
                        <?php echo $a['grad_year'] ?>
                    </p>
                    <p data-aos="flip-left">Department :
                        <?php echo $a['department'] ?>
                    </p>
                    <p class="alumni-success-description" data-aos="fade-up">
                        <?php echo $a['des'] ?>
                    </p>
                </div>
            </div>
        <?php } ?>

    </section>
    <!-- Success Stories End -->

    <!-- Footer Start -->
    <?php include "include/footer.php"; ?>
    <?php include "include/script.php"; ?>
</body>

</html>