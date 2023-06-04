<?php
  include_once "../config/dbconnect.php";

  $category_id=$_POST['category_id'];
  $category_name= $_POST['category_name']; 
  $updateItem = mysqli_query($conn,"UPDATE category SET 
  category_name = '$category_name'
  WHERE category_id = $category_id");
  if($updateItem) {
    echo "true";
  }
?>