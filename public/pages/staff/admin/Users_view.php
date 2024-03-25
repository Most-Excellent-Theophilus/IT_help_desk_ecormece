<h1 class="container p-5">Users</h1>

<style>
    /* Style for the dialog */
    dialog {
        max-width: 700px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div class="card container">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Users List</h3>
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
                    <th class="text-center p-0">Name</th>
                    <th class="text-center p-0">Username</th>
                    <th class="text-center p-0">Type</th>
                    <th class="text-center p-0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = Users::index();
                // Functions::show($users['data']);
                $count = 0;
                foreach ($users['data'] as $key => $value) {

                    echo <<<HTML
                     <tr>
                    <td class="text-center p-0">{$key}</td>
                    <td class=" p-1">{$value['username']}</td>
                    <td class=" p-1">{$value['email']}</td>
                    <td class=" p-1">{$value['type']}</td>
                    <th class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle btn-sm rounded-0 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item delete_data" href="Actions.php?a=DELETE&source=Users&method=destroy&id={$value['id']}&do=Delete Account">Delete</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>


                
                HTML;
                    // echo 'key = '.$key.' value ='.$value.' <br>';
                    // $count++;

                }
                ?>

            </tbody>
        </table>



    </div>
</div>





<!-- The dialog content -->
<dialog id="myDialog">


    <div class="container">
        <h2>Create Account</h2>
        <form action="Actions.php?a=POST&source=Users&method=store&do=create Account" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name = 'username'class="form-control" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name = 'email' class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
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
            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>
    </div>
    <button id="closeDialogButton">Close</button>
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