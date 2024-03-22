<?php

class Functions 
{
    public static function split( $data, $delimeter){
       return explode( $delimeter,$data);
    }
    public static function show($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    public static function saveFile($dir,$file){
        
    }
   
}
