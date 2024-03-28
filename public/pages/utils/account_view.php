<h1 class="container p-5" style="outline: 1px dotted;">Account</h1>
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
        border-bottom: 1px dotted;

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
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Your Account</h2>

        </div>

        <form action="Actions.php?a=PUT&source=Users&do=Update Account&from=<?= $_GET['path'] ?>&id=<?= $_SESSION['auth']['id'] ?>" method="post" class="p-3">
            <br>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name='username' class="form-control" id="username" placeholder='<?= $_SESSION['auth']['username'] ?>'>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name='email' class="form-control" id="email" placeholder='<?= $_SESSION['auth']['email'] ?>'>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" class="form-control" id="password" placeholder='<?= $_SESSION['auth']['password'] ?>'>
            </div>
            <br>
            <label for="usertype">Role</label>
            <hr>
            <input type="radio" id="customer" name="type" value="customer">
            <label for="customer">Customer</label><br>
            <input type="radio" id="staff" name="type" value="staff">
            <label for="staff">Staff</label><br>
            <input type="radio" id="admin" name="type" value="admin">
            <label for="admin">Admin</label><br><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

    <div>

        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;"> Chats </h2>
        </div>
        <?php
            if ($_SESSION['auth']['type']=='customer') {
                echo<<<HTML
                    <button id='openDia' class="btn btn-primary">Chat</button>


                HTML;
            } 

        ?>
    </div>

</div>




<!-- The dialog content -->
<dialog id="myDia" style="width: 70%; height:100%;">


    <div >
        <h2>Chat</h2>
        <form style="" action="Actions.php?a=POST&source=InquiryLists&method=store&do=create Inquiry Cartegory&from=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
        <textarea  id="summernote" name="cont" id="" cols="60" rows="10" placeholder="Start typing ..."><p>Start typing ...</p></textarea>
            <script>
                $('#summernote').summernote({
                    placeholder: 'Hello stand alone ui',
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        // ['insert', ['link', 'picture', 'video']],
                        // ['view', [ 'help']]
                        // ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            </script>
            <br>
            <button id="closeDia" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary">Send </button>
        </form>
    </div>
</dialog>

<script>
    // Get references to the dialog and its controls
    const dialog = document.getElementById('myDia');
    const openDialogButton = document.getElementById('openDia');
    const closeDialogButton = document.getElementById('closeDia');

    // Show the dialog when the open dialog button is clicked
    openDialogButton.addEventListener('click', () => {
        dialog.showModal();
    });

    // Close the dialog when the close button is clicked
    closeDialogButton.addEventListener('click', () => {
        dialog.close();
    });
</script>
