<?php
include_once "./config/dbconnect.php";
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand text-primary" href="./index.php">
    Si Admin
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Dashboard </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#customers" onclick="showCustomers();">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#category" onclick="showCategory()">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#sizes" onclick="showSizes()">Ukuran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#productsizes" onclick="showProductSizes()">Produk-Ukuran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products" onclick="showProductItems()">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#orders" onclick="showOrders()">Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-5 text-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>