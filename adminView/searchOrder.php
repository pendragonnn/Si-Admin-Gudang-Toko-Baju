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
                $conn = mysqli_connect('localhost', 'root', '', 'swiss_collection');
                $keyword = $_GET['cariPesanan'];
                $sql="SELECT * FROM orders
                JOIN users ON orders.user_id = users.user_id
                WHERE users.first_name LIKE '%$keyword%'
                ";
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