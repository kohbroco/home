<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 26/6/2016
 * Time: 12:56 AM
 */

class CacheObject{

    //PROPERTIES
    protected $_directory;
    protected $files;
    const _HASH_METHOD = 'MD5';
    //METHODS
    public function __construct($dir){
        $this->_directory;
        $this->recursivelySetPaths($dir);
    }
    private function recursivelySetPaths($dir){
        $dir_list = scandir($dir);
        foreach($dir_list as $dir_item){
            if ($dir_item != '.' && $dir_item!= '..') {
                $file_path = $dir . '/' . $dir_item;
                if(is_dir($file_path)){
                    $this->recursivelySetPaths($file_path);
                }
                else{
                    $hash = hash(self::_HASH_METHOD, $file_path);
                    $this->files[$hash] = $file_path;
                }
            }

        }
    }

    public function json_encode(){
        return json_encode($this->files);
    }



    public function add($file_path){
        $hashed_val = hash(self::_HASH_METHOD, $file_path);
        $this->files[$hashed_val] = $file_path;
    }

    public function getFilePath($hashed_val){
        return $this->files[$hashed_val];
    }


}