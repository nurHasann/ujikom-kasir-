<?php 

require_once 'C:/xampp/htdocs/ukk_kasir/controllers/koneksi.php';



class m_produk{

    //fungsi untuk menampilkan semua data dari tabel siswa
	function tampil_data()
	{

		//deklarasi objeck koneksi database
		$conn = new database();

		//query untuk menampilkan data dari tabel siswa 
		$data = mysqli_query($conn->koneksi, "SELECT * FROM produk ");

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
		$query = mysqli_query($conn->koneksi, "SELECT * FROM produk WHERE id_produk = $id");
		while ($row = mysqli_fetch_object($query)) {
			$hasil[] = $row;
		}

		return $hasil;
	}

//fungsi untuk memasukan data kedalam tabel siswa
function input($nama_produk, $harga, $stock)
{
    //membuka koneksi database
    $connn = new database();

    //perintah untuk memasukan kedalam tabel siswa
    $sql = "INSERT INTO produk VALUES ('','$nama_produk', '$harga', '$stock')";

    //mengeksekusi perintah diatas
    $result = mysqli_query($connn->koneksi, $sql);

    //mengembalikan nilai atau pesan bahwa data berhasil dimasukan
    return $result;
}   

function update($id, $nama_produk, $harga, $stock)
	{
		$conn = new database();
		$query = mysqli_query($conn->koneksi, "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', stock = '$stock' WHERE id_produk= $id ");
	
		return $query;
	}

	function hapus($id)
	{
		$conn = new database();
		$sql = "DELETE FROM produk WHERE id_produk = $id";
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
        $query = mysqli_query($conn->koneksi, "SELECT COUNT(*) AS jumlah_produk FROM produk");
        
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