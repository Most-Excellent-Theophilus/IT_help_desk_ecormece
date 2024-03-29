<h1 class="container p-5  " style="outline: 1px dotted;">Sold</h1>

<style>
    /* Style for the dialog */
    .guideForm {
        display: grid;
        grid-template-columns: 1fr 2fr;
    }

    dialog {
        width: 100%;
        padding: 20px;
        height: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form {
        height: 90%;
    }
</style>
<div class="card container">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title outlined  "  >Sold Products</h3>
       
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="25%">
                <col width="25%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">#</th>
                    <th class="text-center p-0">Product</th>
                    <th class="text-center p-0">Customer </th>
                    <th class="text-center p-0">Date</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $guides = Carts::index();
                // Functions::show($guides['data']);
                foreach ($guides['data'] as $key => $value) {
                    $key++;
                    $users=Users::show($value['customer_id']); 
                    $prods=Products::show($value['items']);
                    echo <<<HTML
                     <tr>
                    <td class="text-center p-0">{$key}</td>
                    <td class=" p-1"><p>{$prods['data']['pname']} <img width='200' src="statics/media/photos/{$prods['data']['uniqueId']}" alt=""></p></td>
                    <td class=" p-1"><p>{$users['data']['username']}</p></td>
                    <td class=" p-1"><p>{$value['updated_at']}</p></td>
                    
                </tr>


                
                HTML;
              

                }
                ?>

            </tbody>
        </table>
    </div>
</div>


