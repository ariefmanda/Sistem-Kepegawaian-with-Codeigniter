
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/anak/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">                <?php 
                if(!empty($info))
                {
                    echo "<br><br><p style='color:red;' class='form-title'>".$info."</p>";
                }
                ?>
                <br><br>
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%"></th>
                        <th width="5%">No</th>
                        <th width="20%">Nama Anak</th>  
                        <th width="20%">Jenis Kelamin</th>  
                        <th width="20%">Tanggal Lahir</th>
                        <th width="10%">Usia</th>
                        <th width="20%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($anak as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idAnak'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaAnak'];?></td>
                            <td><?php echo $d['jenisKelamin'];?></td>
                            <td><?php echo $d['tglLahir'];?></td>
                            <td><?php echo $d['umur'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/anak/edit/<?php echo $d['idAnak']; ?>">
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