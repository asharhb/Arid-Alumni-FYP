<?php include "include/middleware.php"; ?>
<?php
include("include/connection.php");
$id = $_SESSION['id'];
$qry = "SELECT * FROM alumni  where id=$id   ";
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
    <!-- Page Header Start -->
    <div class="page-header mb-0">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h2>Update Profile</h2>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <a href="">Home</a>
                    <a href="">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Form-Start -->
    <section class="sec-std-form">
        <div class="wrapper">
            <div class="title" data-aos="fade-down">Update Profile</div>
            <form id="register_process" enctype="multipart/form-data" data-netlify="true">
                <div class="form">
                    <div class="inputfield">
                        <label>Full Name</label>
                        <input type="text" class="input" value="<?php echo $a['FullName'] ?>" id="name" name="FullName"
                            placeholder="Enter Full Name" maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-FullName  null"></span>

                    <div class="inputfield">
                        <label>Registration No.</label>
                        <input type="text" class="input" value="<?php echo $a['RegistrationNo'] ?>" id="name"
                            name="RegistrationNo" placeholder="Enter Registration No." maxlength="20"
                            title="Enter Registration No." />
                    </div>
                    <span style="color:red;" class="null-RegistrationNo  null"></span>

                    <div class="inputfield">
                        <label>CNIC No.</label>
                        <input type="text" class="input" value="<?php echo $a['CNIC_no'] ?>" id="name" name="CNIC_no"
                            placeholder="Enter CNIC No." maxlength="20" title="Enter only numbers" />
                    </div>
                    <span style="color:red;" class="null-CNIC_no  null"></span>

                    <div class="inputfield">
                        <label>Email Address</label>
                        <input type="email" class="input" value="<?php echo $a['Email'] ?>" name="Email"
                            placeholder="Enter your email" />
                    </div>
                    <span style="color:red;" class="null-Email  null"></span>


                    <div class="inputfield">
                        <label for="">Phone Number</label>
                        <input type="tel" class="input" value="<?php echo $a['PhoneNumber'] ?>" name="PhoneNumber"
                            maxlength="15" id="phone-number" placeholder="Enter phone number"
                            title="Please enter valid phone number" />
                    </div>
                    <span style="color:red;" class="null-PhoneNumber  null"></span>

                    <div class="inputfield">
                        <label>Passout Year</label>
                        <div class="custom_select">
                            <select id="state" name="Passoutyear">
                                <option value="">Select Passout Year</option>
                                <option <?php if ($a['Passoutyear'] == '2018')
                                    echo 'selected'; ?>>2018</option>
                                <option <?php if ($a['Passoutyear'] == '2019')
                                    echo 'selected'; ?>>2019</option>
                                <option <?php if ($a['Passoutyear'] == '2020')
                                    echo 'selected'; ?>>2020</option>
                                <option <?php if ($a['Passoutyear'] == '2021')
                                    echo 'selected'; ?>>2021</option>
                                <option <?php if ($a['Passoutyear'] == '2022')
                                    echo 'selected'; ?>>2022</option>
                                <option <?php if ($a['Passoutyear'] == '2023')
                                    echo 'selected'; ?>>2023</option>
                                <option <?php if ($a['Passoutyear'] == '2024')
                                    echo 'selected'; ?>>2024</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;" class="null-Passoutyear  null"></span>

                    <div class="inputfield">
                        <label>Department of Graduation</label>
                        <div class="custom_select">
                            <select id="state" name="DepartmentofGraduation">
                                <option value="">Select Department</option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BSCS')
                                    echo 'selected'; ?>>BSCS
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BSIT')
                                    echo 'selected'; ?>>BSIT
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BBA')
                                    echo 'selected'; ?>>BBA
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BS-SE')
                                    echo 'selected'; ?>>BS-SE
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BS-HND')
                                    echo 'selected'; ?>>BS-HND
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BS-FST')
                                    echo 'selected'; ?>>BS-FST
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BS-MLT')
                                    echo 'selected'; ?>>BS-MLT
                                </option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BBA 2 Year')
                                    echo 'selected'; ?>>BBA
                                    2 Year</option>
                                <option <?php if ($a['DepartmentofGraduation'] == 'BS-Microiblology')
                                    echo 'selected'; ?>>
                                    BS-Microiblology</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;" class="null-DepartmentofGraduation  null"></span>

                    <div class="inputfield">
                        <label>Session</label>
                        <div class="custom_select">
                            <select id="state" name="Session">
                                <option value="">Select Session</option>
                                <option <?php if ($a['Session'] == '2014-2018')
                                    echo 'selected'; ?>>2014-2018</option>
                                <option <?php if ($a['Session'] == '2015-2019')
                                    echo 'selected'; ?>>2015-2019</option>
                                <option <?php if ($a['Session'] == '2016-2020')
                                    echo 'selected'; ?>>2016-2020</option>
                                <option <?php if ($a['Session'] == '2017-2021')
                                    echo 'selected'; ?>>2017-2021</option>
                                <option <?php if ($a['Session'] == '2018-2022')
                                    echo 'selected'; ?>>2018-2022</option>
                                <option <?php if ($a['Session'] == '2019-2023')
                                    echo 'selected'; ?>>2019-2023</option>
                                <option <?php if ($a['Session'] == '2020-2024')
                                    echo 'selected'; ?>>2020-2024</option>
                                <option <?php if ($a['Session'] == '2021-2025')
                                    echo 'selected'; ?>>2021-2025</option>
                                <option <?php if ($a['Session'] == '2022-2026')
                                    echo 'selected'; ?>>2022-2026</option>
                                <option <?php if ($a['Session'] == '2023-2027')
                                    echo 'selected'; ?>>2023-2027</option>
                            </select>
                        </div>
                    </div>
                    <span style="color:red;" class="null-Session  null"></span>

                    <div class="inputfield">
                        <label>Current Employement Status</label>
                        <input type="text" class="input" value="<?php echo $a['CurrentEmployementStatus'] ?>" id="name"
                            name="CurrentEmployementStatus" placeholder="Enter Current Employement Status"
                            maxlength="30" title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-CurrentEmployementStatus  null"></span>

                    <div class="inputfield">
                        <label>Designation (If Employed)</label>
                        <input type="text" class="input" value="<?php echo $a['Designation'] ?>" id="name"
                            name="Designation" placeholder="Enter Designation (If Employed)" maxlength="30"
                            title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-Designation  null"></span>

                    <div class="inputfield">
                        <label>Organization Name</label>
                        <input type="text" class="input" value="<?php echo $a['OrganizationName'] ?>" id="name"
                            name="OrganizationName" placeholder="Enter Organization Name" maxlength="30"
                            title="Enter only alphabets" />
                    </div>
                    <span style="color:red;" class="null-OrganizationName  null"></span>

                    <div class="inputfield">
                        <label>Office Email</label>
                        <input type="email" class="input" value="<?php echo $a['OfficeEmail'] ?>" name="OfficeEmail"
                            placeholder="Enter Office Email" />
                    </div>
                    <span style="color:red;" class="null-OfficeEmail  null"></span>

                    <div class="inputfield">
                        <label for="">Office Phone No.</label>
                        <input type="tel" class="input" value="<?php echo $a['OfficePhNo'] ?>" name="OfficePhNo"
                            maxlength="15" id="phone-number" placeholder="Enter Office Phone No."
                            title="Please enter Office Phone No." />
                    </div>
                    <span style="color:red;" class="null-OfficePhNo  null"></span>

                    <div class="inputfield" id="gender">
                        <label for="">Gender</label><br>

                        <input type="radio" <?php if ($a['gender'] == 'Male')
                            echo 'checked'; ?> name="gender" checked
                            value="Male" id="dot-1">&nbsp; Male &nbsp;&nbsp;
                        <input type="radio" <?php if ($a['gender'] == 'Female')
                            echo 'checked'; ?> name="gender"
                            value="Female" id="dot-2">&nbsp; Female
                    </div>
                    <span style="color:red;" class="null-gender  null"></span>

                    <span style="color:red;" class="null-ConfirmPassword  null"></span>

                    <div class="inputfield">
                        <label>Upload CNIC / Student Card</label>
                        <!-- <p id="file-size">* Max size 100kb.</p> -->
                        <input type="file" name="CNIC_img" accept="image/*" id="myfile" placeholder="Upload your photo"
                            rows="7" />
                    </div>
                    <span style="color:red;" class="null-CNIC_img  null"></span><br>
                    <div class="inputfield btns" id="btn">
                        <button type="submit" value="Register" class="btn">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Form-End -->
    <script>
        $(document).ready(function () {

            $('#register_process').submit(function (event) {
                event.preventDefault();
                $('.null').html(''); // clears any previous error

                // Create a FormData object to handle the form data
                var formData = new FormData(this);

                // Append additional data to the FormData object
                formData.append('type', 'alumniupdate');

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
                            //  $('#register_process').find('input, select, textarea').val('');

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