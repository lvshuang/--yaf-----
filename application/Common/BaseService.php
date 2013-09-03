<?php
abstract class Common_BaseService {
	
	protected function AccessExpection() {
		throw new \Exception("权限不足！");
	}

	protected function getSession() {
		return \Yaf_Registry::get('sesson');
	}

    /**
     *@desc 获取服务层
     *@param $name 模块名(服务名) .服务层类名
     *@return Service Object
     */
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

    /**
     *@desc 获取数据操作层
     *@param $name 模块名(服务名) .数据操作类名
     *@return DAO Object
     */
    protected function getDao($name) {
        if (Yaf_Registry::has('dao_' . $name)) {
            return Yaf_Registry::get('dao_' . $name);
        }
        $servicePathInfo = explode('.', $name);
        $serviceName = 'Service_' . $servicePathInfo['0'] . '_Dao_Impl_' . $servicePathInfo[1] . 'Impl';
        $serviceInstance = new $serviceName;
        Yaf_Registry::set('dao_' . $name, $serviceInstance);
        return $serviceInstance;
    }

}