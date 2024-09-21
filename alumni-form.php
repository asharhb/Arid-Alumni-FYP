<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Reg. Form</title>
    <?php include('include/link.php') ?>
</head>

<body>
    <?php include('include/navbar.php') ?>

    <!-- Nav Bar End -->

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Registration</h2>
                </div>
                <div class="col-12" data-aos="fade-down">
                    <a href="">Home</a>
                    <a href="">Alumni-Form</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="flip-down">Alumni Registration Form</div>
            <form  id="register_process" enctype="multipart/form-data" data-netlify="true">
                <div class="form">
                    <div class="inputfield">
                        <label>Full Name</label>
                        <input type="text" class="input" id="name" name="FullName" placeholder="Enter Full Name"
                            maxlength="30" title="Enter only alphabets"  />
                    </div>
                    <span style="color:red;"  class="null-FullName  null" ></span>

                    <div class="inputfield">
                        <label>Registration No.</label>
                        <input type="text" class="input" id="name" name="RegistrationNo" 
                            placeholder="Enter Registration No." maxlength="20" title="Enter Registration No."
                             />
                    </div>
                    <span style="color:red;"  class="null-RegistrationNo  null" ></span>

                    <div class="inputfield">
                        <label>CNIC No.</label>
                        <input type="text" class="input" id="name" name="CNIC_no" placeholder="Enter CNIC No."
                            maxlength="20" title="Enter only numbers"  />
                    </div>
                    <span style="color:red;"  class="null-CNIC_no  null" ></span>

                    <div class="inputfield">
                        <label>Email Address</label>
                        <input type="email" class="input" name="Email" placeholder="Enter your email"  />
                    </div>
                    <span style="color:red;"  class="null-Email  null" ></span>


                    <div class="inputfield">
                        <label for="">Phone Number</label>
                        <input type="tel" class="input" name="PhoneNumber" maxlength="15"  id="phone-number"
                            placeholder="Enter phone number" title="Please enter valid phone number" />
                    </div>
                    <span style="color:red;"  class="null-PhoneNumber  null" ></span>

                    <div class="inputfield">
                        <label>Passout Year</label>
                        <div class="custom_select">
                            <select id="state" name="Passoutyear" >
                                <option value="">Select Passout Year</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;"  class="null-Passoutyear  null" ></span>

                    <div class="inputfield">
                        <label>Department of Graduation</label>
                        <div class="custom_select">
                            <select id="state" name="DepartmentofGraduation" >
                                <option value="">Select Department</option>
                                <option>BSCS</option>
                                <option>BSIT</option>
                                <option>BBA</option>
                                <option>BS-SE</option>
                                <option>BS-HND</option>
                                <option>BS-FST</option>
                                <option>BS-MLT</option>
                                <option>BBA 2 Year</option>
                                <option>BS-Microiblology</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;"  class="null-DepartmentofGraduation  null" ></span>

                    <div class="inputfield">
                        <label>Session</label>
                        <div class="custom_select">
                            <select id="state" name="Session" >
                                <option value="">Select Session</option>
                                <option>2014-2018</option>
                                <option>2015-2019</option>
                                <option>2016-2020</option>
                                <option>2017-2021</option>
                                <option>2018-2022</option>
                                <option>2019-2023</option>
                                <option>2020-2024</option>
                                <option>2021-2025</option>
                                <option>2022-2026</option>
                                <option>2023-2027</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;"  class="null-Session  null" ></span>

                    <div class="inputfield">
                        <label>Current Employement Status</label>
                        <input type="text" class="input" id="name" name="CurrentEmployementStatus"
                            placeholder="Enter Current Employement Status" maxlength="30" title="Enter only alphabets"
                             />
                    </div>
                    <span style="color:red;"  class="null-CurrentEmployementStatus  null" ></span>

                    <div class="inputfield">
                        <label>Designation (If Employed)</label>
                        <input type="text" class="input" id="name" name="Designation"
                            placeholder="Enter Designation (If Employed)" maxlength="30" title="Enter only alphabets"
                             />
                    </div>
                    <span style="color:red;"  class="null-Designation  null" ></span>

                    <div class="inputfield">
                        <label>Organization Name</label>
                        <input type="text" class="input" id="name" name="OrganizationName"
                            placeholder="Enter Organization Name" maxlength="30" title="Enter only alphabets"
                             />
                    </div>
                    <span style="color:red;"  class="null-OrganizationName  null" ></span>

                    <div class="inputfield">
                        <label>Office Email</label>
                        <input type="email" class="input" name="OfficeEmail" placeholder="Enter Office Email"
                             />
                    </div>
                    <span style="color:red;"  class="null-OfficeEmail  null" ></span>

                    <div class="inputfield">
                        <label for="">Office Phone No.</label>
                        <input type="tel" class="input" name="OfficePhNo" maxlength="15"  id="phone-number"
                            placeholder="Enter Office Phone No." title="Please enter Office Phone No." />
                    </div>
                    <span style="color:red;"  class="null-OfficePhNo  null" ></span>

                    <div class="inputfield" id="gender">
                        <label for="">Gender</label><br>
                        <input type="radio" name="gender" id="radio" value="Male" />Male
                        <input type="radio" name="gender" id="radio" value="Female" />Female
                    </div>
                    <span style="color:red;"  class="null-gender  null" ></span>

                    <div class="inputfield">
                        <label>Password</label>
                        <input type="password" class="input" id="password" name="Password"
                            placeholder="Enter password min 8 characters" autocomplete="off" onkeyup="check()"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            maxlength="100" minlength="8"  />
                    </div>
                    <span style="color:red;"  class="null-Password  null" ></span>

                    <div class="inputfield">
                        <label>Confirm Password</label>
                        <input type="password" onkeyup="check()" class="input" id="confirm-password"
                            name="ConfirmPassword" placeholder="Confirm password" autocomplete="off"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            maxlength="100" minlength="8"  />
                    </div>
                    <span style="color:red;"  class="null-ConfirmPassword  null" ></span>

                    <div class="inputfield">
                        <label>Upload CNIC / Student Card</label>
                        <!-- <p id="file-size">* Max size 100kb.</p> -->
                        <input type="file" name="CNIC_img" accept="image/*" id="myfile" placeholder="Upload your photo"
                            rows="7"  />
                    </div>
                    <span style="color:red;"  class="null-CNIC_img  null" ></span><br>
                    <div class="inputfield btns" id="btn">
                        <button type="submit" value="Register" class="btn" onclick="checkPassword()">
                            Register
                        </button>
                        <button type="reset" value="Reset" class="btn">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->

    <?php include('include/footer.php'); ?>
    <?php include('include/script.php'); ?>

    <script>
    $(document).ready(function() {

        $('#register_process').submit(function(event) {
            event.preventDefault();
            $('.null').html('');

            // Create a FormData object to handle the form data
            var formData = new FormData(this);

            // Append additional data to the FormData object
            formData.append('type', 'alumni');

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
                        $('#register_process').find('input, select, textarea').val('');

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
</body>

</html>