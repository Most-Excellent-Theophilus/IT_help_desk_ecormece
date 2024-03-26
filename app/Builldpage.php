<?php

class Builldpage
{
    private $dir = 'public';
    private $pagedir = '/pages/';
    private $utilsdir = '/utils/';
    private $ext = '_view.php';
    private $guestdir = 'guest/';
    private $custdir = 'customer/';
    private $staffdir = 'staff/';
    private $admindir = 'admin/';
    private $staffext = '_staff';
    private $url_path;
    private $custext = '_customer';
    private $alertClass;
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
        $this->makeAlert();
    }

    private  function makeHeader()
    {

        switch ($this->url_path[0]) {
            case 'guest':
                if ($this->url_path[1] !== 'loggin' && $this->url_path[1] !== 'createAccount') {
                    $links = Functions::getLinks("public/pages");

                    $links[] = 'loggin';
                    $this->links = $links;
                    $page = 'header';
                    require $this->dir . $this->pagedir . $this->utilsdir . $page . $this->ext;
                }

                break;

            case 'customer':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type']=='customer') {
                        $links = Functions::getLinks("public/pages/customer");
                        $links[] = $_SESSION['auth']['username'];
                        $this->links = $links;
                        $page = 'header';
                        require $this->dir . $this->pagedir . $this->utilsdir . $page . $this->ext;
                    }
                    
                }

                break;

            case 'staff':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type'] == 'staff' || $_SESSION['auth']['admin']) {
                        $links = Functions::getLinks("public/pages/staff");
                        $links[] = $_SESSION['auth']['username'];
                        $this->links = $links;
                        $page = 'header';
                        require $this->dir . $this->pagedir . $this->utilsdir . $page . $this->ext;
                    }
                }
                break;

            case 'admin':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type'] == 'admin') {
                        $links = array_merge(Functions::getLinks("public/pages/staff/admin"), array_diff(Functions::getLinks("public/pages/staff"), array('home')));
                        $links[] = $_SESSION['auth']['username'];

                        $this->links = $links;
                        $page = 'header';
                        require $this->dir . $this->pagedir . $this->utilsdir . $page . $this->ext;
                    }
                }

                break;

            default:
                $page = 'notfound';
                break;
        }
    }
    private function makeAlert()
    {
        # code...
        if (isset($_SESSION['data']['status'])) {
            switch ($_SESSION['data']['status']) {
                case 'success':
                    $this->alertClass = 'alert-success';
                    break;

                case 'fail':
                    $this->alertClass = 'alert-danger';
                    break;

                case 'error':
                    $this->alertClass = 'alert-warning';
                    break;

                default:
                    break;
            }
            require 'public/pages/utils/alert_view.php';
        }
    }
    private function makeMainContent()
    {

        switch ($this->url_path[0]) {
            case 'guest':

                $getpage = $this->dir . $this->pagedir . $this->url_path[1] . $this->ext;
                if (file_exists($getpage)) {
                    require $getpage;
                } elseif (file_exists($this->dir . $this->pagedir . $this->guestdir . $this->url_path[1] . $this->ext)) {
                    require $this->dir . $this->pagedir . $this->guestdir . $this->url_path[1] . $this->ext;
                } else {
                    require $this->dir . $this->pagedir . $this->utilsdir . 'notfound' . $this->ext;
                }
                break;

            case 'customer':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type'] == 'customer' && file_exists($this->dir . $this->pagedir . $this->custdir . $this->url_path[1] . $this->custext . $this->ext)) {

                        require $this->dir . $this->pagedir . $this->custdir . $this->url_path[1] . $this->custext . $this->ext;
                    } else {
                        require $this->dir . $this->pagedir . $this->utilsdir . 'account' . $this->ext;
                    }
                } else {
                    require $this->dir . $this->pagedir . $this->utilsdir . 'notauthorized' . $this->ext;
                }


                break;

            case 'staff':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type'] == 'admin' ||  $_SESSION['auth']['type'] == 'staff' && file_exists($this->dir . $this->pagedir . $this->staffdir . $this->url_path[1] . $this->staffext . $this->ext)) {

                        require $this->dir . $this->pagedir . $this->staffdir . $this->url_path[1] . $this->staffext . $this->ext;
                    } else {
                        require $this->dir . $this->pagedir . $this->utilsdir . 'account' . $this->ext;
                    }
                } else {
                    require $this->dir . $this->pagedir . $this->utilsdir . 'notauthorized' . $this->ext;
                }


                break;

            case 'admin':
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth']['type'] == 'admin' && file_exists($this->dir . $this->pagedir . $this->staffdir . $this->admindir . $this->url_path[1] . $this->ext)) {

                        require $this->dir . $this->pagedir . $this->staffdir . $this->admindir . $this->url_path[1] . $this->ext;
                    } elseif (file_exists($this->dir . $this->pagedir . $this->staffdir . $this->url_path[1] . $this->staffext . $this->ext)) {

                        require $this->dir . $this->pagedir . $this->staffdir . $this->url_path[1] . $this->staffext . $this->ext;
                    } else {
                        require $this->dir . $this->pagedir . $this->utilsdir . 'account' . $this->ext;
                    }
                } else {
                    require $this->dir . $this->pagedir . $this->utilsdir . 'notauthorized' . $this->ext;
                }


                break;

            default:
                # code...
                break;
        }
    }

    private  function makeFooter()
    {
        if (!isset($_SESSION['auth'])) {
            if ($this->url_path[1] !== 'loggin' && $this->url_path[1] !== 'createAccount') {
                require $this->dir . $this->pagedir . $this->utilsdir . 'footer' . $this->ext;
            }
        }

        require 'public/pages/utils/foot_view.php';
    }
}
