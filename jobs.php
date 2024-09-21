<?php include "include/middleware.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Arid Alumni | Jobs</title>
  <?php include "include/link.php"; ?>
</head>

<body>
  <?php include "include/navbar.php"; ?>

  <!-- Page Header Start -->
  <div class="page-header mb-0 job">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-down">
          <h2>Jobs</h2>
        </div>
        <div class="col-12" data-aos="fade-right">
          <a href="">Home</a>
          <a href="">Jobs</a>
        </div>
      </div>
    </div>
    <a class="btn custom-btn post-job-btn" data-aos="fade-up" href="job-post.php">Post Job</a>
  </div>
  <!-- Page Header End -->

  <!-- Jobs Section -->
  <section>
    <div class="jobs-list-container">
      <h2 data-aos="flip-right">Recent Jobs</h2>
      <div class="jobs">
        <?php
        include("include/connection.php");
        $qry = "SELECT * FROM job where status=0 ";
        $res = mysqli_query($conn, $qry);

        while ($a = mysqli_fetch_array($res)) { ?>

          <div class="job" data-aos="fade-down">
            <!-- <img src="img/data-scientist.svg" alt="" /> -->
            <h3 class="job-title">
              <?php echo $a['JobTitle'] ?>
            </h3>
            <span class="posted-on"><b>Posted on :</b>
              <?php echo $a['date'] ?>
            </span>
            <span class="open-positions"><b>No of Vacancy :</b>
              <?php echo $a['NoofVacancy'] ?>
            </span>
            <div class="details">
              <?php echo $a['Description'] ?>
            </div>
            <a href="#" class="details-btn" data-toggle="modal" data-target="#job-<?php echo $a['id'] ?>">More Details</a>

          </div>

          <div class="modal fade" id="job-<?php echo $a['id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content panda-frm">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Job Detail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body-job">
                  <h6>Company Name : <span>
                      <?php echo $a['Company'] ?>
                    </span></h6>
                  <h6>Job Location : <span>
                      <?php echo $a['JobTitle'] ?>
                    </span></h6>
                  <h6>Qualification : <span>
                      <?php echo $a['Qualification'] ?>
                    </span></h6>
                  <h6>Key Skill : <span>
                      <?php echo $a['KeySkill'] ?>
                    </span></h6>
                  <h6>Package : <span>
                      <?php echo $a['Package'] ?>
                    </span></h6>
                  <h6>Last Date to Apply : <span>
                      <?php echo $a['LastDateToApply'] ?>
                    </span></h6>
                  <h6>Company Email : <span>
                      <?php echo $a['ReferralEmail'] ?>
                    </span></h6>
                  <h6>Company Phone No. : <span>
                      <?php echo $a['phonenumber'] ?>
                    </span></h6>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-success text-light">
                    <a class="text-light" href="job-apply.php?id=<?php echo $a['id'] ?>"> Apply</a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- Jobs Section End -->

  <!-- Footer Start -->
  <?php include "include/footer.php"; ?>
  <?php include "include/script.php"; ?>
</body>

</html>