<?php require_once(__DIR__ .'/header.php'); ?>
<div class="wrapper">
<h1 class="page__ttl">ユーザー退会</h1>
<p class="user-disp">以下のユーザーを退会します。実行する場合は「退会」ボタンを押してください。</p>
<div class="container">
    <div class="form-group">
      <p>メールアドレス：<?= h($_SESSION['me']->email); ?></p>
    </div>
    <div class="form-group">
      <p>ユーザー名：<?= h($_SESSION['me']->username); ?></p>
    </div>
  <form class="user-delete user-confirm" action="user_delete_done.php">
    <a class="btn btn-primary" href="mypage.php">まだしません。</a>
    <input type="submit" class="btn btn-primary" value="退会">
  </form>
</div><!--container -->
</div> <!-- wrapper -->
<?php require_once(__DIR__ .'/footer.php'); ?>
</body>
</html>
