<?php

namespace Bbs\Model;

class User extends \Bbs\Model {

  public function login($values) {
  // var_dump($values['password']);
  // exit();

    $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email;");
    $stmt->execute([
      ':email' => $values['email']
    ]);
    //fetchMode データを扱いやすい形に変換
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch();

    // var_dump($user);
    // exit();

    //レコードが取得できなかった場合エラー
    if (empty($user)) {
      throw new \Bbs\Exception\UnmatchEmailOrPassword();
    }

    //パスワードが一致しないとエラー
    if (!password_verify($values['password'], $user->password)) {
      throw new \Bbs\Exception\UnmatchEmailOrPassword();
    }

    //削除フラグが立っているとエラー
    if ($user->delflag == 1) {
      throw new \Bbs\Exception\DeleteUser();
    }

    return $user;
  }
}
?>