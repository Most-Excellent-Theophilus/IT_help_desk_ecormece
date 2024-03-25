<?php

if (!isset($_GET['path']) && !isset($_GET['user'])) {
    $_GET['path'] = 'home';
    $_GET['user'] = 'guest';

    if (isset($_SESSION['auth'])) {
        $_GET['user'] = $_SESSION['auth']['type'];
    }
}

$app = new Builldpage([$_GET['user'], $_GET['path']]);
$app->run();

// Functions::show($_SESSION);
