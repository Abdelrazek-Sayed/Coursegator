
<?php

require_once("../../global.php");

$session->destroy();

header("location:$url" . "admin/pages/login.php");

?>





