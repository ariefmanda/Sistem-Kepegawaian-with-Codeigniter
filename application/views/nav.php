<?php
// Proteksi halaman
if($this->session->userdata('level') == ''){
 $this->simple_login->cek();
} 
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link href="<?php echo base_url() ?>images/logo_sm.png" rel="shortcut icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <link rel="icon" href="favicon.ico">
  <title><?php if($this->session->userdata('level') == 'user'){ echo "SISTEM"; } else { echo "ADMIN"; } ?> KARYAWAN
   </title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">     
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/_all-skins.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap3-wysihtml5.min.css">

<script src="<?php echo base_url(); ?>js/jquery-3.2.1.js"></script>
<script src="<?php echo base_url(); ?>js/app.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

$("#Org").change(function (){
                var idOrg=$("#Org").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>karyawan/departemen",
                    data : "idOrg="+idOrg,
                    success : function(data){
                $("#Dept").html(data);
            }
               
            });
});

$("#Dept").change(function (){
                var idDept=$("#Dept").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>karyawan/jabatan",
                    data : "idDept="+idDept,
                    success : function(data){
                $("#Jabatan").html(data);
            }
               
            });
});
});
</script>
</head>
<body class="hold-transition skin-purple sidebar-mini">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php if($this->session->userdata('level') == 'user'){ echo "SISTEM"; } else { echo "ADMIN"; } ?> <b>KARYAWAN</b></span>
    </a>


    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>karyawan/tampil_gambar/<?php echo $this->session->userdata('id'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('login/logout') ?>" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Logout</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu" id="nav-accordion">
        <img src="<?php echo base_url(); ?>karyawan/tampil_gambar/<?php echo $this->session->userdata('id'); ?>" class="img-circle" width=105px height=100px style="margin-left:55px; margin-top:10px;">
                  <h5 class="container" style="color:white; text-align:center;"></h5>
        
      </ul>
      <!-- /.search form -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-search"></i> <span>Pencarian</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <form method="get" action="<?php echo base_url(); ?>index.php/cari/tampil?pag=1&where=&show=5" style="margin-left:0px;">
                <table class="table">
                  <tr>
                    <td><input type="text" name="namaLengkap" placeholder="Cari Nama" style="width:100%"></td>
                  </tr>
                  <tr>
                    <input type="hidden" value="1" name="pag">
                    <input type="hidden" value="" name="where">
                    <input type="hidden" value="5" name="sow">
                    <td>
                      <select name="Org" id="Org" style="width:100%">
                        <option value="">Organisasi</option>
                        <?php foreach ($data_organisasi as $d) {?>
                        <option value="<?php echo $d['idOrg']; ?>"><?php echo $d['namaOrg']; ?></option>
                        <?php
                            } 
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="Dept" id="Dept" style="width:100%">
                        <option value="">Departemen</option>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="Jabatan" id="Jabatan" style="width:100%">
                        <option value="">Jabatan</option>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="radio" name="statusKerja" value="aktif">
                      <span style="color:white">Aktif</span>

                      <input type="radio" name="statusKerja" value="keluar">
                      <span style="color:white">Keluar</span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select name="pilih_umur">
                        <option value=">=">Di Atas</option>
                        <option value="<=">Di Bawah</option>
                        <option value="=">=</option>
                      </select>
                      <input type="text" name="umur" placeholder="0" style="width:20%" value="0"></td>
                    </td>
                  </tr>
                  <tr>
                    
                    <td>
                      <input type="radio" name="jenisKelamin" value="Laki-laki">
                      <span style="color:white">Laki-Laki</span>

                      <input type="radio" name="jenisKelamin" value="Perempuan">
                      <span style="color:white">Perempuan</span>
                    </td>
                  </tr>
                  <tr>
                    <td><button type="submit" class="btn btn-info btn-sm">Search</button></td>
                  </tr>
                </table>
                </form>    
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i> <span>Karyawan</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif?pag=1&where=&show=5"><i class="glyphicon glyphicon-th"></i>Karyawan Aktif</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/karyawan/tampil/keluar"><i class="glyphicon glyphicon-th"></i>Karyawan Pensiun</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url(); ?>cuti/tampilCuti?page=konfirmasi_cuti">
            <i class="glyphicon glyphicon-th-list"></i> <span>Cuti Karyawan</span>
            <i class="fa"></i>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=terbaik">
            <i class="glyphicon glyphicon-th-list"></i> <span>Karyawan Terbaik</span>
            <i class="fa"></i>
          </a>
        </li>
        <?php if($this->session->userdata('level') == 'admin'){ ?>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i> <span>Master Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/organisasi/tampil"><i class="glyphicon glyphicon-th"></i>Organisasi</a></li>
            <li><a href="<?php echo base_url(); ?>departemen/tampil_organisasi"><i class="glyphicon glyphicon-th"></i>Departemen</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/jabatan/tampil_organisasi"><i class="glyphicon glyphicon-th"></i>Jabatan</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=kriteria"><i class="glyphicon glyphicon-th"></i>Karyawan Terbaik</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-th"></i> 
            <span>Akun</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>login/editAkun"><i ></i>Edit Akun</a></li>
            <?php if($this->session->userdata('level') == 'admin'){ ?>
            <li><a href="<?php echo base_url(); ?>login/tampil"><i ></i>Hak Access</a></li>
            <?php }?>
          </ul>
        </li>
      </ul>
      
    </section>
    <!-- /.sidebar -->
  </aside>

</body>
<style>

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #2f373d;
    min-width: 160px;
    box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

a {
    color: black;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
  color: white;
  background-color: #20262b;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</html>

<!--SELECT db_karyawan.idKaryawan, db_karyawan.namaLengkap, db_karyawan.jenisKelamin, db_pekerjaan.idPekerjaan, db_pekerjaan.idOrg, db_pekerjaan.idJabatan, db_karyawan.tglLahir, db_karyawan.statusKerja
FROM db_karyawan LEFT JOIN db_pekerjaan
ON db_karyawan.idKaryawan=db_pekerjaan.idKaryawan where db_karyawan.namaLengkap like '%%' and db_pekerjaan.idPekerjaan LIKE '%%'-->