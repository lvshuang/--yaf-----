<?php
class Common_ControllerBase extends Yaf_Controller_Abstract {
    //关闭自动渲染
    public function init() {
        Yaf_Dispatcher::getInstance()->disableView();
        $this->getView()->assign('controller', $this);
        $this->getView()->assign('viewroot', APP_PATH . '/application/views/');
    }

    public function url($uri = null) {
        return $this->getHost() . $uri;
    }

    public function getHost()
    {
        return $_SERVER['SERVER_NAME'];
    }

    /**
    *返回url或者$_GET里传递的参数
    *@param $key键名，$default默认值
    *@return string
    */
    protected function getQuery($key, $default = null) {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    /**
    *返回$_POST里传递的参数
    *@param $key键名，$default默认值
    *@return string
    */
    protected function getPost($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
    *获取SESSION实例
    *@param void
    *@return Yaf_Session
    */
    protected function getSession() {
        return Yaf_Registry::get('sesson');
    }

    protected function isPost() {
        return $this->getRequest()->isPost();
    }

    protected function isCli() {
        return $this->getRequest()->isCli();
    }

    protected function isXmlHttpRequest() {
        return $this->getRequest()->isXmlHttpRequest();
    }

    protected function getService($service){
        if (Yaf_Registry::has('service_' . $service)) {
            return Yaf_Registry::get('service_' . $service);
        }
        $servicePathInfo = explode('.', $service);
        $serviceName = 'Service_' . $servicePathInfo['0'] . '_Impl_' . $servicePathInfo[1] . 'Impl';
        $serviceInstance = new $serviceName;
        Yaf_Registry::set('service_' . $service, $serviceInstance);
        return $serviceInstance;
    }

}