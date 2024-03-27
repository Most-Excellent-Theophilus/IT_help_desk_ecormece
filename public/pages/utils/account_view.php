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

        <form action="Actions.php?a=PUT&source=Users&do=Update Account&from=<?=$_GET['path']?>&id=<?=$_SESSION['auth']['id']?>" method="post" class="p-3">
        <br>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name='username' class="form-control" id="username" placeholder='<?=$_SESSION['auth']['username']?>' >
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name='email' class="form-control" id="email"  placeholder='<?=$_SESSION['auth']['email']?>' >
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" name="password" class="form-control" id="password"  placeholder='<?=$_SESSION['auth']['password']?>' >
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
        <p>1</p>
    </div>

</div>