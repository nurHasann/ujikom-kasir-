
<?php
$id = $_GET['id'];
if(isset($_POST['nama_produk'])){
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $query = mysqli_query($koneksi,"UPDATE produk set nama_produk='$nama',harga='$harga',stock='$stock' WHERE id_produk=$id");
    if($query) {
        echo '<script>alert("Ubah Data Berhasil"); location.href="?page=produk"</script>';
    }else{
          echo '<script>alert("TUbah Data Gagal")</script>';

    }
   
}
$query = mysqli_query($koneksi,"SELECT*FROM produk WHERE id_produk=$id");
$data = mysqli_fetch_array($query);
?>
 <!-- Main Content -->
 <div id="content">

     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
             <i class="fa fa-bars"></i>
         </button>

         <!-- Topbar Search -->
         <form
             class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
             <div class="input-group">
                 <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                     aria-label="Search" aria-describedby="basic-addon2">
                 <div class="input-group-append">
                     <button class="btn btn-primary" type="button">
                         <i class="fas fa-search fa-sm"></i>
                     </button>
                 </div>
             </div>
         </form>

         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

             <!-- Nav Item - Search Dropdown (Visible Only XS) -->
             <li class="nav-item dropdown no-arrow d-sm-none">
                 <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-search fa-fw"></i>
                 </a>
                 <!-- Dropdown - Messages -->
                 <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                     aria-labelledby="searchDropdown">
                     <form class="form-inline mr-auto w-100 navbar-search">
                         <div class="input-group">
                             <input type="text" class="form-control bg-light border-0 small"
                                 placeholder="Search for..." aria-label="Search"
                                 aria-describedby="basic-addon2">
                             <div class="input-group-append">
                                 <button class="btn btn-primary" type="button">
                                     <i class="fas fa-search fa-sm"></i>
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </li>

             <!-- Nav Item - Alerts -->
        

             <!-- Nav Item - Messages -->
       
             <div class="topbar-divider d-none d-sm-block"></div>

             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown no-arrow">
                 <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                     <img class="img-profile rounded-circle"
                         src="img/undraw_profile.svg">
                 </a>
                 <!-- Dropdown - User Information -->
                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">
                     <a class="dropdown-item" href="#">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                         Profile
                     </a>
                     <a class="dropdown-item" href="#">
                         <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                         Settings
                     </a>
                     <a class="dropdown-item" href="#">
                         <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                         Activity Log
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                         Logout
                     </a>
                 </div>
             </li>

         </ul>

     </nav>
     <!-- End of Topbar -->

     <!-- Begin Page Content -->
     <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
             <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                     class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
         </div>

         <!-- Content Row -->
         <div class="row">

        

     


         <!-- Content Row -->

         <!-- <div class="row"> -->

             <!-- Area Chart -->
             <div class="col-xl-12">
                 <div class="card shadow mb-4 ">
                  
                   
          
         <!-- Content Row -->
         <div class="row">

             <!-- Content Column -->
             <div class="col-lg-12 mb-4 ">

                 <!-- Project Card Example -->
                 <div class="card shadow mb-4 ">
                     <div class="card-header ">
                    
                         <!-- <h6 class="m-0 font-weight-bold text-primary">Projects</h6> -->
                          
                         
                          <!-- <table class="table  m-0" width="200"> -->
                        <form method="post" >
                            <table class="table table-bordered m-0 font-weight-bold text-primary" >
                                <tr>
                                    <td width="200" >Nama Produk</td>
                                    <td width="1" >:</td>
                                    <td><input class="from-control w-100" type="text" value="<?php echo$data['nama_produk'];?>" name="nama_produk" > </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><input type="number" class="from-control w-100" step="0"  value="<?php echo$data['harga'];?>" name="harga"></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><input type="number" class="from-control w-100" step="0" value="<?php echo$data['stock'];?>" name="stock"></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                   <td><button type="submit" class="btn btn-primary">Simpan</button> 
                                   <button type="reset" class="btn btn-info">Riset</button></td>
                                
                                </tr>
                                
                            </table>
                            <a href="?page=produk " class="btn btn-danger">Kembali</a>
                        </form> 
                          
             
                     
                     </div>
                    
                 </div>

       

           



             </div>
         </div>

     </div>
     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 