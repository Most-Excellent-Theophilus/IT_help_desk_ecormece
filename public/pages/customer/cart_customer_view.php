<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
  }

  .bd-mode-toggle {
    z-index: 1500;
  }

  .bd-mode-toggle .dropdown-menu .active .bi {
    display: block !important;
  }
</style>



<div class="container">
  <main>
    <h1 class="container p-5">Cart</h1>


    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <!-- <span class="badge bg-primary rounded-pill">3</span> -->
        </h4>
        <ul class="list-group mb-3">

          <?php
          $n = Carts::index();
          $price = 0;
          foreach ($n['data'] as $key => $value) {
            if ($_SESSION['auth']['id']==$value['customer_id']) {
              $Prod =Products::show($value['items']);
              echo <<<HTML
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">{$Prod['data']['pname']}</h6>
                  <small class="text-body-secondary">{$Prod['data']['info']}</small>
                </div>
                <span class="text-body-secondary">$ {$Prod['data']['price']}</span>
              </li>
              HTML;
              $price += $Prod['data']['price'];
            } else{
              echo <<<HTML
              <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h1 class="my-0">No Products</h1>
            
          </li>
          HTML;
        
            }
         
          }

          echo <<<HTML
                  <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$ {$price}</strong>
              </li>
            </ul>
            HTML;

          ?>
          <!-- 
         -->
          <!-- -->


      </div>
      <div class="col-md-7 col-lg-8">
        <form action="" method="post">
          <div class="row g-3">


            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
           
            </div>

            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-body-secondary">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

             
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Get Invoice</button>
        </form>
      </div>
    </div>
  </main>

</div>