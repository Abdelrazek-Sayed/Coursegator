<?php

require_once("../../global.php");

use coursegator\classes\Hash;
use coursegator\classes\Validator;


if ($request->postHas('login')) {

    $email = mysqli_real_escape_string($db->getConn(), $request->postClean('email'));
    $password = $request->post('password');


    $validator = new Validator;

    $validator->email($email);

    $validator->password($password, 5, 25);

    if ($validator->valid()) {
        $admin = $db->selectOne('*', "admins", "WHERE email = '$email'");

        if (!empty($admin)) {

            // check the password 

            if (Hash::check($password, $admin['password'])) {
                // save user data in sessions and redirct to admin/index page 

                $session->set('adminId', $admin['id']);

                $session->set('adminName', $admin['name']);

                $session->set('islogin', true);

                header("location:$url" . "admin/pages/index.php");
            } else {
                // password is not correct

                $session->set('loginError', "password is not correct");
                header("location:$url" . "admin/pages/login.php");
            }
        } else {
            // email is true but not registered
            $session->set('loginError', "email is not registered");
            header("location:$url" . "admin/pages/login.php");
        }
    } else {
        $session->set('errors', $validator->getErrors());
        header("location:$url" . "admin/pages/login.php");
    }
}
