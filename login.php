<?php
session_start();

if(isset($_SESSION['login'])){
  header('location: index.php');
  exit;
}

include "./config/dbconnect.php";

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users where first_name = '$username'");

  if(mysqli_num_rows($result) === 1){
    $hasil = mysqli_fetch_assoc($result);
    if($password == $hasil['password']){
      $_SESSION["login"] = true;
        header("location: index.php");
        exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Login | Si Admin</title>
  <link rel="stylesheet" href="./assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image">
          <img src="assets/images/login.jpg" alt="">
        </div>
        <div class="col-md-6 right">
          <form method="post">
            <div class="input-box">
              <header>Admin Login</header>
              <div class="input-field">
                <input type="text" name="username" class="input" id="email" required autocomplete="off">
                <label for="email">Username</label>
              </div>
              <div class="input-field">
                <input type="password" name="password" class="input" id="password" required>
                <label for="password">Password</label>
              </div>
              <div class="input-field">
                <input type="submit" name="login" class="submit" value="Login">
                <?php 
                  if(isset($error)) :?>
                  <script>alert('Username / password salah')</script>
                  <?php endif;
                ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>