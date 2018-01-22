
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
            <div class="w3-container">
                <div class="w3-bar w3-light-grey">
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/<?php if($idKaryawan == 'kosong'){ echo "tambah/karyawan/kosong"; } else { echo 'tambah_info/karyawan/'.$idKaryawan; } if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                        <button class="w3-bar-item w3-button" <?php if($page == 'karyawan'){ echo "style='background-color:#a2ada6;'"; }?>>Karyawan</button>
                    </form>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; } if($page  == 'anak' || $page  == 'referensi' || $page  == 'orang_tua' || $page  == 'refkeluarga'){ echo "style='background-color:#a2ada6;'";}?>>Keluarga</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/anak/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'anak'){ echo "style='background-color:#a2ada6;'"; }?>>Anak</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/referensi/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'referensi'){ echo "style='background-color:#a2ada6;'"; }?>>Referensi Keluarga</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/orang_tua/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'orang_tua'){ echo "style='background-color:#a2ada6;'"; }?>>Orang Tua</button>
                            </form>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; } if($page == 'pendidikan' || $page == 'sertifikat' || $page == 'kursus'){ echo "style='background-color:#a2ada6;'";}?>>Pendidikan</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/pendidikan/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'pendidikan'){ echo "style='background-color:#a2ada6;'"; }?>>Sekolah</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/kursus/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'kursus'){ echo "style='background-color:#a2ada6;'"; }?>>Kursus</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/sertifikat/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'sertifikat'){ echo "style='background-color:#a2ada6;'"; }?>>Sertifikat</button>
                            </form>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover">
                        <button class="w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; } if($page == 'pengalaman_kerja' || $page == 'pengalaman_tugas' || $page == 'pengalaman_organisasi' || $page == 'penghargaan'){ echo "style='background-color:#a2ada6;'";}?>>Pengalaman</button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4">
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/pengalaman_kerja/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'pengalaman_kerja'){ echo "style='background-color:#a2ada6;'"; }?>>Pengalaman Kerja</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/pengalaman_tugas/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'pengalaman_tugas'){ echo "style='background-color:#a2ada6;'"; }?>>Pengalaman Tugas</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/penghargaan/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'penghargaan'){ echo "style='background-color:#a2ada6;'"; }?>>Penghargaan</button>
                            </form>
                            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/karyawan/tambah_info/pengalaman_organisasi/<?php echo $idKaryawan; if(!empty($_GET['page'])){ echo "?page=edit"; }?>" enctype="multipart/form-data">
                                <button class="w3-bar-item w3-button" <?php if($idKaryawan == 'kosong'){ echo "disabled"; }?> <?php if($page == 'pengalaman_organisasi'){ echo "style='background-color:#a2ada6;'"; }?>>Pengalaman Organisasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Karyawan">
                <?php if($page == 'karyawan' && empty($_GET['page'])){ 
                        $this->load->view('form_tambah_karyawan'); 
                    }
                    if($page == 'karyawan' && !empty($_GET['page'])){
                        $this->load->view('form_edit_karyawan');
                    }
                    ?>
            </div>  
            <div id="Anak">
                <?php if($page == 'anak'){ 
                    $this->load->view('form_tambah_anak');
                    $this->load->view('tampil_anak');
                }?>
            </div>
            <div id="Pendidikan">
                <?php if($page == 'pendidikan'){ 
                    $this->load->view('form_tambah_pendidikan_karyawan'); 
                    $this->load->view('tampil_karypendidikan');
                }?>
            </div> 
            <div id="Kursus">
                <?php if($page == 'kursus'){ 
                    $this->load->view('form_tambah_kursus'); 
                    $this->load->view('tampil_karypendidikannf');
                }?>
            </div> 
            <div id="Sertifikat">
                <?php if($page == 'sertifikat'){ 
                    $this->load->view('form_tambah_sertifikat'); 
                    $this->load->view('tampil_sertifikat');
                }?>
            </div>
            <div id="Referensi">
                <?php if($page == 'referensi'){ 
                    $this->load->view('form_tambah_referensi');
                    $this->load->view('tampil_referensi');
                }?>
            </div>
            <div id="Orang_tua">
                <?php if($page == 'orang_tua'){ 
                    $this->load->view('form_edit_orang_tua');
                }?>
            </div>
            <div id="Pengalaman_kerja">
                <?php if($page == 'pengalaman_kerja'){ 
                    $this->load->view('form_tambah_pengalaman_kerja');
                    $this->load->view('tampil_pengalaman_kerja');
                }?>
            </div>
            <div id="Pengalaman_tugas">
                <?php if($page == 'pengalaman_tugas'){ 
                    $this->load->view('form_tambah_pengalaman_tugas');
                    $this->load->view('tampil_pengalaman_tugas');
                }?>
            </div>
            <div id="Penghargaan">
                <?php if($page == 'penghargaan'){ 
                    $this->load->view('form_tambah_penghargaan');
                    $this->load->view('tampil_penghargaan');
                }?>
            </div> 
            <div id="pengalaman_organisasi">
                <?php if($page == 'pengalaman_organisasi'){ 
                    $this->load->view('form_tambah_pengalaman_organisasi');
                    $this->load->view('tampil_pengalaman_organisasi');
                }?>
            </div>  
        </section>
    </div>


      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        
      </footer>

      <div class="control-sidebar-bg"></div>
    </div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>