<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 07/12/2016
 * Time: 01:12 ص
 */

class usersController extends controller {

    private $usersModel;

    public function __construct($usersModel)
    {
        $this->usersModel = $usersModel;
    }


    public function usersLogin(){

     if(checkLogin())

         invalidRedirect();


    if(isset($_POST['submit'])){

        $username=$_POST['username'];
        $password=hashPasswords($_POST['password']);


        if($this->usersModel->login($username,$password)){

              $userData=$this->usersModel->getUserData();

            $_SESSION['user']=$userData;
            invalidRedirect();
           }else{

            $this->setControllerErrors($this->usersModel->getError());

            include(VIEWS.'/front/login.html');
        }


    }
    else {
        // form

        include(VIEWS.'/front/login.html');
    }

}
} 