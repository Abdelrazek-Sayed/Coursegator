<?php

require_once("../../../global.php");

use coursegator\classes\Validator;


if ($request->postHas('submit')) {

    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));

    $validator = new validator;

    // validation
    $validator->str($name, "name", 255);


    if ($validator->valid()) {

        $result = $db->insert("cats", "name", "'$name'");

        if ($result == true) {
            $session->set('success', "added successfuly");
            header("location:$url" . "admin/pages/category/all-cats.php");
        } else {
            $session->set('errors', "failed to add");

            header("location:$url" . "admin/pages/category/add-cat.php");
        }
    } else {
        $session->set('errors', $validator->getErrors());

        header("location:$url" . "admin/pages/category/add-cat.php");
    }
}
