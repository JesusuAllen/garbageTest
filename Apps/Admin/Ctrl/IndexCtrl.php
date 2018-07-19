<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 20:36
 */
namespace Apps\Admin\Ctrl;

use Core\GarbageFrameWork\Lib\Garbage\Ctrl;

class IndexCtrl extends Ctrl {

    public function index(){
        echo '控制器访问成功';

//        $model = new \Core\GarbageFrameWork\Lib\Garbage\Model();
//        $list = $model->query("select * from admin");
//
//        $list = $list->fetchAll();

        $list = [
            'name' => 'lwl',
            'age' => '23',
            'sex' => '1',
            'aaa' => ''
        ];

        $this->assign('name', 'llw');
        $this->display('index/index.html');
    }

}