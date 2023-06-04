<?php
  include "../side-info.php";
?>

    <div class="col-12 col-lg-10">
      <span class="badge mb-1">Dashboard > Ukuran</span>
      <main class="table">
        <section class="table-header">
          <h4>Ukuran yang tersedia</h4>
          <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari ukuran berdasarkan nama.." autocomplete="off" id="cari-size">
          </div>
        </section>
        <section class="table-body"> <!-- table -->
          <div id="container">
            <table>
              <thead>
                <tr>
                  <th> No </th>
                  <th> Ukuran </th>
                  <th colspan="2"> Modifikasi </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include_once "../config/dbconnect.php";
                  $sql="SELECT * from sizes";
                  $result=$conn-> query($sql);
                  $count=1;
                  if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                ?>
                  <tr>
                    <td> <?=$count?> </td>
                    <td> <?=$row['size_name']?></td>
                    <td>
                      <button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?=$row['size_id']?>')">Hapus</button>
                      <button class="btn btn-primary" style="height:40px" onclick="sizeEditForm('<?=$row['size_id']?>')">Perbarui</button>
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
<script type="text/javascript" src="./assets/js/liveSearchSize.js"></script>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Ukuran Baru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
          <div class="form-group">
            <label for="size">Ukuran:</label>
            <input type="text" class="form-control" name="size" required autocomplete="off">
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