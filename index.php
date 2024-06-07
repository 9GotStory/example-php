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

        <form action="" method="post">
          <div class="card rounded-0 mt-5">
            <div class="card-header bg-white">
              <h1 class="text-center">
                Registration Form
              </h1>
            </div>
            <?php
            if (isset($_POST['submit'])) {

              // declare param
              $fullname = $_POST['fullname'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $confirmPassword = $_POST['confirmPassword'];

              // validate input
              $errors = array();
              if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
                array_push($errors, "Please input all fields");
              }
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format");
              }
              if (strlen($password) < 6) {
                array_push($errors, "Password must be at least 6 characters long");
              }
              if ($password != $confirmPassword) {
                array_push($errors, "Password not match");
              }

              // check errors
              if (count($errors) > 0) {
                foreach ($errors as $error) {
                  echo '<div class="alert alert-danger">' . $error . '</div>';
                }
              } else {
                require_once 'db.php';

                // insert data
                $sql = "INSERT INTO users (fullname, email, password) VALUES (?,?,?)";
                $stmt = $pdo->prepare($sql);
                // hash password
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

                if ($stmt->execute([$fullname, $email, $passwordHashed])) {
                  echo '<div class="alert alert-success">Register success</div>';
                  header("Location: login.php");
                }
              }
            }
            ?>
            <div class="card-body">
              <div class="mt-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" name="fullname" placeholder="name" class="form-control" value="<?= isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>">
              </div>
              <div class="mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" placeholder="email" class="form-control" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
              </div>
              <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="password" class="form-control">
              </div>
              <div class="mt-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm password" class="form-control">
              </div>
            </div>
            <div class="card-footer bg-white border-0">
              <input type="submit" name="submit" value="Register" class="btn btn-sm btn-primary">
            </div>
          </div>

        </form>

        <a href="login.php" class="btn btn-sm btn-secondary mt-3">Login</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
