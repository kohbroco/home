<?php
require_once(__DIR__ . '/classes/file.php');
require_once("classes/CacheManager.php");
require_once("classes/CacheObject.php");
//SEND HEADERS
echo '<meta name=viewport content=\'width=700\'>';
//SEND SCRIPTS
$theme_content = file_get_contents(__DIR__ . '/theme/file-server.css');
$scripts_external = '   <script language="JavaScript" type="text/javascript" src="/js/jquery-3.0.0.min.js"></script>';
echo $scripts_external;

$action_script_content = file_get_contents(__DIR__ . '/scripts/actions.js');
echo '<script>';
echo $action_script_content;
echo '</script>';

$page_script_content = file_get_contents(__DIR__ . '/scripts/file-server.js');
echo '<script>';
echo $page_script_content;
echo '</script>';

//SEND STYLES
echo '<style>';
echo $theme_content;
echo '</style>';

//LOGIC 
//$downloadpath = $_POST["path"];
//$filename = basename($downloadpath);
//echo $downloadpath;
//echo pathinfo($downloadpath, PATHINFO_EXTENSION);
//if (isset($downloadpath)) {
//    $ext = pathinfo($downloadpath, PATHINFO_EXTENSION);
//    if($ext == 'avi' || $ext == 'mp4' || $ext == 'mkv'){
//         \file::stream($downloadpath);
//    }else{
//        \file::force_download($downloadpath, $filename);
//    }
//
//}

$class_btn_animated = "btn-animated";
$class_sidebar_btn = "sidebar-btn";
$dir = 'D:\\file-server';
echo "<body>";
echo "<table width=\"100%\" border=\"0\" class='table'>";
echo "<div class='header'>";
echo "header";
echo "</div>";
echo "<td width = \"20%\" class='sidebar'>";
echo "<ul>";
echo "<li class=\"$class_btn_animated $class_sidebar_btn\">sidebar item 1</li>";
echo "<li class=\"$class_btn_animated $class_sidebar_btn\">sidebar item 2</li>";
echo "<li class=\"$class_btn_animated $class_sidebar_btn\">sidebar item 3</li>";
echo "</ul>";
echo "</td>";
echo "<td width = \"80%\">";
listFolderFiles($dir, 0);
echo "</td>";
echo "</table>";
echo "</body>";
//=======================================
//FUNCTIONS
//=======================================
const _HASH_METHOD = 'MD5';
function listFolderFiles($dir, $level){
    if($level == 0){
        $class_level = "root";
    }
    else{
        $class_level = "not-root";
    }

    $class_btn_animated = "btn-animated";
    $class_list_directory = "list-directory";
    $class_btn_directory = "btn-directory";
    $class_btn_file_download = "btn-file-download";
    $class_btn_file_stream = "btn-file-stream";
    $prefix_class_child = "childof-";
    $class_highlightable = "highlightable";
    
    $file_names = scandir($dir);
    $hash = hash('MD5', $dir);
    if(strlen($hash) > 10){
        $hash = substr($hash, 0, 10);
    }
    $parent_id = $hash;
    $child_class = $prefix_class_child . $parent_id;
    echo "<ul class=\"$class_list_directory $child_class $class_level\">";
    foreach($file_names as $file_name){
        $file_path = $dir . '/' . $file_name;
        if($file_name != '.' && $file_name != '..'){
            echo "<div class=\"$class_list_directory\">";
            //Echo directories
            if(is_dir($file_path)){
                $dir_hash = hash('MD5', $file_path);
                if(strlen($dir_hash) > 10){
                    $dir_hash = substr($dir_hash, 0, 10);
                }
                echo "<a id=dir-$dir_hash class=\"$class_btn_directory $class_highlightable $class_btn_animated $child_class $class_level\">";
                echo $file_name;
                echo '</a>';
                listFolderFiles($file_path, $level + 1);
            }
            //Echo files
            else{
                $encrypted_filepath = bin2hex($file_path);
                $download_url = "/actions/download.php" . '?obj=' . $encrypted_filepath;
                echo "<a class=\"$class_btn_file_download $class_btn_animated $class_highlightable $child_class $class_level\" href=\"$download_url\">$file_name</a>";

                $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                if($ext == 'mp4' || $ext == 'mkv'){
                    $stream_url= "/interface/watch.php" . '?obj=' . $encrypted_filepath;
                    echo "<a class=\"$class_btn_file_stream $class_btn_animated $class_highlightable $child_class $class_level \" href=\"$stream_url\">PLAY</a>";
                }
            }
            echo "</div>";
        }
    }
    echo "</ul>";
//    echo "</li>";
}



//function listFolderFiles($dir)
//{
//    $ffs = scandir($dir);
//    echo '<ul id="$dir" class="list-directory">';
//    foreach ($ffs as $ff) {
//        if ($ff != '.' && $ff != '..') {
//            echo '<li class="list-item">';
//            $filepath = $dir . '/' . $ff;
//            if (is_dir($dir . '/' . $ff)) {
//                echo '<a class="btn-directory">';
//                echo $ff;
//                echo '</a>';
//                listFolderFiles($dir . '/' . $ff);
//            } else {
//                $encrypted_filepath = bin2hex($filepath);
//                $download_url = "/actions/download.php" . '?obj=' . $encrypted_filepath;
//                echo "<a class=\"btn-file-download\" href=\"$download_url\">$ff</a>";
//
//                $ext = pathinfo($filepath, PATHINFO_EXTENSION);
//                if($ext == 'mp4' || $ext == 'mkv'){
//                    $stream_url= "/actions/stream.php" . '?obj=' . $encrypted_filepath;
//                    echo "<a class=\"btn-file-stream\" href=\"$stream_url\">PLAY</a>";
//                }
//
//                //echo '<form action="" method="post">';
//                //echo "<button class=\"btn-download\" name=\"path\" value=\"$filepath\" type=\"submit\">$ff</button>";
//                //echo '</form>';
//            }
//            echo '</li>';
//        }
//    }
//    echo '</ul>';
//}
?>
