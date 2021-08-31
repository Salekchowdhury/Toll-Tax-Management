<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
      <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
      <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
      <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">

      <link rel="stylesheet" href="../../contents/css/style.css" <!-- End layout styles -->
      <link rel="shortcut icon" href="../../contents/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" >
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto" style="background-color: #00b44e">
              <div class="auth-form-light text-left p-5" style="background-color: rgba(183,183,183,0.38)">
                <div class="brand-logo">
                  <img src="../../contents/img/toll-11.png">
                </div>
                  <?php
                  if (isset($_SESSION["Success"])){
                      echo $_SESSION["Success"];
                      unset($_SESSION["Success"]);
                  }
                  ?>
                <form class="pt-3" action="../process/data_process.php" method="post">
                  <div class="form-group">
                    <input type="text" required name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input required type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <select required name="position" class="form-control form-control-lg" id="exampleFormControlSelect2">
                      <option value="">Select Type</option>
                      <option value="staff">Staff</option>
                      <option value="owner">Owner_or_Driver</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input required type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>

                  <div class="mt-3">
                      <button class="btn btn-block btn-success btn-rounded btn-lg font-weight-medium auth-form-btn" name="sign_up">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light" style="color: white"> Already have an account? <a href="../../views/login_register_forgot/login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../contents/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../contents/js/off-canvas.js"></script>
    <script src="../../contents/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>