<?php

require 'app/forActions.php';


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
                            $data =    ['message' => 'POST Parameters not enough'];
                     }


                     break;

              case 'PUT':

                     if (!empty($_GET['method'] && !empty($_GET['id']))) {


                            $class = $_GET['source'];
                            $id = [$_GET['id']];
                            $data =   $class::update($id, [$_POST]);
                     } else {
                            $data =   ['message' => 'Parameters not enough'];
                     }
                     break;

              case 'DELETE':
                     if (!empty($_GET['method'] && !empty($_GET['id']))) {


                            $class = $_GET['source'];
                            $id = [$_GET['id']];
                            $data =  $class::destroy($id);
                     } else {
                            $data = ['message' => 'Parameters not enough'];
                     }
                     $data = ['message' => 'this is the delete method'];
                     break;

              default:
                     http_response_code(405); // Method Not Allowed
                     ['message' => 'Method Not Allowed'];
                     break;
       }
} else {
       $data =   ['message' => 'Parameters are not enough, please lod the url'];
}
// $query = http_build_query($resut);
// $base64Data = base64_encode($query);
// $base64DataDecode = base64_decode($base64Data);

header("Location: index.php?q=");
exit;