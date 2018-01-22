<section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
    <fieldset>
        <legend>Karyawan Terbaik</legend>
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
        <br>
        <br>            
        <table class="table table-bordered" border="1" width="100%">
        <tr style="background-color:#efeded;">
            <th width="5%">No</th>
            <th width="15%">Nama Lengkap</th>  
            <th width="10%">Jenis Kelamin</th>  
            <th width="10%">Organisasi</th>
            <th width="10%">Department</th>
            <th width="10%">Jabatan</th>
            <th width="10%">Tanggal Lahir</th>
            <th width="5%">Umur</th>
            <th width="5%">Nilai</th>
            <th width="10%">Aksi</th>
        </tr>
        <?php 
            $data_karyawan = $this->model->GetD("tbl_hasil_akhir.hasil_akhir, tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap
                FROM tbl_karyawan JOIN tbl_hasil_akhir ON tbl_karyawan.idKaryawan = tbl_hasil_akhir.idKaryawan
                where tbl_karyawan.statusKerja = 'aktif' ORDER by tbl_hasil_akhir.hasil_akhir desc");
            $data_aspek = $this->model->GetData("tbl_aspek order by id_aspek asc");
            $data_kelompok = $this->model->GetData("tbl_kelompok");
            foreach ($data_karyawan as $a) {
                $total_ranking = 0;
                foreach ($data_aspek as $d) {
                        $tot=0;
                    foreach ($data_kelompok as $c) {
                        $data = $this->model->GetD("(sum(tbl_bobot.bobot)),count(*)
                            from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                            join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                            join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                            where tbl_karyawan.idKaryawan = ".$a['idKaryawan']." 
                            and tbl_faktor.kelompok = '".$c['nama_kelompok']."' 
                            and tbl_faktor.id_aspek = ".$d['id_aspek']."
                            order by tbl_faktor.id_faktor ASC");
                        $total = round(($data[0]['(sum(tbl_bobot.bobot))']) / ($data[0]['count(*)']),1);
                        $tot = ((($c['prosentase'] / 100) * $total) + $tot);
                    }
                    $total_ranking = ((($d['prosentase'] / 100) * $tot) + $total_ranking);
                }
                $data = array(
                    'hasil_akhir' => $total_ranking,
                    );
                $where = array('idKaryawan' => $a['idKaryawan']);
                $this->db->update('tbl_hasil_akhir',$data,$where);
            }
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
            $data = $this->model->GetD("tbl_hasil_akhir.hasil_akhir, tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
                , tbl_departemen.namaDept as namaDept
                FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
                JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
                JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan 
                JOIN tbl_hasil_akhir ON tbl_karyawan.idKaryawan = tbl_hasil_akhir.idKaryawan
                JOIN tbl_departemen ON tbl_departemen.idDept = tbl_pekerjaan.idDept
                where tbl_karyawan.statusKerja = 'aktif' $where ORDER by tbl_hasil_akhir.hasil_akhir desc LIMIT ".$page.",".$batasawal);
            foreach ($data as $d) {
            ?>
            <tr>
                <td style="text-align:center;"><?php echo $no++;?></td>
                <td style="text-align:center;"><?php echo $d['namaLengkap'];?></td>
                <td style="text-align:center;"><?php echo $d['jenisKelamin'];?></td>
                <td style="text-align:center;"><?php echo $d['namaOrg'];?></td>
                <td style="text-align:center;"><?php echo $d['namaDept'];?></td>
                <td style="text-align:center;"><?php echo $d['namaJabatan'];?></td>
                <td style="text-align:center;"><?php echo $d['tglLahir'];?></td>
                <td style="text-align:center;"><?php echo $d['usia'];?></td>
                <td style="text-align:center;"><?php echo $d['hasil_akhir'];?></td>
                <td>
                    <?php if($this->session->userdata('username') == $d['namaLengkap'] || $this->session->userdata('level') == 'admin'){ ?>
                        <a style="float:left" href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=nilai_karyawan&idKaryawan=<?php echo $d['idKaryawan']; ?>">
                            <button type="button" class="btn btn-info btn-xs"?>Detail</button>
                        </a>

                    <?php } if($this->session->userdata('level') == 'admin'){ ?>
                        <p style="float:left">||</p>        
                        <a style="float:left" href="<?php echo base_url(); ?>index.php/profile_matcing/hapus/nilai_terbaik/<?php echo $d['idKaryawan']; ?>">
                            <button type="button" class="btn btn-danger btn-xs"?>Hapus</button>
                        </a>
                    <?php } ?>
                </td>
            </tr>
            <?php
                } 
            ?>
        </table>
        <?php 
            $no=0;
            $data = $this->model->GetD("tbl_hasil_akhir.hasil_akhir, tbl_karyawan.idKaryawan, tbl_karyawan.namaLengkap, tbl_karyawan.jenisKelamin, tbl_pekerjaan.idPekerjaan, tbl_pekerjaan.idKaryawan, tbl_pekerjaan.idOrg, tbl_organisasi.namaOrg, tbl_jabatan.namaJabatan, tbl_karyawan.tglLahir, tbl_karyawan.usia, tbl_karyawan.statusKerja, tbl_karyawan.namaFoto
                FROM tbl_karyawan JOIN tbl_pekerjaan ON tbl_karyawan.idKaryawan = tbl_pekerjaan.idKaryawan
                JOIN tbl_organisasi ON tbl_organisasi.idOrg = tbl_pekerjaan.idOrg
                JOIN tbl_jabatan ON tbl_jabatan.idJabatan = tbl_pekerjaan.idJabatan
                JOIN tbl_hasil_akhir ON tbl_karyawan.idKaryawan = tbl_hasil_akhir.idKaryawan 
                where tbl_karyawan.statusKerja = 'aktif' $where ORDER by tbl_hasil_akhir.hasil_akhir desc");
            foreach ($data as $d) {
                $no++;
            }
            $a = explode(".", $no / $batasawal);
            $b = $a[0];
            $prev = $pager-1;
        ?>
        <ul class="pagination" style="float:right; margin-top:-10px;">
            <button type="button" class="btn btn-md" <?php if($pager <= 0){ echo "disabled";}?>>
                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=terbaik&pager=<?php echo $prev."".$info_where."".$info_show; ?>">Prev</a>
            </button>
            <button type="button" class="btn btn-md" <?php if($pager++ == $b){ echo "disabled";}?>>
                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=terbaik&pager=<?php echo $pager."".$info_where."".$info_show; ?>">Next</a>
            </button>
        </ul>
        <p style="float:left;"><?php echo "Halaman Ke <span style='color:red;'>".$pager."</span> Tampilan <span style='color:red;'>".$batasawal."</span> dari Total <span style='color:red;'>".$no."</span>";?></p>
    </fieldset>
</section>