<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 02/12/2016
 * Time: 02:04 ص
 */

class instructorController extends controller{



    public function __construct()
    {
        $this->checkPermission(2);
    }

    public function index(){

        include(VIEWS.'/back/instructor/header.html');
        include(VIEWS.'/back/instructor/menu.html');
        include(VIEWS.'/back/instructor/index.html');
        include(VIEWS.'/back/instructor/footer.html');

    }

} 