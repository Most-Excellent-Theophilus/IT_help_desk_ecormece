<h1 class="container p-5" style="outline: 1px dotted;">Guides</h1>

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
        <h3 class="card-title outlined  "  >Guides List</h3>
        <div class="card-tools align-middle">
            <button type="button" class="btn btn-primary" id="openDialogButton">Add New</button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <colgroup>
                <col width="5%">
                <col width="30%">
                <col width="25%">
                <col width="25%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th class="text-center p-0">#</th>
                    <th class="text-center p-0">Title</th>
                    <th class="text-center p-0">Type</th>
                    <th class="text-center p-0">Created by</th>
                    <th class="text-center p-0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $guides = Guides::index();
                // Functions::show($guides['data']);
                foreach ($guides['data'] as $key => $value) {
                    $creator = Users::show($value['by']);
                    echo <<<HTML
                     <tr>
                    <td class="text-center p-0">{$key}</td>
                    <td class=" p-1"><p>{$value['title']}</p></td>
                    <td class=" p-1"><p>{$value['type']}</p></td>
                    <td class=" p-1"><p>{$creator['data']['username']}</p></td>
                    <th class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle btn-sm rounded-0 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <!-- <li><a class="dropdown-item delete_data" href="Actions.php?a=DELETE&source=Users&method=destroy&id={$value['id']}&do=Delete Account">Update</a></li> -->
                                <li><a class="dropdown-item delete_data" href="Actions.php?a=DELETE&source=Guides&method=destroy&id={$value['id']}&do=Delete Guides&from={$_GET['path']}">Delete</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>


                
                HTML;
              

                }
                ?>

            </tbody>
        </table>



    </div>
</div>





<!-- The dialog content -->
<dialog id="myDialog">


    <div class="container">
        <h2>Create Guides</h2>

        <form action="Actions.php?a=POST&source=Guides&method=store&do=create Guides&from=<?php echo $_GET['path'] ; ?>" method="post" class="guideForm" enctype="multipart/form-data">
            <div style="padding: 14px;">
                <div class="form-group">
                <label for="name">Title :</label>

                <input type="text" class="form-control" name="title" placeholder="Enter Guide name..." required>
                <br>
                <label for="name">Description :</label>

                <input type="text" class="form-control" name="desc" placeholder="Enter Guide Description..." required>
                <br>

                    <label for="name">Your name :</label>
                    <?php $user = Users::show($_SESSION['auth']['id']);
                    // Functions::show($user);
                    echo <<<HTML
                    <input type="hidden" name='by'  value='{$user["data"]["id"]}' >

                    <input type="text" class="form-control" value='{$user["data"]["username"]}' disabled>

                    HTML;
                    ?>
                </div>
                <hr>
                <label for="usertype">Type</label>
                <hr>
                <input type="radio" name="type" value="faq">
                <label for="faq">FAQ</label><br>
                <input type="radio" name="type" value="guide">
                <label for="staff">Guide</label><br><br>
            </div>

            <textarea id="summernote" name="cont" id="" cols="60" rows="10" placeholder="Start typing ..."><p>Start typing ...</p></textarea>
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
                        // ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            </script>
            <div>
            <button type="submit" class="btn btn-primary">Continue</button>
            <button class="btn btn-danger" id="closeDialogButton">Close</button>

            </div>

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