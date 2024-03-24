<main class="form-signin w-100 m-auto container">
  <form action="Actions.php" method="post">
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Loggin</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
      <label for="floatingInput">User name</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

   
    <button class="btn btn-primary w-100 py-2" type="submit">Continue <span style='font-size:20px;'>&#8680;</span></button>
    <div class="form-check text-start my-3">
      <label class="form-check-label" for="flexCheckDefault">
       Dont have Account?

      </label>
      <a href="?user=guest&path=createAccount">create One</a>
    </div>
  </form>
</main>