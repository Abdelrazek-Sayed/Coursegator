<?php

require_once("../../../global.php");

use coursegator\classes\Validator;


if ($request->postHas('update-course')) {


    $id = $request->get('id');
    $imgOldName = $request->get('imgOldName');



    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));
    $desc = mysqli_real_escape_string($db->getConn(), $request->postClean('desc'));
    $cat_id = mysqli_real_escape_string($db->getConn(), $request->postClean('cat_id'));


    $img  = $_FILES['img'];

    if (!empty($img['name'])) {

        $imgName = $img['name'];
        $imgTmpName = $img['tmp_name'];
        $imgSize = $img['size'];
        $imgType = $img['type'];
        $imgError = $img['error'];
    }

    // validation
    $validator = new validator;

    //name
    $validator->str($name, "name", 255);

    //desc
    $validator->str($desc, "description");

    //cat_id
    $validator->required($cat_id, "category id");


    if (!empty($img['name'])) {
        // img -no errors -available extension - max size 2 mb 
        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgSizeMb = $imgSize / (1024 ** 2);

        $validator->image($imgError, $imgSizeMb, $imgExt);
    }



    if ($validator->valid()) {

        if (!empty($img['name'])) {

            unlink("$root/uploads/images/courses/<?=$imgOldName;?>");
            $randstr = uniqid();
            // new name 
            $imgNewName = "$randstr.$imgExt";
            // save img with new img
            move_uploaded_file($imgTmpName, "$root/uploads/images/courses/$imgNewName");

            $result = $db->update("courses", "name = '$name',`desc` = '$desc',cat_id = '$cat_id',img = '$imgNewName'", "id = $id");
        } else {
            $result = $db->update("courses", "name = '$name',`desc` = '$desc',cat_id = '$cat_id'", "id = $id");
        }


        if ($result) {
            $session->set('success', 'Updated successfuly');

            header("location:$url" . "admin/pages/course/all-courses.php");
        } else {
            $session->set('errors', 'failed to Update');

            header("location:$url" . "admin/pages/course/edit-course.php");
        }

        mysqli_close($conn);
    } else {
        $session->set('errors', $validator->getErrors());

        header("location:$url" . "admin/pages/course/edit-course.php");
    }
}
