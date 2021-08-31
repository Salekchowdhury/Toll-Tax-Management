<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
use App\Utility\Utility;

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$data=$datamanipulation->showStaffProfile($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../contents/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/daterangepicker.css">
    <link rel="stylesheet" href="../../contents/css/chartist.min.css">
    <link rel="stylesheet" href="../../contents/css/style.css"
    <link rel="shortcut icon" href="../../contents/images/favicon.png" />
</head>
<body>
<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #0c525d">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <h3 class="mb-0 font-weight-medium d-none d-lg-flex"> <strong style="color: #2ecc71;margin-left: 0.5em;margin-left: 500px"> <?php echo " "?> Online Toll Tax Management</strong></h3>
            <ul class="navbar-nav navbar-nav-right ml-auto">


                <h3 class="mb-0 font-weight-medium d-none d-lg-flex" style="color: white"><?php echo $data->email?></h3>


            </ul>

        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0c525d" >
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <?php
                            if($data->image){
                                ?>
                                <img class="img-xs rounded-circle" src="<?php echo $data->image?>" alt="profile image">
                                <?php
                            }else{
                                ?>
                                <img class="img-xs rounded-circle" src="../../contents/images/faces/face4.jpg" alt="profile image">
                                <?php
                            }
                            ?>


                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name"><?php echo $data->name?></p>
                        </div>
                        <div class="icon-container">

                        </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-title">Profile </span>
                        <i class="fas fa-male menu-icon fa-2x"></i>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="toll_pass.php">
                        <span class="menu-title">Toll pass</span>
                        <i class="fas fa-car-side menu-icon"></i>


                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_notice.php">
                        <span class="menu-title">Admin Notice</span>
                        <i class="fas fa-exclamation-circle menu-icon"></i>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_vehicle.php">
                        <span class="menu-title">Add Vehicle</span>
                        <i class="fas fa-truck menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaction.php">
                        <?php
                        $count=$datamanipulation->countUnseenTransaction();
                        $total=$count->total
                        ?>
                        <span class="menu-title">Transaction (<?php echo $total?>)</span>
                        <i class="fas fa-money-bill-wave menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="contact_us.php">
                        <span class="menu-title">Contact Us</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../process/staff_process.php?logout">
                        <span class="menu-title">Logout</span>
                        <i class="fas fa-sign-out-alt menu-icon"></i>
                    </a>
                </li>


            </ul>
        </nav>

    <div class="content-wrapper">
        <section class="content-header">
            <?php
            if(isset($_SESSION['SendMessage'])){
                echo $_SESSION['SendMessage'];
                unset($_SESSION['SendMessage']);
            }
            ?>
            <div class="row">

                <div class="col-sm-12">

                    <form  role="form "  action="../process/email.php" method="post">
                        <div class="card-body">

                            <fieldset>

                                <div class="form-group ">
                                    <label class="form-control-label">Name:</label>
                                    <input type="text"  required disabled class="form-control"  value="<?php echo $name?>">
                                    <input type="hidden" name="name"   value="<?php echo $name?>">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Gmail:</label>
                                    <input type="email" required   disabled class="form-control"  value="<?php echo $email?>">
                                    <input type="hidden"  name="email"  value="<?php echo $email?>">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Subject:</label>
                                    <input type="text" name="subject" required class="form-control col-5"  value="">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Message </label>
                                    <textarea class="form-control" required name="message" rows="7" cols="15" placeholder="Type Your Message...."></textarea>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-rounded" required  name="message_send_by_staff" value="Send Message">
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </form>
                </div>
            </div>




        </section>



        <footer>

        </footer>
    </div>


</div>

<script src="../../contents/plugins/jquery/jquery.min.js"></script>

<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../contents/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="../../contents/js/adminlte.min.js"></script>

<script src="../../contents/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html>



