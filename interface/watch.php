<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 15/1/2017
 * Time: 8:35 PM
 */
$hexpath = isset($_GET['obj']) ? $_GET['obj'] : null;
if($hexpath){
    //Build the variables
    $filepath = hex2bin($hexpath);
    $title = basename($filepath);
    $source = "/actions/stream.php?obj=$hexpath";

    //Render the template
    $op = file_get_contents("watch.tpl");
    $op = str_replace("{{title}}", $title, $op);
    $op = str_replace("{{source}}", $source, $op);
    echo $op;
}
else{
    echo "no object defined";
}