<?php
  include "../side-info.php";
?>
    <div class="col-12 col-lg-10">
      <span class="badge mb-1">Dashboard > Kategori</span>
      <main class="table">
        <section class="table-header">
          <h4>Semua Kategori</h4>
          <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari kategori berdasarkan nama.." autocomplete="off" id="cari-kategori">
          </div>
        </section>
        <section class="table-body">
          <div id="container">
            <table>
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama Kategori </th>
                  <th colspan="2"> Modifikasi </th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once "../config/dbconnect.php";
                $sql="SELECT * from category";
                $result=$conn-> query($sql);
                $count=1;
                if($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
              ?>
                <tr>
                  <td><?=$count?></td>
                  <td><?=$row["category_name"]?></td>   
                  <td>
                    <button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['category_id']?>')">Hapus</button>
                    <button class="btn btn-primary" style="height:40px" onclick="categoryEditForm('<?=$row['category_id']?>')">Perbarui</button>
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

<script src="./assets/js/liveSearchCategory.js"></script>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">  
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori Baru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
          <div class="form-group">
            <label for="c_name">Nama Kategori:</label>
            <input type="text" class="form-control" name="c_name" required autocomplete="off">
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