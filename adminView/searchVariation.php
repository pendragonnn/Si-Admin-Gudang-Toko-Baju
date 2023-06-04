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
              $conn = mysqli_connect('localhost', 'root', '', 'swiss_collection');
              $keyword = $_GET['cariVariasi'];
              $sql="SELECT * from product_size_variation v, product p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.size_id AND p.product_name LIKE '%$keyword%'";
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
                  <button class="btn btn-danger" style="height:40px" onclick="variationDelete('<?=$row['variation_id']?>')">Hapus</button>
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