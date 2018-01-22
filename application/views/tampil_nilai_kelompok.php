        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <table class="table table-bordered" border="1" width="50%">
            <tr style="background-color:#efeded;">
                <th width="10%">No</th>
                <th width="40%">Nama Kelompok</th> 
                <th width="40%">Prosentase</th>
                <th width="10%">Aksi</th>
            </tr>
            <?php 
                $nomer=1;
                $data = $this->model->GetData("tbl_kelompok");
                foreach ($data as $d) {
                ?>
                <tr>
                    <td><?php echo $nomer?></td>
                    <td><?php echo $d['nama_kelompok'];?></td>
                    <td><?php echo $d['prosentase'];?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=nilai_kelompok&aksi=edit&nama_kelompok=<?php echo $d['nama_kelompok']."&prosentase=".$d['prosentase']; ?>">
                            <button type="button" class="btn btn-info btn-xs" style="float:left;">Edit</button>
                        </a>
                    </td>
                </tr>
            <?php
                $nomer++;
                } 
            ?>
            </table>
        </section>
    </div>