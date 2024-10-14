<?php

include_once '../models/m_login.php';

$login = new m_login(); // Pastikan nama kelas sesuai dengan file

// Pastikan 'aksi' ada di query string
if (isset($_GET['aksi']) && $_GET['aksi'] == 'register') {
    // Pastikan form telah disubmit
    if (isset($_POST['register'])) {
        // Mengambil data dari POST dan memastikan semuanya ada
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password =  isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : '';
        // $level = isset($_POST['level']) ? $_POST['level'] : 'user';
        $level = $_POST['level'];

        // Validasi input (opsional)
        if (!empty($nama) && !empty($username) && !empty($password) ) {
            // Memanggil method register dari model
            $login->register($nama, $username, $password, $level);
        } else {
            echo "Semua field harus diisi!";
        }
    } else {
        echo "Form registrasi belum disubmit.";
    }
} 

elseif ($_GET['aksi'] == 'login') {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    
    // Panggil fungsi login dengan username dan password
    $login->login($username, $password);
}
if (isset($_GET['aksi']) && $_GET['aksi'] == 'logout') {
 
    $login->logout();
}


?>
