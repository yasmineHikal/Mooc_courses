<?php
/**
 * Created by PhpStorm.
 * User: yasminehikal
 * Date: 06/12/2016
 * Time: 01:19 ص
 */

class coursesLessonsComments extends model{


    /**
     * add new comment
     * @param $dataArray
     * @return bool
     */
    public function addComment($dataArray){
        if(system::Get('db')->Insert('courses_lesson_comments',$dataArray))
            return true;
        return false;

    }

    /**
     * update comment
     * @param $dataArray
     * @param $id
     * @return bool
     */
    public function updateComment($dataArray,$id){
        if(system::Get('db')->Update('courses_lesson_comments',$dataArray,"WHERE `comment_id`=$id"))
            return true;
        return false;

    }

    /**
     * delete comment
     * @param $id
     * @return bool
     */

    public function deleteComment($id){
        if(system::Get('db')->Delete('courses_lesson_comments',"WHERE `comment_id`=$id"))
            return true;
        return false;

    }

    /**
     * get all lessons
     * @param string $extra
     * @return array
     */

    public function getComments($lessonId,$extra=''){
        system::Get('db')->Execute("SELECT `courses_lesson_comments`.*, `users`.`username` FROM `courses_lesson_comments` LEFT JOIN `users` ON `courses_lesson_comments`.`comment_user`=`users`.`user_id`$extra");

        if( system::Get('db')->AffectedRows()>0)
            return  system::Get('db')->GetRows();
        return [];

    }

    /**
     * get lesson by id
     * @param $id
     * @return array
     */

    public function getComment($id){
        $lesson=$this->getComments("WHERE `courses_lessons_comments`.`comment_id`=$id");
        if(count($lesson)>0)
            return $lesson[0];
        return [];
    }



} 