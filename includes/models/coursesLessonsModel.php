<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 06/12/2016
 * Time: 12:48 ص
 */

class coursesLessonsModel extends model{


    /**
     * add new lesson
     * @param $dataArray
     * @return bool
     */
    public function addLesson($dataArray){
        if(system::Get('db')->Insert('courses_lesson',$dataArray))
            return true;

        $this->setError(system::Get('db')->getDBErrors());
        return false;


    }

    /**
     * update lesson
     * @param $dataArray
     * @param $id
     * @return bool
     */
    public function updateLesson($dataArray,$id){
        if(system::Get('db')->Update('courses_lessons',$dataArray,"WHERE `lesson_id`=$id"))
            return true;
        return false;

    }

    /**
     * delete lesson
     * @param $id
     * @return bool
     */

    public function deleteLesson($id){
        if(system::Get('db')->Delete('courses_lessons',"WHERE `lesson_id`=$id"))
            return true;
        return false;

    }

    /**
     * get all lessons
     * @param string $extra
     * @return array
     */

    public function getLessons($extra=''){
        system::Get('db')->Execute("SELECT `courses_lessons`.*,`users`.`username`,`courses`.`course_title` FROM `courses_lessons` LEFT JOIN `users`ON `users`.`user_id`=`courses_lessons`.`lesson_instructor` LEFT JOIN `courses` ON `courses`.`course_id`=`courses_lessons`.`lesson_course`$extra");

        if( system::Get('db')->AffectedRows()>0)
            return  system::Get('db')->GetRows();
        return [];

    }


    public function getLessonsByCourse($courseId){
        $lesson=$this->getLessons("WHERE `courses_lessons`.`course_id`=$courseId");
        if(count($lesson)>0)
            return $lesson[0];
        return [];
    }

    /**
     * get lesson by id
     * @param $id
     * @return array
     */

    public function getLesson($id){
        $lesson=$this->getLessons("WHERE `courses_lessons`.`lesson_id`=$id");
        if(count($lesson)>0)
            return $lesson[0];
        return [];
    }





} 