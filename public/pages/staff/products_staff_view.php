<h1 class="container p-5 " style="outline: 1px dotted; display:flex;"><span style="flex-grow: 2;">Products</span> <button class="btn btn-primary" id="openDialogButton"> Add Product </button> </h1>
<style>
    /* Style for the dialog */
    dialog {
        max-width: 700px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .cardProduct:hover {
    box-shadow: rgba(2, 8, 20, 0.1) 0px 0.35em 1.175em, rgba(2, 8, 20, 0.08) 0px 0.175em 0.5em;
    transform: translateY(-3px) ;
 }

</style>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

         
        <?php
                $products = Products::index();
                foreach ($products['data'] as $key => $value) {
                    $date = new DateTime($value['updated_at']);
                    $formattedDate = $date->format('F j, Y, g:i A');
                    # code...
                    echo <<<HTML
                    <div class="cardProduct col" style=' white-space: nowrap;overflow: hidden; text-overflow: ellipsis; display: -webkit-box;-webkit-line-clamp: 3; -webkit-box-orient: vertical;'>
                        <div class="card shadow-sm">
                        <img src="statics/media/photos/{$value['uniqueId']}" style='height:250px; ' alt="">
                            
                            <div class="card-body">
                                             <h3>{$value['pname']}</h3>
                                            <p class="card-text">{$value['info']}</p>
                                            <p class="blockquote-footer">$ {$value['price']}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-body-secondary">last Edited : {$formattedDate}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    HTML;
                    
                }

                ?>


        </div>
    </div>
</div>


<!-- The dialog content -->
<dialog id="myDialog">


    <div class="container">
        <h2>Create a new Product</h2>
        <form action="Actions.php?a=POST&source=Products&method=store&do=create new Product&from=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name='pname' class="form-control" placeholder="Product name" required>
            </div>
            <br>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="number" name='price' class="form-control" min="100" id="email" placeholder="Product Price" required>
            </div>
            <br>

            <div class="form-group">
                <label for="password">Description:</label>
                <textarea type="text" name="info" class="form-control" placeholder="Enter Product description" required> </textarea>
            </div>
            <br>

            <div class="form-group">
                <label for="email">Photo :</label>
                <input type="file" name='image' class="form-control" required>
            </div>
            <br>
            <button id="closeDialogButton" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary">Create </button>
        </form>
    </div>
</dialog>

<script>
    // Get references to the dialog and its controls
    const dialog = document.getElementById('myDialog');
    const openDialogButton = document.getElementById('openDialogButton');
    const closeDialogButton = document.getElementById('closeDialogButton');

    // Show the dialog when the open dialog button is clicked
    openDialogButton.addEventListener('click', () => {
        dialog.showModal();
    });

    // Close the dialog when the close button is clicked
    closeDialogButton.addEventListener('click', () => {
        dialog.close();
    });
</script>


