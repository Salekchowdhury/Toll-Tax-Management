<?php
/**
 * Created by PhpStorm.
 * User: sAlek Chowdhury
 * Date: 29-Mar-20
 * Time: 7:39 AM
 */

namespace App\user_registration;
use App\Model\Database as DB;

class authentication extends DB
{



    public function checkUserEmail($email,$password){
        $sql="select * from users WHERE email ='$email' && password='$password'";
        $sth=$this->Dbconnect->query($sql);
        $sth->setFetchMode(\PDO::FETCH_OBJ);
        $data=$sth->fetch();
        return $data;
    } public function checkAdminEmail($email,$password){
        $sql="select * from admin WHERE email ='$email' && password='$password'";
        $sth=$this->Dbconnect->query($sql);
        $sth->setFetchMode(\PDO::FETCH_OBJ);
        $data=$sth->fetch();
        return $data;
    }



}