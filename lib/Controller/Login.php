<?php
// use \Exception;
namespace Bbs\Controller;

class Login extends \Bbs\Controller {
  public function run() {
    //ログインしていればトップページへ移動
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // var_dump($_SERVER['REQUEST_METHOD']);
      // var_dump($_POST['email']);
      // exit();
      $this->postProcess();
    }
  }

  protected function postProcess() {
    // var_dump('test');
    // exit();

    try {
      $this->validate();
    } catch (\Bbs\Exception\EmptyPost $e) {
      $this->setErrors('login', $e->getMessage());
    }

    $this->setValues('email', $_POST['email']);

    if ($this->hasError()) {
      return;
    } else {
      try {
        $userModel = new \Bbs\Model\User();
        // var_dump($userModel);
        // exit();
        $user = $userModel->login([
          'email' => $_POST['email'],
          'password' => $_POST['password']
        ]);
        //var_dump($user);
        //exit();
      }
      catch(\Bbs\Exception\UnmatchEmailOrPassword $e) {
        $this->setErrors('login', $e->getMessage());
        return;
      }
      catch(\Bbs\Exception\DeleteUser $e) {
        $this->setErrors('login', $e->getMessage());
        return;
      }

      //ログイン処理
      //session_regenerate_id関数…現在のセッションIDを新しいものと置き換える。セッションハイジャック対策
      session_regenerate_id(true);
      //ユーザー情報をセッションに格納
      $_SESSION['me'] = $user;

      //トップページへリダイレクト
      header('Location: '. SITE_URL . '/thread_all.php');
      exit();
    }
   }

  private function validate(){
    //トークンが空またはPOST送信とセッションに格納された値が異なるとエラーが出る
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo "トークンが不正です!";
      if(isset($_POST['token'])){
        print_r($_POST['token']);
      }else{
        echo "ない";
      }
      echo "<br>";
      print_r($_SESSION['token']."session");
      exit();
    }
    //emailとpasswordのキーがなかった場合、強制終了
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
      echo "不正なフォームから登録されています!";
      exit();
    }
    if ($_POST['email'] === '' || $_POST['password'] === '') {
       throw new \Bbs\Exception\EmptyPost("メールアドレスとパスワードを入力してください!");
      // echo "メールアドレスとパスワードを入力してください";
      //exit();
    }
  }
}
?>