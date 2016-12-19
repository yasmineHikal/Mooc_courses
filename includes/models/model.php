<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 01/12/2016
 * Time: 02:46 م
 */

class model {

    private $error= array();

    public function setError($error){

    if(is_array($error))

    $this->error=$error;
        else
            $this->error[]=$error;

    }

    public function getError(){

        return $this->error;
    }

} 