<?php
require 'connect.php';

//hitung jumlah barang
$h1 = mysqli_query($c, "select * from produk");
$h2 = mysqli_num_rows($h1); // jumlah produk
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang masuk</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="csspau/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <div class="mb-3">
        <nav class="navbar navbar-dark bg-success">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Kasir Pintar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end bg-success" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Kasir Pintar</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="stok.php">Barang</a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Penjualan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                      <li><a class="dropdown-item" href="#">Transaksi</a></li>
                      <li><a class="dropdown-item" href="Laporan.php">Laporan Penjualan</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
    </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data pesanan</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Nama Barang: <?=$h2;?></div>
                                </div>
                            </div>
                        </div>
                            <!-- Button to Open the Modal -->
                            
                            <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                                Tambah barang baru
                            </button>
                           

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Barang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th> 
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $get = mysqli_query($c,"select * from produk");
                                    $i = 1;

                                    while($p=mysqli_fetch_array($get)){
                                        $nama_barang = $p['nama_barang'];
                                        $harga_beli = $p['harga_beli'];
                                        $harga_jual =  $p['harga_jual'];
                                        $stok       = $p['stok'];
                                        $tanggal_input = $p['tanggal_input'];
                                        $tanggal_update = $p['tanggal_update'];
                                        $idproduk   = $p['idproduk'];
                                        
                                        
                                        
                                    ?>

                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?= $nama_barang;?></td>
                                        <td>Rp<?=number_format($harga_beli );?></td>
                                        <td>Rp<?=number_format($harga_jual);?></td>
                                        <td><?= $stok;?></td>
                                        <td>
                                             
                                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#edit<?=$idproduk;?>">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete<?=$idproduk;?>">
                                        Delete
                                        </button>
                                        </td>
                                    </tr>
                                                 <!-- Modal Hapus -->
                                                <div class="modal fade" id="edit<?=$idproduk;?>">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            
                                                   
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?=$nama_barang;?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <form method="post">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama barang" value="<?=$nama_barang;?>">
                                                    <input type="num" name="harga_beli" class="form-control mt-2" placeholder="Harga Beli" value="<?=$harga_beli;?>">
                                                    <input type="num" name="harga_jual" class="form-control mt-2" placeholder="Harga Jual" value="<?= $harga_jual;?>">
                                                    <input type="num" name="stok" class="form-control mt-2" placeholder="Stok" value="<?=$stok;?>">
                                                    <input type="hidden" name="idproduk" value="<?=$idproduk;?>">
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="editbarang">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                            </div>



                                             <!-- Modal Edit -->
                                             <div class="modal fade" id="delete<?=$idproduk;?>">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            
                                                   
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">hapus <?=$nama_barang;?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <form method="post">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus ini?
                                                    <input type="hidden" name="idproduk" value="<?=$idproduk;?>">
                                                    </div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapusbarang">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                            </div>
  
  
                                    <?php
                                    };//end
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah barang baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="nama_barang" class="form-control" placeholder="Nama barang">
          <input type="num" name="harga_beli" class="form-control mt-2" placeholder="Harga Beli">
          <input type="num" name="harga_jual" class="form-control mt-2" placeholder="Harga Jual">
          <input type="num" name="stok" class="form-control mt-2" placeholder="Stok">
          <input type="text" name="tgl_input" class="form-control mt-2" placeholder="Tanggal Input">
           <input type="text" name="tanggal_update" class="form-control mt-2" placeholder="Tanggal update">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="tambahbarang">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
  
</html>
