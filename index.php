<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div action="registration.php" method="POST">
          <div class="card rounded-0 mt-5">
            <div class="card-header bg-white">
              <h1 class="text-center">
                Registration Form
              </h1>
            </div>
            <div class="card-body">
              <div class="mt-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" name="fullname" placeholder="name" class="form-control">
              </div>
              <div class="mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" placeholder="email" class="form-control">
              </div>
              <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="password" class="form-control">
              </div>
              <div class="mt-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="confirm password" class="form-control">
              </div>
            </div>
            <div class="card-footer bg-white border-0">
              <input type="submit" name="sumbit" value="Register" class="btn btn-sm btn-primary">
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
