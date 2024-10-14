<?php
// Menginclude model produk untuk interaksi dengan database
include_once '../models/m_produk.php';

// Membuat instance dari model produk
$produk = new m_produk();

// Memeriksa apakah tombol 'tambah' ditekan
if (isset($_POST['tambah'])) {
    // Mengambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    // Memeriksa apakah aksi adalah untuk menambah produk
    if ($_GET['aksi'] == 'tambah') {
        // Mencoba untuk memasukkan produk ke dalam database
        $result = $produk->input($nama_produk, $harga, $stock);
        // Memberikan umpan balik berdasarkan keberhasilan atau kegagalan
        if ($result) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/v_produk.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/siswa/tampil_data.php'</script>";
        }
    } 
} else {
    // Memeriksa apakah aksi adalah untuk menghapus produk
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
        // Mengambil ID produk yang akan dihapus
        $id_produk = $_GET['id_produk'];
        // Mencoba untuk menghapus produk dari database
        $result = $produk->hapus($id_produk);

        // Memberikan umpan balik berdasarkan keberhasilan atau kegagalan
        if ($result) {
            echo "<script>alert('Data Berhasil Dihapus');window.location='../views/v_produk.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus');window.location='../views/siswa/tampil_data.php'</script>";
        }
    }
} 

// Memeriksa apakah tombol 'update' ditekan
if (isset($_POST['update'])) {
    // Mengambil data dari form untuk memperbarui produk
    $id = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    // Memeriksa apakah aksi adalah untuk memperbarui produk
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'update') {
        // Mencoba untuk memperbarui produk dalam database
        $result = $produk->update($id, $nama_produk, $harga, $stock);
        // Memberikan umpan balik berdasarkan keberhasilan atau kegagalan
        if ($result) {
            echo "<script>alert('Data Berhasil Diperbarui');window.location='../views/v_produk.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Diperbarui');window.location='../views/siswa/tampil_data.php'</script>";
        }
    } 
}
