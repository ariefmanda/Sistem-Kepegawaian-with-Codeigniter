
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Pendidikan Karyawan</h3>
            <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karypendidikan/editkan/<?php echo $idKaryPend; ?>" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Nama Karyawan :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Nama Sekolah :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="namaSekolah" placeholder="Nama Sekolah" value="<?php echo $namaSekolah; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Tingkat Pendidikan :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="tingkatPend" placeholder="Tingkat Pendidikan" value="<?php echo $tingkatPend; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Jurusan :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Program :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="program" value="<?php echo $program; ?>" >
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Kota :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="kota" value="<?php echo $kota; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Graduate :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="Graduate" value="<?php echo $Graduate; ?>" >
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Tahun Tamat :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control" name="thnTamat" value="<?php echo $thnTamat; ?>" required>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-8">
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