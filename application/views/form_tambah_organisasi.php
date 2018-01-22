
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tambah Organisasi    
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
    	<div class="container">
        	<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/organisasi/tambahkan" enctype="multipart/form-data">
    			
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Nama Organisasi :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="namaOrg" placeholder="Nama Organisasi" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                                <label class="control-label col-md-4">Alamat :</label>
                                <div class="col-md-7">
                                    <textarea type="text" class="form-control" name="alamatOrg" placeholder="Alamat Organisasi" required></textarea>
                                </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7">
                                <input type="submit" name="btnSubmit" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
    		</form>
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