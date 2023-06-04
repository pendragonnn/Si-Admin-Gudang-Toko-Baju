<div class="container p-5">
  <h4>Update Data Ukuran</h4>
  <?php
    include_once "../config/dbconnect.php";
    $ID=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM sizes WHERE size_id='$ID'");
  	$numberOfRow=mysqli_num_rows($qry);
    if(isset($_POST['cancel'])){
      echo "<script>location.href: '../index.php'</script>";
    }
    if($numberOfRow>0){
		  while($row1=mysqli_fetch_array($qry)){
        $catID=$row1["size_id"];
  ?>
  <form id="update-Items" enctype='multipart/form-data'>
    <div class="form-group">
      <input type="text" class="form-control" id="size_id" value="<?=$row1['size_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Ukuran :</label>
      <input type="text" class="form-control" id="size_name" value="<?=$row1['size_name']?>">
    </div>
    <div class="form-group">
      <button type="submit" onclick="updateSize()" style="height:40px" class="btn btn-primary">Konfirmasi</button>
      <button type="submit" onclick="cancelUpdateSize()" style="height: 40px" class="btn btn-primary">
        Batal
      </button>
    </div>
  <?php
        }
      }
  ?>
  </form>
</div>