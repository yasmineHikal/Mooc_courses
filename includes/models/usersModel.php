<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 01/12/2016
 * Time: 09:58 م
 */

class usersModel extends model {

    private  $userData;


    public function addUser($dataArray)
    {
        if(System::Get('db')->Insert('users',$dataArray))
            return true;
        return false;
    }


    /**
     * update user
     * @param $id
     * @param $dataArray
     * @return bool
     */
      public function updateUser($id,$dataArray){
        if(system::Get('db')->Update('users',$dataArray,"WHERE `user_id`=$id"))
            return true;
        return false;


       }



      public function deleteUser($id){

        if(system::Get('db')->delete('users',"WHERE `user_id`=$id"))

            return true;
            return false;


      }


      public function getUsers($extra=''){
          system::Get('db')->Execute("SELECT `users`.*,`users_groups`.`group_name` FROM `users` LEFT JOIN `users_groups` ON `users`.`user_group` = `users_groups`.`group_id` $extra");
          if(system::Get('db')->AffectedRows()>0){
              return system::Get('db')->GetRows();

              return [];
          }



      }

    /**
     * get user by id
     * @param $id
     * @return mixed
     */


       public function getUser($id){
            $user=$this->getUsers("WHERE `user_id`=$id");

           return$user[0];

       }

    /**
     * get user by group id
     * @param $groupId
     * @param string $extra
     * @return array
     */

       public function getUserByGroup($groupId,$extra=''){

        return $this->getUsers("WHERE `user_group`=$groupId $extra");
       }



      public function searchUsers($keyWord){
          return $this->getUsers("WHERE `users`.`username` LIKE '%$keyWord%' OR `users`.`email` LIKE '%$keyWord%'");

       }




    public function login($username,$password){
        $users=$this->getUsers("WHERE `users`.`username`='$username' AND `users`.`password`='$password'");

        if(count($users)>0) {

           $this->userData=$users[0];
            return true;
        }
            $this->setError('user not found');
            return false;
        }

            public function getUserData(){

                return $this->userData;

            }


      }