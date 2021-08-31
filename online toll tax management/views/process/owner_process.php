<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/3/2020
 * Time: 2:52 PM
 */
include_once ("../../vendor/autoload.php");
include_once ("../../vendor/phpmailer/phpmailer/src/PHPMailer.php");

use App\Utility\Utility;
use App\user_registration\registration;
use App\user_registration\authentication;
use App\DataManipulation\DataManipulation;
$datamanipulation =new DataManipulation();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$authenticate =new authentication();

if(!isset($_SESSION)){
    session_start();

}
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
/*$name=$data->name;
$image=$data->image;
$profession=$data->profession;
$phone=$data->phone;
$holding_no=$data->holding_no;
$bio=$data->bio;
$owner_name= $ownerData->owner_name;
$building_name= $ownerData->building_name;
$road_no= $ownerData->road_no;
$bio= $ownerData->bio;*/

if(isset($_GET['logout'])){
    session_destroy();
    Utility::redirect("../../views/login_register_forgot/login.php");
    //include_once ("../../views/login_register_forgot/login.php");
}

if(isset($_POST['send_money'])) {
    $http= $_SERVER['HTTP_REFERER'];
   $user_id= $_POST['user_id'];
    $vehicle_type = $_POST['vehicle_type'];
    $name = $_POST['name'];
    $transaction = $_POST['transaction'];
    $vehicle_no = $_POST['vehicle_no'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];





    //var_dump($_POST['toll_pass']);

    $status = $datamanipulation->insertPayment($user_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone);
    if($status){
        $_SESSION["success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Send Data  Successfully.</span>
                         </div>";

        Utility::redirect("../owner_or_driver/transaction.php");
        //include '../owner_or_driver/transaction.php';


    }


}
if(isset($_POST['edit_money'])) {
    $http= $_SERVER['HTTP_REFERER'];
   $payment_id= $_POST['payment_id'];
    $vehicle_type = $_POST['vehicle_type'];
    $name = $_POST['name'];
    $transaction = $_POST['transaction'];
    $vehicle_no = $_POST['vehicle_no'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    //$date = $_POST['date'];





    //var_dump($_POST['toll_pass']);

    $status = $datamanipulation->updatePayment($payment_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone);
    if($status){
        $_SESSION["successMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Update Data  Successfully.</span>
                         </div>";

        Utility::redirect("../owner_or_driver/transaction.php");
        //include '../owner_or_driver/transaction.php';


    }


}







