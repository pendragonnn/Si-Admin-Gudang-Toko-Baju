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
              $conn = mysqli_connect('localhost', 'root', '', 'swiss_collection');
              $keyword = $_GET['cariProduk'];
              $sql="SELECT * from product, category WHERE product.category_id=category.category_id && product.product_name LIKE '%$keyword%'";
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
                  <button class="btn btn-danger mt-2" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Hapus</button>
                </td>
              </tr>
            <?php
              $count=$count+1;
                }
              }
            ?>
            </tbody>
          </table>