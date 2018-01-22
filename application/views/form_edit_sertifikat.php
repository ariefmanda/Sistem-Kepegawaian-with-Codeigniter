
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Sertifikat</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/sertifikat/editkan/<?php echo $idKaryTrainSeminar; ?>" enctype="multipart/form-data">
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
                            <label class="control-label col-md-4">Judul :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?php echo $judul; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Hasil :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="hasil" placeholder="Hasil" value="<?php echo $hasil; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="control-label col-md-4">Penyelenggara :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" value="<?php echo $penyelenggara; ?>" required>
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
                            <label class="control-label col-md-4">Tahun Sertifikat :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control" name="thn_seminar" value="<?php echo $thn_seminar; ?>" required>
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