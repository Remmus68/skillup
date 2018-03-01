<?php

require_once 'DB.php';

class Config
{
    public static $db = [
        'dsn' => 'mysql: host=localhost; dbname=php2; charset=utf8;',
        'username' => 'root',
        'password' => 'root',
        'errors' => true,
    ];
}
