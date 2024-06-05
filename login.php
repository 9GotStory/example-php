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
                Login Form
              </h1>
            </div>
            <?php
            if (isset($_POST['submit'])) {

              // declare param
              $email = $_POST['email'];
              $password = $_POST['password'];

              // validate input
              $errors = array();
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format");
              }
              if (strlen($password) < 6) {
                array_push($errors, "Password must be at least 6 characters");
              }

              // check errors
              if (count($errors) > 0) {
                foreach ($errors as $error) {
                  echo '<div class="alert alert-danger">' . $error . '</div>';
                }
              } else {
                require_once 'db.php';

                $sql = "SELECT * FROM users WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
                $data = $stmt->fetch();

                if ($data && password_verify($password, $data['password'])) {
                  $_SESSION['user_id'] = $data['user_id'];
                  $_SESSION['username'] = $data['fullname'];

                  header("Location: profile.php");
                  exit();
                } else {
                  echo '<div class="alert alert-danger">Invalid email or password</div>';
                }
              }
            }
            ?>
            <div class="card-body">
              <div class="mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" placeholder="email" class="form-control" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
              </div>
              <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="password" class="form-control">
              </div>
            </div>
            <div class="card-footer bg-white border-0">
              <input type="submit" name="submit" value="Login" class="btn btn-sm btn-primary">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
