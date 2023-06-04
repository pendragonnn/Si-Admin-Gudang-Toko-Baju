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
                $keyword = $_GET['cariUser'];
                $conn = mysqli_connect('localhost', 'root', '', 'swiss_collection');
                $sql="SELECT * FROM users WHERE first_name LIKE '%$keyword%'";
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
                    <button class="btn btn-danger" style="height:40px" onclick="userDelete('<?=$row['user_id']?>')">Hapus</button>
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