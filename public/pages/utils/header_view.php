<body>
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
                <button type="button" class="btn btn-primary">
           Notifications <span class="badge badge-light"> {$note} </span>
         </button>

         HTML;
            }
            echo <<<HTML
             
          <a href='Actions.php?a=logout' class="btn btn-secondary" style="margin-left: 10px;">
           logout
          </a>
          HTML;
          }

          ?>

        </div>
      </div>
    </nav>
  </header>
  <!-- End Header -->