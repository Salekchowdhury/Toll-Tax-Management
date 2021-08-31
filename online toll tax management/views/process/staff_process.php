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
if(isset($_POST['staffImageUpload'])){
    $http_reffer= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    var_dump($id);
    $random= rand(1000,9999);
    $files = $_FILES['photo'];
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $image = '../../contents/img/' .$random. $fileName;

    move_uploaded_file($fileTmpName, $image);



    $status = $datamanipulation->updateStaffImage($image,$id);

    if($status){
        $_SESSION["uploadImage"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Change - </b> Change Photo Successfully....</span>
                         </div>";

        Utility::redirect( "$http_reffer");
    }



}
if(isset($_POST['chnageProfile'])) {
    $http= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $bio = $_POST['bio'];
    $status = $datamanipulation->updateStaffProfile($name,$email,$phone,$address,$bio,$id);
    if($status){
        $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Update Data Successfully.</span>
                         </div>";

        Utility::redirect( "$http");
    }
}
if(isset($_POST['changePass'])) {
    $http= $_SERVER['HTTP_REFERER'];
    $id = $_POST['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

        $status = $datamanipulation->changePass($new_password, $id);
        if($status){
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Change Password Successfully.</span>
                         </div>";

            Utility::redirect( "$http");


        }


    }
    if(isset($_POST['toll_pass'])) {
        $http= $_SERVER['HTTP_REFERER'];
        $vehicle_type = $_POST['vehicle_type'];
        $driver_name = $_POST['driver_name'];
        $amount = $_POST['amount'];
        $vehicle_no = $_POST['vehicle_no'];
        $phone = $_POST['phone'];
        $token = $_POST['token'];





    //var_dump($_POST['toll_pass']);

       $status = $datamanipulation->insertTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$token);
        if($status){
            $_SESSION["Success"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Insert Data  Successfully.</span>
                         </div>";

            Utility::redirect( "$http");


        }


    }
    if(isset($_POST['addVehicle'])) {
        $http= $_SERVER['HTTP_REFERER'];
        $vehicle_type = $_POST['vehicle_type'];
        $driver_name = $_POST['driver_name'];
        $owner_name = $_POST['owner_name'];
        $vehicle_no = $_POST['vehicle_no'];
        $phone = $_POST['phone'];


        $checkVehicle = $datamanipulation->showVehicleById($vehicle_no);
        //var_dump($checkVehicle);
        if($checkVehicle){
            $_SESSION["NotSuccessMsg"] = "<div class=\"alert alert-danger alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Sorry!! - </b> Already Exists.</span>
                         </div>";

            Utility::redirect( "$http");



        }else{
            $status = $datamanipulation->insertAddVehicle($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone);
            if($status){
                $_SESSION["SuccessMsg"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Insert Data  Successfully.</span>
                         </div>";

                Utility::redirect( "$http");


            }
        }



    }
    if(isset($_POST['edit_toll_pass'])) {
        $http= $_SERVER['HTTP_REFERER'];
        $id = $_POST['id'];
        $vehicle_type = $_POST['vehicle_type'];
        $driver_name = $_POST['driver_name'];
        $amount = $_POST['amount'];
        $vehicle_no = $_POST['vehicle_no'];
        $phone = $_POST['phone'];
        //$token = $_POST['token'];





    //var_dump($_POST['toll_pass']);

       $status = $datamanipulation->updateTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$id);
        if($status){
            $_SESSION["update"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Update Data  Successfully.</span>
                         </div>";

            Utility::redirect("../staff/toll_pass.php");
            //include '../staff/toll_pass.php';


        }


    }
    if(isset($_POST['editVehicle'])) {
        $http= $_SERVER['HTTP_REFERER'];
        $id = $_POST['id'];
        $vehicle_type = $_POST['vehicle_type'];
        $driver_name = $_POST['driver_name'];
        $owner_name = $_POST['owner_name'];
        $vehicle_no = $_POST['vehicle_no'];
        $phone = $_POST['phone'];
        //$token = $_POST['token'];





    //var_dump($_POST['toll_pass']);

       $status = $datamanipulation->updateVehicleDetails($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone,$id);
        if($status){
            $_SESSION["update"] = "<div class=\"alert alert-success alert-dismissible fade show\">
                           <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                             <i class=\"nc-icon nc-simple-remove\"></i>
                           </button>
                           <span>
                             <b> Success - </b> Update Data  Successfully.</span>
                         </div>";

            Utility::redirect("../staff/add_vehicle.php");
            //include '../staff/add_vehicle.php';


        }


    }
if(isset($_GET['delete_notice'])){

    $status = $datamanipulation->deleteNotice($_GET['delete_notice']);
    if($status){
        Utility::redirect("../../views/seller/notice.php");

    }

}
if(isset($_GET['print_id'])){

    $status = $datamanipulation->showTollDataById($_GET['print_id']);
    $ChangeStatus = $datamanipulation->ChangeStatus($_GET['print_id']);

    $vehicle_type = $status->vehicle_type;
    $driver_name = $status->driver_name;
    $amount = $status->amount;
    $vehicle_no = $status->vehicle_no;
    $phone = $status->phone;
    $token =$status->token;


    require ("../../contents/fpdf/fpdf.php");
    $pdf =new FPDF();
    $pdf->AddPage();


    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(0,10,"Toll Tax Management System",0,1,'R');
    $pdf->Cell(0,10,"Amount: ".$amount." Taka",0,1,'R');
    $pdf->SetFont("Arial","",12);
    $pdf->Cell(0,10,"Date: ".date("d/m/y"),0,1,'R');
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(0,10,"Toll Tax Details",1,1,'C');
    $pdf->SetFont("Arial","",13);
    $pdf->Cell(35,10,"Vehicle No",1,0,'C');
    $pdf->Cell(30,10,"Vehicle Type",1,0,'C');
    $pdf->Cell(60,10,"Name",1,0,'C');
    $pdf->Cell(35,10,"Mobile No",1,0,'C');
    $pdf->Cell(30,10,"Token",1,1,'C');



    $pdf->SetFont("Arial","",11);
    $pdf->Cell(35,10,$vehicle_no,1,0,'C');
    $pdf->Cell(30,10,$vehicle_type,1,0,'C');
    $pdf->Cell(60,10,$driver_name,1,0,'C');
    $pdf->Cell(35,10,$phone,1,0,'C');
    $pdf->Cell(30,10,$token,1,1,'C');
    $pdf->Output();


}
if(isset($_GET['vehicle_print_id'])){

    $status = $datamanipulation->showTollDataByVehicleNo($_GET['vehicle_print_id']);

    $token= rand(100000,999999);
    $vehicle_type = $status->vehicle_type;
    $driver_name = $status->driver_name;
    $amount ='Advance';
    $vehicle_no = $status->vehicle_no;
    $phone = $status->phone;
   // $token =$status->token;
    $status = $datamanipulation->insertTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$token);
    $ChangeStatus = $datamanipulation->ChangeStatus($_GET['vehicle_print_id']);
    require ("../../contents/fpdf/fpdf.php");
    $pdf =new FPDF();
    $pdf->AddPage();


    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(0,10,"Toll Tax Management System",0,1,'R');
    $pdf->Cell(0,10,"Amount: ".$amount."",0,1,'R');
    $pdf->SetFont("Arial","",12);
    $pdf->Cell(0,10,"Date: ".date("d/m/y"),0,1,'R');
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(0,10,"Toll Tax Details",1,1,'C');
    $pdf->SetFont("Arial","",13);
    $pdf->Cell(35,10,"Vehicle No",1,0,'C');
    $pdf->Cell(30,10,"Vehicle Type",1,0,'C');
    $pdf->Cell(60,10,"Name",1,0,'C');
    $pdf->Cell(35,10,"Mobile No",1,0,'C');
    $pdf->Cell(30,10,"Token",1,1,'C');



    $pdf->SetFont("Arial","",11);
    $pdf->Cell(35,10,$vehicle_no,1,0,'C');
    $pdf->Cell(30,10,$vehicle_type,1,0,'C');
    $pdf->Cell(60,10,$driver_name,1,0,'C');
    $pdf->Cell(35,10,$phone,1,0,'C');
    $pdf->Cell(30,10,$token,1,1,'C');
    $pdf->Output();


}
if(isset($_GET['printId'])){

    $status = $datamanipulation->showPaymentData($_GET['printId']);

    $token= rand(100000,999999);
    $vehicle_type = $status->vehicle_type;
    $driver_name = $status->name;
    $amount =$status->amount;
    $vehicle_no = $status->vehicle_no;
    $phone = $status->phone;
    $token =$status->token;
    $checkPrint='yes';
    $status = $datamanipulation->insertTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$token,$checkPrint);
    //$ChangeStatus = $datamanipulation->ChangeStatus($_GET['vehicle_print_id']);
    require ("../../contents/fpdf/fpdf.php");
    $pdf =new FPDF();
    $pdf->AddPage();


    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(0,10,"Toll Tax Management System",0,1,'R');
    $pdf->Cell(0,10,"Amount: ".$amount."",0,1,'R');
    $pdf->SetFont("Arial","",12);
    $pdf->Cell(0,10,"Date: ".date("d/m/y"),0,1,'R');
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(0,10,"Toll Tax Details",1,1,'C');
    $pdf->SetFont("Arial","",13);
    $pdf->Cell(35,10,"Vehicle No",1,0,'C');
    $pdf->Cell(30,10,"Vehicle Type",1,0,'C');
    $pdf->Cell(60,10,"Name",1,0,'C');
    $pdf->Cell(35,10,"Mobile No",1,0,'C');
    $pdf->Cell(30,10,"Token",1,1,'C');



    $pdf->SetFont("Arial","",11);
    $pdf->Cell(35,10,$vehicle_no,1,0,'C');
    $pdf->Cell(30,10,$vehicle_type,1,0,'C');
    $pdf->Cell(60,10,$driver_name,1,0,'C');
    $pdf->Cell(35,10,$phone,1,0,'C');
    $pdf->Cell(30,10,$token,1,1,'C');
    $pdf->Output();


}

if(isset($_GET['confirm_user_by_building_woner'])){
    $action='yes';
    $status = $datamanipulation->confirm_user_by_building_woner($_GET['confirm_user_by_building_woner'],$action);
    if($status){
        Utility::redirect("../../views/seller/pending_request.php");


    }

}
if(isset($_GET['confirm_user_by_building_woner_from_member_list'])){
    $action='yes';
    $status = $datamanipulation->confirm_user_by_building_woner($_GET['confirm_user_by_building_woner_from_member_list'],$action);
    if($status){
        Utility::redirect("../../views/seller/membership_subscription.php");


    }

}

if(isset($_POST['update'] )){
    $http= $_SERVER['HTTP_REFERER'];
    $update = $datamanipulation->updateUserData($_POST['user_id'],$_POST['name'],$_POST['profession'],$_POST['phone'],$_POST['road_no'],$_POST['holding_no'],$_POST['owner_name'],$_POST['building_name'],$_POST['address'],$_POST['bio']);
    var_dump($update);
    if($update){
        $_SESSION["UdateMsg"] = "<div class=\"alert alert-warning alert-dismissible fade show\">
                          <button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <i class=\"fa fa-times\"></i>
                          </button>
                          <span>
                            <b> Updated - </b> Update Your Data Successfully. </span>
                        </div>";
        Utility::redirect("$http");
    }
}




if (isset($_POST['checkedNo'])){
        $checkedNo = $datamanipulation->updateChatActiveNo($_POST['user_id']);
        return $checkedNo;
}
if (isset($_POST['checkedYes'])){
    $checkedYes = $datamanipulation->updateChatActiveYes($_POST['user_id']);
}

if(isset($_POST['old_pass'] )){
    $id = $_POST['user_id'];
    $data = $datamanipulation->userPassword($id);
    echo json_encode($data);
}

