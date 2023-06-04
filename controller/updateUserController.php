<?php
  include_once "../config/dbconnect.php";

  $user_id=$_POST['user_id'];
  $first_name= $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $email= $_POST['email'];
  $contact_no= $_POST['contact_no'];
  $registered_at= $_POST['registered_at'];

  $updateItem = mysqli_query($conn,"UPDATE users SET 
  first_name = '$first_name',
  last_name = '$last_name',
  email = '$email',
  contact_no = '$contact_no',
  registered_at = '$registered_at'
  WHERE user_id = $user_id");

  if($updateItem) {
    echo "true";
  }
?>