<figure class="text-center" style="margin: 70px;">
  <h1 class="p-4">Our team</h1>
  <blockquote class="blockquote">
    <p>A well-known quote, contained in a blockquote element.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Someone famous in <cite title="Source Title">Source Title</cite>
  </figcaption>
  <style>
    .col {
      padding: 20px;
    }
  </style>
  <!--  -->
  <div class="container text-center">
    <div class="row">
    <?php $u =Users::index(); 
    
    foreach ($u['data'] as $key => $value) {
      if ($value['type']=='staff' || $value['type']=='admin') {

        echo <<<HTML
                   <!--  -->
              <div class="col">
                <div class="card" style="width: 18rem;">
                  <img src="assets/img/download.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{$value['username']}</h5>
                    <p class="card-text">{$value['type']}</p>
                    <small>Email: {$value['email']}</small>
                  </div>
                  <div class="card-body">
                   
                  </div>
                </div>
              </div>
              <!--  -->
        HTML;
      }
    }
    
    ?>


    </div>
  </div>
</figure>