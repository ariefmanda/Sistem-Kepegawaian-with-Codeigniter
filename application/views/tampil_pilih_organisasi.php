<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <h3>Pilih Departemen</h3>
            <form style="float:right;" method="get" action="<?php echo base_url(); ?>index.php/jabatan/cari">
                <input type="text" name="input_cari" placeholder="Cari Organisasi">
                <button type="submit" class="btn btn-info btn-sm">Cari</button>
            </form>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="10%">No</th>
                    <th width="20%">Organisasi</th>
                    <th width="20%">Departemen</th>
                    <th width="5%">Aksi</th>
                </tr>
                <?php 
                    $no=1;
                    foreach ($data as $d) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['namaOrg'];?></td>
                        <td><?php echo $d['namaDept'];?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>index.php/jabatan/tampil/<?php echo $d['idDept']; ?>">
                                <button type="button" class="btn btn-success btn-sm" style="float:left;">Pilih</button>
                            </a>
                        </td>
                    </tr>
                <?php
                    } 
                ?>
            </table>
        </section>
    </div>
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>    
    </footer>
</div>

