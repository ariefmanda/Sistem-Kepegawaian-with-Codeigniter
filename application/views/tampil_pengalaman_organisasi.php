<br><br>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_organisasi/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="25%">Organisasi</th>  
                        <th width="25%">Posisi Terakhir</th>
                        <th width="25%">Kota</th>  
                        <th width="30%">Tahun Keluar</th>
                        <th width="5%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($pengalaman_organisasi as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryPengOrg'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['Organisasi'];?></td>
                            <td><?php echo $d['posisiTerakhir'];?></td>
                            <td><?php echo $d['kota'];?></td>
                            <td><?php echo $d['thnKeluar'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/pengalaman_organisasi/edit/<?php echo $d['idKaryPengOrg']; ?>">
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