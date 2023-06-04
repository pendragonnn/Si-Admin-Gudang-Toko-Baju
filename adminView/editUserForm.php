<div class="container p-5">
  <h4>Update Data Ukuran</h4>
  <?php
    include_once "../config/dbconnect.php";
    $ID=$_POST['record'];
    $qry=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$ID'");
  	$numberOfRow=mysqli_num_rows($qry);
    if(isset($_POST['cancel'])){
      echo "<script>location.href: '../index.php'</script>";
    }
    if($numberOfRow>0){
		  while($row1=mysqli_fetch_array($qry)){
        $catID=$row1["user_id"];
  ?>
  <form id="update-Items" enctype='multipart/form-data'>
    <div class="form-group">
      <input type="text" class="form-control" id="user_id" value="<?=$row1['user_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Nama Depan :</label>
      <input type="text" class="form-control" id="first_name" value="<?=$row1['first_name']?>">
    </div>
    <div class="form-group">
      <label for="name">Nama Belakang :</label>
      <input type="text" class="form-control" id="last_name" value="<?=$row1['last_name']?>">
    </div>
    <div class="form-group">
      <label for="name">Email :</label>
      <input type="text" class="form-control" id="email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
      <label for="name">No Telefon :</label>
      <input type="text" class="form-control" id="contact_no" value="<?=$row1['contact_no']?>">
    </div>
    <div class="form-group">
      <label for="name">Tanggal Bergabung :</label>
      <input type="date" class="form-control" id="registered_at" value="<?=$row1['registered_at']?>">
    </div>
    <div class="form-group">
      <button type="submit" onclick="updateUser()" style="height:40px" class="btn btn-primary">Konfirmasi</button>
      <button type="submit" onclick="cancelUpdateUser()" style="height: 40px" class="btn btn-primary">
        Batal
      </button>
    </div>
  <?php
        }
      }
  ?>
  </form>
</div>