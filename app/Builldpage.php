<?php

class Builldpage
{
    private $dir = 'public';
    private $pagedir = '/pages';
    private $utilsdir = '/utils/';
    private $ext = '_view.php';

    public function __construct()
    {
        require $this->dir . $this->pagedir . $this->utilsdir . 'head' . $this->ext;
    }
    public  function run() {
        $this->makeHeader();
    }

    private  function makeHeader()
    {
        switch ($_SESSION['user_type']) {
            case 'guest':
                # code...
                break;

            case 'customer':
                # code...
                break;
                
            case 'staff':
                # code...
                break;
                
            case 'admin':
                # code...
                break;

            default:
                # code...
                break;
        }
        require 'public/pages/utils/foot_view.php';

    }


    private static function makeFooter()
    {
    }
    
}
