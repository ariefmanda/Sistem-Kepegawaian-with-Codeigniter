
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
                    <h3>Selamat Datang <?php echo "<span style='color:green;'>".ucfirst($this->session->userdata('username'))."</span>"; ?> <br><br></h3>
                    <p>Anda Berhasil masuk ke halaman <b>Sistem Informasi Kepegawaian PT SUARA MERDEKA PRESS</b></p>
                    <?php if($this->session->userdata('level') == 'admin'){ ?>
                      <p>Anda Masuk Sebagai Admin atau Pimpinan Untuk Mengelola Semua Yang Ada Pada Sistem Informasi Kepegawaian</p>
                    <?php } else if($this->session->userdata('level') == 'user'){ ?>
                      <p>Anda Masuk Sebagai User</p>
                    <?php } ?>
        </div>
                </div>
    </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>