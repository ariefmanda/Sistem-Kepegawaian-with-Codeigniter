
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">                
                <br><br>
                <table class="table table-bordered" border="1" width="100%">
                    <tr style="background-color:#efeded;">
                        <th width="5%">No</th>
                        <th width="10%">Selisih</th>  
                        <th width="10%">Nilai Gap</th>
                        <th width="65%">Keterangan</th>
                        <th width="10%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        $data = $this->model->GetData("tbl_bobot order by bobot desc");
                        foreach ($data as $d) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['selisih'];?></td>
                            <td><?php echo $d['bobot'];?></td>
                            <td><?php echo $d['keterangan'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=nilai_gap&aksi=edit&selisih=<?php echo $d['selisih']."&bobot=".$d['bobot']."&keterangan=".$d['keterangan']; ?>" style="float:left;">
                                    <button type="button" class="btn btn-info btn-xs">Edit</button>
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