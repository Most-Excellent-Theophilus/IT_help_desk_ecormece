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
        /* background: rgba(0, 0 , 0, 0.6); */
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

        <form action="Actions.php?a=PUT&source=Users&do=Update Account&from=<?= $_GET['path'] ?>&id=<?= $_SESSION['auth']['id'] ?>" method="post" class="p-3" >
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
            <h2 style="flex-grow: 2; border-bottom:1px solid;">

                <?php
                echo ($_SESSION['auth']['type'] == 'admin' || $_SESSION['auth']['type'] == 'staff') ? 'Customer ' : '';
                ?>
                Chats </h2>
        </div>

        <?php
        if ($_SESSION['auth']['type'] == 'customer') {

            echo <<<HTML
                        <div style="height: 450px; overflow-y: scroll;  background: rgba(220, 220 , 220, 1); padding:10px; border-radius:10px; margin-bottom:3px;">

                        HTML;
            $chat = Chats::index();

            if (!empty($chat['data']) && isset($chat['data'])) {

                foreach ($chat['data'] as $key => $value) {
                    $date = new DateTime($value['updated_at']);
                    $formattedDate = $date->format('F j, Y, g:i A');
                    $retVal = ($_SESSION['auth']['username'] == $value['by']) ? 'You' : '';
                    echo <<<HTML
                        <b>$retVal:</b>
                        <article>
                            {$value['cont']}
                            <code> $formattedDate</code>
                            <a href="Actions.php?a=DELETE&source=Chats&id={$value['id']}&do=Delete message&from={$_GET['path']}">Delete</a>
                        </article>
                        HTML;
                }
            } else {
                echo <<<HTML
                    <article>
                      <h1>No Chats</h1>
                    </article>
                    HTML;
            }


            echo <<<HTML
                        </div>
                    HTML;
            echo <<<HTML
                    <button id='openDia' class="btn btn-primary">Chat</button>


                HTML;
        }

        ?>
        <div class="bd-example m-0 border-0">



            <div class="accordion" id="accordionExample">
                <?php
                if ($_SESSION['auth']['type']!=='customer') {
                        // Functions::show(Chats::index());
                $chat = Chats::index();

                if (isset($chat['data'])) {
                    foreach ($chat['data'] as $key => $value) {
                        // Functions::show($value);
                        $date = new DateTime($value['updated_at']);
                        $formattedDate = $date->format('F j, Y, g:i A');
                        echo <<<HTML
                        <form action="Actions.php?a=PUT&source=Chats&do=Respond to {$value['by']}&from={$_GET['path']}&id={$value['id']}" method='post' enctype="multipart/form-data">
                    <div class="accordion-item">
                           <h4 class="accordion-header">
                               <button class="accordion-button collapsed" type="button" style="display:flex;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  <b style="flex-grow:2;">Customer : {$value['by']} </b> <small> $formattedDate</small>
                               </button>
                           </h4>
                           <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                               <div class="accordion-body">
                                   <strong> {$value['by']} :</strong> 
                                   {$value['cont']}
                                   <code> $formattedDate</code>
                               </div>
                                <button style='margin:3px;'  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">Respond</button>

                           </div>
                       </div>
                       <div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                        
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle"><strong> {$value['by']} :</strong> </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                            <textarea id="summernote" name="response" id="" cols="60" rows="10" placeholder="Start typing ..."></textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: 'Reply to Customer ...',
                                            tabsize: 2,
                                            height: 220,
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
                                
                                <input type="hidden" name="resby" value='{$_SESSION["auth"]["username"]}'>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" >Reply</button>
                            </div>
                            </div>
                        </div>
                        </div>                       
                                    </form>
                   HTML;
                    }
                }

                }
                        
                ?>

            </div>

        </div>
    </div>


</div>



<?php
if ($_SESSION['auth']['type'] == 'customer') {
    echo <<<HTML
                                <dialog id="myDia" style="width: 70%; height:100%;">


                                    <div >
                                        <h2>Chat</h2>
                                        <p>name : <b>{$_SESSION['auth']['username']}</b></p>
                                        <form style="" action="Actions.php?a=POST&source=Chats&method=store&do=Send chart&from={$_GET['path']}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="by" value='{$_SESSION["auth"]["username"]}' >
                                        <textarea  id="summernote" name="cont" id="" cols="60" rows="10" placeholder="Start typing ..."><p></p></textarea>
                                            <script>
                                                $('#summernote').summernote({
                                                    placeholder: 'Start typing ...',
                                                    tabsize: 2,
                                                    height: 220,
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
    HTML;
}
?>
