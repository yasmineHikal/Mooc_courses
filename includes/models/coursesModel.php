<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 05/12/2016
 * Time: 11:49 م
 */

class coursesModel extends model {

    /**
     * add new course
     * @param $dataArray
     * @return bool
     */
    public function addCourse($dataArray){
        if(system::Get('db')->Insert('courses',$dataArray))
            return true;
        return false;

    }

    /**
     * update course
     * @param $dataArray
     * @param $id
     * @return bool
     */
    public function updateCourse($dataArray,$id){
        if(system::Get('db')->Update('courses',$dataArray,"WHERE `course_id`=$id"))
            return true;
        return false;

    }

    /**
     * delete course
     * @param $id
     * @return bool
     */

    public function deleteCourse($id){
            if(system::Get('db')->Delete('courses',"WHERE `course_id`=$id"))
                return true;
            return false;

        }

    /**
     * get all courses
     * @param string $extra
     * @return array
     */

    public function getCourses($extra=''){
        system::Get('db')->Execute("SELECT `courses`.*,`users`.`username`,`courses_categories`.`category_name` FROM `courses` LEFT JOIN `courses_categories`ON `courses`.`course_category`=`courses_categories`.`category_id` LEFT JOIN `users` on `courses`.`course_instructor`=`users`.`user_id`$extra");

        if( system::Get('db')->AffectedRows()>0)
            return  system::Get('db')->GetRows();
        return [];

    }

    /**
     * get course by id
     * @param $id
     * @return array
     */

    public function getCourse($id){
        $course=$this->getCourses("WHERE `course_id`=$id");
            if(count($course)>0)
                return $course[0];
        return [];
    }

    /**
     * get Course By Instructor Id
     * @param $id
     * @return array
     */

    public function getCourseByInstructorId($id){
            $course=$this->getCourses("WHERE `courses`.`course_instructor`=$id");
                if(count($course)>0)
                    return $course[0];
            return [];
        }

    /**
     *  get Course By Course Category
     * @param $id
     * @return array
     */

    public function getCourseByCategoryId($id){
            $course=$this->getCourses("WHERE `courses`.`course_category`=$id");
                if(count($course)>0)
                    return $course[0];
            return [];
        }








} 