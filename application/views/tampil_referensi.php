
<!-- Main content -->
<section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/referensi/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data"> 
        <br><br>
        <table class="table table-bordered" border="1" width="100%">
            <tr style="background-color:#efeded;">
                <th width="5%"></th>
                <th width="5%">No</th>
                <th width="20%">Nama Referensi</th>  
                <th width="20%">Relasi</th>  
                <th width="30%">Alamat</th>
                <th width="10%">Nomer Telp</th>
                <th width="10%">Aksi</th>
            </tr>
            <?php 
                $no=1;
                foreach ($referensi as $d) {
            ?>
                <tr>
                    <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryRefKeluarga'];?>"></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['namaRef'];?></td>
                    <td><?php echo $d['relasi'];?></td>
                    <td><?php echo $d['alamat'];?></td>
                    <td><?php echo $d['telp'];?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php/referensi/edit/<?php echo $d['idKaryRefKeluarga']; ?>">
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