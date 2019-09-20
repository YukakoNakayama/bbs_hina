<?php
  ini_set('display_errors',1);
  define('DSN','mysql:host=localhost;charset=utf8;dbname=board');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('SITE_URL','http://' . $_SERVER['HTTP_HOST'] . '/php_bbs/public_html');
  require_once(__DIR__ . '/../lib/Controller/functions.php');
  // require_once(__DIR__ . '/autoload.php');
  session_start();
?>