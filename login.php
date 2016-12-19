<?php
require('globals.php');
require(MODELS.'/usersModel.php');
require(CONTROLLERS.'/usersController.php');

$userController=new usersController(new usersModel());
$userController->usersLogin();

