<?php

namespace Bbs;

class Model {

  protected $db;
  public function __construct(){
    //Modelクラス及び子クラスのインスタンスを生成した際には、必ずPDO(PHP Data Object)クラスのインスタンスを生成する
    try {
      $this->db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}
?>