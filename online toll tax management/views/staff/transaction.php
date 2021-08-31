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

            <li class="nav-item ">
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
            <li class="nav-item ">
              <a class="nav-link" href="add_vehicle.php">
                <span class="menu-title">Add Vehicle</span>
                  <i class="fas fa-truck menu-icon"></i>
              </a>
            </li>
              <li class="nav-item active">
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
                                <h1>Transaction History</h1>
                            </div>
                            <?php
                            if(isset($_SESSION['SendMSG'])){
                                echo $_SESSION['SendMSG'];
                                unset($_SESSION['SendMSG']);
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
                                        <table id="parvez1" class="table">
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
                                            <th>
                                                Token
                                            </th>

                                            <th style="text-align: center">
                                                Action
                                            </th>
                                            </thead>
                                            <tbody class="attrTable">
                                            <?php
                                            $lists=$datamanipulation->showAllTransaction();
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
                                                    <td>
                                                        <?php echo $list->token?>
                                                    </td>

                                                    <?php
                                                    if($list->token){
                                                        ?>
                                                        <td class="text-center btn-group">
                                                            <a href="../process/email.php?sendMail=<?php echo $list->payment_id?>" style="color: white" class="btn bg-danger btn-rounded btn-outline-success attrValue show-chat-box-click" ><i class="fas fa-envelope"></i> Email</a>
                                                            <a href="../process/staff_process.php?printId=<?php echo $list->payment_id?>" style="color: white" class="btn bg-success btn-rounded btn-outline-success attrValue show-chat-box-click" ><i class="fas fa-envelope"></i> Print</a>
                                                        </td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <td class="text-center">
                                                            <a href="../process/email.php?sendMail=<?php echo $list->payment_id?>" style="color: white" class="btn bg-success btn-rounded btn-outline-success attrValue show-chat-box-click" ><i class="fas fa-envelope"></i> Email</a>

                                                        </td>
                                                        <?php
                                                    }
                                                    ?>

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
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../contents/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script>
  $(function () {
    $("#parvez1").DataTable({
      "lengthMenu":[ 3,4 ],
    });
    $("#parvez2").DataTable({
      "lengthMenu":[ 3,4 ],
    });
    $("#parvez3").DataTable({
      "lengthMenu":[ 3,4 ],
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthMenu":[ 3 ],
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('#sohag').DataTable({
      "paging": true,
      "lengthMenu":[ 3 ],
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  </body>
</html>