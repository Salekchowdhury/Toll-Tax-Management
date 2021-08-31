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
include_once('../owner_or_driver/sellerHeader.php');
?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <strong style="font-size: 24px;padding-left: 10px;">Pitha Puli</strong>
            </li>
        </ul>

    </nav>

    <aside style="background-color: rgba(116,12,41,0.6)" class="student-bg main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">

            <span class="brand-text font-weight-light"><b>Pitha Puli</b></span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <img src="../../contents/img/nature.jpg" class="img-circle elevation-2"  alt="User Image">

                <div class="info">
                    <a href="profile.php" class="d-block"></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="my_shop.php" class="nav-link ">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                My Shop
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="profile.php" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link ">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Manage Post
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="message.php" class="nav-link ">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                Message
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="order_history.php" class="nav-link">
                            <i class="nav-icon fas fa-book-medical"></i>
                            <p>
                                Order History
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="transaction_history.php" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Transaction History
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="admin_notice.php" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                                Admin Notice
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="contact_us.php" class="nav-link">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>Contact Us</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../process/owner_process.php?logout=1" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <?php
            if(isset($_SESSION['SendMessage'])){
                echo $_SESSION['SendMessage'];
                unset($_SESSION['SendMessage']);
            }
            ?>
            <div class="row">
                <?php
                if(isset($_GET['user_id'])){
                    $mailer = $datamanipulation->ConfirmerDataBYid($_GET['user_id']);
               //var_dump($mailer);
                    $confirmerEmail =$mailer->email;
                    $confirmerName =$mailer->name;
                }
                ?>
                <div class="col-sm-7">

                    <form style="padding-left: 340px;padding-top: 20px" role="form "  action="../process/email.php" method="post">
                        <div class="card-body">

                            <fieldset>

                                <div class="form-group ">
                                    <label class="form-control-label">Name:</label>
                                    <input type="text" name="name" required disabled class="form-control"  value="<?php echo $name?>">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Gmail:</label>
                                    <input type="email" required  name="email" disabled class="form-control"  value="<?php echo $email?>">
                                    <input type="hidden"   name="confirmerEmail"  class="form-control"  value="<?php echo $confirmerEmail?>">
                                    <input type="hidden"   name="confirmerName"  class="form-control"  value="<?php echo $confirmerName?>">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Subject:</label>
                                    <input type="text" name="subject" required class="form-control"  value="">
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label">Message </label>
                                    <textarea class="form-control" required name="message" rows="8" cols="15" placeholder="Type Your Message...."></textarea>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" required  name="message_send_to_user" value="Send Message">
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

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

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



