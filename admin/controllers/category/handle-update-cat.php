<?php

require_once("../../../global.php");

use coursegator\classes\Validator;


if ($request->postHas('update')) {
    $id = $request->get('id');

    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));

    // validation 
    $validtor = new Validator;

    $validtor->str($name, "name", 255);

    if ($validtor->valid()) {
        $result = $db->update("cats", "name = '$name'", "id =$id");
        if ($result) {
            $session->set('success', 'Category Updated');
            header("location:$url" . "admin/pages/category/all-cats.php");
        } else {
            $session->set('errors', "failed to update");

            header("location:$url" . "admin/pages/category/edit-cat.php");
        }
    }
}
