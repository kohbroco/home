<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 1/10/2016
 * Time: 10:32 PM
 */
class DirectoryRenderer{
    public static function header(){
        $op = "";
        $op .= self::header_open();
        $op .= self::js();
        $op .= self::css();
        $op .= self::header_close();
        return $op;
    }
    private static function header_open(){
        return "<head>";
    }
    private static function header_close(){
        return "</head>";
    }
    private static function js(){
        $op = "";
        return $op;
    }

    private static function css(){
        $op = "";
        $op .= self::style_open();
        $op .= self::file_server_style();
        $op .= self::style_close();
        return $op;
    }
    private static function style_open(){
        return "<style>";
    }

    private static function style_close(){
        return "</style>";
    }

    private static function file_server_style(){
        $op = "";
        $op .=
            ".header{
                padding: 10px 10px;
                max-width: 100%;
            }";
        $op .=
            ".deepblue{
                color:whitesmoke;
                background-color: #314778;
            }";
        $op .=
            ".teal{
                color:whitesmoke;
                background-color: #008B8B;
            }
            ";
        $op .=
            ".teal:hover{
            color:whitesmoke;
            background-color: #11E2D0;
            }";
        $op .=
            ".sidebar{
            padding: 10px 10px;
            max-width: 20%;
            max-height: 100%;
            vertical-align: top ;
            }";
        $op .=
            ".sidebar-btn{
            text-align: center;
            margin: 10px 0px ;
            }";
        $op .=
            ".table{
            color:whitesmoke;
            background-color: #9F9386;
            max-width: 100%;
            max-height: 100%;
            height: inherit;
            }";
        $op .=
            ".btn-animated{
            border: none;
            cursor: hand;
            padding: 10px 10px;
            transition-duration: 0.3s;
            transition-delay: 0s;
            font-family: Calibri;
            text-decoration: none;
            }";
        $op .=
            ".btn-animated:hover{
            padding: 10px 10px;
            border: none;
            }";
        $op .=
            ".btn-directory{
            color:whitesmoke;
            background-color: #314778;
            }";
        $op .=
            ".btn-directory:hover{
            color:whitesmoke;
            background-color: #429EBD;
            }";
        $op .=
            ".btn-file-download{
            color:whitesmoke;
            background-color:#008B8B; /*dark cyan*/
            }";
        $op .=
            ".btn-file-download:hover{
            color:whitesmoke;
            background-color:#11E2D0;
            }";
        $op .=
            ".btn-file-stream{
            color:whitesmoke;
            background-color:steelblue;
            }";
        $op .=
            ".btn-file-stream:hover{
            color:whitesmoke;
            background-color:indianred;
            }";
        $op .=
            ".list-directory{
            line-height: 40px;
            }";
        $op .=
            ".not-root{
            display:none;
            }";
        $op .=
            "ul{
            margin: 0px 0px;
            padding: 0px 10px;
            list-style-type: none;
            }";
        return $op;
    }
}