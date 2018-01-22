
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        <h1>
        </h1>
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <h3>Persetujuan Cuti</h3>
            <form style="float:right;" method="get" action="<?php echo base_url(); ?>cuti/cari">
                <input type="hidden" name="page" placeholder="Cari Nama" value="<?php echo $_GET['page']; ?>">
                <input type="text" name="input_cari" autofocus="autofocus" placeholder="Cari Nama">
                <button type="submit" class="btn btn-info btn-sm">Cari</button>
            </form>
             <div class="w3-bar w3-light-grey">
                    
                        <a href="?page=konfirmasi_cuti">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'konfirmasi_cuti'){ echo "style='background-color:#42c5f4;'"; } ?>>Konfirmasi</button>
                        </a>
                        <a href="?page=terkonfirmasi">
                            <button class="w3-bar-item w3-button" <?php if($_GET['page'] == 'terkonfirmasi'){ echo "style='background-color:#42c5f4;'"; } ?>>Terkonfirmasi</button>
                        </a>
                </div><br>
                
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%">No</th>
                        <th width="15%">Nama Pegawai</th>
                        <th width="10%">Organisasi</th>
                        <th width="10%">Departemen</th>
                        <th width="10%">Jabatan</th>    
                        <th width="8%">Mulai Cuti</th>  
                        <th width="5%">Jumlah Hari</th>  
                        <th width="20%">Keterangan Cuti</th>
                        <th width="7%">Proses</th>
                        <th width="30%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        
                        foreach ($data as $d) {
                            if($_GET['page']=="konfirmasi_cuti" && $d['proses']=="Menunggu"){
                    ?>
                    
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaLengkap'];?></td>
                            <td><?php echo $d['namaOrg'];?></td>
                            <td><?php echo $d['namaDept'];?></td>
                            <td><?php echo $d['namaJabatan'];?></td>
                            <td><?php echo $d['mulaiCuti'];?></td>
                            <td><?php echo $d['jumlahHari'];?></td>
                            <td><?php echo $d['keterangan'];?></td>
                            <td><?php echo $d['proses'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/cuti/proses/<?php echo $d['idCuti'];?>/<?php echo"Disetujui?page=".$_GET['page'];?>">
                                    <button type="button" class="btn btn-success btn-sm" style="float:left;">Setujui</button>
                                </a>
                                <a href="<?php echo base_url(); ?>index.php/cuti/proses/<?php echo $d['idCuti'];?>/<?php echo"Tidak_Disetujui?page=".$_GET['page'];?>">
                                    <button type="button" class="btn btn-danger btn-sm" style="float:left;">Tidak</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    $no++;
                        } 
                    ?>
                    
                    <?php 
                        $no=1;
                        if($_GET['page']=="terkonfirmasi" && $d['proses']!="Menunggu"){
                    ?>
                    
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaLengkap'];?></td>
                            <td><?php echo $d['namaOrg'];?></td>
                            <td><?php echo $d['namaDept'];?></td>
                            <td><?php echo $d['namaJabatan'];?></td>
                            <td><?php echo $d['mulaiCuti'];?></td>
                            <td><?php echo $d['jumlahHari'];?></td>
                            <td><?php echo $d['keterangan'];?></td>
                            <td><?php echo $d['proses'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/cuti/proses/<?php echo $d['idCuti'];?>/<?php echo"Menunggu?page=".$_GET['page'];?>">
                                    <button type="button" class="btn btn-danger btn-sm" style="float:left;">Batalkan</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    $no++;
                        } }
                    ?>
                </table>
             
        </section>
    </div>
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>    
    </footer>
</div>
