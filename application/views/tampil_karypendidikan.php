
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karypendidikan/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="2%"></th>
                        <th width="3%">No</th>
                        <th width="30%">Nama Sekolah</th>  
                        <th width="10%">Tingkat Pendidikan</th>  
                        <th width="10%">Jurusan</th>
                        <th width="10%">Program</th>
                        <th width="10%">Kota</th>
                        <th width="10%">Graduate</th>
                        <th width="10%">Tahun Tamat</th>
                        <th width="5%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($pendidikan as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryPend'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaSekolah'];?></td>
                            <td><?php echo $d['tingkatPend'];?></td>
                            <td><?php echo $d['jurusan'];?></td>
                            <td><?php echo $d['program'];?></td>
                            <td><?php echo $d['kota'];?></td>
                            <td><?php echo $d['Graduate'];?></td>
                            <td><?php echo $d['thnTamat'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/karypendidikan/edit/<?php echo $d['idKaryPend']; ?>">
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