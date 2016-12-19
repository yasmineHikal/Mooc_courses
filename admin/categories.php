<?php
require('../globals.php');
require(CONTROLLERS.'/adminCategoriesController.php');
require(MODELS.'/coursesCategoriesModel.php');


$adminCateController=new adminCategoriesController();

$adminCateController->getCategories();
