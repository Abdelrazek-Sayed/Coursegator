<?php


use coursegator\classes\Db;
use coursegator\classes\Request;
use coursegator\classes\Session;


$root = __DIR__;
$url = "http://localhost/coursegator/";



//  classes

require_once("$root/classes/Request.php");
require_once("$root/classes/Session.php");
require_once("$root/classes/Hash.php");
require_once("$root/classes/Db.php");
require_once("$root/classes/Validator.php");

$request = new Request;
$session = new Session;
$db = new Db('localhost', 'root', '', 'corsegator');
// $db = new Db('sql106.epizy.com', 'epiz_28541058', 'e29BItiXfj31m7c', 'epiz_28541058_corsegator');
