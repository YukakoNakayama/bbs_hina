<?php

namespace Bbs\Model;

class User extends \Bbs\Model {
  public function create($values) {
    $stmt = $this->db->prepare("INSERT INTO users (username,email,password,created,modified) VALUES (:username,:email,:password,now(),now())");
    $res = $stmt->execute([
      ':username' =>$values['username'],
      ':email' => $values['email'],
      //パスワードのハッシュ化
      ':password' => password_hash($values['password'],PASSWORD_DEFAULT)
    ]);

    //メールアドレスがユニークでなければfalse
    if ($res === false) {
      throw new \Bbs\Exception\DuplicateEmail();
    }
  }

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

    //レコードが取得できなかった場合エラー
    if (empty($user)) {
      throw new \Bbs\Exception\UnmatchEmailOrPassword();
    }

    $password = password_hash($values['password'],PASSWORD_DEFAULT);

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

  public function find($id) {
    $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindValue('id',$id);
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch();
    return $user;
  }

  public function update($values) {
    $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, image = :image, modified = now() WHERE id = :id");
    $stmt->execute([
      ':username' => $values['username'],
      ':email' => $values['email'],
      ':image' => $values['userimg'],
      ':id' => $_SESSION['me']->id
    ]);
    if ($res === false) {
      throw new \Bbs\Exception\DuplicateEmail();
    }
  }
  public function delete() {
    $stmt = $this->db->prepare("UPDATE users SET delflag = :delflag, modified = now() where id = :id");
    $stmt->execute([
      ':delflag' => 1,
      ':id' => $_SESSION['me']->id,
    ]);
  }

  public function getUserAll(){
    $user_id = $_SESSION['me']->id;
    $stmt = $this->db->query("SELECT id,username,email,image,delflag,created,modified,adminflag FROM users");
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
  }

  public function updateUserAdmin(){
    $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, image = :image, delflag = :delflag, modified = now() WHERE id = :id");
    $stmt->execute([
      ':username' => $_POST['username'.$_POST['id']],
      ':email' => $_POST['email'.$_POST['id']],
      ':image' => $_POST['image'.$_POST['id']],
      ':delflag' => $_POST['delflag'.$_POST['id']],
      ':id' => $_POST['id']
    ]);
  }

  public function adminDel() {
    $stmt = $this->db->prepare("UPDATE users SET delflag = :delflag, modified = now() WHERE id = :id");
    $stmt->execute([
      ':delflag' => '1',
      ':id' => $_POST['id']
    ]);
  }
}