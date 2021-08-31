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
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">
                <span class="menu-title">Profile </span>
                  <i class="fas fa-male menu-icon menu-icon"></i>

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

               <li class="nav-item">
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
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            <div class="col-sm-6">
                                <h1>Profile</h1>
                            </div>
                            <?php
                            if (isset($_SESSION["Success"])){
                                echo $_SESSION["Success"];
                                unset($_SESSION["Success"]);
                            }
                            if (isset($_SESSION["Wrong"])){
                                echo $_SESSION["Wrong"];
                                unset($_SESSION["Wrong"]);
                            }  if (isset($_SESSION["uploadImage"])){
                                echo $_SESSION["uploadImage"];
                                unset($_SESSION["uploadImage"]);
                            }
                            ?>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row" style="background-color: rgba(9,9,9,0.96); border: 3px dashed; border-color: #b40e50; border-bottom-left-radius: 25px; border-top-right-radius: 25px">
                        <div class="col-5">
                            <div class="tab-content">
                             <?php
                             $data=$datamanipulation->showStaffProfile($user_id);
                             //var_dump($data);

                             ?>
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" action="../process/staff_process.php" method="post">
                                        <div class="row">

                                            <div class="col-11 ml-3" >

                                                <div class="form-group row mt-3">
                                                    <label  class="col-sm-2 col-form-label" style="color: white">Name:</label><span> <b style="font-size: 28px;color: white"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="name" name="name" required class="form-control" value="<?php echo $data->name?>" style="border-radius: 25px">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label" style="color: white">Email:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" required class="form-control" value="<?php echo $data->email?>" style="border-radius: 25px">
                                                        <input type="hidden" name="id"  class="form-control" value="<?php echo $user_id?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label" style="color: white">Phone:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="Phone" name="phone" required class="form-control" value="<?php echo $data->phone?>" style="border-radius: 25px">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label" style="color: white">Address:</label><span class=""> <b style="font-size: 28px;color: white"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="text"  required class="form-control" name="address" value="<?php echo $data->address?>" style="border-radius: 25px">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label" style="color: white">bio:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="text" required name="bio" class="form-control" value="<?php echo $data->bio?>" style="border-radius: 25px">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>


                                        <input type="submit" class="btn btn-success btn-rounded w-100  mb-2"  name="chnageProfile" value="Chanage Profile" style="margin-top: 15px;font-size: 21px; text-align: center;border: 1px solid;" >

                                        <!-- <div class="form-group row">
                                           <div class="btn  btn-group offset-sm-2 col-sm-10">
                                             <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                                           </div>
                                         </div>-->
                                    </form>
                                </div>

                                <!-- /.tab-pane -->
                            </div>


                        </div>
                        <div class="col-4">
                            <div class="tab-content">

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" action="../process/staff_process.php" method="post">
                                        <div class="row">

                                            <div class="col-11 ml-2">

                                                <div class="form-group row mt-3">
                                                    <label  class="col-sm-3  col-form-label" style="color: white">Old Password:</label><span> <b style="font-size: 28px;"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="password" disabled name="old_password" class="form-control" value="<?php echo $data->password?>" style="border-radius: 25px">
                                                        <input type="hidden" name="id" value="<?php echo $user_id?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label  class="col-sm-3 col-form-label" style="color: white">New Password:</label><span class=""> <b style="font-size: 28px;"></b></span>
                                                    <div class="col-sm-10">
                                                        <input type="password" required name="new_password" class="form-control" value="" style="border-radius: 25px">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <input type="submit" class="btn btn-success btn-rounded w-100  mb-2"  name="changePass" value="Chanage Password" style="margin-top: 128px; font-size: 21px; text-align: center;border: 1px solid;" >

                                        <!-- <div class="form-group row">
                                           <div class="btn  btn-group offset-sm-2 col-sm-10">
                                             <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                                           </div>
                                         </div>-->
                                    </form>
                                </div>

                                <!-- /.tab-pane -->
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="tab-content" style="border: 1px solid white;margin: 5px; border-radius: 18px" >

                                <div class="tab-pane active" id="settings">
                                        <div class="row">

                                            <div class="col-11">
                                                <img style="box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23); border-radius:50%;  height: 200px; width: 200px;" src="<?php echo $data->image?>" alt="Avatar" class="m-4 avatar mb-2">
                                                <form action="../process/staff_process.php" method="post" enctype="multipart/form-data" >
                                                    <input type = 'hidden' name="id"  value="<?php echo $user_id?>">
                                                    <input style="margin-left: 5px" required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
                                                    <br>
                                                    <br>
                                                    <h3 style="margin-left: 5px; color: white"><?php echo $data->name?></h3>

                                                    <input type="submit" class="btn btn-success w-100 btn-rounded ml-3 mb-2 btn-outline-success"  name="staffImageUpload" value="Chanage Photo" style="font-size: 21px; margin-top: 77px; text-align: center;border: 1px solid;" >


                                                </form>

                                            </div>
                                        </div>


                                        <!-- <div class="form-group row">
                                           <div class="btn  btn-group offset-sm-2 col-sm-10">
                                             <button type="submit" class="btn btn-outline-secondary">Confirm</button>
                                           </div>
                                         </div>-->

                                </div>

                                <!-- /.tab-pane -->
                            </div>
                        </div>


                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="">

                                <!-- Profile Image -->
                                <div style="height: 96%" class="card card-primary card-outline ">

                                </div>

                            </div>
                            <!-- /.col -->


                            <!-- /.card -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>



      </div>
    </div>
    <script src="../../contents/js/vendor.bundle.base.js"></script>
    <script src="../../contents/js/chartist.min.js"></script>
    <script src="../../contents/js/moment.min.js"></script>
    <script src="../../contents/js/daterangepicker.js"></script>
    <script src="../../contents/js/chartist.min.js"></script>
    <script src="../../contents/js/vendor.bundle.base.js"></script>
    <script src="../../contents/js/off-canvas.js"></script>
    <script src="../../contents/js/misc.js"></script>

  </body>
</html>