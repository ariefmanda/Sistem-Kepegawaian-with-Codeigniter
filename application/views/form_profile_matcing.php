<script src="<?php echo base_url(); ?>js/jquery-2..1.4.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
            <div class="w3-container">
                <div class="w3-bar w3-light-grey">
                    <a href="?page=terbaik">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'terbaik'){ echo "style='background-color:#42c5f4;'"; }?>>Terbaik</button>
                    </a>
                    <?php if($this->session->userdata('level') == 'admin'){ ?>
                        <a href="?page=input_nilai<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'input_nilai'){ echo "style='background-color:#42c5f4;'"; } ?>>Input Nilai</button>
                        </a>
                    <?php } ?>
                        <a href="?page=nilai_karyawan<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_karyawan'){ echo "style='background-color:#42c5f4;'"; } if(empty($_GET['idKaryawan'])){ echo "disabled"; } ?>>Nilai Karyawan</button>
                        </a>
                    <?php if($this->session->userdata('level') == 'admin'){ ?>
                        <a href="?page=nilai_bobot<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_bobot'){ echo "style='background-color:#42c5f4;'"; } if(empty($_GET['idKaryawan'])){ echo "disabled"; } ?>>Nilai Bobot</button>
                        </a>
                        <a href="?page=nilai_kelompok<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_kelompok'){ echo "style='background-color:#42c5f4;'"; } if(empty($_GET['idKaryawan'])){ echo "disabled"; } ?>>Nilai Kelompok</button>
                        </a>
                        <a href="?page=nilai_akhir<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_akhir'){ echo "style='background-color:#42c5f4;'"; } if(empty($_GET['idKaryawan'])){ echo "disabled"; } ?>>Nilai Akhir</button>
                        </a>
                        <?php } ?>
                </div>
                <?php 
                    if(!empty($_GET['page'])){
                        if($_GET['page'] == 'terbaik'){
                            $this->load->view('tampil_karyawan_terbaik');
                        } else if($_GET['page'] == 'input_nilai'){
                            if(!empty($_GET['aksi'])){
                                if($_GET['aksi'] == 'pilih'){
                                    $this->load->view('form_input_nilai');    
                                } 
                            } else {
                                $this->load->view('tampil_pilih_karyawan_terbaik');
                            }
                        } else if($_GET['page'] == 'nilai_karyawan' || $_GET['page'] == 'nilai_bobot' || $_GET['page'] == 'nilai_kelompok' || $_GET['page'] == 'nilai_akhir'){
                            $this->load->view('tampil_detail_profile_matcing');    
                        }
                    }
                ?>
            </div>  
        </section>
    </div>


      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        
      </footer>

      <div class="control-sidebar-bg"></div>
    </div>