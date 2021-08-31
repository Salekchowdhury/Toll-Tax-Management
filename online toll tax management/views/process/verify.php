<?php
/**
 * Created by PhpStorm.
 * User: sAlek Chowdhury
 * Date: 26-Sep-19
 * Time: 4:59 PM
 */

include_once ("../../vendor/autoload.php");
use App\Utility\Utility;
use App\user_registration\registration;
use App\user_registration\authentication;
use App\DataManipulation\DataManipulation;
$datamanipulation =new DataManipulation();

if(!isset($_SESSION)){
    session_start();
}
$email=$_SESSION['email'];

 //$registration=new registration();
 if(isset($_POST['confirm'])){
     $status=$registration->verify($_POST['code']);
     if($status){
         utility::redirect("../../views/login_register_forgot/login.php");
         //include_once ("");
     }else{

         $http_referer=$_SERVER['HTTP_REFERER'];
         $_SESSION['errorMesseage']="<div class='alert alert-danger'>Wrong Code, Try again..</div>";
         utility::redirect($http_referer);
     }
 }

if(isset($_POST['confirmForgotPassword'])){

    $http_referer=$_SERVER['HTTP_REFERER'];
    $pass= $_POST['password'];
    $otp=$_POST['otp'];
    $email=$_POST['email'];
    //$type=$_POST['type'];


    $CheckOtp=$datamanipulation->CheckOtp($otp);


    if($CheckOtp){
        $updateUserPass=$datamanipulation->updateUserPass($pass,$otp,$email);
        if($updateUserPass){
            utility::redirect("../../views/login_register_forgot/login.php");
            //include "../../views/login_register_forgot/login.php";
        }

    }else{
        $_SESSION["errorMesseage"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Sorry! </b> Wrong Code, Try again.. </span>
                        </div>";

        //$_SESSION['errorMesseage']="<div class='alert alert-danger'>Wrong Code, Try again..</div>";
        utility::redirect($http_referer);
    }
    //var_dump($verifyUserToken);
    //var_dump($verifyAdminToken);
  // var_dump($_POST);
/*    if($type=="Users" ){
        $verifyUserToken=$datamanipulation->verifyUserToken($pass,$email,$otp);
        if($verifyUserToken){
            utility::redirect("../../views/login_register_forgot/login.php");
        }else{
            $_SESSION["errorMesseage"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Sorry! </b> Wrong Code, Try again.. </span>
                        </div>";

            //$_SESSION['errorMesseage']="<div class='alert alert-danger'>Wrong Code, Try again..</div>";
            utility::redirect($http_referer);
        }

        //include_once ("../../views/login_register_forgot/login.php");
    }else if ($type=="Admin"){
        $verifyAdminToken=$datamanipulation->verifyAdminToken($_POST['password'],$_POST['otp']);
        if($verifyAdminToken){
            utility::redirect("../../views/login_register_forgot/login.php");
        }else{
            $_SESSION["errorMesseage"] = "<div style='background-color: #218838' class=\"alert alert-danger alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span style='color: white'>
                            <b> Sorry! </b> Wrong Code, Try again.. </span>
                        </div>";

            //$_SESSION['errorMesseage']="<div class='alert alert-danger'>Wrong Code, Try again..</div>";
            utility::redirect($http_referer);
        }


    }*/
}
