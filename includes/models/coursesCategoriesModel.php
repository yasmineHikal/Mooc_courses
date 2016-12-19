<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 05/12/2016
 * Time: 10:20 م
 */

class coursesCategoriesModel extends model {

    /**
     * add new category
     * @param $dataArray
     * @return bool
     */
    public function addCategory($dataArray){

        if(system::Get('db')->Insert('courses_categories',$dataArray))
            return true;
        return false;

    }

    /**
     * update category
     * @param $id
     * @param $dataArray
     * @return bool
     */

    public function updateCategory($id,$dataArray){

        if(system::Get('db')->Update('courses_categories',$dataArray,"WHERE `category_id`=$id"))
            return true;
        return false;


    }

    /**
     * delete category
     * @param $id
     * @return bool
     */
    public function deleteCategory($id){
        if(system::Get('db')->Delete('courses_categories',"WHERE `category_id`=$id"))
            return true;
        return false;
    }

    /**
     * get all categories
     * @param string $extra
     * @return array
     */

    public function getCategories($extra=''){

        system::Get('db')->Execute("SELECT `courses_categories`.* ,`users`.`username` from `courses_categories` LEFT JOIN `users` ON `courses_categories`.`created_by` =`users`.`user_id`  $extra");
        if(system::Get('db')->AffectedRows()>0)
            return system::Get('db')->GetRows();
        return [];

    }

    /**
     * get category by id
     * @param $id
     * @return array
     */
    public  function getCategory($id){
        $categories=$this->getCategories("WHERE `category_id`=$id");

        if(count($categories)>0)
            return $categories[0];
        return[];

    }

} 