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
$data=$datamanipulation->showAdminDataById($user_id);
include_once '../../views/Admin/adminHeader.php';
?>

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(21,3,71,0.86)">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px; color: white; padding-left: 10px;padding-right: 730px;"><?php echo $data->email?></strong>
            </li>

        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-blue elevation-4" style="background-color: rgba(21,3,71,0.86); position: fixed">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light"><b>Toll Tax Management</b></span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <img src="<?php echo $data->image?>" class="img-circle elevation-2"  alt="User Image">

                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $data->name?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a href="dashboard.php" class="nav-link ">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="transaction.php" class="nav-link ">
                            <i class="nav-icon fas fa-money-bill"></i>
                            Transaction

                            </p>
                        </a>
                    </li>
                      <li class="nav-item has-treeview">
                        <a href="control_account.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-cog"></i>

                            <p>
                                Control Account

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pending_account.php" class="nav-link">
                            <i class="nav-icon  fas fa-calendar-check"></i>
                            <p>Pending Account</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="profile.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                               My Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="notice.php" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-circle"></i>

                            <p>
                               Notice
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="create_admin.php" class="nav-link active">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Create Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../views/process/admin_process.php?logout=1" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Logout</p>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Admin</h1>
                    </div>

                </div>
            </div>
        </section>
        <div style="margin:20px ">
            <?php

            if(isset($_SESSION['updatetMsg'])){
                echo $_SESSION['updatetMsg'];
                unset($_SESSION['updatetMsg']);
            }
            if(isset($_SESSION['ExistMsg'])){
                echo $_SESSION['ExistMsg'];
                unset($_SESSION['ExistMsg']);
            }
            ?>
        </div>

        <div class="content" style="background-image: url('../../contents/img/toll-image.png')">
            <div class="row">
                <div  class="col-md-5  wow slideInLeft" data-wow-duration= "0.5s" data-wow-delay = "0.5s">
                    <div class="card card-plain">


                        <div style="border-radius: 8px; border: 2px solid; background-color: rgba(17,4,71,0.86);    border-color: #a71d2a; box-shadow: 5px 10px 10px 2px black" class="tab-pane ">
                            <form class="form-horizontal" action="../process/admin_process.php" method="post" enctype="multipart/form-data">
                                <input class="user_id" name="user_id" type="hidden" value="<?php echo $user_id?>" >

                                <div style="padding: 10px" class="form-group row">
                                    <div class="col-6">
                                        <label  class="col-sm-4 col-form-label"><strong style="color: white" >Name:</strong></label>
                                        <div class="col-sm-10">
                                            <input  required class="form-control" name="name" value="">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <label  class="col-sm-4 col-form-label"><strong  style="color: white">Phone:</strong></label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" name="phone" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-4 col-form-label"><strong  style="color: white">Email:</strong></label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" name="email" value="">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label  class="col-sm-6 col-form-label"><strong  style="color: white">password:</strong></label>
                                        <div class="col-sm-10">
                                            <input required class="form-control" name="password" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label  class="col-sm-4 col-form-label"><strong style="color: white">Image:</strong></label>
                                        <input required type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">

                                    </div>


                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group wow slideInRight" data-wow-duration= "0.5s" data-wow-delay = "0.5s" style="font-size: 21px; background-color: #110447 ; text-align: center;border: 2px  solid;border-radius: 25px; border-color: #3e19a7">
                                        <!-- <a href="change_profile.php?change_profile=<?php /*echo $email*/?>">Change Profile</a>-->
                                       <!-- <a href="#">Add Member</a>-->
                                        <button style="border: none; outline: none; color: #ff2d1a ;background-color:#110447" type="submit" name="add_admin" >Add Admin</button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
               <div class="col-7 wow slideInLeft">
                   <div class="card" style="background-color: rgba(17,4,71,0.86)">

                       <div class="card-body">


                           <h3 style="color: white">Admin Table</h3>
                           <table id="sohag1" class="table table-bordered table-hover" >
                               <thead>
                               <tr style="color:white;background-color:#34ce57;">
                                   <th>Id</th>
                                   <th>Name</th>
                                   <th>Phone</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                 <?php
                                 $lists=$datamanipulation->showAdminData();
                                 $s=1;
                                 if($lists){
                                     foreach ($lists as $list){
                                         ?>
                                         <tr>
                                             <td style="color: white"><?php echo $s?></td>
                                             <td style="color: white"><?php echo $list->name?></td>
                                             <td style="color: white"><?php echo $list->phone?></td>
                                             <td style="color: white"><?php echo $list->email?></td>
                                             <td><img src="<?php echo $list->image?>" width="70px" height="80px"></td>


                                             <td>


                                                 <a href="../process/admin_process.php?delete_admin_id=<?php echo $list->admin_id ?>" title="delete" class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a>

                                             </td>
                                         </tr>
                                         <?php
                                     }
                                     $s++;
                                 }
                                 ?>



                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
               <!-- <div style="height: 400px; border: 3px solid; padding-top: 15px;  border-radius: 20px; border-color: #28a745; box-shadow: 5px 10px 5px 1px #0c2646;color: rgba(83,220,255,0)" class="col-3 wow slideInLeft" >
                    <h5 style="color: black; padding-top: 5px; font-weight: 600">Total Member:-  <b style="color: #1e7e34; font-size: 20px"> 136</b></h5>
                    <hr>
                    <h5 style="color: black;font-weight: 600">Normal Condition:-  <b style="color: #1e7e34; font-size: 20px"> 86</b></h5>
                    <hr>
                    <h5 style="color: black;font-weight: 600">Critical Condition:- <b style="color: #1e7e34; font-size: 20px"> 33</b> </h5>
                    <hr>
                </div>-->
            </div>
        </div>

    </div>


  <aside class="control-sidebar control-sidebar-dark">
</div>
<script src="../../contents/plugins/jquery/jquery.min.js"></script>
<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../contents/js/adminlte.min.js"></script>
<script src="../../contents/js/demo.js"></script>
<script src="../../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="../../contents/plugins/jquery.fancybox.min.js"></script>
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script src="../../contents/js/dist/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script>
    $(function () {
        $("#sohag1").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag2").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag3").DataTable({
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
<script>
    $(document).ready(function() {
        $(".scroll-content").mCustomScrollbar({
            axis:"yx",
            theme:"my-theme"
        });

        $(".datepicker").datepicker({
            dateFormat:"yy-mm-dd"
        });
        // $(".fancy").fancybox();
        demo.initChartsPages();

        $(".fancy").click(function () {

        });
    });
</script>
</body>
</html>
