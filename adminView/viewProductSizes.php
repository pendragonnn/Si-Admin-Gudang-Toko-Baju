<?php
  include "../side-info.php";
?>
  <div class="col-12 col-lg-10">
    <span class="badge mb-1">Dashboard > Produk-Ukuran</span>
    <main class="table">
      <section class="table-header">
        <h4>Produk-ukuran Item</h4>
        <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari variasi produk berdasarkan nama.." autocomplete="off" id="cari-variasi">
          </div>
      </section>
      <section class="table-body">
        <div id="container">
          <table>
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Produk </th>
                <th> Ukuran </th>
                <th> Jumlah Stok</th>
                <th> Modifikasi </th>
              </tr>
            </thead>
            <tbody>
            <?php
              include_once "../config/dbconnect.php";
              $sql="SELECT * from product_size_variation v, product p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.size_id ";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()) {
            ?>
              <tr>
                <td><?=$count?></td>
                <td><?=$row["product_name"]?></td>
                <td><?=$row["size_name"]?></td>      
                <td><?=$row["quantity_in_stock"]?></td>     
                <td>
                  <button class="btn btn-danger" style="height:40px" onclick="if (!confirm('Yakin ingin menghapus?')) { return false } else variationDelete('<?=$row['variation_id']?>')">Hapus</button>
                  <button class="btn btn-primary" style="height:40px"  onclick="variationEditForm('<?=$row['variation_id']?>')">Perbarui</button>
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

<script type="text/javascript" src="./assets/js/liveSearchVariation.js"></script>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">   
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Variasi Produk-Ukuran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form  enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">    
          <div class="form-group">
            <label>Produk: </label>
            <select name="product" >
              <option disabled selected>Pilih Produk</option>
              <?php
                $sql="SELECT * from product";
                $result = $conn-> query($sql);
                if ($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['product_id']."'>".$row['product_name'] ."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Ukuran:</label>
            <select name="size" >
              <option disabled selected>Pilih Ukuran</option>
              <?php
                $sql="SELECT * from sizes";
                $result = $conn-> query($sql);
                if ($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['size_id']."'>".$row['size_name'] ."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="qty">Jumlah Stok:</label>
            <input type="number" class="form-control" name="qty" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Tambahkan</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Tutup</button>
      </div>
    </div>  
  </div>
</div>