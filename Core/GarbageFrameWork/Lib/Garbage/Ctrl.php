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

    /**
     * 设置页面参数
     * @param $key 字段名
     * @param $value 字段值
     */
    public function assign( $key, $value ){
        $this->assignArr[$key] = $value;
    }

    /**
     * 引入页面文件
     * @param $file 页面文件View层路径例子：Index/index.html，不传则为：控制器/方法名.html
     * @param $paramArr 数组形式参数
     */
    public function display( $file=null, $paramArr=array() ){

        //已数组形式传递参数
        if ( is_array($paramArr) && count($paramArr) > 0 ){
            $this->assignArr = $paramArr + $this->assignArr;
        }

        if( is_null($file) ){
            $filePath = APP_PATH . conf('app_def_module') . DS . APP_VIEW_NAME . DS . ucfirst(conf('app_def_ctrl') . DS . conf('app_def_func') . '.html');
        } else {
            $filePath = APP_PATH . conf('app_def_module') . DS . APP_VIEW_NAME . DS . ucfirst($file);
        }

        if( !is_file($filePath) ){
            p('找不到视图文件：'.$filePath);
            exit;
        }

        extract($this->assignArr);

        include_once $filePath;
    }

}