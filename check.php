<?php
// require '../app/forActions.php';
// Functions::show($_POST);
$cleaned_string = stripslashes($_POST['param1']);
// $data = "This is the content of the file.";
// Path to the file
$filename = "Surveymaker/action/surveyresponse/".$_POST['name'].".html";

$phpfile = htmlspecialchars($cleaned_string) ;
// Write data to the file
$result = file_put_contents($filename, $phpfile  );

// Check if the operation was successful
if ($result !== false) {
    echo json_encode(["status"=>"success","message"=>"File saved successfully."]);
} else {
    echo json_encode(["status"=>"error","message"=>"Error occurred while saving the file."]);
}
