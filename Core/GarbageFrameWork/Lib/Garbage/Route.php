<?php
/**
 * 路由类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 16:38
 */
namespace Core\GarbageFrameWork\Lib\Garbage;

class Route{

    public $module = '';
    public $ctrl = '';
    public $func = '';

    //解析路径
    public function __construct(){

        if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'  ){

            $clonePathArr = $pathArr =explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            //获取应用目录下的所有模块目录名
            $pathList = scandir(APP_PATH);
            if( is_array($pathList) ){
                //去掉根目录
                foreach ( $pathList as $plk => $plv ){
                    if( in_array($plv, array('.', '..')) ) unset($pathList[$plk]);
                }

                //遍历一个个判断传入的参数是否有模块名
                $cPathArr = count($pathArr);
                for ( $i=0; $i < $cPathArr; $i ++ ){
                    if( in_array(ucfirst($pathArr[$i]), $pathList) ) break;
                    unset($pathArr[$i]);
                }

                //重新排列key
                $pathArr = array_values($pathArr);
            }

            if( count($pathArr) == 0 && $_SERVER['REQUEST_URI'] != '/' ) {

                for ( $i=0; $i<count($clonePathArr); $i++ ){
                    if( $clonePathArr[$i] == ITEM_NAME ){
                        p('找不到该模块：'.$clonePathArr[$i+1]);exit;
                    }
                }

            }

            //如果没有传模块则使用默认定义的模块
            $this->module = isset( $pathArr[0] ) ? $pathArr[0] : conf('app_def_module');
            //如果没有传控制器则使用默认定义的模块
            $this->ctrl   = isset( $pathArr[1] ) ? $pathArr[1] : conf('app_def_ctrl');
            //如果没有传方法则使用默认定义的方法
            $this->func   = isset( $pathArr[2] ) ? $pathArr[2] : conf('app_def_func');

            unset($pathArr[0], $pathArr[1], $pathArr[2]);

            //重新排列key
            $pathArr = array_values($pathArr);

            //将路径传值保存至get中
            for ( $i = 0; $i <= count($pathArr); $i += 2 ){
                if( isset($pathArr[$i + 1]) ){
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
            }
        } else {
            $this->module = conf('app_def_module');
            $this->ctrl   = conf('app_def_ctrl');
            $this->func   = conf('app_def_func');
        }
        //转换首字母大写
        conf('app_def_module', ucfirst($this->module));
        conf('app_def_ctrl', ucfirst($this->ctrl));
        conf('app_def_func', $this->func);
    }


    //访问
    function access(){

        //拼接路径，首字母大写
        $ctrlClass = '\\' . APP_FILE_NAME . '\\' . ucfirst($this->module) . '\\' . APP_CTRL_NAME . '\\' . ucfirst($this->ctrl) . APP_CTRL_NAME;

        //实例化控制器
        $ctrl = new $ctrlClass;

        $funcName = $this->func;

        //使用控制器的方法
        $ctrl->$funcName();
    }

}