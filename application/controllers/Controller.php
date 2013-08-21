<?php
use Service\User\Impl\UserServiceImpl;

class Common_Controller extends \Yaf_Controller_Abstract {
    //关闭自动渲染
    public function init() {
        Yaf_Dispatcher::getInstance()->disableView();
        $this->initMergeGet();
    }

    /**
    *返回url或者$_GET里传递的参数
    *@param $key键名，$default默认值
    *@return string
    */
    public function getQuery($key, $default = null) {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    /**
    *返回$_POST里传递的参数
    *@param $key键名，$default默认值
    *@return string
    */
    public function getPost($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
    *获取SESSION实例
    *@param void
    *@return Yaf_Session
    */
    protected function getSession() {
        return \Yaf_Registry::get('sesson');
    }

    protected function getUserService(){
        return new UserServiceImpl;
    }

    protected function getPostService(){

    }

}