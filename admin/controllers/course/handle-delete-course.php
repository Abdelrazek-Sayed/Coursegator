<?php

require_once("../../../global.php");


    if ($request->getHas('course_id')) {

    $id = $request->get('course_id');
    $imgOldName = $request->get('imgOldName');

    unlink("$root/uploads/images/courses/$imgOldName");
    $result = $db->delete("courses", "id =$id");
    if ($result) {
        $session->set('success', "you deleted course successfully");
        header("location:$url"."admin/pages/course/all-courses.php");
    }
}
