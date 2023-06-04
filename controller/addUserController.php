<?php
  include_once "../config/dbconnect.php";

  if(isset($_POST['upload'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];
    $registered_at = date('d - M - y');
    $user_address = $_POST['user_address'];
    

    $insert = mysqli_query($conn,"INSERT INTO users
    (first_name, last_name, email, password, contact_no, user_address)
    VALUES ('$first_name', '$last_name', '$email', '$password', '$contact_no', '$user_address')");
    if(!$insert) {
      echo mysqli_error($conn);
      header("Location: ../index.php?user=error");
    } else {
      echo "Records added successfully.";
      header("Location: ../index.php?user=success");
    }
  }
        
?>