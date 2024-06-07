<?php

require_once 'db.php';

if (!isset($_SESSION['user_id'])) {

  // $sql = "SELECT * FROM users WHERE user_id = ?";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute([$user_id]);
  // $user = $stmt->fetch();
}
$user = ["fullname" => "admin"];

if (!$_SESSION['user_id']) {
  header("Location: index.php");
  exit();
}

?>

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
    <div class="text-center mt-5">
      <h1>
        Welcome : <?= $user['fullname'] ?>
      </h1>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
