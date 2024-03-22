
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="background-color:  rgba(3, 6, 6, 0.8) ;">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a class="<?php $retVal = ($page === 'home') ? 'active' : 'none'; echo $retVal ?>" href="?page=home<?php echo $dataFromUrl; ?>"><span>ICT solutions Plus</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="<?php $retVal = ($page === 'home') ? 'active' : 'none'; echo $retVal ?>" href="?page=home<?php echo $dataFromUrl; ?>">Home</a></li>
          <li><a class="<?php $retVal = ($page === 'about') ? 'active' : 'none'; echo $retVal ?>" href="?page=about<?php echo $dataFromUrl; ?>">About</a></li>
          <li><a class="<?php $retVal = ($page === 'services') ? 'active' : 'none'; echo $retVal ?>" href="?page=services<?php echo $dataFromUrl; ?>">Services</a></li>
          <li><a class="<?php $retVal = ($page === 'team') ? 'active' : 'none'; echo $retVal ?>" href="?page=team<?php echo $dataFromUrl; ?>">Team</a></li>
          <li><a class="<?php $retVal = ($page === 'contact') ? 'active' : 'none'; echo $retVal ?>" href="?page=contact<?php echo $dataFromUrl; ?>">Contact Us</a></li>
          <?php
          if (isset($_GET['username'])) {
            echo <<< HTML
                            <li><a class="active logMeIn" href="?page=dashboard{$dataFromUrl}">{$_GET['username']}</a></li>
                        HTML;
          } else {
            echo <<< HTML
                          <li><a class="logMeIn" href="?page=login">LOGIN</a></li>
                      HTML;
          }

          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->