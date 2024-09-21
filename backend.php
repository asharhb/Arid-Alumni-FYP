<?php
session_start();

include('include/connection.php');

//Check if the form is submitted via AJAX
// Alumni Reg. Form 
if (isset($_POST['type']) && $_POST['type'] == "alumni") {

    //Get the values from the form
    $FullName = trim($_POST['FullName']);
    $RegistrationNo = trim($_POST['RegistrationNo']);
    $CNIC_img = $_FILES['CNIC_img'];
    $Session = trim($_POST['Session']);
    $CNIC_no = trim($_POST['CNIC_no']);
    $Email = trim($_POST['Email']);
    // $DateofBirth = trim($_POST['DateofBirth']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $Passoutyear = trim($_POST['Passoutyear']);
    $DepartmentofGraduation = trim($_POST['DepartmentofGraduation']);
    $CurrentEmployementStatus = trim($_POST['CurrentEmployementStatus']);
    $Designation = trim($_POST['Designation']);
    $OrganizationName = trim($_POST['OrganizationName']);
    $OfficeEmail = trim($_POST['OfficeEmail']);
    $OfficePhNo = trim($_POST['OfficePhNo']);
    $Password = trim($_POST['Password']);
    $ConfirmPassword = trim($_POST['ConfirmPassword']);
    $date = date("Y-m-d"); //Current date
    $status = 1; //Default status

    //Validate the input
    $errors = array();
    if ($CNIC_img['error'] !== UPLOAD_ERR_OK) {
        $errors['CNIC_img'] = "CNIC Img is required!";
    }
    if (empty($FullName)) {
        $errors['FullName'] = "Full Name is required!";
    }
    if (empty($Email)) {
        $errors['Email'] = "Email is required!";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = "Invalid email format!";
    } else {

        //Check if the email already exists in the database
        $qu = "SELECT * FROM `alumni` WHERE `Email` = '$Email' ";
        $con = mysqli_query($conn, $qu);
        if (mysqli_num_rows($con) > 0) {
            $errors['Email'] = "Email already exists!";
        }
    }
    if (empty($Session)) {
        $errors['Session'] = "Session  is required!";
    }
    if (empty($Session)) {
        $errors['RegistrationNo'] = "Registration No  is required!";
    }
    if (empty($CNIC_no)) {
        $errors['CNIC_no'] = "CNIC No  is required!";
    }
    if (empty($PhoneNumber)) {
        $errors['PhoneNumber'] = "Phone Number  is required!";
    }
    if (empty($Passoutyear)) {
        $errors['Passoutyear'] = "Pass out year  is required!";
    }
    if (empty($DepartmentofGraduation)) {
        $errors['DepartmentofGraduation'] = "Department of Graduation  is required!";
    }
    if (!isset($_POST['gender'])) {
        $errors['gender'] = "Gender is required!";
    } else {
        $gender = trim($_POST['gender']);
    }

    if (empty($Password)) {
        $errors['Password'] = "Password is required!";
    } elseif (strlen($Password) < 8) {
        $errors['Password'] = "Password must be at least 8 characters long!";
    } elseif ($Password != $ConfirmPassword) {
        $errors['Password'] = "Passwords do not match!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $uploadDirectory = 'files/';
        $uploadedFile = $uploadDirectory . uniqid() . "_" . $CNIC_img['name'];
        move_uploaded_file($CNIC_img['tmp_name'], $uploadedFile);

        $stmt = "INSERT INTO `alumni`(`FullName`, `RegistrationNo`, `CNIC_img`, `Session`, `CNIC_no`, `Email`, `gender`, `PhoneNumber`, `Passoutyear`,`DepartmentofGraduation`, `CurrentEmployementStatus`, `Designation`, `OrganizationName`, `OfficeEmail`, `OfficePhNo`, `Password`,`status`,`date`) VALUES ('$FullName','$RegistrationNo','$uploadedFile','$Session','$CNIC_no','$Email','$gender','$PhoneNumber','$Passoutyear','$DepartmentofGraduation','$CurrentEmployementStatus','$Designation','$OrganizationName','$OfficeEmail','$OfficePhNo','$Password',1,'$date')";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Your Account Created successfully!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please try again!"
                )
            );
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Alumni Form Update
if (isset($_POST['type']) && $_POST['type'] == "alumniupdate") {

    //Get the values from the form
    $FullName = trim($_POST['FullName']);
    $RegistrationNo = trim($_POST['RegistrationNo']);
    $CNIC_img = $_FILES['CNIC_img'];
    $Session = trim($_POST['Session']);
    $CNIC_no = trim($_POST['CNIC_no']);
    $gender = trim($_POST['gender']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $Passoutyear = trim($_POST['Passoutyear']);
    $DepartmentofGraduation = trim($_POST['DepartmentofGraduation']);
    $CurrentEmployementStatus = trim($_POST['CurrentEmployementStatus']);
    $Designation = trim($_POST['Designation']);
    $OrganizationName = trim($_POST['OrganizationName']);
    $OfficeEmail = trim($_POST['OfficeEmail']);
    $OfficePhNo = trim($_POST['OfficePhNo']);

    //Validate the input
    $errors = array();

    if (empty($FullName)) {
        $errors['FullName'] = "Full Name is required!";
    }

    if (empty($Session)) {
        $errors['Session'] = "Session  is required!";
    }
    if (empty($CNIC_no)) {
        $errors['CNIC_no'] = "CNIC No  is required!";
    }
    if (empty($PhoneNumber)) {
        $errors['PhoneNumber'] = "Phone Number  is required!";
    }
    if (empty($Passoutyear)) {
        $errors['Passoutyear'] = "Pass out year  is required!";
    }
    if (empty($DepartmentofGraduation)) {
        $errors['DepartmentofGraduation'] = "Department of Graduation  is required!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $id = $_SESSION['id'];
        if ($CNIC_img['error'] !== UPLOAD_ERR_OK) {

            $qry = "SELECT * FROM alumni where id=$id ";
            $res = mysqli_query($conn, $qry);
            $a = mysqli_fetch_assoc($res);

            $uploadedFile = $a['CNIC_img'];
        } else {
            $uploadDirectory = 'files/';
            $uploadedFile = $uploadDirectory . uniqid() . "_" . $CNIC_img['name'];
            move_uploaded_file($CNIC_img['tmp_name'], $uploadedFile);

        }

        $stmt = "UPDATE `alumni` SET `FullName`='$FullName',`RegistrationNo`='$RegistrationNo',`CNIC_img`='$uploadedFile',`Session`='$Session',`CNIC_no`='$CNIC_no',`gender`='$gender',`PhoneNumber`='$PhoneNumber',`Passoutyear`='$Passoutyear',`DepartmentofGraduation`='$DepartmentofGraduation',`CurrentEmployementStatus`='$CurrentEmployementStatus',`Designation`='$Designation',`OrganizationName`='$OrganizationName',`OfficeEmail`='$OfficeEmail',`OfficePhNo`='$OfficePhNo'  where id=$id";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Account Info updated successfully!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please try again!"
                )
            );
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Student Reg. Form
if (isset($_POST['type']) && $_POST['type'] == "student") {

    //Get the values from the form
    $FullName = trim($_POST['FullName']);
    $RegistrationNo = trim($_POST['RegistrationNo']);
    $CNIC_img = $_FILES['CNIC_img'];
    $Session = trim($_POST['Session']);
    $CNIC_no = trim($_POST['CNIC_no']);
    $Email = trim($_POST['Email']);
    $Department = trim($_POST['Department']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $Password = trim($_POST['Password']);
    $ConfirmPassword = trim($_POST['ConfirmPassword']);
    $date = date("Y-m-d"); //Current date
    $status = 1; //Default status

    //Validate the input
    $errors = array();
    if (!isset($_POST['gender'])) {
        $errors['gender'] = "Gender is required!";
    } else {
        $gender = trim($_POST['gender']);
    }
    if ($CNIC_img['error'] !== UPLOAD_ERR_OK) {
        $errors['CNIC_img'] = "CNIC Img is required!";
    }
    if (empty($CNIC_no)) {
        $errors['CNIC_no'] = "CNIC No. is required!";
    }
    if (empty($RegistrationNo)) {
        $errors['RegistrationNo'] = "Registration No. is required!";
    }
    if (empty($FullName)) {
        $errors['FullName'] = "Full Name is required!";
    }
    if (empty($Email)) {
        $errors['Email'] = "Email is required!";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = "Invalid email format!";
    } else {

        //Check if the email already exists in the database
        $qu = "SELECT * FROM `student` WHERE `Email` = '$Email' ";
        $con = mysqli_query($conn, $qu);
        if (mysqli_num_rows($con) > 0) {
            $errors['Email'] = "Email already exists!";
        }
    }
    if (empty($Session)) {
        $errors['Session'] = "Session  is required!";
    }
    if (empty($PhoneNumber)) {
        $errors['PhoneNumber'] = "Phone Number is required!";
    }
    if (empty($Department)) {
        $errors['Department'] = "Department is required!";
    }

    if (empty($Password)) {
        $errors['Password'] = "Password is required!";
    } elseif (strlen($Password) < 8) {
        $errors['Password'] = "Password must be at least 8 characters long!";
    } elseif ($Password != $ConfirmPassword) {
        $errors['Password'] = "Passwords do not match!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $uploadDirectory = 'files/';
        $uploadedFile = $uploadDirectory . uniqid() . "_" . $CNIC_img['name'];
        move_uploaded_file($CNIC_img['tmp_name'], $uploadedFile);

        $stmt = "INSERT INTO `student`( `FullName`, `RegistrationNo`, `CNIC_img`, `Session`, `CNIC_no`, `Email`, `PhoneNumber`, `Department`, `Gender`, `Password`, `status`,`date`) VALUES ('$FullName','$RegistrationNo','$uploadedFile','$Session','$CNIC_no','$Email','$PhoneNumber','$Department','$gender','$Password',1,'$date')";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Your Account Created successfully!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please try again!"
                )
            );
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Student Form Update
if (isset($_POST['type']) && $_POST['type'] == "studentupdate") {

    //Get the values from the form
    $FullName = trim($_POST['FullName']);
    $RegistrationNo = trim($_POST['RegistrationNo']);
    $CNIC_img = $_FILES['CNIC_img'];
    $Session = trim($_POST['Session']);
    $CNIC_no = trim($_POST['CNIC_no']);
    $gender = trim($_POST['gender']);
    $Department = trim($_POST['Department']);
    $PhoneNumber = trim($_POST['PhoneNumber']);

    //Validate the input
    $errors = array();

    if (empty($RegistrationNo)) {
        $errors['RegistrationNo'] = "Registration No is required!";
    }
    if (empty($FullName)) {
        $errors['FullName'] = "Full Name is required!";
    }

    if (empty($Session)) {
        $errors['Session'] = "Session  is required!";
    }
    if (empty($PhoneNumber)) {
        $errors['PhoneNumber'] = "Phone Number  is required!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $id = $_SESSION['id'];
        if ($CNIC_img['error'] !== UPLOAD_ERR_OK) {

            $qry = "SELECT * FROM student where id=$id ";
            $res = mysqli_query($conn, $qry);
            $a = mysqli_fetch_assoc($res);

            $uploadedFile = $a['CNIC_img'];
        } else {
            $uploadDirectory = 'files/';
            $uploadedFile = $uploadDirectory . uniqid() . "_" . $CNIC_img['name'];
            move_uploaded_file($CNIC_img['tmp_name'], $uploadedFile);

        }

        $stmt = "UPDATE `student` SET `FullName`='$FullName',`RegistrationNo`='$RegistrationNo',`CNIC_img`='$uploadedFile',`Session`='$Session',`CNIC_no`='$CNIC_no',`PhoneNumber`='$PhoneNumber',`Department`='$Department',`Gender`='$gender' where id=$id";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Info updated successfully!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please try again!"
                )
            );
        }

    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Change Password
if (isset($_POST['type']) && $_POST['type'] == "pass") {

    $cp = trim($_POST['cp']);
    $Password = trim($_POST['Password']);
    $ConfirmPassword = trim($_POST['ConfirmPassword']);

    //Validate the input
    $errors = array();

    if (empty($cp)) {
        $errors['cp'] = "current password is required!";
    }

    if (empty($Password)) {
        $errors['Password'] = "Password is required!";
    } elseif (strlen($Password) < 8) {
        $errors['Password'] = "Password must be at least 8 characters long!";
    } elseif ($Password != $ConfirmPassword) {
        $errors['Password'] = "Passwords do not match!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $id = $_SESSION['id'];
        $type = $_SESSION['type'];

        if ($type == "alumni") {
            $stmt = "SELECT * FROM `alumni` WHERE  id=$id and  `password`= '$cp'";
            $run = mysqli_query($conn, $stmt);
            if (mysqli_num_rows($run) > 0) {

                $dd = "UPDATE `alumni` SET `Password`='$Password' WHERE id=$id";
                mysqli_query($conn, $dd);
                echo json_encode(
                    array(
                        'success' => true,
                        'message' => "Your Password Updated successfully!"
                    )
                );
            } else {
                echo json_encode(
                    array(
                        'success' => "oop",
                        'message' => "Invalid current Password"
                    )
                );
            }
        } else {
            $stmt = "SELECT * FROM `student` WHERE  id=$id and  `password`= '$cp'";
            $run = mysqli_query($conn, $stmt);
            if (mysqli_num_rows($run) > 0) {

                $dd = "UPDATE `student` SET `Password`='$Password' WHERE id=$id";
                mysqli_query($conn, $dd);
                echo json_encode(
                    array(
                        'success' => true,
                        'message' => "Your Password Updated successfully!"
                    )
                );
            } else {
                echo json_encode(
                    array(
                        'success' => "oop",
                        'message' => "Invalid current Password"
                    )
                );
            }
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Job Post
if (isset($_POST['type']) && $_POST['type'] == "job") {

    //Get the values from the form
    $Company = trim($_POST['Company']);
    $JobLocation = trim($_POST['JobLocation']);
    $JobTitle = trim($_POST['JobTitle']);
    $Qualification = trim($_POST['Qualification']);
    $Description = trim($_POST['Description']);
    $KeySkill = trim($_POST['KeySkill']);
    $Package = trim($_POST['Package']);
    $ExperienceRequired = trim($_POST['ExperienceRequired']);
    $NoofVacancy = trim($_POST['NoofVacancy']);
    $ReferralEmail = trim($_POST['ReferralEmail']);
    $LastDateToApply = trim($_POST['LastDateToApply']);
    $phonenumber = trim($_POST['phonenumber']);
    $date = date("Y-m-d"); //Current date
    $status = 1; //Default status
    $id = $_SESSION['id'];
    $user_type = $_SESSION['type'];

    //Validate the input
    $errors = array();
    if (empty($Company)) {
        $errors['Company'] = "Company Name is required!";
    }
    if (empty($JobTitle)) {
        $errors['JobTitle'] = "Job Title is required!";
    }
    if (empty($JobLocation)) {
        $errors['JobLocation'] = "Job Location is required!";
    }
    if (empty($Qualification)) {
        $errors['Qualification'] = "Qualification is required!";
    }
    if (empty($Description)) {
        $errors['Description'] = "Description is required!";
    }
    if (empty($KeySkill)) {
        $errors['KeySkill'] = "Key Skill is required!";
    }

    if (empty($Package)) {
        $errors['Package'] = "Package is required!";
    }
    if (empty($ExperienceRequired)) {
        $errors['ExperienceRequired'] = "Experience is required!";
    }
    if (empty($NoofVacancy)) {
        $errors['NoofVacancy'] = "No of Vacancy is required!";
    }
    if (empty($ReferralEmail)) {
        $errors['ReferralEmail'] = "Company Email is required!";
    }

    if (empty($LastDateToApply)) {
        $errors['LastDateToApply'] = "Last Date To Apply is required!";
    }
    if (empty($phonenumber)) {
        $errors['phonenumber'] = "Company Phone No is required!!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {

        $stmt = "INSERT INTO `job`(`user_id`,`user_type`,`Company`, `JobLocation`, `JobTitle`, `Qualification`, `Description`, `KeySkill`, `Package`, `ExperienceRequired`, `NoofVacancy`, `ReferralEmail`, `LastDateToApply`,`phonenumber`, `date`, `status`) VALUES ('$id','$user_type','$Company','$JobLocation','$JobTitle','$Qualification','$Description','$KeySkill','$Package','$ExperienceRequired','$NoofVacancy','$ReferralEmail','$LastDateToApply','$phonenumber','$date',1)";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Job Created Successfully and Pending for Approval!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please Try Again!"
                )
            );
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Job Apply
if (isset($_POST['type']) && $_POST['type'] == "apply") {

    //Get the values from the form
    $CandidateName = trim($_POST['CandidateName']);
    $UploadResume = $_FILES['UploadResume'];
    $CandiadateContactNo = trim($_POST['CandiadateContactNo']);
    $Email = trim($_POST['Email']);
    $CoverLetter = trim($_POST['CoverLetter']);
    $idd = trim($_POST['idd']);

    //Validate the input
    $errors = array();
    if ($UploadResume['error'] !== UPLOAD_ERR_OK) {
        $errors['UploadResume'] = "Resume is required!";
    }
    if (empty($CandidateName)) {
        $errors['CandidateName'] = "Candidate Name is required!";
    }
    if (empty($UploadResume)) {
        $errors['UploadResume'] = "Resume is required!";
    }
    if (empty($CandiadateContactNo)) {
        $errors['CandiadateContactNo'] = "Candiadate ContactNo is required!";
    }
    if (!isset($_POST['gender'])) {
        $errors['gender'] = "Gender is required!";
    } else {
        $gender = trim($_POST['gender']);
    }
    if (empty($Email)) {
        $errors['Email'] = "Email is required!";
    }
    if (empty($CoverLetter)) {
        $errors['CoverLetter'] = "Cover Letter is required!";
    }

    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $uploadDirectory = 'files/';
        $uploadedFile = $uploadDirectory . uniqid() . "_" . $UploadResume['name'];
        move_uploaded_file($UploadResume['tmp_name'], $uploadedFile);
        $user_id = $_SESSION['id'];
        $user_type = $_SESSION['type'];
        $stmt = "INSERT INTO `apply`(`CandidateName`, `UploadResume`, `CandiadateContactNo`, `gender`, `Email`, `CoverLetter`, `user_id`, `user_type`,`job_id`) VALUES ('$CandidateName','$uploadedFile','$CandiadateContactNo','$gender','$Email','$CoverLetter','$user_id','$user_type','$idd')";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "You have applied successfully!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "Registration failed. Please try again!"
                )
            );
        }
    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}

// Testimonial
if (isset($_POST['type']) && $_POST['type'] == "tst") {

    //Get the values from the form
    $name = trim($_POST['name']);
    $msg = trim($_POST['msg']);
    $post = trim($_POST['post']);
    $img = $_FILES['img'];
    $status = 1; //Default status

    //Validate the input
    $errors = array();
    if ($img['error'] !== UPLOAD_ERR_OK) {
        $errors['img'] = "Photo is required!";
    }
    if (empty($msg)) {
        $errors['msg'] = "Feedback is required!";
    }
    if (empty($name)) {
        $errors['name'] = "Feedback is required!";
    }
    if (empty($post)) {
        $errors['post'] = "Post  is required!";
    }


    //If there are no validation errors, insert the data into the database
    if (empty($errors)) {
        $uploadDirectory = 'files/';
        $uploadedFile = $uploadDirectory . uniqid() . "_" . $img['name'];
        move_uploaded_file($img['tmp_name'], $uploadedFile);

        $stmt = "INSERT INTO `feedback`(`name`, `msg`, `post`, `img`) VALUES ('$name','$msg','$post','$uploadedFile')";
        $run = mysqli_query($conn, $stmt);
        if ($run) {
            echo json_encode(
                array(
                    'success' => true,
                    'message' => "Thanks for your feedback!"
                )
            );
        } else {
            echo json_encode(
                array(
                    'success' => "oop",
                    'message' => "feedback failed. Please try again!"
                )
            );
        }

    } else {
        //Send an error response
        echo json_encode(
            array(
                'success' => false,
                'message' => $errors
            )
        );
    }
}
?>