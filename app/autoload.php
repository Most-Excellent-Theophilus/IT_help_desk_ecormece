<?php
spl_autoload_register(function ($className) {
    $classFileController = "app/controllers/" . ucfirst($className) . '.php';
    $classFileModel = "app/models/" . ucfirst($className) . '.php';
    $classFileFunctionality = "app/Functions/" . ucfirst($className) . '.php';

    if (file_exists($classFileController)) {
           require $classFileController;
    } elseif (file_exists($classFileModel)) {
       require $classFileModel;
    }
    elseif (file_exists($classFileFunctionality)) {
       require $classFileFunctionality;
    }
    
    else {
           echo json_encode(['error' => 'the called instance does not exist']);
    }
});