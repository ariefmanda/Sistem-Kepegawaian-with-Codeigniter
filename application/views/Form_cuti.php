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
                    <a href="?page=konfirmasi">
                        <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'konfirmasi'){ echo "style='background-color:#42c5f4;'"; }?>>Konfirmasi</button>
                    </a>
                </div>
                <?php 
                    if(!empty($_GET['page'])){
                        if($_GET['page'] == 'konfirmasi'){
                            $this->load->view('tampil_setuju_cuti');
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