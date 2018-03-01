<?php

require_once 'config/config.php';

class DB {

 private $db;

 public function __construct()
 {
     $config = Config::$db;
     $this->db = new PDO(
         $config['dsn'],
         $config['username'],
         $config['password']
 );
     if ($config['errors']) {
         $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
 }

 public function execute($sql, $param) {
     $stmnt = $this->db->prepare($sql);
    if ($param) {
        $stmnt->execute($param);
    }
    return $stmnt->fetchAll();
}

}
