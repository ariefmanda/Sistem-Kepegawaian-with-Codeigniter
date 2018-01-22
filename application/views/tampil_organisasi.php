<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
        <h1>
        Data Organisasi
        </h1>
        </section>
        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <a href="<?php echo base_url(); ?>index.php/organisasi/tambah">
                <button type="button" class="btn btn-info btn-sm" style="float:left;">Tambah</button>
            </a>
            <br><br>
            <table class="table table-bordered" border="1" width="50%">
                <tr style="background-color:#efeded;">
                    <th width="2%">No</th>
                    <th width="10%">Nama Organisasi</th>
                    <th width="20%">Alamat Organisasi</th>
                    <th width="7%">Aksi</th>
                </tr>
                <?php 
                    $no=1;
                    foreach ($data as $d) {
                ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $d['namaOrg'];?></td>
                        <td><?php echo $d['alamatOrg'];?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>index.php/organisasi/edit/<?php echo $d['idOrg']; ?>">
                                <button type="button" class="btn btn-success btn-sm" style="float:left;">Edit</button>
                            </a>
                            <a href="<?php echo base_url(); ?>index.php/organisasi/hapus/<?php echo $d['idOrg']; ?>">
                                <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php
                $no++;
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

