<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 26/6/2016
 * Time: 1:17 AM
 */

class CacheManager{
    //STATIC
    //protected static $_instance;
    const _CACHE_MANAGER_NAME = 'cachemanager';
    protected $_caches;
    private static $_isInitialized = false;
    public static function isInitialized(){
        return self::$_isInitialized;
    }

    public $message = 'begin';

    private function __construct($instance_json = null)
    {
        if($instance_json){
            $this->_caches = json_decode($instance_json);
        }
        self::$_isInitialized = true;
    }

    public static function getInstance(){
        if($instance_json = apc_fetch(self::_CACHE_MANAGER_NAME)){

            $instance = new CacheManager($instance_json);
        }else{
            $instance = new CacheManager();
        }
        return $instance;
    }

    private function updateCache(){
    }
    public function maintainDirectory($dir){
        $cache = new CacheObject($dir);
        $this->_caches[$dir] = $cache;
    }

    public function release($dir){
        unset($this->_caches[$dir]);
    }

}