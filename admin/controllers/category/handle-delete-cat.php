<?php

require_once("../../../global.php");

if ($request->getHas('cat_id')) {
    $id = $request->get('cat_id');

    $result = $db->delete("cats", "id=$id");

    if ($result) {
        $session->set('success', "Deleted Successfully");
    } else {
        $session->set('success', "Can't Be Deleted");
    }
    header("location:$url" . "admin/pages/category/all-cats.php");
}
