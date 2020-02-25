<?php
require_once(__DIR__ . '/header.php');
$userMod = new Bbs\Model\User();
$userS = $userMod->getUserAll();
$AdminUser = new Bbs\Controller\UserUpdate();
$AdminUser->run();
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
        <th>作成日</th>
        <th>更新日</th>
      </tr>
      <?php foreach ($userS as $user): ?>
        <tr>
          <td><input type="radio" name="id"></td>
          <td><?= h($user->id); ?></td>
          <td><input type="text" value="<?= h($user->username); ?>" name="username"></td>
          <td><input type="text" value="<?= h($user->email); ?>" name="email"></td>
          <td><input type="text" value="<?= h($user->image); ?>" name="image"></td>
          <td><input type="text" value="<?= h($user->delflag); ?>" name="delflag"></td>
          <td><input type="text" value="<?= h($user->created); ?>" name="created"></td>
          <td><input type="text" value="<?= h($user->modified); ?>" name="modified"></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  <input type="submit" name="s" onclick="document.getElementByID('userAdmin').submit();" value="更新">
  <input type="hidden" name="type" value="admin">
  <input type="submit" name="s" value="削除">
  </form>
  </div>