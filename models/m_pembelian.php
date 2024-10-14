<?php 

require_once 'C:/xampp/htdocs/ukk_kasir/controllers/koneksi.php';


class m_pembelian{

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

	        //fungsi untuk menampilkan semua data dari tabel siswa
			function tampil_data_produk()
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

			//fungsi untuk menampilkan semua data dari tabel siswa
			function tampil_stock($id_produk)
			{
		
				//deklarasi objeck koneksi database
				$conn = new database();
		
				//query untuk menampilkan data dari tabel siswa 
				$data = mysqli_query($conn->koneksi, "SELECT * FROM produk WHERE stock =$id_produk ");
		
				//ubah data menjadi objeck 
				while ($d = mysqli_fetch_object($data)) {
					//simpan kedalam variabel hasil yang berbentuk array
					$hasil[] = $d;
				}
				//kembalikan nilai nya
				return $hasil;
			}

}