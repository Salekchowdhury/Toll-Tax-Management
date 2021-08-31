<?php
/*include_once ("../../includes/head_auth.php");*/
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation =new DataManipulation();
use App\Utility\Utility;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
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
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../../contents/images/logo.svg">
                        </div>
                        <?php
                        if(isset($_SESSION['SendMSG'])) {
                            echo($_SESSION['SendMSG']);
                            unset($_SESSION['SendMSG']);
                        }
                        ?>
                        <h4 class="font-weight-light">Reset Password.</h4>
                        <form class="pt-3" action="../process/email.php" method="post">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email....">
                            </div>
                         <button type="submit" class="btn btn-primary btn-rounded" name="forgotPassword">Send Request</button>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <a href="login.php" class="auth-link text-black">Login</a>
                            </div>

                            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../contents/js/vendor.bundle.base.js"></script>

<script src="../../contents/js/off-canvas.js"></script>
<script src="../../contents/js/misc.js"></script>
</body>
</html>