<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="text-primary">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
        

          <div class="card">
            <div class="card-body py-5 px-md-5">
            <h1>Create Account </h1>

              <form action="Actions.php?a=POST&source=Users&method=store&do=create Account" method="post" id="registrationForm">
                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" name="username" class="form-control" required />
                  <label class="form-label" for="form3Example4">Username</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3" class="form-control" required />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="password" id="p1" name='password' class="form-control" required />
                      <label class="form-label" for="form3Example1">Password</label>
                    </div>
                  </div>
                  <input type="hidden" name="type" value="customer">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="password" id="p2"  class="form-control" required />
                      <label class="form-label" for="form3Example2">Password2</label>
                    </div>
                  </div>
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Continue <span style='font-size:20px;'>&#8680;</span>
                </button>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <label class="form-check-label" for="form2Example33">
                    Already have an account?
                  </label>
                  <a href="?user=guest&path=loggin"> Loggin</a>

                </div>
                <hr>
                <a href="?user=guest&path=home">Home</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {


      // Get values of password fields
      var password = document.getElementById('p1').value;
      var confirmPassword = document.getElementById('p2').value;

      // Check if passwords match
      if (password !== confirmPassword) {
        alert('Passwords do not match. Please try again.');
        event.preventDefault(); // Prevent form submission
        return;
      }


    });
  </script>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->