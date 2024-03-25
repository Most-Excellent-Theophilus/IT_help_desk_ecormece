
<?php
if (isset($_SESSION['data']['message']) ) {
    $message =$_SESSION['data']['message'];
}else{
    $message = '';
}
echo <<<HTML

<div class="container alert {$this->alertClass} alert-dismissible fade show" role="alert" style='position :fixed ;top:10%; left: 6%'>
    <b>{$_SESSION['data']['status']} !!!</b>
    <a href="#" class="alert-link">{$_SESSION['hap']}</a>. {$message}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
HTML;
 unset($_SESSION['hap']);
 unset($_SESSION['data']['status']);