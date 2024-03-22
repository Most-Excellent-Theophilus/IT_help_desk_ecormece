<?php
if (!isset($_SESSION['user_type'])) {
    $_SESSION['user_type'] = 'guest';
    $_SESSION['page'] = 'home';

} else {
    
   
}

$app = new Builldpage;
$app->run();