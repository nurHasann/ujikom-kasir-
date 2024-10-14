<?php
session_start();
//memanggil file koneksi kedalam file c_login
include_once '../controllers/koneksi.php';

//membuat kelas dari file C_login, harus sama dengan nama file
class m_login{

    //membuat method atau fungsi untuk menampung data dari form register yang di input oleh user kedalam tabel user
    public function register($nama, $username, $password, $level){
            
        // membuat variabel yang bertipe data objek dari kelas c_koneksi
        $conn = new database();

        // perintah untuk memasukan data register kedalam tabel users
        $sql = "INSERT INTO user VALUES (NULL, '$nama', '$username', '$password', '$level'  )";

       


        //harjon menjalankan perintah $sql dengan memiliki 2 parameter, 1. koneksi, 2.perintahnya
        $query = mysqli_query($conn-> __construct(), $sql);
       
        //mengecek kondisi data berhasil atau tidak
        if ($query) {

            // echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php'</script>";
            echo "<script>alert(' register berhasil berhasil ditambahkan');window.location='../views/v_login.php'</script>";
        } else {

            echo "<script>alert(' register tidak gagal ditambahkan')</script>" ; 
        }
    }
 
    //fungsi  mengatur proses identifikasi login
    public function login($username = null, $password = null) {
        $conn = new database();
    
        // Pastikan koneksi database berhasil
        $db = $conn->__construct();
        if (!$db) {
            echo "<script>alert('Koneksi database gagal.'); window.location='../index.php'</script>";
            return;
        }
    
        // Cek apakah username dan password ada
        if ($username && $password) {
            // Gunakan prepared statements untuk mencegah SQL injection
            $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
    
            if ($data) {
                // Verifikasi password
                if (password_verify($password, $data['password'])) {
                    // Simpan data pengguna dalam sesi
                    $_SESSION["data"] = $data;
    
                    // Redirect ke halaman utama
                    echo "<script>alert('Login berhasil .'); window.location='../index.php'</script>";
                    exit;
                } else {
                    // Password salah
                    echo "<script>alert('Login gagal! Silahkan cek username dan password.'); window.location='../views/v_login.php'</script>";
                }
            } else {
                // Username tidak ditemukan
                echo "<script>alert('Login username  gagal! Silahkan cek username dan password.'); window.location='../views/v_login.php'</script>";
            }
    
            // Tutup statement
            $stmt->close();
        } else {
            echo "<script>alert('Silahkan masukkan username dan password.'); window.location='../index.php'</script>";
        }
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../views/v_login.php");
        exit();
    }


}

// 
?>