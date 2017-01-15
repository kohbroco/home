<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 4/12/2016
 * Time: 1:03 AM
 */
/** var $shows shows_config */
global $shows;
$shows = new shows_config();
//Enabling code completion for the variables
class shows_config{
    public $datafilepath = __DIR__ .'/data';
}