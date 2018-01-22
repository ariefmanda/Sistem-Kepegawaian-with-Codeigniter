        <section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
            <fieldset>
                <legend>Pilih Karyawan</legend>
                <form style="float:left;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                    <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                    <p style="float:left;">Show &nbsp;:</p>
                    <input type="hidden" class="form-control" name="where" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                    <input type="number" min="1" max="10" class="form-control" style="width:60%" name="show" placeholder="0" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; } else { echo "5"; }?>">
                </form>
                <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                    <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                    <input type="text" class="form-control" name="where" placeholder="Cari Nama" autofocus="autofocus">
                    <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
                </form>
                <br><br>
                <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="5%">No</th>
                    <th width="25%">Nama Lengkap</th> 
                    <th width="15%">Jenis Kelamin</th>
                    <th width="10%">Organisasi</th>
                    <th width="10%">Deparment</th>
                    <th width="10%">Jabatan</th>
                    <th width="15%">Nilai Karyawan</th>
                    <th width="5%">Aksi</th>
                </tr>
                <?php 
                    $pager = 0;
                    $no=1;
                    $page=0;
                    $where ="";
                    $batasawal = 5;
                    $info_where = "&where=";
                    $info_show  = "&show=";
                    if(!empty($_GET['where'])){
                        $where = "AND tbl_karyawan.namaLengkap like '%".$_GET['where']."%'";
                        $info_where = "&where=".$_GET['where'];
                    }
                    if(!empty($_GET['show'])){
                        $batasawal = $_GET['show'];
                        $info_show = "&show=".$_GET['show'];
                    }
                    if(!empty($_GET['pager'])){
                        $pager = $_GET['pager'];
                        if($_GET['pager']>=1){
                            $no = $_GET['pager']*$batasawal+1; 
                            $page = $_GET['pager']*$batasawal;
                        }
                    }
                    $nomer=1;
                    $data = $this->model->GetD("tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
                        ,tbl_departemen.namaDept
                        FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
                        JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
                        JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
                        JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
                        where tbl_karyawan.statusKerja = 'aktif' $where ORDER by tbl_karyawan.idKaryawan asc LIMIT ".$page.",".$batasawal);
                    $data_ranking = $this->model->GetData("tbl_hasil_akhir order by idKaryawan asc");
                    $no=0;
                    foreach ($data_ranking as $c) {
                        $no++;
                    }
                    $n=0;
                    foreach ($data as $d) {
                        if(!empty($data_ranking[$n]['idKaryawan'])){
                            if($data_ranking[$n]['idKaryawan'] == $d['idKaryawan']){
                                $n++;
                                continue;
                            }
                        }
                    ?>
                    <tr>
                        <td><?php echo $nomer?></td>
                        <td><?php echo $d['namaLengkap'];?></td>
                        <td><?php echo $d['jenisKelamin'];?></td>
                        <td><?php echo $d['namaOrg'];?></td>
                        <td><?php echo $d['namaDept'];?></td>
                        <td><?php echo $d['namaJabatan'];?></td>
                        <td>
                            Tidak Ada Nilai
                        </td>
                        <td>
                            <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/form?page=input_nilai&aksi=pilih<?php if (!empty($_GET['idKaryawan'])){ echo "&idKaryawan=".$_GET['idKaryawan']; } ?>" enctype="multipart/form-data">
                                <input type="hidden" name="idKaryawan" value="<?php echo $d['idKaryawan']; ?>">
                                <button type="submit" class="btn btn-warning btn-xs" style="float:left;">Pilih</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $nomer++;
                    } 
                ?>
                </table>
            </fieldset>
        </section>
    </div>