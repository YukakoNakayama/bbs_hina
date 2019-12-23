<html>
<?php
  require_once(__DIR__ .'/header.php');
  $threadCon = new Bbs\Controller\Thread();
  $threadCon->run();
  $thread_id = $_GET['thread_id'];
  $threadMod = new Bbs\Model\Thread();
  $threadDisp = $threadMod->getThread($thread_id);
?>
<div class="wrapper">
<h1 class="page__ttl">スレッド詳細</h1>
<div class="thread">
  <div class="thread__item">
    <div class="thread__head">
      <h2 class="thread__ttl">
        <?= h($threadDisp->title); ?>
      </h2>
    </div>
    <ul class="thread__body">
    <?php
      $comments = $threadMod->getCommentAll($threadDisp->id);
      foreach ($comments as $comment):
    ?>
      <li class="comment__item">
        <div class="comment__item__head">
          <span class="comment__item__num"><?= h($comment->comment_num); ?></span>
          <span class="comment__item__name">名前：<?= h($comment->username); ?></span>
          <span class="comment__item__date">投稿日時：<?= h($comment->created); ?></span>
        </div>
        <p class="comment__item__content"><?= h($comment->content); ?></p>
      <?php endforeach;?>
      </li>
    </ul>
    <form action="" method="post" class="form-group">
      <div class="form-group">
        <label>コメント</label>
        <textarea type="text" name="content" class="form-control"><?= isset($threadCon->getValues()->content) ? h($threadCon->getValues()->content) : ''; ?></textarea>
        <p class="err"><?= h($threadCon->getErrors('comment')); ?></p>
        <input type="hidden" name="type" value="createComment">
        <input type="hidden" name="thread_id" value="<?= $threadDisp->id ?>">
      </div>
      <div class="form-group">
        <input type="submit" value="書き込み" class="btn btn-primary">
      </div>
    </form>
    <p class="comment-page thread__date">スレッド作成日時：<?= h($threadDisp->created); ?>
    </p>
  </div>
</div>
</div> <!-- wrapper -->
<?php require_once(__DIR__ .'/footer.php'); ?>
</body>
</html>