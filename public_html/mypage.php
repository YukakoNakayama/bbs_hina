<?php
require_once(__DIR__ .'/header.php');
?>
<div class="wrapper">
<h1 class="page__ttl">マイページ</h1>
<div class="container">
  <form id="userupdate" class="form mypage-form">
    <div class="form-group">
      <label>メールアドレス</label>
      <input type="text" name="email" value="" class="form-control">
      <p class="err"></p>
    </div>
    <div class="form-group">
      <label>ユーザー名</label>
      <input type="text" name="username" value="" class="form-control">
      <p class="err"></p>
    </div>
    <div class="form-group">
      <label>プロフィール画像</label>
      <label>
      <span class="file-btn btn btn-info">
        ファイルを選んでください
        <input type="file" name="image" class="form" style="display:none" accept="image/*">
      </span>
      </label>
      <p class="err"></p>
      <div class="imgarea">
      <p>現在の画像</p>
      <img src="./gazou/img_5cfa2e5c0c60e.jpg">
      </div>
    </div>
    <p class="err"></p>
    <button class="btn btn-primary">更新</button>
  </form>
  <form class="user-delete" action="user_delete_confirm.php">
    <input type="submit" class="btn btn-default" value="退会する">
  </form>
</div><!--container -->
</div> <!-- wrapper -->
<?php
require_once(__DIR__ .'/footer.php');
?>
</body>
</html>
