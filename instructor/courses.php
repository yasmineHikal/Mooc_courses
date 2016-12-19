<?php
require('../globals.php');
require(CONTROLLERS.'/instructorCoursesController.php');
require(MODELS.'/coursesModel.php');


$instructorCoursesController=new instructorCoursesController();
$idInstructor=$_SESSION['user']['user_id'];
$instructorCoursesController->getCourses("WHERE `users`.`user_id`=$idInstructor");
