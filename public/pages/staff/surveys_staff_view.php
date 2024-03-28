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
        
        width: 100%;
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

        <div style="display: flex; flex-direction: column   ;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Customer Response </h2>
        </div>
        <p>1</p>
    </div>

</div>



<!-- The dialog content -->
<dialog id="myDialog">
<h1>Create Survey</h1>

        <form action="" method="post" enctype="multipart/form-data" style=" display:grid; grid-template-columns: 1fr 2fr;">
        <div style="display: flex;flex-direction: column   ; padding:10px;">
            <a class="btn btn-secondary">Question</a><br>
            <a class="btn btn-secondary">Response Option</a><br><hr>
        <a class="btn btn-primary">Continue</a>

        </div>
           <textarea name="form" id="" cols="30" rows="10"  ></textarea>
           
        </form>
        <button id="closeDialogButton" class="btn btn-danger"> Close</button>
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

