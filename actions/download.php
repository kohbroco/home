<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 23/6/2016
 * Time: 11:39 PM
 */
require_once(__DIR__ . '/../classes/file.php');
$encrypted_path = $_GET["obj"];
$download_path = hex2bin($encrypted_path);

echo pathinfo($download_path, PATHINFO_EXTENSION);
if (isset($download_path)) {
    $filename = basename($download_path);
    \file::force_download($download_path, $filename);
}
////$download_path = $_POST["path"];
//$encrypted_path = $_GET["obj"];
//$download_path = hex2bin($encrypted_path);
//
//$filename = basename($download_path);
//if(isset($download_path)){
//    \file::output_file($download_path, $filename);
//}