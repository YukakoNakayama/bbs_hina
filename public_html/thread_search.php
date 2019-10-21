<?php require_once(__DIR__ .'/header.php'); ?>
<div class="wrapper">
<h1 class="page__ttl">スレッド名検索</h1>
<form action="" method="get" class="form-group form-search">
  <div class="form-group">
    <input type="text" name="keyword" value="PHP" placeholder="スレッド検索">
    <p class="err"></p>
  </div>
  <div class="form-group">
    <input type="submit" value="検索" class="btn btn-primary">
  </div>
</form>
<!-- thread -->
<?php require_once(__DIR__ .'/thread_disp.php'); ?>
</div> <!-- wrapper -->
<?php require_once(__DIR__ .'/footer.php'); ?>
</body>
</html>
