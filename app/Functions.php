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

    public static function getLinks($directory){
        $files = scandir($directory);
        $links =[];
        if ($files !== false) {
            foreach ($files as $file) {
                // Check if the item is a file
                if (is_file($directory . '/' . $file)) {
                    $link = Functions::split($file,'_');
                    $links[]= $link[0] ;
                }
            }
        }
        $linksHomeRemove = array_diff($links,array('home'));
        $linksAddHome = array_merge(array('home'),$linksHomeRemove );
        return  $linksAddHome;
    }
    public static function ucfirst_array($value) {
        return ucfirst($value);
    }
    public static function h1me($data) {
        echo '<h1>'.$data.'</h1>';
    }
   
}
