<h1 class="container  p-5" style="outline: 1px dotted;">Survey</h1>
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
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Create Survey</h2> <button id="openDialogButton" class="btn btn-primary">Create</button>

        </div>
    
    </div>

    <div>

        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Customer Response </h2>
        </div>
        <p>1</p>
    </div>

</div>



<!-- The dialog content -->
<dialog id="myDialog">


    <div class="container">
        <form action="Actions.php?a=POST&source=SurveryQuestions&method=store&do=create Survey&from=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
           
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

