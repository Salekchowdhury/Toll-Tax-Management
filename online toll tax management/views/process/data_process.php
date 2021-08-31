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
$mail = new PHPMailer( true);

$authenticate =new authentication();
//$registration =new registration();
if(!isset($_SESSION)){
    session_start();
}


if(isset($_POST['login'])){
var_dump($_POST);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $CheckAdminEmail = $authenticate->checkAdminEmail($email,$password);
    $CheckUserEmail = $authenticate->checkUserEmail($email,$password);

    if($CheckAdminEmail){
        $_SESSION['user_id']=$CheckAdminEmail->admin_id;
        $_SESSION['email']=$CheckAdminEmail->email;
        $_SESSION['name']=$CheckAdminEmail->name;
        utility::redirect("../../views/Admin/profile.php");

    }else if ($CheckUserEmail){

        $staff='staff';
        $owner='owner';

        $type="$CheckUserEmail->position";


        if($type==$owner){
            $_SESSION['user_id']=$CheckUserEmail->user_id;
            $_SESSION['email']=$CheckUserEmail->email;
            $_SESSION['name']=$CheckUserEmail->name;
            utility::redirect("../../views/owner_or_driver/profile.php");

        }
        elseif ($type==$staff){
            $_SESSION['user_id']=$CheckUserEmail->user_id;
            $_SESSION['email']=$CheckUserEmail->email;
            $_SESSION['name']=$CheckUserEmail->name;
            utility::redirect("../staff/profile.php");
            //include_once ('../staff/profile.php');

        }


    }else{
        $http_reffer= $_SERVER['HTTP_REFERER'];
        $_SESSION["errorMessageForLogin"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> Wrong  email or Password.. Please Try Agin!.</span>
                         </div>";
        Utility::redirect("$http_reffer");
    }






 }
if(isset($_POST['sign_up'])){
    var_dump($_POST);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $position=$_POST['position'];
    $password=$_POST['password'];
    $checkEmail =$datamanipulation->checkEmail($email);
    if($checkEmail){
        $http_reffer= $_SERVER['HTTP_REFERER'];
        $_SESSION["Success"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry! - </b> This email id already exists.</span>
                         </div>";
        Utility::redirect("$http_reffer");
    }else{
        $status =$datamanipulation->insertRegisterData($name,$email,$position,$password);

            $http_reffer= $_SERVER['HTTP_REFERER'];
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success! - </b> Insert Data Successfully!.</span>
                         </div>";
            Utility::redirect("$http_reffer");

    }

}