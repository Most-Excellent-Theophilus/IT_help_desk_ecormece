<?php

class Builldpage
{
    private $dir = 'public';
    private $pagedir = '/pages/';
    private $utilsdir = '/utils/';
    private $ext = '_view.php';
    private $guestdir = 'guest/';
    private $url_path;
    private $links;


    public function __construct($url_path)
    {
        $this->url_path = $url_path;
        require $this->dir . $this->pagedir . $this->utilsdir . 'head' . $this->ext;
    }
    public  function run()
    {
        $this->makeHeader();
        $this->makeMainContent();
        $this->makeFooter();
    }

    private  function makeHeader()
    {

        switch ($this->url_path[0]) {
            case 'guest':
                if ($this->url_path[1] !== 'loggin' && $this->url_path[1] !== 'createAccount') {
                    // Functions::show($this->url_path[1]);
                    $links = Functions::getLinks("public/pages");
                    $links[] = 'loggin'; 
                    $this->links=$links;
                    require $this->dir . $this->pagedir . $this->utilsdir . 'header' . $this->ext;
                }

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
    }
    private function makeMainContent(){
        
        switch ($this->url_path[0]) {
            case 'guest':
                
                $getpage = $this->dir . $this->pagedir . $this->url_path[1] . $this->ext;
                if (file_exists($getpage)) {
                    require $getpage;
                } elseif (file_exists($this->dir . $this->pagedir . $this->guestdir . $this->url_path[1] . $this->ext)) {
                    require $this->dir . $this->pagedir . $this->guestdir . $this->url_path[1] . $this->ext;
                } 
               
                else{
                    require $this->dir . $this->pagedir . $this->utilsdir . 'notfound' . $this->ext;
                }
                

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
    }

    private  function makeFooter()
    {
        if ($this->url_path[1] !== 'loggin' && $this->url_path[1] !== 'createAccount') {
            require $this->dir . $this->pagedir . $this->utilsdir . 'footer' . $this->ext;
        } 
        require 'public/pages/utils/foot_view.php';
    }
}
