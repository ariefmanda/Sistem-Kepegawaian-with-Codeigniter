<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        <h1>
        Data Karyawan <?php 
        if(!empty($status)){
        echo $status;
        }
         ?>
        </h1>
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <fieldset>
            <?php 
            if(!empty($status)){
                if($status == 'aktif'){
            ?>
            <form style="float:right;" method="get" action="<?php echo base_url(); ?>index.php/karyawan/cari/aktif">
                <?php if(!empty($_GET['page'])){
                    if($this->session->userdata('level') == 'admin'){
                    ?>
                        <input type="hidden" name="page" placeholder="Cari Nama" value="tambahpensiun">
                    <?php
                    }
                 }?>
            </form>
            <form style="float:left;" method="GET" action="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif">
                <input type="hidden" class="form-control" name="page" value="<?php if(!empty($_GET['page'])){ echo $_GET['page']; }?>">
                <p style="float:left;">Show &nbsp;:&nbsp;</p>
                <input type="hidden" class="form-control" name="where" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                <input type="number" min="1" max="10" class="form-control" style="width:60%" name="show" placeholder="0" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; } else { echo "5"; }?>">
            </form>
            <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif">
                <input type="hidden" class="form-control" name="page" value="<?php if(!empty($_GET['page'])){ echo $_GET['page']; }?>">
                <input type="text" class="form-control" name="where" placeholder="Cari Nama" autofocus="autofocus" >
                <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
            </form>
            <p style="float:right;">&nbsp;</p>
             <?php if(empty($_GET['page'])){ ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah/karyawan/kosong" enctype="multipart/form-data">
                <?php if($this->session->userdata('level') == 'admin'){  ?>
                    <input type="submit" class="btn btn-info btn-sm" style="float:right;" value="Tambah">
                <?php } ?>
            </form>
            <?php } 
            if(!empty($_GET['page'])){ ?>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karyawan/statuskerja/keluar" enctype="multipart/form-data">
                <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Pensiun">
            <?php 
            }
                } else {
                if($this->session->userdata('level') == 'admin'){
            ?>
            <a href="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif?page=tambahpensiun"><input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Tambah Pensiun"></a>
        
            <?php 
            }
                }
            }
            ?>
            
            <br><br>
            <?php if($status=="keluar"){?>

            <form style="float:right;" method="get" action="<?php echo base_url(); ?>index.php/karyawan/cari/keluar">
                <?php if(!empty($_GET['page'])){
                    if($this->session->userdata('level') == 'admin'){
                    ?>
                        <input type="hidden" name="page" placeholder="Cari Nama" value="tambahpensiun">
                    <?php
                    }
                 }?>
            </form>
            <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/karyawan/tampil/keluar">
                <input type="hidden" class="form-control" name="page" value="<?php if(!empty($_GET['page'])){ echo $_GET['page']; }?>">
                <input type="text" class="form-control" name="where" placeholder="Cari Nama" autofocus="autofocus" >
                <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
            </form>
            <?php if($this->session->userdata('level') == 'admin'){?>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>karyawan/statuskerja/aktif" enctype="multipart/form-data">
            
            <input type="submit" name="btnSubmit" class="btn btn-danger btn-sm" style="float:left;" value="Aktifkan">
                 
            <?php }} ?>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="2%"></th>
                    <th width="3%">No</th>
                    <th width="18%">Nama Lengkap</th>  
                    <th width="10%">Jenis Kelamin</th>  
                    <th width="10%">Organisasi</th>
                    <th width="7%">Departemen</th>
                    <th width="7%">Jabatan</th>
                    <th width="10%">Tanggal Lahir</th>
                    <th width="5%">Umur</th>
                    <th width="10%">Status Kerja</th>
                    <th width="20%">Aksi</th>
                </tr>
                <?php 
                    $no=1;
                    foreach ($data as $d) {
                ?>
                    <tr>
                        <td>
                            <?php if($d['idKaryawan']!==$this->session->userdata('id')){ if(($status=="keluar")||(!empty($_GET['page']))){ ?><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryawan'];?>"><?php }} ?>
                        </td>
                        <td style="text-align:center;"><?php echo $no?></td>
                        <td style="text-align:center;"><?php echo $d['namaLengkap'];?></td>
                        <td style="text-align:center;"><?php echo $d['jenisKelamin'];?></td>
                        <td style="text-align:center;"><?php echo $d['namaOrg'];?></td>
                        <td style="text-align:center;"><?php echo $d['namaDept'];?></td>
                        <td style="text-align:center;"><?php echo $d['namaJabatan'];?></td>
                        <td style="text-align:center;"><?php echo $d['tglLahir'];?></td>
                        <td style="text-align:center;"><?php echo $d['usia'];?></td>
                        <td style="text-align:center;"><?php echo $d['statusKerja'];?></td>
                        <td style="text-align:center;">
                            <?php if($this->session->userdata('username') == $d['namaLengkap'] || $this->session->userdata('level') == 'admin'){ ?>
                                <a href="<?php echo base_url(); ?>index.php/karyawan/PDF/<?php echo $d['idKaryawan']; ?>/<?php echo $d['statusKerja']; ?>" target="_blank">
                                    <button type="button" class="btn btn-warning btn-sm" style="float:left;">Lihat</button>
                                </a>
                            <?php }?>
                            <?php if($this->session->userdata('level') == 'admin'){  ?>
                                <a href="<?php echo base_url(); ?>index.php/karyawan/tambah_info/karyawan/<?php echo $d['idKaryawan']; ?>?page=edit">
                                    <button type="button" class="btn btn-success btn-sm" style="float:left;">Edit</button>
                                </a>
                            <a href="<?php echo base_url(); ?>index.php/karyawan/hapus/<?php echo $d['idKaryawan']; ?>/<?php echo $d['namaFoto']; ?>">
                                <button type="button" style="float:left;" class="btn btn-danger btn-sm" <?php if($d['idKaryawan']==$this->session->userdata('id')){echo "disabled";} ?> >Hapus</button>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php
                    $no++;
                    } 
                    $total_home = $no-1;
                ?>

            </table>
            </form>
            <ul class="pagination" style="float:right; margin-top:-10px;">
            <button type="button" class="btn btn-md" <?php if($pager <= 1){ echo "disabled";}?>>
                <a href="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif?pager=<?php echo $prev."".$info_where."".$info_show; if(!empty($_GET['page'])){ echo "&page=tambahpensiun"; } ?>">Prev</a>
            </button>
            <button type="button" class="btn btn-md">
                <a href="<?php echo base_url(); ?>index.php/karyawan/tampil/aktif?pager=<?php echo $pager."".$info_where."".$info_show; if(!empty($_GET['page'])){ echo "&page=tambahpensiun"; } ?>">Next</a>
            </button>
        </ul>
        <p style="float:left;"><?php echo "Halaman Ke <span style='color:red;'>".$pager."</span> Tampilan <span style='color:red;'>".$batasawal."</span> dari Total <span style='color:red;'>".$total_home."</span>";?></p>
        </fieldset>
        </section>
    </div>
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>    
    </footer>
</div>

