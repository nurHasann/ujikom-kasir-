<?php
include_once '../models/m_pelanggan.php';

$produk = new m_pelanggan();

if (isset($_POST['tambah'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    if ($_GET['aksi'] == 'tambah') {
        $result = $produk->input($nama_pelanggan, $alamat, $no_telepon);
        
    } 

    
} else {
    if ($_GET['aksi'] == 'hapus') {
        $id_pelanggan = $_GET['id_pelanggan'];
        $result = $produk->hapus($id_pelanggan);

        if ($result) {
            echo "<script>alert('Data Berhasil Dihapus');window.location='../views/v_pelanggan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus');window.location='../views/siswa/tampil_data.php'</script>";
        }
    }
} 


if (isset($_POST['update'])) {
    $id = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    if ($_GET['aksi'] == 'update') {
        $result = $produk->update($id,$nama_pelanggan, $alamat, $no_telepon);
        if ($result) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/v_pelanggan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/siswa/tampil_data.php'</script>";
        }
    } 
}