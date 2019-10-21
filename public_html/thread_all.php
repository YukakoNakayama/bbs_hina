<body>
<?php
require_once(__DIR__ .'/header.php');
?>
<div class="wrapper">
<h1 class="page__ttl">スレッド一覧</h1>
<form action="thread_search.php" class="form-group form-search">
  <div class="form-group">
    <input type="text" name="keyword" placeholder="スレッド検索">
  </div>
  <div class="form-group">
    <input type="submit" value="検索" class="btn btn-primary">
  </div>
</form>
<ul class="thread">
    <li class="thread__item">
      <div class="thread__head">
        <h2 class="thread__ttl">
          PHPおすすめの勉強方法
        </h2>
        <div class="fav__btn active"><i class="fas fa-star"></i></div>
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
      <div class="operation">
        <a href="./thread_disp.php">書き込み&amp;すべて読む(2)</a>
        <p class="thread__date">スレッド作成日時：2019-06-10 16:03:01</p>
      </div>
    </li>
    <li class="thread__item">
      <div class="thread__head">
        <h2 class="thread__ttl">
          エラーの特定方法
        </h2>
        <div class="fav__btn"><i class="fas fa-star"></i></div>
      </div>
      <ul class="thread__body">
        <li class="comment__item">
          <div class="comment__item__head">
            <span class="comment__item__num">1</span>
            <span class="comment__item__name">名前：勝谷</span>
            <span class="comment__item__date">投稿日時：2019-06-05 13:20:01</span>
          </div>
          <p class="comment__item__content">PHPでエラーを発見するには?</p>
        </li>
        <li class="comment__item">
          <div class="comment__item__head">
            <span class="comment__item__num">2</span>
            <span class="comment__item__name">名前：タケオ</span>
            <span class="comment__item__date">投稿日時：2019-06-10 16:40:01</span>
          </div>
          <p class="comment__item__content">var_dumpで変数中身などを確認してみましょう。</p>
        </li>
        <li class="comment__item">
          <div class="comment__item__head">
            <span class="comment__item__num">3</span>
            <span class="comment__item__name">名前：勝谷</span>
            <span class="comment__item__date">投稿日時：2019-06-10 16:45:01</span>
          </div>
          <p class="comment__item__content">ありがとうございます！やってみます。</p>
        </li>
        <div class="operation">
          <a href="./thread_disp.php">書き込み&amp;すべて読む(3)</a>
          <p class="thread__date">スレッド作成日時：2019-06-10 16:03:01</p>
        </div>
      </ul>
    </li>
</ul><!-- thread -->
</div> <!-- wrapper -->
<?php
require_once(__DIR__ .'/footer.php');
?>
</body>
