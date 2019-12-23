
<?php
require_once(__DIR__ . '/header.php');
$threadMod = new Bbs\Model\Thread();
$threads = $threadMod->getThreadAll();
?>

<ul class="wrapper">
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
    <?php foreach ($threads as $thread): ?>
    <!-- カスタムデータ属性でJSにIDを渡す準備をする -->
    <li class="thread__item" data-threadid="<?= $thread->t_id; ?>">
      <div class="thread_head">
        <h2 class="thread__ttl">
          <?= h($thread->title); ?>
        </h2>
        <div class="fav__btn<?php if(isset($thread->f_id)) { echo ' active';} ?>"><i class="fas fa-star"></i></div>
      </div>
      <ul class="thread_body">
        <?php
          $comments = $threadMod->getComment($thread->t_id);
          foreach($comments as $comment):
        ?>
        <li class="comment_item">
          <div class="comment_item_head">
            <span class="comment_item_num"><?= h($comment->comment_num); ?></span>
            <span class="comment_item_name">名前：<?= h($comment->username); ?></span>
            <span class="comment_item_date">投稿日時：<?= h($comment->created); ?></span>
          </div>
          <p class="comment_item_content"><?= h($comment->content); ?></p>
        <?php endforeach;?>
        </li>
      </ul>
      <div class="operation">
        <a href="<?= SITE_URL; ?>/thread_disp.php?thread_id=<?= $thread->t_id; ?>">書き込み&すべて読む(<?= h($threadMod->getCommentCount($thread->t_id)); ?>)</a>
        <p class="thread_date">スレッド作成日時：<?= h($thread->created); ?></p>
      </div>
    </li>
    <?php endforeach;?>
  </ul>
</div>
<?php
require_once(__DIR__ . '/footer.php');
?>
