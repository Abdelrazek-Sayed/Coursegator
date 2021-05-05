<?php

require_once("../../global.php");

use coursegator\classes\Validator;

if ($request->postHas('submit')) {

    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));
    $email = mysqli_real_escape_string($db->getConn(),  $request->postClean('email'));
    $phone = mysqli_real_escape_string($db->getConn(), $request->postClean('phone'));
    $spec = mysqli_real_escape_string($db->getConn(),  $request->postClean('spec'));
    $courseId = mysqli_real_escape_string($db->getConn(),  $request->postClean('course_id'));

    $validator = new Validator;

    $validator->str($name, "name", 255);


    $validator->email($email);

    $validator->str($name, "phone", 255);

    $validator->str($spec, "spec", 255);

    // course_id required  
    $validator->required($courseId, "course_id");

    if ($validator->valid()) {

        $insert =  $db->insert(
            "reservations",
            "name, email, phone, spec,course_id",
            "'$name','$email','$phone','$spec','$courseId'"
        );

        if ($insert) {

            $session->set('success', "successful enrollment");
        } else {
            $session->set('queryError', "queryErrort");
        }
    } else {

        $session->set('errors', $errors);
    }
    header("location:$url" . "web/pages/contact.php");
}
