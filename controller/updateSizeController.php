<?php
  include_once "../config/dbconnect.php";

  $size_id=$_POST['size_id'];
  $size_name= $_POST['size_name'];
  $updateItem = mysqli_query($conn,"UPDATE sizes SET 
  size_name = '$size_name'
  WHERE size_id = $size_id");

  if($updateItem) {
    echo "true";
  }
?>