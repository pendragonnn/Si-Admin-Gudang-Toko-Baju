<?php
session_start();
include "./navbar.php";
include_once "./config/dbconnect.php";

if (!isset($_SESSION["login"])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Siadmin | Dashboard</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a49add4730.js" crossorigin="anonymous"></script>
</head>

<body>

  <div id="main-content" class="container allContent-section py-4">
    <div class="row">
      <div class="col-12 bg-primary mb-2 rounded">
        <h4 class="p-1 pt-2 text-center text-light">Selamat Datang Admin!</h4>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-row">
              <i class="fa-solid fa-users"></i>
              <h5 class="card-title ml-3 mb-0">Total Pelanggan : 
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
              </h5> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-row">
              <i class="fa-solid fa-list-ul"></i>
              <h5 class="card-title ml-3 mb-0">Total Kategori :
                <?php
                        $sql = "SELECT * from category";
                        $result = $conn->query($sql);
                        $count = 0;
                        if($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $count = $count + 1;
                          }
                        }
                        echo $count;
                      ?>
              </h5>

              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-2">
        <div class="card">
          <div class="card-body">
            <div class="icon-row">
              <i class="fa-solid fa-shirt"></i>
              <h5 class="card-title ml-3 mb-0">Total Produk :
                <?php
                      $sql = "SELECT * from product";
                      $result = $conn->query($sql);
                      $count = 0;
                      if($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $count = $count + 1;
                        }
                      }
                      echo $count;
                      ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-2">
        <div class="card">
          <div class="card-body">
            <div class="icon-row">
              <i class="fa-solid fa-cart-shopping"></i>
              <h5 class="card-title ml-3 mb-0">Total Pesanan :
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
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-3">
        <ul class="list-group">
          <li class="list-group-item bg-danger" aria-current="true">Peraturan Penting! <span><small>(Diperbarui pada : 23 Mei 2023)</small></span></li>
          <li class="list-group-item">Dilarang memodifikasi data tanpa bukti nyata</li>
          <li class="list-group-item">Dilarang masuk sistem di luar jam kerja (kecuali mendapatkan izin)</li>
          <li class="list-group-item">Dilarang menyebarkan data ke publik</li>
        </ul>
      </div>
    </div>
  </div>




    <?php
    if (isset($_GET['category']) && $_GET['category'] == "success") {
      echo '<script>alert("Penambahan Data Kategori Berhasil"); window.location = "index.php";</script>';
    } else if (isset($_GET['category']) && $_GET['category'] == "error") {
        echo '<script> alert("Penambahan Data Kategori Gagal"); window.location = "index.php";</script>';
    } 
    if (isset($_GET['user']) && $_GET['user'] == "success") {
        echo '<script>alert("Penambahan Data Pelanggan Berhasil"); window.location = "index.php";</script>';
    } else if (isset($_GET['user']) && $_GET['user'] == "error") {
        echo '<script> alert("Penambahan Data Pelanggan Gagal"); window.location = "index.php";</script>';
    } 
    if (isset($_GET['size']) && $_GET['size'] == "success") {
        echo '<script>alert("Penambahan Data Ukuran Berhasil"); window.location = "index.php";</script>';
    } else if (isset($_GET['size']) && $_GET['size'] == "error") {
        echo '<script> alert("Penambahan Data Ukuran Gagal"); window.location = "index.php";</script>';
    }
    if (isset($_GET['variation']) && $_GET['variation'] == "success") {
      echo '<script>alert("Penambahan Data Variasi Berhasil"); window.location = "index.php";</script>';
    } else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
        echo '<script> alert("Penambahan Data Variasi Gagal"); window.location = "index.php";</script>';
    }
    ?>


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>