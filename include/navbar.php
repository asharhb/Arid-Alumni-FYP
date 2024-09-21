<div class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">ARID <span>ALUMNI</span></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link <?php echo isActive('index.php'); ?>">Home</a>
                <a href="gallery.php" class="nav-item nav-link <?php echo isActive('gallery.php'); ?>">Gallery</a>
                <a href="events.php" class="nav-item nav-link <?php echo isActive('events.php'); ?>">Events</a>
                <a href="success-stories.php"
                    class="nav-item nav-link <?php echo isActive('success-stories.php'); ?>">Success Stories</a>
                <?php if (!isset($_SESSION["id"])) { ?>
                    <a href="login.php" class="nav-item nav-link <?php echo isActive('login.php'); ?>">Login</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Register</a>
                        <div class="dropdown-menu">
                            <a href="alumni-form.php" class="dropdown-item <?php echo isActive('alumni-form.php'); ?>">New
                                Alumni</a>
                            <a href="student-form.php" class="dropdown-item <?php echo isActive('student-form.php'); ?>">New
                                Student</a>
                        </div>
                    </div>
                <?php } ?>
                <a href="contact.php" class="nav-item nav-link <?php echo isActive('contact.php'); ?>">Contact</a>
                <?php if (isset($_SESSION["id"])) { ?>
                    <a href="discussion.php"
                        class="nav-item nav-link <?php echo isActive('discussion.php'); ?>">Discussions</a>
                    <a href="jobs.php" class="nav-item nav-link <?php echo isActive('jobs.php'); ?>">Jobs</a>

                    <div class="nav-item dropdown my-account-nav">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                        <div class="dropdown-menu">
                            <?php if ($_SESSION["type"] == "alumni") { ?>
                                <a class="dropdown-item"
                                    href="update-profile-alumni.php <?php echo isActive('update-profile-alumni.php'); ?>">Update
                                    Profile</a>
                            <?php } else { ?>
                                <a class="dropdown-item"
                                    href="update-profile-student.php <?php echo isActive('update-profile-student.php'); ?>">Update
                                    Profile</a>
                            <?php } ?>
                            <a class="dropdown-item"
                                href="update-password.php <?php echo isActive('update-password.php'); ?>">Change
                                Password</a>
                            <a class="dropdown-item"
                                href="testimonial.php <?php echo isActive('testimonial.php'); ?>">Feedback</a>
                            <a class="dropdown-item" href="logout.php <?php echo isActive('logout.php'); ?>">Logout</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function isActive($page)
{
    return (basename($_SERVER['PHP_SELF']) == $page) ? 'active' : '';
}
?>