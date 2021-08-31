<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../contents/css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="../../contents/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto" style="background-color: #7c151f">
              <div class="auth-form-light text-left p-5" style="background-color: rgba(2,10,8,0.94)">
                <div class="brand-logo">
                  <img src="../../contents/img/toll-image.png">
                </div>
                <form class="pt-3" ACTION="../process/data_process.php" method="post">
                  <div class="form-group">
                    <input type="email"name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-success btn-rounded btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button>
                  </div>
                </form>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="forgot-password.php" class="auth-link text-black" style="color: white">Forgot password?</a>
                  </div>

                  <div class="text-center mt-4 font-weight-light" style="color: white"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../contents/js/vendor.bundle.base.js"></script>
    <script src="../../contents/js/off-canvas.js"></script>
    <script src="../../contents/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>