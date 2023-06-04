<?php
  include "../side-info.php";
?>
    <div class="col-12 col-lg-10">
      <span class="badge mb-1">Dashboard > Pelanggan</span>
      <main class="table">
        <section class="table-header">
          <h4>Semua Pelanggan</h4>
          <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari nama pelanggan.." autocomplete="off" id="cari-user">
          </div>
        </section>
        <section class="table-body">
          <div id="container">
            <table>
              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama Pengguna </th>
                  <th> Email </th>
                  <th> No Telefon </th>
                  <th> Tanggal Bergabung </th>
                  <th> Modifikasi </th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once "../config/dbconnect.php";
                $sql="SELECT * from users";
                $result=$conn-> query($sql);
                $count=1;
                if($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
              ?>
                <tr>
                  <td><?=$count?></td>
                  <td><?=$row["first_name"]?> <?=$row["last_name"]?></td>
                  <td><?=$row["email"]?></td>
                  <td><?=$row["contact_no"]?></td>
                  <td><?=$row["registered_at"]?></td>
                  <td>
                    <button class="btn btn-danger" style="height:40px" onclick="if (!confirm('Yakin ingin menghapus?')) { return false } else userDelete('<?=$row['user_id']?>')">Hapus</button>
                    <button class="btn btn-primary" style="height:40px" onclick="userEditForm('<?=$row['user_id']?>')">Perbarui</button>
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
    <script type="text/javascript" src="./assets/js/liveSearchUser.js"></script>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pelanggan baru</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form  enctype='multipart/form-data' action="./controller/addUserController.php" method="POST">
              <div class="form-group">
                <label for="size">Nama Depan:</label>
                <input type="text" class="form-control" name="first_name" required>
              </div>
              <div class="form-group">
                <label for="size">Nama Belakang:</label>
                <input type="text" class="form-control" name="last_name" required>
              </div>
              <div class="form-group">
                <label for="size">Email:</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="size">Password:</label>
                <input type="text" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label for="size">Nomor Telefon:</label>
                <input type="text" class="form-control" name="contact_no" required>
              </div>
              <div class="form-group">
                <label for="size">Alamat:</label>
                <input type="text" class="form-control" name="user_address" required>
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