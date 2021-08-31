
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

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #21025d">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <h3 class="mb-0 font-weight-medium d-none d-lg-flex"> <strong style="color: #2ecc71;margin-left: 0.5em; margin-left: 500px"> <?php echo " "?> Online Toll Tax Management</strong></h3>
            <ul class="navbar-nav navbar-nav-right ml-auto">


                <h3 class="mb-0 font-weight-medium d-none d-lg-flex" style="color: white"><?php echo $data->email?></h3>


            </ul>

        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #21025d">
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

                <li class="nav-item ">
                    <a class="nav-link" href="payment.php">
                        <span class="menu-title">Payment</span>
                        <i class="fas fa-money-bill menu-icon"></i>


                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="transaction.php">
                        <span class="menu-title">Transaction</span>
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
                                <h1>Transaction History</h1>
                            </div>
                            <?php
                            //$date= date('d/m/y');
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            } if(isset($_SESSION['successMsg'])){
                                echo $_SESSION['successMsg'];
                                unset($_SESSION['successMsg']);
                            }

                            ?>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-12">
                            <br>
                            <div class="card card-plain">

                                <div class="card-body" style="background-color: ">
                                    <div class="scroll-content">
                                        <table class="table">
                                            <thead class=" text-primary" style="background-color: #0c525d">
                                            <th>
                                                SL
                                            </th>
                                            <th>
                                                Vehicle Name
                                            </th>
                                            <th>
                                               Owner Name
                                            </th>
                                            <th>
                                               Date
                                            </th>
                                            <th>
                                            Phone
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Transaction Id
                                            </th>

                                            <th style="text-align: center">
                                                Action
                                            </th>
                                            </thead>
                                            <tbody class="attrTable">
                                              <?php
                                              $lists=$datamanipulation->showTransactionById($user_id);
                                              $s=1;
                                              foreach ($lists as $list){
                                                  $date=$list->date;
                                                  $dateArray = explode("-",$date);

                                                  $dateRevers= array_reverse($dateArray);
                                                  $dateString = implode("-", $dateRevers);
                                                  ?>
                                                  <tr>
                                                      <td>
                                                         <?php echo $s?>
                                                      </td>
                                                      <td>
                                                          <?php echo $list->vehicle_type?>
                                                      </td>

                                                      <td>
                                                          <?php echo $list->name?>

                                                      </td>
                                                      <td>
                                                         <?php echo $dateString?>

                                                      </td>
                                                      <td>
                                                          <?php echo $list->phone?>
                                                      </td>

                                                      <td>
                                                          <?php echo $list->amount?>
                                                      </td>

                                                      <td>
                                                          <?php echo $list->transaction_id?>
                                                      </td>


                                                      <td class="text-center">
                                                          <a href="../owner_or_driver/edit_payment.php?edit_payment=<?php echo $list->payment_id?>" style="color: white" class="btn bg-success btn-rounded btn-outline-success attrValue show-chat-box-click" ><i class="fas fa-eye"></i> Edit</a>

                                                      </td>
                                                  </tr>
                                                  <?php
                                                  $s++;
                                              }
                                              ?>





                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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