<?php

if (!isset($_GET['path'])&&!isset($_GET['user'])) {
    $_GET['path']='home';
    $_GET['user'] = 'guest';
} 

// $app_dir = Functions::split($_GET['url_data'],'/');
$app_dir =[$_GET['user'],$_GET['path']];

$app = new Builldpage($app_dir);
$app->run();