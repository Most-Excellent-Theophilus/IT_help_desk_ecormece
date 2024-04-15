<h1 class="container p-5 " style="outline: 1px dotted;">Inquiries</h1>
<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1%;
    }

    .ING {
        display: grid;
        grid-template-columns: 4fr 1fr;
        margin: 6px;
        border-bottom: 1px dotted ;
       
    }
    dialog {
        max-width: 700px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div class="container p-2" style="outline: 1px solid;">
    <div>
        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Create Category</h2> <button id="openDialogButton" class="btn btn-primary">Create</button>

        </div>
    
        <?php
        $InqList = InquiryLists::index();
        foreach ($InqList['data'] as $key => $value) {
            echo <<<HTML

                <div class="ING">
                            <div style="display: flex;   ">
                                <p>{$value['id']} .</p> {$value['ename']}<p></p>
                                <p class="blockquote-footer" style='align-self: end; '>$ {$value['price']} <cite title="Source Title"> {$value['desc']}</cite></p>
                            </div>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle btn-sm rounded-0 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item delete_data" href="">Update</a></li>
                                    <li><a class="dropdown-item delete_data" href="">Delete</a></li>
                                </ul>
                            </div>
                        </div>

            HTML;
        }


        ?>
    </div>

    <div>

        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Customer Inquiries </h2>
        </div>
        <div class="accordion" id="accordionExample">

<hr>
  <?php  
  $Inq = Inquiries::index();

  foreach ($Inq['data'] as $key => $value) {
    // Functions::show($value);
    $user =Users::show($value['customer_id']);
    $date = new DateTime( $user['data']['updated_at']);
                    $formattedDate = $date->format('F j, Y, g:i A');
    echo '   <div class="accordion-item">
    <h4 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'. $value['id'].'" aria-expanded="false" aria-controls="collapseOne'. $value['id'].'">
      <b>by :</b> '. $user['data']['username'].' ____ '. $value['inquiry'].'
      <small class="text-body-secondary"> _____ on : '.$formattedDate.'</small>

        </button>
    </h4>
    <div id="collapseOne'. $value['id'].'" class="accordion-collapse collapse" data-bs-parent="#accordionExample'. $value['id'].'" style="">
        <div class="accordion-body">
        '. $value['cont'].'
        </div>
    </div>
</div>'    ;
}



        
        ?>
<hr>


</div>
    </div>

</div>



<!-- The dialog content -->
<dialog id="myDialog">


    <div class="container">
        <h2>Create a Category</h2>
        <form action="Actions.php?a=POST&source=InquiryLists&method=store&do=create Inquiry Cartegory&from=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Enter name:</label>
                <input type="text" name='ename' class="form-control" placeholder="Inq name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="username">Description:</label>
                <input type="text" name='desc' class="form-control" placeholder="Inq description" required>
            </div>
            <br>
            <div class="form-group">
                <label for="username">Price:</label>
                <input type="number" name='price' class="form-control" placeholder="Inq description" required>
            </div>
            <input type="hidden" name='by' value="<?php echo $_SESSION['auth']['id']; ?>">

            <br>
            <div class="form-group">
                <label for="username">Price:</label>
                <input type="text" class="form-control" value="<?php echo$_SESSION['auth']['username'] ; ?>" disabled>
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


