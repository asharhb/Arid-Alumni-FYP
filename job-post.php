<?php include "include/middleware.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Jost Post</title>
    <?php include "include/link.php"; ?>
</head>

<body>
    <?php include "include/navbar.php"; ?>

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Post Job</h2>
                </div>
                <div class="col-12" data-aos="fade-down">
                    <a href="">Home</a>
                    <a href="">Post Job</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="flip-down">Post Job Form</div>
            <form id="job_process" action="POST" data-netlify="true">
                <div class="form">
                    <div class="inputfield">
                        <label>Company Name</label>
                        <input type="text" class="input" id="name" name="Company" placeholder="Enter Company Name"
                            maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-Company  null"></span>

                    <div class="inputfield">
                        <label>Job Title</label>
                        <input type="text" class="input" id="name" name="JobTitle" placeholder="Enter Job Title"
                            maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-JobTitle  null"></span>

                    <div class="inputfield">
                        <label>Job Location</label>
                        <input type="text" class="input" id="name" name="JobLocation" placeholder="Enter Job Location"
                            maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-JobLocation  null"></span>

                    <div class="inputfield">
                        <label>Qualification</label>
                        <input type="text" class="input" id="name" name="Qualification"
                            placeholder="Enter Qualification " maxlength="100"
                            title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-Qualification  null"></span>

                    <div class="inputfield">
                        <label>Job Description</label>
                        <input type="text" class="input" id="name" name="Description"
                            placeholder="Write Job Description of about 10-15 Words" maxlength="100"
                            title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-Description  null"></span>


                    <div class="inputfield">
                        <label>Key Skill</label>
                        <input type="text" class="input" id="name" name="KeySkill" placeholder="Enter Key Skill"
                            maxlength="100" title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-KeySkill  null"></span>


                    <div class="inputfield">
                        <label>Package</label>
                        <input type="text" class="input" id="name" name="Package" placeholder="Enter Package"
                            maxlength="100" title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-Package  null"></span>


                    <div class="inputfield">
                        <label>Experience </label>
                        <input type="text" class="input" id="name" name="ExperienceRequired"
                            placeholder="Enter Experience " maxlength="100" title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-ExperienceRequired  null"></span>


                    <div class="inputfield">
                        <label>No. of Vacancy</label>
                        <input type="text" class="input" id="name" name="NoofVacancy" placeholder="Enter No. of Vacancy"
                            maxlength="30" title="Enter only alphabets and digits" />
                    </div>
                    <span style="color:red;" class="null-NoofVacancy  null"></span>


                    <div class="inputfield">
                        <label>Last Date to Apply</label>
                        <input type="date" class="input" id="name" name="LastDateToApply"
                            placeholder="Enter Last Date to Apply" title="Select Last Date" />
                    </div>
                    <span style="color:red;" class="null-LastDateToApply  null"></span>


                    <div class="inputfield">
                        <label>Company Email</label>
                        <input type="email" class="input" name="ReferralEmail" placeholder="Enter Company email" />
                    </div>
                    <span style="color:red;" class="null-ReferralEmail  null"></span>


                    <div class="inputfield">
                        <label for="">Company Phone No.</label>
                        <input type="tel" class="input" name="phonenumber" maxlength="15" id="phone-number"
                            placeholder="Enter Company Phone No." title="Please enter Company Phone No." />
                    </div>
                    <span style="color:red;" class="null-phonenumber  null"></span><br><br>

                    <div class="inputfield btns" id="btn">
                        <button type="submit" value="Register" class="btn" onclick="checkPassword()">
                            Post
                        </button>
                        <button type="reset" value="Reset" class="btn">Reset</button>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->
    <script>
        $(document).ready(function () {

            $('#job_process').submit(function (event) {
                event.preventDefault();
                // alert("ok")
                $('.null').html('');

                // Create a FormData object to handle the form data
                var formData = new FormData(this);

                // Append additional data to the FormData object
                formData.append('type', 'job');

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
                            // window.location.href = 'jobs.php'
                            $('#job_process').find('input, select, textarea').val('');

                        }

                        else {

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