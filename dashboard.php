<?php
/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 9/2/2017
 * Time: 11:05 PM
 */

header('X-Frame-Options: GOFORIT');
$page = '
<style>
    .right{
        float:right;
        padding: 0px;
        border: 0px;
    }
    .left{
        float:left;
        padding: 0px;
        border: 0px;
    }
</style>
<head></head>
<body>
    <div>
        <div>
            <iframe id="google-keep" sandbox="allow-popups allow-scripts allow-same-origin allow-forms allow-pointer-lock" class="iframe left" src="http://www.clocktab.com/"height="100%" width="25%"></iframe>
        </div>
        <div>
        </div>
            <iframe id="web-clock" sandbox="allow-popups allow-scripts allow-same-origin allow-forms allow-pointer-lock" class="iframe right" src="https://keep.google.com" height="100%" width="75%"></iframe>
    </div>
</body>
';
echo $page;
header_remove("X-Frame-Options");