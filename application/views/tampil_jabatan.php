<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        <h1>
        Data Jabatan
        </h1>
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <a href="<?php echo base_url(); ?>jabatan/tambah/<?php echo $idDept; ?>">
                <button type="button" class="btn btn-info btn-sm" style="float:left;">Tambah</button>
            </a>
            <p style="float:left;">&nbsp;</p>
            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>jabatan/hapus/<?php echo $idDept; ?>" enctype="multipart/form-data">
                    <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Hapus">
                <br>
                <br>
                Nama Organisasi : <?php echo $c[0]['namaOrg']; ?>
                <br>
                Nama Departemen : <?php echo $e[0]['namaDept']; ?>
                <?php 
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
                        <th width="20%">Nama Jabatan</th>  
                        <th width="20%">Aksi</th>
                    </tr>
                    <?php 
                        $no=1;
                        foreach ($b as $d) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idJabatan'];?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d['namaJabatan'];?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>jabatan/edit/<?php echo $d['idJabatan']; ?>">
                                    <button type="button" class="btn btn-success btn-sm">Edit</button>
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
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>    
    </footer>
</div>

