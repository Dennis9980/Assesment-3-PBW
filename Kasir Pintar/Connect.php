<?php

    $DB_NAMA = "kasir";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_HOST = "127.0.0.1";

    $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAMA);

    if (mysqli_errno($conn)) {
        echo "Gagal terhubung ke database" . mysqli_error($conn);
    }
     //tambah barang
    if(isset($_POST['tambahbarang'])){
        $nama_barang = $_POST['nama_barang'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual =  $_POST['harga_jual'];
        $stok       = $_POST['stok'];
        $tgl_input  = $_POST['tgl_input'];
    
        $insert = mysqli_query($c, "insert into produk (nama_barang,harga_beli,harga_jual,stok, tgl_input) values ('$nama_barang', ' $harga_beli',' $harga_jual','$stok','$tgl_input')");
        if($insert){
            header('location:stok.php');
        }else{
            echo '
            <script>aler("Gagal menambahkan barang baru");
            window.location.href="stok.php"
            </script>
            ';
        }
    }

    
    //edit barang
    if(isset($_POST['editbarang'])){
        $nama_barang = $_POST['nama_barang'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual =  $_POST['harga_jual'];
        $tgl_input = $_POST['tgl input'];
        $idproduk = $_POST['idproduk'];//idproduk

        $query = mysqli_query($c, "update produk set nama_barang='$nama_barang', harga_beli='$harga_beli', harga_jual='$harga_jual', tgl_input='$tgl_input' where idproduk='$idproduk' ");

        if($query){
            header('location:stok.php');
        }else{
            echo '
            <script>alert("Gagal menambahkan barang masuk");
            window.location.href="stok.php"
            </script>
            ';
        }
    }


    //hapus barang
    if(isset($_POST['hapusbarang'])){
        $idproduk = $_POST['idproduk'];

        $query = mysqli_query($c, "delete from produk where idproduk='$idproduk' ");
        if($query){
            header('location:stok.php');
        }else{
            echo '
            <script>alert("Gagal menghapus barang masuk");
            window.location.href="stok.php"
            </script>
            ';
        }
    }
?>
