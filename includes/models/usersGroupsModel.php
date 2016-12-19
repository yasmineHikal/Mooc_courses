<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 01/12/2016
 * Time: 03:21 م
 */

class usersGroupsModel extends model{

    /**
     * add new user group
     * @param $groupName
     * @return bool
     */

    public function addUserGroup($groupName){

        $data=array(
            'group_name' => $groupName
        );

     if(system::Get('db')->Insert('users_groups',$data))

      return true;
        return false;


    }

    /**
     * update user group
     * @param $id
     * @param $groupName
     * @return bool
     */
    public function updateUserGroup($id,$groupName)
    {
        $data = array(
            'group_name' => $groupName
        );
        if(System::Get('db')->Update('users_groups',$data,"WHERE `group_id`=$id"))
            return true;

        return false;
    }

    /**
     * @param $id
     * @return bool
     */

    public function deleteUserGroup($id){

      if(system::Get('db')->Delete('users_groups',"WHERE `group_id`=$id"))

          return true;

        return false;


    }

    public function getUserGroups($extra='')
    {
        System::Get('db')->Execute("SELECT * FROM `users_groups` $extra");
        $groups = array();
        if(System::Get('db')->NumRows()>0)
        {
            $groups = System::Get('db')->GetRows();
        }

        return $groups;
    }


    public function getUserGroupById($id){


        system::Get('db')->Execute("SELECT * `users_groups` WHERE `group_id`=$id");
            $groups=array();
        if(system::Get('db')->NumRows>0){
            $groups=system::Get('db')->GetRow;

        }
        return $groups;



    }


} 