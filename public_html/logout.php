<?php
require_once(__DIR__ .'/header.php');
// var_dump(__DIR__ .'/header.php');
// exit();
// require_once('C:\xampp\htdocs\bbs_hina\config\config.php');

$app = new Bbs\Controller\Logout();
$app->run();
