


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>market sampah</title>
    <style>
        .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table{
  margin-left: 20px;
}

.content-table thead tr {
  background-color: #2F8F9D;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 20px 40px;
}

.content-table tbody tr {
  border-bottom: 1px solid #040404;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #3BACB6;
}

.content-table tbody tr {
  font-weight: bold;
  color: #040404;
}
.k{
    margin-left: 20px;
}
.form-control{
    margin-left: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>-1 kasir pintar</h2>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="dashpengepul.php">
                        <i class="fa-solid fa-house"></i>
                        <div>Dashbord</div>
                    </a>
                </li>
                <li>
                    <a href="tentang_Kami.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Tentang kami</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <div>Logout</div>
                    </a>
                </li>    
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                               <div class="card">
                    <div class="card-content">
                        <div class="number">Hi!</div>
                        <div class="card-name">></div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">-1 Kasir pintar</div>
                        <div class="card-name">Transaksi</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-dolly"></i>
                    </div>
                </div>
            </div>
            <table class="content-table">
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <h2 class="k">Kode barang</h2>
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <!--pencarian barang-->
            <h3 style="margin-left:20px; margin-top: 10px;"> Hasil pencarian</h3>
              <thead>
                <tr>
                  <th>kode</th>
                  <th>nama</th>
                  <th>harga</th>
                  <th>stok</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    include 'config.php'; 

                    //nama tabel barang
                    if(isset($_GET['search'])){

                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM barang WHERE id_barang = '$filtervalues' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0){

                        foreach($query_run as $items)
                        {
                        ?>
                        <form method="GET">
                        <tr>
                        <!--tampilin hasil pencarian dari tabel barang-->
                            <td><?=  $items['id_barang']; ?></td>
                            <td><?=  $items['nama_barang']; ?></td>
                            <td><?=  $items['harga_jual']; ?></td>
                            <td>
                                <?=  $items['stok']; ?>
                            </td>
                        </tr>
                        </form>
                        <?php
                        }
                        }
                        else
                        {
                        ?>
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                        <?php
                        }
                    }
                ?>
              </tbody> 
            </form>  
            </table>
            <!--menginput ke keranjang-->
            <table class="content-table">
                <h3 style="margin-left:20px;">Input keranjang</h3>
                <thead>
                <tr>
                  <th>kode</th>
                  <th>nama</th>
                  <th>harga</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <form action="" method="post">
              <tbody>
                  <td>
                     <input type="text" name="kode" placeholder="kode barang">
                  </td>
                  <td>
                       <input type="text" name="nama_br" placeholder="nama barang">
                  </td>
                  <td>
                      <input type="text" name="hrg" placeholder="harga jual">
                  </td>
                  <td>
                    <input type="number" name="jml" placeholder="jumlah barang">
                  </td>
                  <td>
                    <input type="date" name="date" placeholder="tgl input">
                  </td>
              </tbody>
              <td>
                <button type="submit" name="insert">submit</a></button>
              </td>
              <?php
              if(isset($_POST['insert'])){
                $kd_barang = $_POST['kode'];
                $nm_barang = $_POST['nama_br'];
                $harga = $_POST['hrg'];
                $jumlah = $_POST['jml'];
                $tgl = $_POST['date'];
                $total = $harga * $jumlah;
                //input data barang ke keranjang di tabel keranjang
                $input = "INSERT INTO keranjang VALUES ('','$kd_barang','$nm_barang','$harga','$jumlah','$tgl')";
                mysqli_query($con,$input);
                $stotal = "INSERT INTO keranjang VALUES('','$kd_barang','$nm_barang','$harga','$jumlah','$total','$tgl')";
                mysqli_query($con,$stotal);
              } 
               ?>
              </form>
              <table class="content-table">
                <h3 style="margin-left:20px;">Detail belanja</h3>
                <thead>
                <tr>
                  <th>kode</th>
                  <th>nama</th>
                  <th>harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <form action="" method="post">
              <?php
              //menampilkan detail belanja 
                  $detail = mysqli_query($con,"SELECT * FROM keranjang"); 
              ?>
              <?php while ($row = mysqli_fetch_assoc($detail)) : ?>
              <tbody> 
                  <td>
                    <?php echo $row["id_barang"] ?>
                  </td>
                  <td>
                    <?php echo $row["nama_barang"]?>
                  </td>
                  <td>
                    <?php echo $row["harga_jual"] ?>
                  </td>
                  <td>
                    <?php echo $row["jumlah"] ?>
                  </td>
                  <td>
                    <?php echo $row["jumlah"] * $row['harga_jual'] ?>
                  </td>
                  <td>
                    <?php echo $row["tgl_input"] ?>
                  </td>
              <?php endwhile ?>
              </tbody>
              <form action="" method="post">
              <?php
                $server = "localhost";
                $user = "root";
                $pass = "";
                $database = "pb";

                $con = mysqli_connect($server, $user, $pass, $database);

                if (!$con) {
                    die("<script>alert('Connection Failed.')</script>");
                } 
                //jumlah total harga
             $sql3 = mysqli_query($con, "SELECT SUM(total) FROM keranjang");    
              ?>
              <td>
                Total Harga 
              </td>
              <td></td>
              <td><input type="number" name="in_bayar">Bayar</td>
              <?php  while($data3 = mysqli_fetch_array($sql3)) : ?>
              <td>
                <button type="submit" name="bayar">bayar</a></button>
              </td>
              <td>
                 <?php echo "Rp." . number_format($data3['SUM(total)']) ;?> 
              </td>
              </form>
              <tbody>
              <td>
                <!--kembalian belum selesai-->
                    <input type="number" name="kembalian">kembalian
              </td>
              <?php endwhile ?>
                <td>
                <button type="submit" name="masuk">submit</a></button>
                </td>
              </tbody>
              </form>
            </table>
            </table>
        </div>
    </div>
</div>     
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    <script src="chart2.js"></script>
</body>
</html>
