<div class="container p-5">
  <h4>Update Data Kategori</h4>

  <?php
    include_once "../config/dbconnect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * FROM category WHERE category_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow >
    0) { while ($row1 = mysqli_fetch_array($qry)) { $catID = $row1["category_id"];
  ?>

  <form id="update-Items" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" class="form-control" id="category_id" value="<?= $row1['category_id'] ?>" hidden />
    </div>
    <div class="form-group">
      <label for="name">Nama Kategori:</label>
      <input type="text" class="form-control" id="category_name" value="<?= $row1['category_name'] ?>" />
    </div>
    <div class="form-group">
      <button type="submit" onclick="updateCategory()" style="height: 40px" class="btn btn-primary">
        Konfirmasi
      </button>
      <button type="submit" onclick="cancelUpdateCategory()" style="height: 40px" class="btn btn-primary">
        Batal
      </button>
    </div>
    
    <?php
    }
  }
  ?>
  </form>
</div>