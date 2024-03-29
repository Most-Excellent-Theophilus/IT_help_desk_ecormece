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
 .product img{
    width: 300px;
  }
</style>
    <!-- product cards -->
    <div class="row mb-2">
 
  <?php 
  $n = Products::index();
  foreach ($n['data'] as $key => $value) {
    if (isset($_SESSION['auth'])) {
      $button= ' <button type="submit" class="btn btn-primary">
      Add to cart 
    </button>';
    $custom = $_SESSION['auth']['id'];
    } else {
      $button= ' <a href="?user=guest&path=loggin" class="icon-link gap-1 icon-link-hover stretched-link">
     loggin First
    </a>';
    $custom ='';
    }
    

echo '
<form class="col-md-6" method="post" action="Actions.php?a=POST&source=Carts&method=store&do=purchase Product'.$value['pname'].'&from='.$_GET['path'].'">
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
  <div class="col p-4 d-flex flex-column position-static">
  <input type="hidden" name="customer_id" value="'.$custom .'">
  <input type="hidden" name="items" value="'.$value['id'].'">
  <input type="hidden" name="checked" value="'.$value['id'].'">
    <h3 class="mb-0">'.$value['pname'].'</h3>
    <div class="mb-1 text-body-secondary">Nov 11</div>
    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
    '. $button.'
  </div>
  <div class="col-auto d-none product d-lg-block">
    <img src="statics/media/photos/'.$value['uniqueId'].'" alt="">
  </div>
</div>
</form>

';

  }
  ?>

     

    </div>
    <!-- product cards  -->
    