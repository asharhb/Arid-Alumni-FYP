<?php include "include/middleware.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Feedback</title>
    <?php include "include/link.php"; ?>

</head>

<body>
    <?php include "include/navbar.php"; ?>

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2>Feedback</h2>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <a href="index.php">Home</a>
                    <a href="">Feedback</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Feedback Start -->
    <div class="booking">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="booking-content">
                        <div class="section-header" data-aos="fade-right">
                            <h2>Give Us Feedback</h2>
                        </div>
                        <div class="about-text" data-aos="fade-right">
                            <p>
                                Dear Arid University students and alumni, your feedback is
                                vital in shaping the future of our institution. Share your
                                thoughts on the website, helping us understand your needs
                                better. Your valuable insights empower us to enhance your
                                experience. Thank you for being an integral part of the Arid
                                University community. Together, let's create an even more
                                enriching environment for learning and growth. Use the form
                                below to share your thoughts; we appreciate your time and
                                contributions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="booking-form">
                        <form id="tst_process">
                            <div class="control-group" data-aos="fade-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>"
                                        required="required" />

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="far fa-user"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <span style="color:red;" class="null-name  null"></span>

                            <div class="control-group" data-aos="fade-right">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Alumni / Student" name="post"
                                        value="<?php echo isset($_SESSION['status']) ? $_SESSION['status'] : ""; ?>"
                                        required="required" />

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="far fa-user"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <span style="color:red;" class="null-post  null"></span>

                            <div class="control-group" data-aos="fade-right">
                                <div class="input-group time" id="time" data-target-input="nearest">
                                    <textarea id="success-description" name="msg"
                                        placeholder="Give Feedback of about 20-25 words..." rows="3"
                                        required="required"></textarea>

                                    <div class="input-group-text">
                                        <i class="far fa-edit"></i>
                                    </div>

                                </div>
                            </div>
                            <span style="color:red;" class="null-msg  null"></span>

                            <div class="control-group" data-aos="fade-right">
                                <div class="input-group date" id="date" data-target-input="nearest">
                                    <div id="upload-container">
                                        <input type="file" id="file-input" name="img" accept="image/*"
                                            onchange="displayImage()" required="required" />
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

                            <span style="color:red;" class="null-img  null"></span>

                            <div data-aos="fade-up">
                                <button class="btn custom-btn" type="submit">Share</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feedback End -->

    <script>
        $(document).ready(function () {

            $('#tst_process').submit(function (event) {
                event.preventDefault();
                // alert("ok")
                $('.null').html('');

                // Create a FormData object to handle the form data
                var formData = new FormData(this);

                // Append additional data to the FormData object
                formData.append('type', 'tst');

                $.ajax({
                    type: 'POST',
                    url: 'backend.php',
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Set content type to false
                    dataType: 'json',
                    success: function (response) {
                        // Handle the response from the server

                        if (response.success) {
                            toastr.success(response.message);
                            $('#tst_process').find('input, select, textarea').val('');

                        } else {

                            // Display error message(s) here
                            var errors = response.message;
                            $.each(errors, function (key, value) {
                                // key is the name of the field that has the error
                                $('.null-' + key).html(value);

                            });
                        }
                    }
                });
            });
        });
    </script>
    <?php include "include/footer.php"; ?>
    <?php include "include/script.php"; ?>
</body>

</html>