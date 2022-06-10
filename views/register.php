<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        Redirect::to("home");
    }
    if(isset($_POST["register"])){

       
        
        $createUser = new UsersController();
        $createUser->register();
    }
?>


      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="./public/css/registration.css">
          <title>Register</title>
      </head>
      <body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
            <form method="POST">

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" name="fullname" required autofocus>
                <label for="floatingInputUsername">fullname</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" name="username" required autofocus>
                <label for="floatingInputUsername">Username</label>
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInputEmail" name="email" placeholder="name@example.com" required>
                <label for="floatingInputEmail">Email address</label>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" name="register" type="submit">Register</button>
              </div>

              <a class="d-block text-center mt-2 small" href="<?php echo BASE_URL;?>login">Have an account? Sign In</a>

              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
        <!-- end form -->
</body>

  </html>