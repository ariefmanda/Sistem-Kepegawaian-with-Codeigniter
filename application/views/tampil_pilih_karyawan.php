<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        <h1>
        </h1>
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <h3>Pilih Karyawan</h3>
            <form style="float:right;" method="get" action="<?php echo base_url(); ?>index.php/cuti/cari">
                
                <input type="text" name="input_cari" placeholder="Cari Nama">
                <button type="submit" class="btn btn-info btn-sm">Cari</button>
            </form>
            <a href="<?php echo base_url(); ?>cuti/tampilCuti">
                        <button style="float:left;" type="button" class="btn btn-default btn-sm">Persetujuan Cuti</button>
                </a>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="10%">No</th>
                    <th width="18%">Nama Lengkap</th>  
                    <th width="10%">Jenis Kelamin</th>  
                    <th width="10%">Organisasi</th>
                    <th width="10%">Jabatan</th>
                    <th width="10%">Status Kerja</th>
                    <th width="15%">Aksi</th>
                </tr>
                <?php 
                    $no=1;
                    foreach ($data as $d) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['namaLengkap'];?></td>
                        <td><?php echo $d['jenisKelamin'];?></td>
                        <td><?php echo $d['namaOrg'];?></td>
                        <td><?php echo $d['namaJabatan'];?></td>
                        <td><?php echo $d['statusKerja'];?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>index.php/cuti/tampil/<?php echo $d['idKaryawan']; ?>">
                                <button type="button" class="btn btn-success btn-sm">Pilih</button>
                            </a>
                        </td>
                    </tr>
                <?php
                    } 
                ?>
            </table>
        </section>
    </div>
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>    
    </footer>
</div>

