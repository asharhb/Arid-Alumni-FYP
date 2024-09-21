<div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                        class="fas fa-user-secret me-2"></i>ARID ALUMNI</div>
        <div class="list-group list-group-flush my-3">
                <a href="verify_alumni.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-user-lock me-2 <?php echo isActive('verify_alumni.php'); ?>"></i>Verify
                        Alumni</a>
                <a href="verify_student.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-user-shield me-2 <?php echo isActive('verify_student.php'); ?>"></i>Verify
                        Student</a>
                <a href="add_admin.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-plus-circle me-2 <?php echo isActive('add_admin.php'); ?>"></i>Add
                        Admin</a>
                <a href="job_approve.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-paper-plane me-2 <?php echo isActive('job_approve.php'); ?>"></i>Jobs
                        Approval</a>
                <a href="job_applicant.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-paper-plane me-2 <?php echo isActive('job_applicant.php'); ?>"></i>Jobs
                        Applicant</a>
                <a href="contact.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                style='font-size:15px'
                                class='fas me-2 <?php echo isActive('contact.php'); ?>'>&#xf2bb;</i>Contact</a>
                <a href="testimonial.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="far fa-comment-alt me-2 <?php echo isActive('testimonial.php'); ?>"></i>Testimonial</a>
                <a href="success-stories.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fa fa-gem me-2 <?php echo isActive('success-stories.php'); ?>"></i>Success
                        Stories</a>
                <a href="logout.php"
                        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                class="fas fa-power-off me-2"></i>Logout</a>
        </div>
</div>

<?php
function isActive($page)
{
        return (basename($_SERVER['PHP_SELF']) == $page) ? 'text-success' : '';
}
?>