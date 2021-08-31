<?php
/**
 * Created by PhpStorm.
 * User: sAlek Chowdhury
 * Date: 22-Mar-20
 * Time: 4:52 AM
 */

namespace App\DataManipulation;
use App\Model\Database as DB;
use  App\Utility\Utility;



class DataManipulation extends DB
{

 public function checkEmailInAdminTable($email){

    $sql = "SELECT * FROM admin where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CheckOtp($otp){

    $sql = "SELECT * FROM users where emailtoken = '".$otp."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkEmailInUserTable($email){

    $sql = "SELECT * FROM users where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkEmail($email){

    $sql = "SELECT * FROM users where email = '".$email."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function adminData($user_id){

    $sql = "SELECT * FROM admin where admin_id = '".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllNotice(){

    $sql = "SELECT * FROM notice";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAdminData(){

    $sql = "SELECT * FROM admin";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showNoticeById($id){

    $sql = "SELECT * FROM notice where id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function checkPass($id){

    $sql = "SELECT password FROM users where user_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showStaffProfile($user_id){

    $sql = "SELECT * FROM users where user_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTollData(){

    $sql = "SELECT * FROM toll ORDER BY toll_id DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showVehicleData(){

    $sql = "SELECT * FROM vehicle ORDER BY id DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showVehicleById($vehicle_no){

    $sql = "SELECT * FROM vehicle WHERE vehicle_no='".$vehicle_no."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showVehicleDataByid($id){

    $sql = "SELECT * FROM vehicle WHERE id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTollDataById($id){

    $sql = "SELECT * FROM toll WHERE toll_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTollDataByVehicleNo($id){

    $sql = "SELECT * FROM vehicle WHERE id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTransaction($id){

    $sql = "SELECT * FROM payment WHERE payment_id='".$id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllTransaction(){

    $sql = "SELECT * FROM payment  ORDER BY payment_id DESC";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showPaymentData($payment_id){

    $sql = "SELECT * FROM payment  WHERE payment_id='".$payment_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showTransactionById($user_id){

    $sql = "SELECT * FROM payment WHERE user_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showUserId($userId){

    $sql = "SELECT * FROM users WHERE user_id='".$userId."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAdminDataById($user_id){

    $sql = "SELECT * FROM admin WHERE admin_id='".$user_id."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllUsersAccount(){

    $sql = "SELECT * FROM users";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showAllDeactiveUsersAccount(){

    $sql = "SELECT * FROM users WHERE status ='no'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetchAll();
    return $satatus;
}
public function showUserByEmail($userEmail){

    $sql = "SELECT * FROM users WHERE email='".$userEmail."'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function countUnseenTransaction(){

    $sql = "select count(status) as total from payment where status = 'unseen'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllAccount(){

    $sql = "select count(position) as total from users where position = 'staff'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalNotice(){

    $sql = "select count(id) as total from notice";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalAdmin(){

    $sql = "select count(admin_id) as total from admin";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllOwnerAccount(){

    $sql = "select count(position) as total from users where position = 'owner'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllDeactiveOwner(){

    $sql = "select count(position) as total from users where status = 'no' && position='owner'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function showAllDeactiveStaff(){

    $sql = "select count(position) as total from users where status = 'no' && position='staff'";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}
public function CountTotalAmount(){

    $sql = "select sum(amount) as total from payment";
    $data = $this->Dbconnect->query($sql);
    $data->setFetchMode(\PDO::FETCH_OBJ);
    $satatus = $data->fetch();
    return $satatus;
}

public function updateAdminRegisterToken($emailToken, $userEmail){

    $array = array($emailToken);
    $sqls = "update admin set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateNotice($id,$notice){

    $array = array($notice);
    $sqls = "update notice set notice=? WHERE  id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function ChangeStatus($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update toll set status=? WHERE  toll_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function ConfirmAcount($id){
       $sts="yes";
    $array = array($sts);
    $sqls = "update users set status=? WHERE  user_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}

public function updateUserRegisterToken($emailToken, $userEmail){

    $array = array($emailToken);
    $sqls = "update users set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateEmailToken($emailToken,$userEmail){

    $array = array($emailToken);
    $sqls = "update users set emailtoken=? WHERE  email='" . $userEmail . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateToken($emailToken,$payment_id){

    $array = array($emailToken);
    $sqls = "update payment set token=?,status='seen' WHERE  payment_id='" . $payment_id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function verifyUserToken($password, $email,$otp){

    $array = array($password);
    $sqls = "update users set password=?, emailtoken='yes' WHERE  email='" . $email . "' && emailtoken='".$otp."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$id){

    $array = array($vehicle_type,$driver_name,$amount,$vehicle_no,$phone);
    $sqls = "update toll set vehicle_type=?,driver_name=?,amount=?,vehicle_no=?,phone=?, status='no' WHERE  toll_id='" . $id . "' ";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateVehicleDetails($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone,$id){

    $array = array($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone);
    $sqls = "update vehicle set vehicle_type=?,driver_name=?,owner_name=?,vehicle_no=?,phone=? WHERE  id='" . $id . "' ";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updatePayment($payment_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone){

    $array = array($payment_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone);
    $sqls = "update payment set payment_id=?,amount=?,vehicle_type=?,transaction_id=?,name=?,vehicle_no=?,phone=? WHERE  payment_id='" . $payment_id . "' ";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function verifyAdminToken($pass, $code){

    $array = array($pass);
    $sqls = "update admin set password=?, emailtoken='yes' WHERE  emailtoken='" . $code . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminProfile($phone,$name,$email,$address,$password,$id){

    $array = array($phone,$name,$email,$address,$password);
    $sqls = "update admin set phone=?,name=?,email=?,address=?,password=? WHERE  admin_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function   updateStaffProfile($name,$email,$phone,$address,$bio,$id){

    $array = array($name,$email,$phone,$address,$bio);
    $sqls = "update users set name=?,email=?,phone=?,address=?,bio=? WHERE  user_id='" . $id . "'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateUserPass($pass,$otp,$email){

    $array = array($pass);
    $sqls = "update users set password=?, emailtoken='yes' WHERE  emailtoken='" . $otp . "' && email='".$email."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateStaffImage($image,$id){

    $array = array($image);
    $sqls = "update users set image=? WHERE  user_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function changePass($new_password, $id){

    $array = array($new_password);
    $sqls = "update users set password=? WHERE  user_id='".$id."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}
public function updateAdminPass($pass,$otp,$email){

    $array = array($pass);
    $sqls = "update admin set password=?, emailtoken='yes' WHERE  emailtoken='" . $otp . "' && email='".$email."'";
    $data = $this->Dbconnect->prepare($sqls);
    $status = $data->execute($array);
    return $status;
}

public  function  insertRegisterData($name,$email,$position,$password){
    $array = array($name,$email,$position,$password);
    $sql = "insert into users (name,email,position,password) VALUE (?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  insertPayment($user_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone){
    $array = array($user_id,$amount,$vehicle_type,$transaction,$name,$vehicle_no,$phone);
    $sql = "insert into payment (user_id,amount,vehicle_type,transaction_id,name,vehicle_no,phone,date) VALUE (?,?,?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  insertAddVehicle($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone){
    $array = array($vehicle_type,$driver_name,$owner_name,$vehicle_no,$phone);
    $sql = "insert into vehicle (vehicle_type,driver_name,owner_name,vehicle_no,phone,date) VALUE (?,?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  insert_new_admin($name,$email,$phone,$password,$image){
    $array = array($name,$email,$phone,$password,$image);
    $sql = "insert into admin (name,email,phone,password,image) VALUE (?,?,?,?,?)";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
public  function  insertTollPass($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$token,$checkPrint){
    $array = array($vehicle_type,$driver_name,$amount,$vehicle_no,$phone,$token,$checkPrint);
    $sql = "insert into toll (vehicle_type,driver_name,amount,vehicle_no,phone,token,checkPrint,date) VALUE (?,?,?,?,?,?,?,now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}

public  function  insertNotice($notice){
    $array = array($notice);
    $sql = "insert into notice (notice,date,time) VALUE (?,now(),now())";
    $data = $this->Dbconnect->prepare($sql);
    $status = $data->execute($array);
    return $status;
}
    public function delete_admin($id)
    {
        $sql = "delete from  admin WHERE admin_id = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
    public function deleteAcount($id)
    {
        $sql = "delete from  users WHERE user_id = '".$id."'";
        $data = $this->Dbconnect->exec($sql);
        return $data;
    }
}