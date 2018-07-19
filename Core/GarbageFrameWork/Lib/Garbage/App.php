<?php
/**
 * 框架入口文件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 15:00
 */
namespace Core\GarbageFrameWork\Lib\Garbage;


use Core\GarbageFrameWork\Test;
use Core\GarbageFrameWork\Testa;

class App{

    //跑起来
    public function run(){

        //设置自动载入类
        $this->_setAutoload();
        //设置加载配置文件
        $this->_setConfig();
        //设置路由
        $this->_setRoute();
    }


    //设置自动载入类
    public function _setAutoload(){

        include_once GARBAGE_CORE_PATH . 'AutoLoad' . CLASS_EXT;
        (new AutoLoad)->_set();
    }

    public function _setConfig(){
        $config = new Config();
        $config->loadDefConfig();
    }

    //设置路由
    public function _setRoute(){

        $route = new Route;
        $route->access();
    }


}