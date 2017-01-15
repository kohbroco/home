<?php
class config{
    public static $instance;
    public $dirroot;
    private function __construct(){
        $this->dirroot = __DIR__;
    }
    public static function init(){
        if(!isset($instance)){
            self::$instance = new config();
        }
    }
}