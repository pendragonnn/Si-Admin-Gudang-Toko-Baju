<?php
  include "../side-info.php";
?>

  <div class="col-12 col-lg-10">
    <span class="badge mb-1">Dashboard > Produk</span>
    <main class="table">
      <section class="table-header">
        <h4>Semua Produk</h4>
        <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari produk berdasarkan nama.." autocomplete="off" id="cari-product">
          </div>
      </section>
      <section class="table-body">
        <div id="container">
          <table>
            <thead>
              <tr>
                <th> No </th>
                <th> Gambar Porduk </th>
                <th> Nama Produk </th>
                <th> Deskripsi Produk </th>
                <th> Kategori </th>
                <th> Harga </th>
                <th colspan="2"> Modifikasi </th>
              </tr>
            </thead>
            <tbody>
            <?php
              include_once "../config/dbconnect.php";
              $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
              $result=$conn-> query($sql);
              $count=1;
              if($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()) {
            ?>
              <tr>
                <td><?=$count?></td>
                <td><img height='100px' src='<?=$row["product_image"]?>'></td>
                <td><?=$row["product_name"]?></td>
                <td><?=$row["product_desc"]?></td>      
                <td><?=$row["category_name"]?></td> 
                <td><?=$row["price"]?></td>     
                <td>
                  <button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Perbarui</button>
                  <button class="btn btn-danger mt-2" style="height:40px" onclick="if (!confirm('Yakin ingin menghapus?')) { return false } else itemDelete('<?=$row['product_id']?>')">Hapus</button>
                </td>
              </tr>
            <?php
              $count=$count+1;
                }
              }
            ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>
</div>
</div>

<script src="./assets/js/liveSearchProduct.js"></script>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">  
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Produk Baru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
          <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" class="form-control" id="p_name" required>
          </div>
          <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" class="form-control" id="p_price" required>
          </div>
          <div class="form-group">
            <label for="qty">Deskripsi:</label>
            <input type="text" class="form-control" id="p_desc" required>
          </div>
          <div class="form-group">
            <label>Kategori:</label>
            <select id="category" >
              <option disabled selected>Pilih Kategori</option>
                <?php
                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);
                  if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="file">Pilih Gambar:</label>
            <input type="file" class="form-control-file" id="file" enctype="multipart/form-data">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Tambahkan</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Tutup</button>
      </div>
    </div>  
  </div>
</div>