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
  <title>Siadmin | Login</title>
  <link rel="stylesheet" href="./assets/css/login.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="containe-login p-0 mt-5" >
    <div class="containe-login-2 p-0 m-5" >
      <div class="containe-login-3 p-0 m-5" >
        <h5 class="card-header text-center bg-primary text-light">Login Admin</h5>
          <form class="p-3"action="" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
              <?php 
                if(isset($error)) :?>
                <script>alert('Username / password salah')</script>
                <?php endif;
              ?>
          </form>
        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
