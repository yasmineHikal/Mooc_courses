<?php

session_start();
require('globals.php');

require(MODELS.'/usersGroupsModel.php');
require(MODELS.'/coursesCategoriesModel.php');
require(MODELS.'/coursesModel.php');
require(CONTROLLERS.'/adminController.php');

$ac= new adminController();

if(!$ac->index()){
    echo $ac->getControllerErrors();

}








//$courses=new coursesModel();
//print_r($courses->getCourseByInstructorId(1));

/*$courses=new coursesCategoriesModel();

$data=array(

    'category_name'=>'math',
    'created_by'=>'1'
);

//if($courses->deleteCategory(2))
  //  echo 'done';
echo"<pre/>";
print_r($courses->getCategories());
//$groupsModel= new usersGroupsModel();

//if($groupsModel->addUserGroup('test2'));
//if($groupsModel->updateUserGroup(4,'tttt'))
/*if($groupsModel->deleteUserGroup(4))
         echo'done';
*/



/*require(MODELS.'/usersModel.php');

$users = new usersModel();

$data=array(
    'username'=>'ahmed',
    'password'=>123456,
    'email'=>'ahmed@gmail.com',
    'user_group'=>1
);
echo"<pre/>";
print_r($users->searchUsers('g'));

*/

