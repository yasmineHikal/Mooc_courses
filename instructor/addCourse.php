<?php
require('../globals.php');
require(CONTROLLERS.'/instructorCoursesController.php');
require(MODELS.'/coursesModel.php');


$instCourseController = new instructorCoursesController();

$instCourseController->addCourse();