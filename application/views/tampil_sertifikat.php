
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/sertifikat/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">           
                <br><br>
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="20%">Judul</th>  
                        <th width="20%">Penyelenggara</th>  
                        <th width="15%">Kota</th>
                        <th width="15%">Tahun Seminar</th>
                        <th width="10%">hasil</th>
                        <th width="10%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($sertifikat as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryTrainSeminar'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['judul'];?></td>
                            <td><?php echo $d['penyelenggara'];?></td>
                            <td><?php echo $d['kota'];?></td>
                            <td><?php echo $d['thn_seminar'];?></td>
                            <td><?php echo $d['hasil'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/sertifikat/edit/<?php echo $d['idKaryTrainSeminar']; ?>">
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