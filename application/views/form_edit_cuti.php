
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <h3 style="text-align:center;">Edit Cuti</h3>
    <hr>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/cuti/editkan/<?php echo $idCuti; ?>" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
                <input type="hidden" value="<?php echo $proses; ?>" name="proses">
                <input type="hidden" class="form-control" name="jumlahHariEdit" value="<?php echo $jumlahHari; ?>">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Nama Lengkap :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="namaLengkap" value="<?php echo $namaLengkap; ?>" disabled>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Mulai Cuti :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control" name="mulaiCuti" placeholder="Mulai Cuti" value="<?php echo $mulaiCuti; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Jumlah Hari Cuti :</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="jumlahHari" min="1" max="6" placeholder="Jumlah Hari" value="<?php echo $jumlahHari; ?>" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Keterangan :</label>
                            <div class="col-md-7">
                                <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan" required><?php echo $keterangan; ?></textarea>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7">
                                <input type="submit" name="btnSubmit" value="Edit">
                            </div>
                        </div>
                        </form>
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