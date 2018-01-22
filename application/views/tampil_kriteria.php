
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <a href="?page=kriteria&aksi=tambah">
                <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Tambah">
            </a>
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">                
                <?php 
                if(!empty($info))
                {
                    echo "<br><br><p style='color:red;' class='form-title'>".$info."</p>";
                }
                ?>
                <br><br>
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%">No</th>
                        <th width="25%">Aspek</th>  
                        <th width="25%">Presentase</th>
                        <th width="10%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        $data = $this->model->GetData("tbl_aspek order by id_aspek asc");
                        foreach ($data as $d) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['aspek'];?></td>
                            <td><?php echo $d['prosentase'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=kriteria&aksi=edit&id_aspek=<?php echo $d['id_aspek']."&aspek=".$d['aspek']."&prosentase=".$d['prosentase'];?>" style="float:left;">
                                    <button type="button" class="btn btn-info btn-xs">Edit</button>
                                </a>
                                <p style="float:left;">||</p>
                                <a href="<?php echo base_url(); ?>index.php/profile_matcing/hapus/kriteria/<?php echo $d['id_aspek']; ?>" style="float:left;">
                                    <button type="button" class="btn btn-danger btn-xs">Hapus</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    $no++;
                        } 
                    ?>
                </table>
            </form>
        </section>
    </div>