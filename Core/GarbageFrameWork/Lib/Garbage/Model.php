<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 21:54
 */
namespace Core\GarbageFrameWork\Lib\Garbage;

class Model extends \PDO{

    public function __construct()
    {
        $dsn = 'mysql:host=116.62.217.19;dbname=test';
        $username = 'root';
        $passwd = 'root123456';

        try {
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            p($e->getMessage());exit;
        }
    }

}
