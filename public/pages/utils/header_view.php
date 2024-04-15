<body>
<style>  
/* .notesDia{
  background: rgba(255, 255, 255,0.9);
} */
</style>
<!-- ======= Header ======= -->
  
  <header data-bs-theme="dark">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="?user=<?php echo $this->url_path[0] ?>&path=home">ICT solutions Plus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <?php
            foreach ($links as $key => $value) {
              $className = ($this->url_path[1] == $value) ? 'active' : '';

              echo '<li class="nav-item"><a class="nav-link  ' . $className . '" href="?user=' . $this->url_path[0] . '&path=' . $value . '" aria-current="page" >' . ucfirst($value) . '</a></li>';
            }
            ?>

          </ul>

          <?php
          if (isset($_SESSION['auth'])) {

            if ($_SESSION['auth']['type'] == 'staff' || $_SESSION['auth']['type'] == 'admin') {

              $note = Notifications::count()['count'];

              echo <<<HTML
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                Notifications <span class="badge badge-light"> {$note} </span>
              </button>

         HTML;
        
            }
            echo <<<HTML
             
          <a href='Actions.php?a=logout' class="btn btn-secondary" style="margin-left: 10px;">
           logout
          </a>
          HTML;
          } else {
            echo <<<HTML
             
            <a href='?user=guest&path=loggin' class="btn btn-secondary" style="margin-left: 10px;">
             log in
            </a>
            HTML;
          }

          ?>

        </div>
      </div>
    </nav>
  </header>
  <!-- End Header -->




  <?php
          if (isset($_SESSION['auth'])) {

            if ($_SESSION['auth']['type'] == 'staff' || $_SESSION['auth']['type'] == 'admin') {

              $note = Notifications::count()['count'];

            
         echo <<<HTML
                <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Notifications</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      
              HTML;
             $notLits= Notifications::index();
              $count = 1 ;
             foreach ( $notLits['data'] as $key => $value) {

              $date = new DateTime($value['updated_at']);
              $formattedDate = $date->format('F j, Y, g:i A');
             $user= Users::show($value['target'])['data']['username'];
              $retVal = ($value['nature']!=='success') ? 'alert-danger' : 'alert-success' ;

              echo <<<HTML
                            
                            <div class="alert {$retVal}" role="alert">
                       <b>{$count} .</b> <em>{$value['nature']}</em>___ {$value['message']} ___<a href="#" class="alert-link">User : $user</a>. on <small>{$formattedDate}</small> 
                      </div>
            HTML;
            $count++;
             }
              
          echo <<<HTML
                  </div>
               <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
            HTML;
            }
           
          }

          ?>
