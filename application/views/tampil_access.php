 <?php if ($this->session->userdata('level') == 'admin'){?>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
        <h3 style="text-align:center;">Access Level</h3>
        <font color="red"><center>*Admin</center></font>
    <hr>
            <form style="float:right;" method="get" action="<?php echo base_url(); ?>Login/cari">
                <input type="text" name="input_cari" placeholder="Cari nama">
                <button type="submit" class="btn btn-info btn-sm">Cari</button>
            </form>
            <table class="table table-bordered" border="1" width="50%">
                <tr style="background-color:#efeded;">
                    <th width="2%">No</th>
                    <th width="15%">Nama Lengkap</th>
                    <th width="10%">Email</th>
                    <th width="10%">Organisasi</th>
                    <th width="10%">Jabatan</th>
                    <th width="10%">Level</th>
                    <th width="10%">Akun</th>
                    <th width="10%">Aksi Level</th>
                </tr>
                <?php 
                    $no=1;
                    foreach ($data as $d) {
                ?>

                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d['username'];?></td>
                        <td><?php echo $d['email'];?></td>
                        <td><?php echo $d['namaOrg'];?></td>
                        <td><?php echo $d['namaJabatan'];?></td>
                        <td><?php echo $d['level'];?></td>
                        <td><?php if($d['statusAkun']==2){echo "Akun tidak aktif";}else{if($d['statusAkun']==0){echo "Belum verifikasi";} else{echo "Aktif";}};?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>login/level/<?php echo $d['idKaryawan']; ?>/admin">
                                <button type="button" class="btn btn-success btn-sm" style="float:left;">Admin</button>
                            </a>
                            <a href="<?php echo base_url(); ?>login/level/<?php echo $d['idKaryawan']; ?>/user">
                                <button type="button" class="btn btn-danger btn-sm" style="float:left;">User</button>
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

<?php }?>
