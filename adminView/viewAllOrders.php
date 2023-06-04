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
    </div>
  </div>
    <div class="col-12 col-lg-10">
      <span class="badge mb-1">Dashboard > Pesanan</span>
      <main class="table">
        <section class="table-header">
          <h4>Semua Pesanan</h4>
          <div>
            <input class="input-search" type="text" name="keyword" size="40" autofocus placeholder="Cari pesanan berdasarkan nama.." autocomplete="off" id="cari-pesanan">
          </div>
        </section>
        <section class="table-body">
          <div id="container">
            <table>
              <thead>
                <tr>
                  <th> No </th>
                  <th> Pelanggan </th>
                  <th> Kontak </th>
                  <th> Tanggal Pesanan </th>
                  <th> Metode Pembayaran </th>
                  <th> Status Pesanan </th>
                  <th> Status Pembayaran </th>
                  <th> Detail Lebih Lanjut </th>
                  <th> Hapus Pesanan </th>
                </tr>
              </thead>
              <tbody>
              <?php
                include_once "../config/dbconnect.php";
                $sql="SELECT * from orders";
                $result=$conn-> query($sql);
                $count = 1;
                if($result-> num_rows > 0){
                  while($row=$result-> fetch_assoc()){
              ?>
                <tr>
                  <td><?=$count?></td>
                  <td><?=$row["delivered_to"]?></td>
                  <td><?=$row["phone_no"]?></td>
                  <td><?=$row["order_date"]?></td>
                  <td><?=$row["pay_method"]?></td>
                  <?php 
                        if($row["order_status"]==0){
                                    
                    ?>
                        <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')"> Dalam Proses </button></td>
                    <?php
                                
                        }else{
                    ?>
                        <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Telah Dikirim</button></td>
                
                    <?php
                    }
                        if($row["pay_status"]==0){
                    ?>
                        <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Belum Dibayar</button></td>
                    <?php
                                
                    }else if($row["pay_status"]==1){
                    ?>
                        <td><button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Sudah Terbayar </button></td>
                    <?php
                        }
                    ?>
                      
                    <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">Lihat</a></td>
                    <td>
                      <button class="btn btn-danger" style="height:40px" onclick="orderDelete('<?=$row['order_id']?>')">Hapus</button>
                    </td>
                </tr>
              <?php
              $count=$count + 1;
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
<script src="./assets/js/liveSearchOrder.js"></script>
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">    
        <h4 class="modal-title">Detail Pesanan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body">
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
</script>