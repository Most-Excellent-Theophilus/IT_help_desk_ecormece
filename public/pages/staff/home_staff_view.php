<h1 class="container p-5 " style="outline: 1px dotted;">Home</h1>
<style>
    .container{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 10px;
    }
    .card{
    }
</style>
<div class="container">
    <!--  -->
    
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Users </h5>
    <h6 class="card-subtitle mb-2 text-muted">Customers  and Staff </h6>
    <h1><?=Users::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->

    <!--  -->
    
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Users Guides</h5>
    <h6 class="card-subtitle mb-2 text-muted">FAQs and Guides </h6>
    <h1><?=Guides::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
    <!--  -->
    
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Inquiry Lists </h5>
    <h6 class="card-subtitle mb-2 text-muted"> Inquiry Lists for Customers</h6>
    <h1><?=InquiryLists::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Orders </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pending orders</h6>
    <h1><?=Orders::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->


<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Inquiries </h5>
    <h6 class="card-subtitle mb-2 text-muted">Customer Inquiries</h6>
    <h1><?=Inquiries::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->

<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Products </h5>
    <h6 class="card-subtitle mb-2 text-muted">Products onSale</h6>
    <h1><?=Products::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->

<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Notifications </h5>
    <h6 class="card-subtitle mb-2 text-muted">See Notifications Chats</h6>
    <h1><?=Notifications::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Surveys </h5>
    <h6 class="card-subtitle mb-2 text-muted">Surveys on the List</h6>
    <h1><?= SurveyQuestions::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->

<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Customer Response </h5>
    <h6 class="card-subtitle mb-2 text-muted">See how Customers did</h6>
    <h1><?=SurveyQuestions::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Sold Products </h5>
    <h6 class="card-subtitle mb-2 text-muted">Sold so far</h6>
    <h1><?=SoldProducts::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
<!--  -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Caterlogs </h5>
    <h6 class="card-subtitle mb-2 text-muted">Pending Carts</h6>
    <h1><?=Carts::count()['count'] ?></h1>
    <a href="#" class="card-link">Card link</a>
  </div>
</div>
<!--  -->
</div>