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
                  $keyword = $_GET['cariSize'];
                  $conn = mysqli_connect('localhost', 'root', '', 'swiss_collection');
                  $sql="SELECT * FROM sizes WHERE size_name LIKE '%$keyword%' ";
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