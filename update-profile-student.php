<?php include "include/middleware.php"; ?>
<?php
   include("include/connection.php");
   $id=$_SESSION['id'];
              $qry = "SELECT * FROM student  where id=$id   ";
              $res = mysqli_query($conn, $qry);
             
                    $a = mysqli_fetch_array($res);
              
              
               ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arid Alumni | Update Profile</title>
    <?php include "include/link.php"; ?>

</head>

<body>
    <?php include "include/navbar.php"; ?>
    <!-- Nav Bar End -->

    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-down">
                    <h2>Update Profile</h2>
                </div>
                <div class="col-12" data-aos="fade-right">
                    <a href="">Home</a>
                    <a href="">Student-Form</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="fade-down">Update Profile</div>
            <form id="update_process" enctype="multipart/form-data" data-netlify="true">
                <div class="form">
                    <div class="inputfield">
                        <label>Full Name</label>
                        <input type="text" value="<?php echo $a['FullName'] ?>" class="input" id="name" name="FullName"
                            placeholder="Enter Full Name" maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-FullName  null"></span>

                    <div class="inputfield">
                        <label>Registration No.</label>
                        <input type="text" value="<?php echo $a['RegistrationNo'] ?>" class="input" id="name"
                            name="RegistrationNo" placeholder="Enter Registration No." maxlength="20"
                            title="Enter Registration No." />
                    </div>
                    <span style="color:red;" class="null-RegistrationNo  null"></span>

                    <div class="inputfield">
                        <label>CNIC No.</label>
                        <input type="text" value="<?php echo $a['CNIC_no'] ?>" class="input" id="name" name="CNIC_no"
                            placeholder="Enter CNIC No." maxlength="20" title="Enter only numbers" />
                    </div>
                    <span style="color:red;" class="null-CNIC_no  null"></span>


                    <div class="inputfield">
                        <label>Email Address</label>
                        <input type="email" value="<?php echo $a['Email'] ?>" class="input" name="Email"
                            placeholder="Enter your email" />
                    </div>
                    <span style="color:red;" class="null-Email  null"></span>

                    <div class="inputfield">
                        <label>Department</label>
                        <input type="text" value="<?php echo $a['Department'] ?>" class="input" name="Department"
                            placeholder="Enter your department" />
                    </div>
                    <span style="color:red;" class="null-Department  null"></span>


                    <div class="inputfield">
                        <label for="">Phone Number</label>
                        <input type="tel" value="<?php echo $a['PhoneNumber'] ?>" class="input" name="PhoneNumber"
                            maxlength="15" id="phone-number" placeholder="Enter phone number"
                            title="Please enter valid phone number" />
                    </div>
                    <span style="color:red;" class="null-PhoneNumber  null"></span>


                    <div class="inputfield">
                        <label>Session</label>
                        <div class="custom_select">
                            <select id="state" name="Session">
                                <option value="">Select Session</option>
                                <option <?php if ($a['Session'] == '2014-2018') echo 'selected'; ?>>2014-2018</option>
                                <option <?php if ($a['Session'] == '2015-2019') echo 'selected'; ?>>2015-2019</option>
                                <option <?php if ($a['Session'] == '2016-2020') echo 'selected'; ?>>2016-2020</option>
                                <option <?php if ($a['Session'] == '2017-2021') echo 'selected'; ?>>2017-2021</option>
                                <option <?php if ($a['Session'] == '2018-2022') echo 'selected'; ?>>2018-2022</option>
                                <option <?php if ($a['Session'] == '2019-2023') echo 'selected'; ?>>2019-2023</option>
                                <option <?php if ($a['Session'] == '2020-2024') echo 'selected'; ?>>2020-2024</option>
                                <option <?php if ($a['Session'] == '2021-2025') echo 'selected'; ?>>2021-2025</option>
                                <option <?php if ($a['Session'] == '2022-2026') echo 'selected'; ?>>2022-2026</option>
                                <option <?php if ($a['Session'] == '2023-2027') echo 'selected'; ?>>2023-2027</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;" class="null-Session  null"></span>


                    <div class="inputfield" id="gender">
                        <label for="">Gender</label>

                        <input type="radio" <?php if ($a['Gender'] == 'Male') echo 'checked'; ?> value="Male"
                            name="gender" id="dot-1">Male
                        <input type="radio" <?php if ($a['Gender'] == 'Female') echo 'checked'; ?> value="Female"
                            name="gender" id="dot-2">Female
                    </div>
                    <span style="color:red;" class="null-gender  null"></span>



                    <span style="color:red;" class="null-ConfirmPassword  null"></span>


                    <div class="inputfield">
                        <label>Upload CNIC / Student Card</label>
                        <!-- <p id="file-size">* Max size 100kb.</p> -->
                        <input type="file" name="CNIC_img" accept="image/*" id="myfile" placeholder="Upload your photo"
                            rows="7" />
                    </div>
                    <span style="color:red;" class="null-CNIC_img  null"></span>
                    <div class="inputfield btns" id="btn">
                        <button type="submit" value="Register" class="btn">
                            submit
                        </button>
                      
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->
    
    <script>
    $(document).ready(function() {

        $('#update_process').submit(function(event) {
            event.preventDefault();
            // alert("ok")
            $('.null').html('');

            // Create a FormData object to handle the form data
            var formData = new FormData(this);

            // Append additional data to the FormData object
            formData.append('type', 'studentupdate');

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
                        //  $('#update_process').find('input, select, textarea').val('');

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