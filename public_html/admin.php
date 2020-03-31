<?php
require_once(__DIR__ . '/header.php');
$userMod = new Bbs\Model\User();
$userS = $userMod->getUserAll();
$AdminUser = new Bbs\Controller\UserUpdate();
$AdminUser->run();
if($AdminUser->getValues()->adminflag == '0'){
  header('Location: '. SITE_URL . '/login.php');
  exit();
}
?>

<div class="wrapper">
  <h1 class="page__ttl">ユーザー一覧</h1>
  <form action="" id="userAdmin" method="post">
  <div class="table-responsive">
  <table class="table table-condensed">
    <tbody>
      <tr>
        <th></th>
        <th>id</th>
        <th>ユーザー名</th>
        <th>メールアドレス</th>
        <th>ユーザー画像</th>
        <th>削除フラグ</th>
      </tr>
      <?php foreach ($userS as $user): ?>
        <tr>
          <td><input type="radio" name="id" value="<?= $user->id; ?>"></td>
          <td><?= $user->id; ?></td>
          <td><input type="text" value="<?= $user->username; ?>" name="username<?= $user->id ?>"></td>
          <td><input type="text" value="<?= $user->email; ?>" name="email<?= $user->id ?>"></td>
          <td><input type="text" value="<?= $user->image; ?>" name="image<?= $user->id ?>"></td>
          <td><input type="text" value="<?= $user->delflag; ?>" name="delflag<?= $user->id ?>"></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  <input type="submit" name="type" value="更新">

  <!-- <input type="submit" name="s" onclick="document.getElementByID('userAdmin').submit();" value="削除">
  <input type="hidden" name="type" value="admindelete"> -->
  </form>
  </div>