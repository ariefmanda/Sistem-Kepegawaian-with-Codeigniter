
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Pengalaman Organisasi</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_organisasi/editkan/<?php echo $idKaryPengOrg; ?>" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <label class="control-label col-md-4">Nama Karyawan :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <label class="control-label col-md-4">Organisasi :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="Organisasi" placeholder="Organisasi" value="<?php echo $Organisasi; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <label class="control-label col-md-4">Posisi Terakhir :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="posisiTerakhir" placeholder="Posisi Terakhir" value="<?php echo $posisiTerakhir; ?>" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <label class="control-label col-md-4">Kota :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo $kota; ?>" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <label class="control-label col-md-4">Tahun Keluar :</label>
                        <div class="col-md-7">
                            <input type="date" class="form-control" name="thnKeluar" value="<?php echo $thnKeluar; ?>" placeholder="Tahun Keluar" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <label class="control-label col-md-4"></label>
                        <div class="col-md-7">
                            <input type="submit" name="btnSubmit" value="Edit">
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