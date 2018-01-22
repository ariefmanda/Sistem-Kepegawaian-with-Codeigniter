
<div class="wrapper">
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tambah Cuti
      </h1>
    </section>
    <section class="content" style="margin:10px 10px 0px 10px; background-color:white;">
        <div class="container">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>cuti/tambahkanCuti" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
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
                                <input type="date" class="form-control" name="mulaiCuti" placeholder="Mulai Cuti" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Jumlah Hari Cuti :</label>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="jumlahHari" min="1" max="6" placeholder="Jumlah Hari" value="1" required>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4">Keterangan :</label>
                            <div class="col-md-7">
                                <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan" required></textarea>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-8">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7">
                                <input type="submit" name="btnSubmit" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/cuti/hapus" enctype="multipart/form-data">                <?php 
                if(!empty($info))
                {
                    echo "<br><br><p style='color:red;' class='form-title'>".$info."</p>";
                }
                ?>

                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="20%">Mulai Cuti</th>  
                        <th width="10%">Jumlah Hari</th>  
                        <th width="30%">Keterangan</th>
                        <th width="20%">Proses Persetujuan <?php if($this->session->userdata('level') == 'admin'){ ?> (cetak pdf) <?php } ?></th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($c as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idCuti'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['mulaiCuti'];?></td>
                            <td><?php echo $d['jumlahHari'];?></td>
                            <td><?php echo $d['keterangan'];?></td>
                            <td>
                            <?php if($d['proses']=='Disetujui'){ ?> 
                                <a href="<?php echo base_url(); ?>cuti/PDF/<?php echo $d['idCuti']; ?>/<?php echo $d['idKaryawan']; ?>/<?php echo $d['proses']; ?>" target="blank">
                                    <?php echo $d['proses'];?>
                                </a>
                            <?php
                                } else{
                                    echo $d['proses'];
                                }
                            ?>
                            </td>
                        </tr>
                    <?php
                    $no++;
                        } 
                    ?>
                </table>
                <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Hapus">
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