
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Pengalaman Kerja</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_kerja/editkan/<?php echo $idKaryPengKerja; ?>" enctype="multipart/form-data">
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
                            <label class="control-label col-md-4">Perusahaan :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Kota :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo $kota; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Jabatan Terakhir :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="JabatanTerakhir" placeholder="Jabatan Terakhir" value="<?php echo $JabatanTerakhir; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">GajiTerakhir :</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="Gaji Terakhir" placeholder="Gaji Terakhir" value="<?php echo $GajiTerakhir; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Masa Kerja :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="MasaKerja" placeholder="Masa Kerja" value="<?php echo $MasaKerja; ?>" required>
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