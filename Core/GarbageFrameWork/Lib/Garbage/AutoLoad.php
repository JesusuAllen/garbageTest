<?php
/**
 * 自动加载类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 15:52
 */
namespace Core\GarbageFrameWork\Lib\Garbage;

class AutoLoad{

    public static $classArr = array();

    public function _set(){
        //自动加载类
        spl_autoload_register(array($this, '_autoLoadClass'));
    }

    /**
     * 自动加载类
     * @param $class 类路径
     * @return bool
     */
    public function _autoLoadClass( $class ){

        $class = str_replace('\\', '/', $class);

        //加载过就不重复加载
        if( isset(self::$classArr[$class]) ) return true;

        $classPath = $class . CLASS_EXT;

        if( is_file($classPath) ){
            include_once $classPath;
            self::$classArr[$class] = $class;
        } else {

            p('找不到该类文件' . $classPath);exit;
        }

        return false;
    }

}