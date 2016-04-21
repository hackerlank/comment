<?php
include 'config/init.php';
include 'vendor/autoload.php';

$siteid = $_REQUEST['siteid'];
$control = $_REQUEST['control'];
$action = $_REQUEST['action'];
try {
	$result = Comment\Libraries\Application::getInstance($siteid, $control, $action)->exec();
} catch (Exception $ex) {
	$result = $ex->getMessage();
}

var_dump($result);
