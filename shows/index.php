<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 4/12/2016
 * Time: 12:57 AM
 */
require_once(__DIR__ . '/../classes/libraries/modules/shows/shows.class.php');
$model = new Shows();
$model->displayShows();