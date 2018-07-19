<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 22:11
 */
namespace Core\GarbageFrameWork\Lib\Garbage;
class Ctrl{

    public $assignArr = array();

    //设置参数
    public function assign( $key, $value ){
        $this->assignArr[$key] = $value;
    }

    //引入页面文件
    public function display( $file, $paramArr=array() ){

        //已数组形式传递参数
        if ( is_array($paramArr) && count($paramArr) > 0 ){
            $this->assignArr = $paramArr + $this->assignArr;
        }

        $filePath = APP_PATH . APP_CURRENT_MODULE . DS . APP_VIEW_NAME . DS . ucfirst($file);
        if( !is_file($filePath) ){
            p('找不到视图文件：'.$filePath);
            exit;
        }

        extract($this->assignArr);

        include_once $filePath;
    }

}