<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 20:36
 */
namespace Apps\Home\Ctrl;

use Core\GarbageFrameWork\Lib\Garbage\Ctrl;

class IndexCtrl extends Ctrl {

    public function index(){

        p('控制器访问成功');

        $model = new \Core\GarbageFrameWork\Lib\Garbage\Model();

        $list = $model->query("select * from t_member");

        $list && $list = $list->fetchAll(\PDO::FETCH_ASSOC);
        p($list);
        p('数据库操作成功');
        $list = [
            'name' => i('name', 'lalala'),
            'age' => '23',
            'sex' => '1',
            'aaa' => ''
        ];

        $this->assign('name', 'llw');
        $this->display('index/index.html', $list);
        p('页面加载成功');

        p('配置文件写入：'.conf('dbname', $list['name']));
        p(conf('dbname'));
        p('配置文件加载成功');
        exit;
    }

}