<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 4/12/2016
 * Time: 12:53 AM
 */
require_once(__DIR__ . '/config.php');
class Shows{
    function __construct()
    {
    }
    function displayShows(){
        global $shows;
        echo $shows->datafilepath;
    }
}