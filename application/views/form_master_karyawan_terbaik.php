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
                    <a href="?page=kriteria">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'kriteria'){ echo "style='background-color:#42c5f4;'";} ?>>Kriteria</button>
                    </a>
                    <a href="?page=subkriteria">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'subkriteria'){ echo "style='background-color:#42c5f4;'";} ?>>Sub Kriteria</button>
                    </a>
                    <a href="?page=nilai_gap">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_gap'){ echo "style='background-color:#42c5f4;'";} ?>>Nilai GAP</button>
                    </a>
                    <a href="?page=nilai_kelompok">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'nilai_kelompok'){ echo "style='background-color:#42c5f4;'";} ?>>Nilai Kelompok</button>
                    </a>
                </div>
                <?php 
                    if(empty($_GET['page'])){
                        echo "DEKSKRIPSI FITUR";
                    }
                    if(!empty($_GET['page'])){
                        if($_GET['page'] == 'kriteria'){
                            if(!empty($_GET['aksi'])){
                                if($_GET['aksi'] == 'tambah'){
                                    $this->load->view('form_tambah_kriteria');
                                } else if($_GET['aksi'] == 'edit'){
                                    $this->load->view('form_edit_kriteria');
                                }
                            }    
                            $this->load->view('tampil_kriteria');
                        }
                        if($_GET['page'] == 'subkriteria'){
                            if(!empty($_GET['aksi'])){
                                if($_GET['aksi'] == 'tambah'){
                                    $this->load->view('form_tambah_subkriteria');
                                } else if($_GET['aksi'] == 'edit'){
                                    $this->load->view('form_edit_subkriteria');
                                }
                            }    
                            $this->load->view('tampil_subkriteria');
                        }
                        if($_GET['page'] == 'nilai_gap'){
                            if(!empty($_GET['aksi'])){
                                if($_GET['aksi'] == 'edit'){
                                    $this->load->view('form_edit_nilai_gap');
                                }
                            }
                            $this->load->view('tampil_nilai_gap');
                        }
                        if($_GET['page'] == 'nilai_kelompok'){
                            if(!empty($_GET['aksi'])){
                                if($_GET['aksi'] == 'edit'){
                                    $this->load->view('form_edit_nilai_kelompok');
                                }
                            }
                            $this->load->view('tampil_nilai_kelompok');
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