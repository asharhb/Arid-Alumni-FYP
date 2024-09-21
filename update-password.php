<?php include "include/middleware.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Update Password</title>
    <?php include "include/link.php"; ?>

</head>

<body>
    <?php include "include/navbar.php"; ?>

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-down">
                    <h2>Update Password</h2>
                </div>
                <div class="col-12" data-aos="fade-right">
                    <a href="">Home</a>
                    <a href="">Update-Password</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="flip-down">Update-Password</div>
            <form id="pass_process" data-netlify="true">
                <div class="form">
                    <div class="inputfield">
                        <label>Current Password</label>
                        <input type="password" class="input" id="password" name="cp"
                            placeholder="Enter Current Password" autocomplete="off" onkeyup="check()"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            maxlength="100" minlength="8" />
                    </div>
                    <span style="color:red;" class="null-cp  null"></span>

                    <div class="inputfield" >
                        <label>New Password</label>
                        <input type="password" class="input" id="password" name="Password"
                            placeholder="Enter New Password" autocomplete="off" onkeyup="check()"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            maxlength="100" minlength="8" />
                    </div>
                    <span style="color:red;" class="null-Password  null"></span>

                    <div class="inputfield" >
                        <label>Confirm Password</label>
                        <input type="password" onkeyup="check()" class="input" id="confirm-password"
                            name="ConfirmPassword" placeholder="Confirm New password" autocomplete="off"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            maxlength="100" minlength="8" />
                    </div>
                    <span style="color:red;" class="null-ConfirmPassword  null"></span>

                    <div class="inputfield btns" id="btn">
                        <button type="submit" value="Register" class="btn" onclick="checkPassword()">
                            Update
                        </button>
                        <button type="reset" value="Reset" class="btn">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->

    <!-- Footer Start -->
    <script>
    $(document).ready(function() {

        $('#pass_process').submit(function(event) {
            event.preventDefault();
            // alert("ok")
            $('.null').html('');

            // Create a FormData object to handle the form data
            var formData = new FormData(this);

            // Append additional data to the FormData object
            formData.append('type', 'pass');

            $.ajax({
                type: 'POST',
                url: 'backend.php',
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Set content type to false
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the server

                    if (response.success) {
                        toastr.success(response.message);
                        $('#pass_process').find('input, select, textarea').val('');

                    } else if (response.success === "oop") {
                        toastr.error(response.message);
                        // $('#pass_process').find('input, select, textarea').val('');

                    } else {

                        // Display error message(s) here
                        var errors = response.message;
                        $.each(errors, function(key, value) {
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