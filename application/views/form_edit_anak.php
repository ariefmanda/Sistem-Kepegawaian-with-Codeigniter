
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Anak</h3>
    <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/anak/editkan/<?php echo $idAnak; ?>" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Nama Lengkap :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                            </div>
                        </div>    
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Nama Anak :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="namaAnak" placeholder="Nama Anak" value="<?php echo $namaAnak; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Jenis Kelamin :</label>
                            <div class="col-md-7">
                                <select name="jenisKelamin">
                                    <option value="Laki-laki" <?php if($jenisKelamin == 'Laki-laki'){ echo "selected";} ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if($jenisKelamin == 'Perempuan'){ echo "selected";} ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Tanggal Lahir :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control" name="tglLahir" value="<?php echo $tglLahir; ?>" required>
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