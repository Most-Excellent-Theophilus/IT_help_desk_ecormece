<?php

require 'app/forActions.php';

session_start();


// check for values in the get variable
if (!empty($_GET['a'])) {
       switch ($_GET['a']) {
              case 'GET':
                     if (empty($_GET['id'])) {
                            $_GET['source']::index();
                     } else {
                            $class = $_GET['source'];
                            $method = $_GET['method'];
                            $parameters = [$_GET['id']];
                            $data =  call_user_func_array([$class, $method], $parameters);
                     }
                     break;

              case 'POST':
                     if (!empty($_POST) && !empty($_GET)) {
                            $class = $_GET['source'];
                            $method = $_GET['method'];
                            $parameters = [$_POST];

                            $data = call_user_func_array([$class, $method], $parameters);
                     } else {
                            $data =    ['status' => 'fail', 'message' => 'POST Parameters not enough'];
                     }


                     break;

              case 'PUT':

                     if (!empty($_GET['source'] && !empty($_GET['id']))) {


                            $class = $_GET['source'];
                            $id = [$_GET['id']];
                            $data =   $class::update($id, $_POST);
                     } else {
                            $data = ['status' => 'fail', 'message' => 'what  Parameters not enough'];
                     }
                     break;

              case 'DELETE':
                     if (!empty($_GET['id'])) {

                            $class = $_GET['source'];
                            $id = $_GET['id'];
                            $data =  $class::destroy($id);
                     } else {
                            $data = ['status' => 'fail', 'message' => 'Parameters not enough'];
                     }
                     break;

              case 'logout':
                     session_unset();
                     session_destroy();
                     header("Location: index.php?user=guest&path=home");
                     exit;
                     break;

              default:
                     http_response_code(405); // Method Not Allowed
                     $data =     ['status' => 'fail', 'message' => 'Method Not Allowed'];
                     break;
       }
} else {
       $data =   ['status' => 'fail', 'message' => 'Parameters are not enough, please lod the url'];
}

$dir = '';

switch ($_GET['do']) {
       case 'create Account':
              if (isset($_SESSION['auth'])) {
                     # code...
                     $dir = 'user=' . $_SESSION['auth']['type'] . '&path=users';
              } else {
                     $dir = 'user=guest&path=loggin';
              }
              break;
       case 'loggin':

              if ($data['status'] == 'success') {
                     $dir = 'user=' . $data['data']['type'] . '&path=loggin';
                     $_SESSION['auth'] = $data['data'];
              } else {
                     $dir = 'user=guest&path=loggin';
              }
              break;
       case 'Delete Account':
              $dir = 'user=' . $_SESSION['auth']['type'] . '&path=users';
              break;


       default:
              $dir = 'user=' . $_SESSION['auth']['type'] . '&path=' . $_GET['from'];

              break;
}


$_SESSION['hap'] = $_GET['do'];
$_SESSION['data'] = $data;

$d = ['target' => $_SESSION['auth']['id'], 'nature' => $data['status'], 'message' => $_GET['do']];
$n = Notifications::store($d);

header("Location: index.php? " . $dir);
exit;
