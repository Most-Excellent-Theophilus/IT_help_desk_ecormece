<figure class="text-center" style="margin: 70px;">
  <h1 class="p-4">Products</h1>
  <blockquote class="blockquote">
    <p>A well-known quote, contained in a blockquote element.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Someone famous in <cite title="Source Title">Source Title</cite>
  </figcaption>
  <main>
<style>
  img{
    width: 300px;
  }
</style>
    <!-- product cards -->
    <div class="row mb-2">
 
  <?php 
  $n = Products::index();
  foreach ($n['data'] as $key => $value) {

echo '
<form class="col-md-6">
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
  <div class="col p-4 d-flex flex-column position-static">
    <h3 class="mb-0">'.$value['pname'].'</h3>
    <div class="mb-1 text-body-secondary">Nov 11</div>
    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
      Add to cart
    </a>
  </div>
  <div class="col-auto d-none d-lg-block">
    <img src="statics/media/photos/'.$value['uniqueId'].'" alt="">
  </div>
</div>
</form>

';

  }
  ?>

     

    </div>
    <!-- product cards  -->
    