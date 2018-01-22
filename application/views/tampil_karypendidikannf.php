<section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karypendidikannf/hapus/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
        <br><br>
        <table class="table table-bordered" border="1" width="100%">
            <tr style="background-color:#efeded;">
                <th width="2%"></th>
                <th width="5%">No</th>
                <th width="20%">Judul Kursus</th>  
                <th width="20%">Penyelenggara</th>  
                <th width="18%">Kota</th>
                <th width="10%">Durasi</th>
                <th width="15%">Tahun Sertifikat</th>
                <th width="10%">Aksi</th>
            </tr>
            <?php 
                $no=1;
                foreach ($kursus as $d) {
            ?>
                <tr>
                    <td><input type="checkbox" name="cek_<?php echo $no; ?>" value="<?php echo $d['idKaryPendNF'];?>"></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $d['judulKursus'];?></td>
                    <td><?php echo $d['penyelenggara'];?></td>
                    <td><?php echo $d['kota'];?></td>
                    <td><?php echo $d['durasi'];?></td>
                    <td><?php echo $d['thnSertifikat'];?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php/karypendidikannf/edit/<?php echo $d['idKaryPendNF']; ?>">
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
