<?php
namespace Bbs\Controller;
class UserDelete extends \Bbs\Controller {
  public function run() {
    $user = new \Bbs\Model\User();
    $userData = $user->find($_SESSION['me']->id);
    $this->setValues('username', $userData->username);
    $this->setValues('email', $userData->email);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type']) == 'delete') {
      if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        
      }
    }
  }
}
?>