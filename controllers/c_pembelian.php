<?php
include_once '../models/m_pembelian.php';

$pembeli = new m_pembelian();


if (isset($_POST['tambah'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    if ($_GET['aksi'] == 'tambah') {
        $result = $pembeli->input($nama_pelanggan, $alamat, $no_telepon);
        if ($result) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/v_produk.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/siswa/tampil_data.php'</script>";
        }
    } 

    
}
