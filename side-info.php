<?php
  include "../config/dbconnect.php";
?>
<div class="container-fluid">
<div class="row">
  <div class="col-12 bg-light mb-3 p-0">
      <div class="alert alert-primary m-0 h6" role="alert">
        Petunjuk : Klik tombol <b style="color: red;">hapus</b> untuk menghapus data, klik tombol <b style="color: blue;">perbarui</b> untuk memodifikasi data, dan klik tombol <b style="color: grey;">tambah</b> untuk menambahkan data baru.
      </div>
  </div>
  <div class="col-12 col-lg-2">
    <div class="card bg-light mb-3" style="text-align: center">
      <div class="card-header">
        <h5>Info</h5>
      </div>
      <ul class="list-group list-group-flush" style="color: #DDE6ED;">
        <li class="list-group-item"><i class="fa-solid fa-users"></i>
          <?php
            $sql = "SELECT * from users";
            $result = $conn->query($sql);
            $count = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $count = $count + 1;
              }
            }
            echo $count;
          ?>
        </li>
        <li class="list-group-item"><i class="fa-solid fa-list-ul"></i> 
          <?php
            $sql = "SELECT * from category";
            $result = $conn->query($sql);
            $count = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $count = $count + 1;
              }
            }
            echo $count;
          ?>
        </li>
        <li class="list-group-item"><i class="fa-solid fa-shirt"></i>
          <?php
            $sql = "SELECT * from product";
            $result = $conn->query($sql);
            $count = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $count = $count + 1;
              }
            }
            echo $count;
          ?>
        </li>
        <li class="list-group-item"><i class="fa-solid fa-cart-shopping"></i>
          <?php
            $sql = "SELECT * from orders";
            $result = $conn->query($sql);
            $count = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $count = $count + 1;
              }
            }
            echo $count;
          ?>
        </li>
      </ul>
      <div class="card-footer">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
          Tambah
        </button>
      </div>
    </div>
  </div>