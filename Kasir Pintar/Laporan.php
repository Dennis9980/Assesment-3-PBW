<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <?php
      require 'Connect.php';
      
      function get($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
      }

      $dataPenjualan = get("SELECT barang.id_barang, barang.nama_barang, penjualan.jumlah_barang, penjualan.total, user.Nama, penjualan.tanggal_input FROM barang, penjualan, user 
                 WHERE barang.id_barang = penjualan.id_barang AND penjualan.id_user = user.id GROUP BY barang.id_barang")
    ?>
</head>
<body>
    <!--Navbar-->
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
                    <a class="nav-link" href="#">Barang</a>
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
    <!--tabel cari-->
    <div class="container-md">
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th scope="col">Pilih Hari</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="date" value="<?= date('Y-m-d');?>" class="form-control" name="hari">
                </td>
                <td>
                    <input type="hidden" name="periode" value="ya">
                    <button class="btn btn-primary">
                        <i class="fa fa-search"></i> Cari
                    </button>
                    <a href="index.php?page=laporan" class="btn btn-success">
                        <i class="fa fa-refresh"></i> Refresh</a>
                        
                </td>
            </tr>
            </tbody>
        </table>

        <!--tabel Nampilin-->
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Kasir</th>
                    <th>Tanggal Input</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataPenjualan as $data):?>
                    <tr>
                        <td><?php echo $data['id_barang']?></td>
                        <td><?php echo $data['nama_barang']?></td>
                        <td><?php echo $data['jumlah_barang']?></td>
                        <td><?php echo $data['total']?></td>
                        <td><?php echo $data['Nama']?></td>
                        <td><?php echo $data['tanggal_input']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="clearfix" style="border-top:1px solid #ccc;"></div>
    </div>
</body>
</html>
