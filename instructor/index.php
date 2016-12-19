<?php

require('../globals.php');

require(CONTROLLERS.'/instructorController.php');

$instructorController=new instructorController();

$instructorController->index();