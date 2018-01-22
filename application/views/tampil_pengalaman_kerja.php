<br><br>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_kerja/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="20%">Perusahan</th>  
                        <th width="15%">Kota</th>  
                        <th width="20%">Jabatan Terakhir</th>
                        <th width="15%">Gaji Terakhir</th>
                        <th width="15%">Masa Kerja</th>
                        <th width="5%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($pengalaman_kerja as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryPengKerja'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['perusahaan'];?></td>
                            <td><?php echo $d['kota'];?></td>
                            <td><?php echo $d['JabatanTerakhir'];?></td>
                            <td><?php echo $d['GajiTerakhir'];?></td>
                            <td><?php echo $d['MasaKerja'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/pengalaman_kerja/edit/<?php echo $d['idKaryPengKerja']; ?>">
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