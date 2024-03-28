<figure class="text-center" style="margin-bottom: 70px;">
  <h1 class=" p-4">FAQS and Guides</h1>
  <blockquote class="blockquote">
    <p>A well-known quote, contained in a blockquote element.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Someone famous in <cite title="Source Title">Source Title</cite>
  </figcaption>
  <!-- FAQS -->
  <article class="my-3 container" id="accordion">
    <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
      <a class="d-flex align-items-center" href="">This can be helpful</a>
    </div>

    <div>
      <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example m-0 border-0">

          <div class="accordion" id="accordionExample">
          <?php
$g= Guides::index();

$count = 1;
foreach ($g['data']as $key => $value) {
  echo <<<HTML
              <!--  -->
              <div class="accordion-item">
              <h4 class="accordion-header">
                <button style="display:flex;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{$count}" aria-expanded="false" aria-controls="collapseThree">
              {$count} . __   <small>{$value['type']}</small> __  <b>{$value['title']}</b> __ <em>{$value['desc']}</em>
                </button>
              </h4>
              <div id="collapse{$count}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                <div class="accordion-body">
                  <div style='align-items:left;'>
                {$value['cont']}

                  </div>
                </div>
              </div>
            </div>
            <!--  -->
  HTML;
  $count++;
}

?>
          
          </div>

        </div>
      </div>

    </div>
  </article>



</figure>

