<?php 

require_once 'C:/xampp/htdocs/ukk_kasir/controllers/koneksi.php';



class m_pelanggan{

    //fungsi untuk menampilkan semua data dari tabel siswa
	function tampil_data()
	{

		//deklarasi objeck koneksi database
		$conn = new database();

		//query untuk menampilkan data dari tabel siswa 
		$data = mysqli_query($conn->koneksi, "SELECT * FROM pelanggan ");

		//ubah data menjadi objeck 
		while ($d = mysqli_fetch_object($data)) {
			//simpan kedalam variabel hasil yang berbentuk array
			$hasil[] = $d;
		}
		//kembalikan nilai nya
		return $hasil;
	}

	function tampil_data_id($id)
	{
		$conn = new database();
		$query = mysqli_query($conn->koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = $id");
		while ($row = mysqli_fetch_object($query)) {
			$hasil[] = $row;
		}

		return $hasil;
	}

//fungsi untuk memasukan data kedalam tabel siswa
function input($nama_pelanggan, $alamat, $no_telepon)
{
    //membuka koneksi database
    $connn = new database();

    //perintah untuk memasukan kedalam tabel siswa
    $sql = "INSERT INTO pelanggan VALUES ('','$nama_pelanggan', '$alamat', '$no_telepon')";

    //mengeksekusi perintah diatas
    $result = mysqli_query($connn->koneksi, $sql);

	$hasil = "SELECT * FROM pelanggan WHERE nama_pelanggan  = '$nama_pelanggan'";
	$query = mysqli_query($connn->koneksi, $hasil);
	$cekk = mysqli_fetch_assoc($query);

	if ($result) {
		$_SESSION['pelanggan'] = $cekk;
		echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/v_pelanggan.php'</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambah');window.location='../views/siswa/tampil_data.php'</script>";
	}

    //mengembalikan nilai atau pesan bahwa data berhasil dimasukan
    return $result;
}   

function update($id, $nama_pelanggan, $alamat, $no_telepon)
	{
		$conn = new database();
		$query = mysqli_query($conn->koneksi, "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id_pelanggan= $id ");
	
		return $query;
	}

	function hapus($id)
	{
		$conn = new database();
		$sql = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
	}
  

	public function jumlahpelanggan() {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT COUNT(*) AS jumlah_pelanggan FROM pelanggan");
        
		//$data = mysqli_num_rows($query);
        // echo var_dump($data);
		// exit;
        
		while ($d = mysqli_fetch_object($query)) {
			//simpan kedalam variabel hasil yang berbentuk array
			$hasil[] = $d;
		}
		
		return $hasil;
    }

	public function jumlahproduk() {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT COUNT(*) AS jumlah_produk FROM pelanggan");
        
		while ($d = mysqli_fetch_object($query)) {
			//simpan kedalam variabel hasil yang berbentuk array
			$hasil[] = $d;
		}
		
		return $hasil;
    }
	public function jumlahpembelian() {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT COUNT(*) AS jumlah_pembelian FROM pembelian");
        
		while ($d = mysqli_fetch_object($query)) {
			//simpan kedalam variabel hasil yang berbentuk array
			$hasil[] = $d;
		}
		
		return $hasil;
    }

	public function jumlahuser() {
        $conn = new database();
        $query = mysqli_query($conn->koneksi, "SELECT COUNT(*) AS jumlah_user FROM user ");
        
		while ($d = mysqli_fetch_object($query)) {
			//simpan kedalam variabel hasil yang berbentuk array
			$hasil[] = $d;
		}
		
		return $hasil;
    }
}
    ?>