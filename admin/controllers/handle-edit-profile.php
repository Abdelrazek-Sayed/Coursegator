 
<?php

require_once("../../global.php");

use coursegator\classes\Hash;
use coursegator\classes\validator;


if ($request->postHas('edit-profile')) {
 
    $id = $session->get('adminId');
  
    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));
    $email = mysqli_real_escape_string($db->getConn(), $request->postClean('email'));
    $password = $request->post('password');
    $confirm_password = $request->post('confirm_password');


    // validation
    $validator = new validator;
    // name
    $validator->str($name, "name", 255);
    //email
    $validator->email($email);
    //password
    $isPasswordEmpty =  $validator->passwordConfirm($password, $confirm_password, 5, 25);

    if (!$isPasswordEmpty) {
        $hashed_password = Hash::make($password);
    }

    if ($validator->valid()) {

        if (!$isPasswordEmpty) {
            $result = $db->update("admins", "name = '$name',email = '$email',`password` = '$hashed_password'", "id = $id");
        } else {
            $result = $db->update("admins", "name = '$name',email = '$email'", "id = $id");
        }

        if ($result) {

            $session->set('success', "updated successfully");
            $session->set('adminName', $name);

            header("location:$url" . "admin/pages/profile/edit-profile.php");
        } else {
            $session->set('errors', 'failed to update');
            header("location:$url" . "admin/pages/profile/edit-profile.php");
        }
    } else {
        $session->set('errors', $validator->getErrors());
        header("location:$url" . "admin/pages/profile/edit-profile.php?id=$id");
    }
}



?>