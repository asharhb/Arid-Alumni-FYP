<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Arid Alumni | Discussion</title>
  <?php include "include/link.php"; ?>
  <style>
    @media only screen and (min-width: 1024px) {
      .modal-content .modal-body {
        padding: 18px 20px 40px !important;
        margin-right: 0;
      }
    }
  </style>
</head>

<body>
  <?php include "include/navbar.php"; ?>
  <?php
  include('include/connection.php');
  if (isset($_REQUEST['btn'])) {
    $name = $_REQUEST['name'];
    $msg = mysqli_real_escape_string($conn, $_REQUEST['msg']);

    $sql = "INSERT INTO `disscusion`(`name`, `qus`) VALUES ('$name','$msg')";
    mysqli_query($conn, $sql);

    echo "<script>
    toastr.success('Thanks for Posting message!');
  </script>";
  }


  if (isset($_REQUEST['btnreply'])) {
    $name = $_REQUEST['name'];
    $disscussion_id = $_REQUEST['disscussion_id'];
    $mssg = mysqli_real_escape_string($conn, $_REQUEST['mssg']);

    $sql = "INSERT INTO `disscussionreply`(`disscussion_id`,`name`, `mssg`) VALUES ('$disscussion_id','$name','$mssg')";
    mysqli_query($conn, $sql);
    echo "<script>
    toastr.success('Your Reply to post submit successfully!');
  </script>";
  }
  ?>

  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="flip-left">
          <h2>General Discussion Board</h2>
        </div>
        <div class="col-12" data-aos="fade-left">
          <a href="index.php">Home</a>
          <a href="">Discussion</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Forum Start -->
  <!-- Modal -->
  <div class="container">
    <div class="panel panel-default" style="margin-top: 50px">
      <div class="panel-body">
        <h3 class="question" style="border-left: 4px solid #006633;  color: #006633; padding-left: 20px;">Ask Question
        </h3>
        <hr />
        <form method="post">
          <div class="form-group">
            <label for="usr" style="color:black; font-size:1.2rem">Write Your Name:</label>
            <input type="text" value=""
              class="form-control" required />
          </div>
          <div class="form-group">
            <label for="comment" style="color:black; font-size:1.2rem">Write Your Question:</label>
            <textarea class="form-control" rows="5" name="msg" required></textarea>
          </div>
          <button class="btn custom-btn" name="btn" type="submit" id="butsave" value="Send">
            Send
          </button>
        </form>
      </div>
    </div>
    <br>
    <div class="panel panel-default">
      <div class="panel-body">
        <h3 style="margin-top: 2rem;border-left: 4px solid #006633;  color: #006633; padding-left: 20px; ">Recent
          Questions</h3>
        <section>
          <?php
          include("include/connection.php");
          $qry = "SELECT * FROM disscusion";
          $res = mysqli_query($conn, $qry);

          while ($a = mysqli_fetch_array($res)) { ?>
            <div class="alumni-card">
              <div class="alumni-info">
                <h2 class="aos-init aos-animate">
                  <?php
                  $timestamp_str = $a['date'];
                  $timestamp_obj = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp_str);
                  $formatted_time = $timestamp_obj->format('l, F j, Y g:i A');

                  ?>
                  <?php echo $a['name'] ?><span style="color:black;font-size:15px;cursor:pointer; 
                  background-color: #fbaf32; border-radius:8px; margin-bottom:8px;
                    margin-left :2rem; padding:8px" data-toggle="modal"
                    data-target="#ReplyModal-<?php echo $a['id'] ?>">Reply</span><br><span
                    style="color:black;font-size:12px;">
                    <?php echo $formatted_time;
                    ?>
                  </span>
                </h2>
                <p class="aos-init aos-animate" style="color:black; font-weight:bold">
                  <?php echo $a['qus'] ?>
                </p>
                <?php
                $rr = $a['id'];
                $qryy = "SELECT * FROM disscussionreply where disscussion_id='$rr'";
                $ress = mysqli_query($conn, $qryy);

                while ($b = mysqli_fetch_array($ress)) { ?>
                  <div style="margin-left: 50px">
                    <br>
                    <?php
                    $timestamp_str = $b['date'];
                    $timestamp_obj = DateTime::createFromFormat('Y-m-d H:i:s', $timestamp_str);

                    $formatted_time = $timestamp_obj->format('l, F j, Y g:i A');

                    ?>
                    <h4>Replies<span style="color:black;font-size:12px">
                        <?php echo $formatted_time;
                        ?>
                      </span></h4>
                    <p class=" aos-init aos-animate"><span><b>
                          <?php echo $b['name'] ?>:
                        </b></span>
                      <?php echo $b['mssg'] ?>
                    </p>

                  </div>
                <?php } ?>
              </div>
            </div>
            <div id="ReplyModal-<?php echo $a['id'] ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div style="position: relative;
                  top: -150px;" class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      &times;
                    </button>

                  </div>
                  <div class="modal-body">
                    <h4 class="modal-title">Reply Question</h4>
                    <form method="post">
                      <input type="hidden" id="commentid" value="<?php echo $a['id'] ?>" name="disscussion_id" />
                      <div class="form-group">
                        <label for="usr">Write your name:</label>
                        <input type="text" value=""
                          class="form-control" name="name" required />
                      </div>
                      <div class="form-group">
                        <label for="comment">Write your reply:</label>
                        <textarea class="form-control" rows="5" name="mssg" required></textarea>
                      </div>
                      <button class="btn custom-btn" name="btnreply" type="submit" id="butsave" value="Reply">
                        Send
                      </button>

                      <!-- <input type="submit" name="btnreply" class="btn btn-primary" value="Reply" /> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>

        </section>
      </div>
    </div>
  </div>
  <!-- Forum End -->


  <?php include "include/footer.php"; ?>
  <?php include "include/script.php"; ?>

</body>

</html>