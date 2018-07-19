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
        try {
            parent::__construct(conf('dsn'), conf('username'), conf('password'));
        } catch (\PDOException $e) {
            p($e->getMessage());exit;
        }
    }

}
