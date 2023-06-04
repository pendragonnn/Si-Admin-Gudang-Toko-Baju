
<div class="container p-5">
  <h4>Update Data Produk</h4>
  <?php
    include_once "../config/dbconnect.php";
  	$ID=$_POST['record'];
  	$qry=mysqli_query($conn, "SELECT * FROM product WHERE product_id='$ID'");
  	$numberOfRow=mysqli_num_rows($qry);
  	if($numberOfRow>0){
  		while($row1=mysqli_fetch_array($qry)){
        $catID=$row1["category_id"];
  ?>
  <form id="update-Items" enctype='multipart/form-data'>
  	<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['product_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Nama Produk:</label>
      <input type="text" class="form-control" id="p_name" value="<?=$row1['product_name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Deskripsi Produk:</label>
      <input type="text" class="form-control" id="p_desc" value="<?=$row1['product_desc']?>">
    </div>
    <div class="form-group">
      <label for="price">Harga:</label>
      <input type="number" class="form-control" id="p_price" value="<?=$row1['price']?>">
    </div>
    <div class="form-group">
      <label>Kategori:</label>
      <select id="category">
        <?php
          $sql="SELECT * from category WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <img width='200px' height='150px' src='<?=$row1["product_image"]?>'>
        <div>
          <label for="file">Pilih Gambar:</label>
          <input type="text" id="existingImage" class="form-control" value="<?=$row1['product_image']?>">
          <input type="file" id="newImage" enctype="multipart/form-data">
        </div>
    </div>
    <div class="form-group">
      <button type="submit" onclick="updateItems()" style="height:40px" class="btn btn-primary">
        Konfirmasi
      </button>
      <button type="submit" onclick="cancelUpdateItems()" style="height: 40px" class="btn btn-primary">
        Batal
      </button>
    </div>
      <?php
      		}
      	}
      ?>
  </form>
</div>