<section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
    <fieldset>
        <?php if($_GET['page'] == 'nilai_karyawan'){?>
            <legend>Nilai Karyawan</legend>
            <form style="float:left;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                <p style="float:left;">Show &nbsp;:</p>
                <input type="hidden" class="form-control" name="where" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                <input type="number" min="1" max="10" class="form-control" style="width:60%" name="show" placeholder="0" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; } else { echo "5"; }?>">
                <input type="hidden" class="form-control" name="idKaryawan" value="<?php echo $_GET['idKaryawan']; ?>">
            </form>
            <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                <input type="text" class="form-control" name="where" placeholder="Cari Sub Kriteria" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
                <input type="hidden" class="form-control" name="idKaryawan" value="<?php echo $_GET['idKaryawan']; ?>">
            </form>
            <br><br>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="5%">No</th>
                    <th width="22%">Nama Lengkap</th>
                    <th width="20%">Kriteria</th>  
                    <th width="20%">Sub Kriteria</th>
                    <th width="10%">Nilai Terbaik</th>
                    <th width="13%">Nilai Karyawan</th>
                    <th width="5%">Hasil</th>
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
                        $where = "and tbl_faktor.faktor like '%".$_GET['where']."%'";
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
                    $data = $this->model->GetD("tbl_karyawan.namaLengkap, tbl_aspek.aspek, tbl_faktor.faktor as faktor, tbl_faktor.nilai as nilai_terbaik, tbl_test.nilai as nilai_karyawan, (tbl_test.nilai - tbl_faktor.nilai) as nilai_gap
                        from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                        join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                        join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                        join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek
                        where tbl_test.idKaryawan = ".$_GET['idKaryawan']." $where  
                        order by tbl_faktor.id_faktor ASC, tbl_aspek.id_aspek asc LIMIT ".$page.",".$batasawal);
                    foreach ($data as $d) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['namaLengkap'];?></td>
                        <td><?php echo $d['aspek'];?></td>
                        <td><?php echo $d['faktor'];?></td>
                        <td><?php echo $d['nilai_terbaik'];?></td>
                        <td><?php echo $d['nilai_karyawan'];?></td>
                        <td><?php echo $d['nilai_gap'];?></td>
                    </tr>
                <?php
                    } 
                ?>
            </table>
            <?php
                $data = $this->model->GetD("count(*) from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                        join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                        join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                        join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek
                        where tbl_test.idKaryawan = ".$_GET['idKaryawan']." $where
                        order by tbl_faktor.id_faktor ASC, tbl_aspek.id_aspek asc");
                $a = explode(".", $data[0]['count(*)'] / $batasawal);
                $b = $a[0];
                $prev = $pager-1;
            ?>
            <ul class="pagination" style="float:right; margin-top:-10px;">
                <button type="button" class="btn btn-md" <?php if($pager <= 0){ echo "disabled";}?>>
                    <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=nilai_karyawan&pager=<?php echo $prev."".$info_where."".$info_show."&idKaryawan=".$_GET['idKaryawan']; ?>">Prev</a>
                </button>
                <button type="button" class="btn btn-md" <?php if($pager++ == $b){ echo "disabled";}?>>
                    <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=nilai_karyawan&pager=<?php echo $pager."".$info_where."".$info_show."&idKaryawan=".$_GET['idKaryawan']; ?>">Next</a>
                </button>
            </ul>
            <p style="float:left;"><?php echo "Halaman Ke <span style='color:red;'>".$pager."</span> Tampilan <span style='color:red;'>".$batasawal."</span> dari Total <span style='color:red;'>".$data[0]['count(*)']."</span>";?></p>
        <?php } else if($_GET['page'] == 'nilai_bobot'){?>
            <legend>Nilai Bobot</legend>
            <form style="float:left;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                <p style="float:left;">Show &nbsp;:</p>
                <input type="hidden" class="form-control" name="where" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                <input type="number" min="1" max="10" class="form-control" style="width:60%" name="show" placeholder="0" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; } else { echo "5"; }?>">
                <input type="hidden" class="form-control" name="idKaryawan" value="<?php echo $_GET['idKaryawan']; ?>">
            </form>
            <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form">
                <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
                <input type="text" class="form-control" name="where" placeholder="Cari Sub Kriteria" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
                <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
                <input type="hidden" class="form-control" name="idKaryawan" value="<?php echo $_GET['idKaryawan']; ?>">
            </form>
            <br><br>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="5%">No</th>
                    <th width="22%">Nama Lengkap</th>
                    <th width="20%">Kriteria</th>  
                    <th width="20%">Sub Kriteria</th>
                    <th width="10%">Nilai Bobot</th>
                    <th width="13%">Kelompok</th>
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
                        $where = "and tbl_faktor.faktor like '%".$_GET['where']."%'";
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
                    $data = $this->model->GetD("tbl_karyawan.namaLengkap as nama_lengkap, tbl_aspek.aspek as aspek, tbl_faktor.faktor as faktor, tbl_bobot.bobot as nilai_bobot, tbl_faktor.kelompok as kelompok
                        from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                        join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                        join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                        join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek
                        where tbl_test.idKaryawan = ".$_GET['idKaryawan']." $where 
                        order by tbl_faktor.id_faktor ASC, tbl_aspek.id_aspek asc LIMIT ".$page.",".$batasawal);
                    foreach ($data as $d) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_lengkap'];?></td>
                        <td><?php echo $d['aspek'];?></td>
                        <td><?php echo $d['faktor'];?></td>
                        <td><?php echo $d['nilai_bobot'];?></td>
                        <td><?php echo $d['kelompok'];?></td>
                    </tr>
                <?php
                    } 
                ?>
            </table>
            <?php
                $data = $this->model->GetD("count(*) from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                        join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                        join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                        join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek $where
                        where tbl_test.idKaryawan = ".$_GET['idKaryawan']." 
                        order by tbl_faktor.id_faktor ASC, tbl_aspek.id_aspek asc");
                $a = explode(".", $data[0]['count(*)'] / $batasawal);
                $b = $a[0];
                $prev = $pager-1;
            ?>
            <ul class="pagination" style="float:right; margin-top:-10px;">
                <button type="button" class="btn btn-md" <?php if($pager <= 0){ echo "disabled";}?>>
                    <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=nilai_bobot&pager=<?php echo $prev."".$info_where."".$info_show."&idKaryawan=".$_GET['idKaryawan']; ?>">Prev</a>
                </button>
                <button type="button" class="btn btn-md" <?php if($pager++ == $b){ echo "disabled";}?>>
                    <a href="<?php echo base_url(); ?>index.php/profile_matcing/form?page=nilai_bobot&pager=<?php echo $pager."".$info_where."".$info_show."&idKaryawan=".$_GET['idKaryawan']; ?>">Next</a>
                </button>
            </ul>
            <p style="float:left;"><?php echo "Halaman Ke <span style='color:red;'>".$pager."</span> Tampilan <span style='color:red;'>".$batasawal."</span> dari Total <span style='color:red;'>".$data[0]['count(*)']."</span>";?></p>
        <?php } else if($_GET['page'] == 'nilai_kelompok'){?>
            <legend>Nilai Kelompok</legend>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="5%">No</th>
                    <th width="22%">Nama Lengkap</th>
                    <th width="10%">Kriteria</th>
                    <th width="15%">Nilai Core</th>  
                    <th width="15%">Nilai Secondary</th>
                    <th width="15%">Nilai Total</th>
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
                        $where = "where aspek like '%".$_GET['where']."%'";
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
                    $data_karyawan = $this->model->GetData("tbl_karyawan where idKaryawan = ".$_GET['idKaryawan']);
                    $data_aspek = $this->model->GetData("tbl_aspek order by id_aspek asc");
                    $data_kelompok = $this->model->GetData("tbl_kelompok");
                    $total_ranking = 0;
                    $nomer=1;
                    foreach ($data_aspek as $d) {
                            ?>
                                <tr>
                                    <td><?php echo $nomer++; ?></td>
                                    <td><?php echo $data_karyawan[0]['namaLengkap']; ?></td>
                                    <td><?php echo $d['aspek']; ?></td>
                            <?php
                            $tot=0;
                        foreach ($data_kelompok as $c) {
                            $data = $this->model->GetD("(sum(tbl_bobot.bobot)),count(*)
                                from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                                join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                                join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                                where tbl_karyawan.idKaryawan = ".$_GET['idKaryawan']."  
                                and tbl_faktor.kelompok = '".$c['nama_kelompok']."' 
                                and tbl_faktor.id_aspek = ".$d['id_aspek']."
                                order by tbl_faktor.id_faktor ASC");
                            $total = round(($data[0]['(sum(tbl_bobot.bobot))']) / ($data[0]['count(*)']),1);
                            ?>
                                <td><?php echo $total; ?></td>
                            <?php
                                $tot = ((($c['prosentase'] / 100) * $total) + $tot);
                                }
                            ?>
                                <td><?php echo $tot; ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
            
        <?php } else if($_GET['page'] == 'nilai_akhir'){
                $data_aspek = $this->model->GetData("tbl_aspek order by id_aspek asc");
            ?>
            <legend>Nilai Akhir</legend>
            <table class="table table-bordered" border="1" width="100%">
                <tr style="background-color:#efeded;">
                    <th width="5%">No</th>
                    <th width="22%">Nama Lengkap</th>
                    <?php 
                        foreach ($data_aspek as $d) {
                            echo "<th width='15%'>Nilai ".$d['aspek']."</th>"; 
                        }
                    ?>
                    <th width='15%'>Hasil Akhir</th>
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
                        $where = "where aspek like '%".$_GET['where']."%'";
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
                    $data_karyawan = $this->model->GetData("tbl_karyawan where idKaryawan = ".$_GET['idKaryawan']);
                    $data_kelompok = $this->model->GetData("tbl_kelompok");
                    $total_ranking = 0;
                    echo "<tr><td>1</td><td>".$data_karyawan[0]['namaLengkap']."</td>";
                    foreach ($data_aspek as $d) {
                            $tot=0;
                        foreach ($data_kelompok as $c) {
                            $data = $this->model->GetD("(sum(tbl_bobot.bobot)),count(*)
                                from tbl_test join tbl_faktor on tbl_faktor.id_faktor = tbl_test.id_faktor
                                join tbl_karyawan on tbl_karyawan.idKaryawan = tbl_test.idKaryawan
                                join tbl_bobot on tbl_bobot.selisih = (tbl_test.nilai - tbl_faktor.nilai)
                                where tbl_karyawan.idKaryawan = ".$_GET['idKaryawan']." 
                                and tbl_faktor.kelompok = '".$c['nama_kelompok']."' 
                                and tbl_faktor.id_aspek = ".$d['id_aspek']."
                                order by tbl_faktor.id_faktor ASC");
                            $total = round(($data[0]['(sum(tbl_bobot.bobot))']) / ($data[0]['count(*)']),1);
                            $tot = ((($c['prosentase'] / 100) * $total) + $tot);
                        }
                        echo "<td>".round((($d['prosentase'] / 100) * $tot),2)."</td>";
                        $total_ranking = ((($d['prosentase'] / 100) * $tot) + $total_ranking);
                    }
                    echo "<td>".$total_ranking."</td></tr>";
                ?>
            </table>
        <?php } ?>
    </fieldset>
</section>
