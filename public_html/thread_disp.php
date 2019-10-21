<?php require_once(__DIR__ .'/header.php'); ?>
<div class="wrapper">
<h1 class="page__ttl">スレッド詳細</h1>
<div class="thread">
  <div class="thread__item">
    <div class="thread__head">
      <h2 class="thread__ttl">
        PHPおすすめの勉強方法
      </h2>
      <form id="csvoutput">
        <button class="btn btn-primary">CSV出力</button>
      </form>
    </div>
    <ul class="thread__body">
      <li class="comment__item">
        <div class="comment__item__head">
          <span class="comment__item__num">1</span>
          <span class="comment__item__name">名前：ネコちゃん</span>
          <span class="comment__item__date">投稿日時：2019-06-10 16:03:01</span>
        </div>
        <p class="comment__item__content">ProgateでPHPのレッスンを終えたばかりの初心者です。勉強方法でおすすめがありましたら、教えてください。</p>
      </li>
      <li class="comment__item">
        <div class="comment__item__head">
          <span class="comment__item__num">2</span>
          <span class="comment__item__name">名前：タケオ</span>
          <span class="comment__item__date">投稿日時：2019-06-10 16:40:01</span>
        </div>
        <p class="comment__item__content">まずは初心者向けの書籍を1周しましょう。</p>
      </li>
    </ul>
    <form class="form-group">
      <div class="form-group">
        <label>コメント</label>
        <textarea type="text" name="content" class="form-control"></textarea>
        <p class="err"></p>
      </div>
      <div class="form-group">
        <input type="submit" value="書き込み" class="btn btn-primary">
      </div>
    </form>
    <p class="comment-page thread__date">スレッド作成日時：スレッド作成日時：2019-06-10 16:03:01
    </p>
  </div>
</div><!-- thread -->
</div> <!-- wrapper -->
<?php require_once(__DIR__ .'/footer.php'); ?>
</body>
</html>
