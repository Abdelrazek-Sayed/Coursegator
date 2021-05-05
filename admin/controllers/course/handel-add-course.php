<?php

require_once("../../../global.php");

use coursegator\classes\Validator;


if ($request->postHas('add-course')) {

    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));
    $desc = mysqli_real_escape_string($db->getConn(), $request->postClean('description'));
    $cat_id = mysqli_real_escape_string($db->getConn(), $request->postClean('cat_id'));


    $img  = $_FILES['img'];

    $imgName = $img['name'];
    $imgTmpName = $img['tmp_name'];
    $imgSize = $img['size'];
    $imgType = $img['type'];
    $imgError = $img['error'];


    // validation
    $validator = new validator;

    //name
    $validator->str($name, "name", 255);

    //desc
    $validator->str($desc, "description");

    //cat_id
    $validator->required($cat_id, "category id");

    // img -no errors -available extension - max size 2 mb 
    $allowedExt = ['jpg', 'png', 'gif', 'jpeg'];
    $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
    $imgSizeMb = $imgSize / (1024 ** 2);

    $validator->image($imgError, $imgSizeMb, $imgExt);



    if ($validator->valid()) {

        $randstr = uniqid();
        // new name 
        $imgNewName = "$randstr.$imgExt";
        // save img with new img
        move_uploaded_file($imgTmpName, "$root/uploads/images/courses/$imgNewName");

        $result = $db->insert(
            "courses",
            "name,`desc`,cat_id, img",
            "'$name','$desc','$cat_id','$imgNewName'"
        );


        if ($result) {

            $session->set('success', 'added successfuly');
            header("location:$url" . "admin/pages/course/all-courses.php");
        } else {
            $session->set('errors', 'failed to add');

            header("location:$url" . "admin/pages/course/add-course.php");
        }
    } else {
        $session->set('errors', $validator->getErrors());
        header("location:$url" . "admin/pages/course/add-course.php");
    }
}
