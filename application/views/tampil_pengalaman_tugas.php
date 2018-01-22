<br><br>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_tugas/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="30%">Nama Perusahaan</th>  
                        <th width="20%">Kegiatan</th>  
                        <th width="20%">Kota</th>
                        <th width="15%">Tahun</th>
                        <th width="5%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($pengalaman_tugas as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryPengTugas'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaPerusahaan'];?></td>
                            <td><?php echo $d['Kegiatan'];?></td>
                            <td><?php echo $d['kota'];?></td>
                            <td><?php echo $d['tahun'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/pengalaman_tugas/edit/<?php echo $d['idKaryPengTugas']; ?>">
                                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    $no++;
                        } 
                    ?>
                </table>
                <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Hapus">
            </form>
        </section>
    </div>