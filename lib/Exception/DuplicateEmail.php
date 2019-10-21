<?php
namespace Bbs\Exception;
class DuplicateEmail extends \Exception {
  protected $message = '既に登録されているメールアドレスです。';
}
?>