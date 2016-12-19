<?php

class instructorCoursesController extends controller
{

    private $coursesModel;

    public function __construct()
    {
        $this->checkPermission(2);
        $this->coursesModel=new coursesModel();

    }

    /**
     *
     */
    public function getCourses(){


        //Model to get courses from db

        $courses= $this->coursesModel->getCourses();

        //View -> display categories
        include(VIEWS.'/back/instructor/header.html');
        include(VIEWS.'/back/instructor/menu.html');
        include(VIEWS.'/back/instructor/courses.html');
        include(VIEWS.'/back/instructor/footer.html');


    }


    public  function addCourse(){

        if(isset($_POST['submitAddCourse']))
        {
            $courseTitle = $_POST['title'];
            $courseDes = $_POST['desc'];
            if(strlen($courseTitle)<5 && strlen($courseDes<5))
            {
                $this->setControllerErrors('Course Name must be at least 5 chars');
                include(VIEWS.'/back/instructor/header.html');
                include(VIEWS.'/back/instructor/menu.html');
                include(VIEWS.'/back/instructor/addcourse.html');
                include(VIEWS.'/back/instructor/footer.html');
            }
            else
            {
                //1- prepare data
                $dataArray = array(
                    'course_title' => $courseTitle,
                    'course_description'=>$courseDes
                );

                //2- get model
                if($this->coursesModel->addCourse($dataArray))
                    Redirect::To('courses.php');

                //if not added and db error
                $this->setControllerErrors($this->coursesModel->getErrors());
                include(VIEWS.'/back/instructor/header.html');
                include(VIEWS.'/back/instructor/menu.html');
                include(VIEWS.'/back/instructor/addcourse.html');
                include(VIEWS.'/back/instructor/footer.html');

            }
        }
        else
        {
            include(VIEWS.'/back/instructor/header.html');
            include(VIEWS.'/back/instructor/menu.html');
            include(VIEWS.'/back/instructor/addcourse.html');
            include(VIEWS.'/back/instructor/footer.html');
        }
    }


} 