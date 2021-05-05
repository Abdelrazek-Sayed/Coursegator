<?php

namespace coursegator\classes;


class validator
{

    private $errors = [];

    function str($str, $inputName, $max = null)
    {

        if (empty($str)) {
            $this->errors[] =  "sorry, $inputName  is required";
        } elseif (!is_string($str)) {
            $this->errors[] =  "sorry, $inputName  must be string";
        } elseif ($max !== null and strlen($str) > $max) {
            $this->errors[] =  "sorry, $inputName  max $max chatacter";
        }
    }

    function email($email)
    {

        if (empty($email)) {
            $this->errors[] =  "sorry, email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] =  "sorry, email is not valid";
        } elseif (strlen($email) > 255) {
            $this->errors[] =  "sorry, email max 255 chatacter";
        }
    }

    public function password($password, $min, $max)
    {
        if (empty($password)) {
            $this->errors[] = "password is required";
        } elseif (strlen($password) < $min or strlen($password) > $max) {
            $this->errors[] = "password between $min and $max chars ";
        }
    }

    public function passwordConfirm($password, $confirm_password, $min, $max)
    {
        if (!empty($password)) {
            if (strlen($password) < $min or strlen($password) > $max) {
                $this->errors[] = "password between $min and $max chars ";
            } elseif ($password != $confirm_password) {
                $this->errors[] = "password  dont match ";
            }
            return false;
        }
        return true;
    }

    public function valid()
    {
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function required($input, $inputName)
    {
        if (empty($input)) {
            $this->errors[] = "$inputName is required";
        }
    }

    public function image($error, $size, $ext)
    {
        $allowedExt = ['jpg', 'png', 'gif', 'jpeg'];

        if ($error != 0) {
            $errors[] = "error while uploading image";
        } elseif ($size > 2) {
            $errors[] = "size must be less than 2 mb";
        } elseif (!in_array($ext, $allowedExt)) {
            $errors[] = "not valid extension allowed extensions are 'jpg','png','gif','jpeg' ";
        }
    }
}
