<?php
  ini_set('display_errors',1);
  define('DSN','mysql:host=localhost;charset=utf8;dbname=board');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('SITE_URL','http://' . $_SERVER['HTTP_HOST'] . '/bbs_hina/public_html');
  require_once(__DIR__ . '/../lib/Controller/functions.php');
  require_once(__DIR__ . '/autoload.php');
  session_start();
  $current_url = $_SERVER["REQUEST_URI"];
  if(strpos($current_url,'login.php') !== false) {
  } elseif(strpos($current_url,'signup.php') !== false) {
  } elseif(strpos($current_url,'index.php') !== false) {
  } else {
    if(!isset($_SESSION['me'])){
      header('Location: ' . SITE_URL . '/login.php');
      exit();
    }
  }
?>