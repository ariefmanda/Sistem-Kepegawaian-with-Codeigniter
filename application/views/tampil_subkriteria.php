<section class="content" style="margin:0px 10px 0px 10px; background-color:white;">
    <fieldset>
        <legend>Sub Kriteria</legend>
        <a href="?page=subkriteria&aksi=tambah">
            <input type="submit" name="btnSubmit" class="btn btn-info btn-sm" style="float:left;" value="Tambah">
        </a>
        <br style="clear:both;">
        <br style="clear:both;">
        <form style="float:left;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form_master">
            <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
            <p style="float:left;">Show &nbsp;:</p>
            <input type="hidden" class="form-control" name="where" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
            <input type="number" min="1" max="10" class="form-control" style="width:60%" name="show" placeholder="0" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; } else { echo "5"; }?>">
        </form>
        <form style="float:right;" method="GET" action="<?php echo base_url(); ?>index.php/profile_matcing/form_master">
            <input type="hidden" class="form-control" name="page" value="<?php echo $_GET['page']; ?>">
            <input type="text" class="form-control" name="where" placeholder="Cari Sub Kriteria" value="<?php if(!empty($_GET['where'])){ echo $_GET['where']; }?>">
            <input type="hidden" class="form-control" name="show" value="<?php if(!empty($_GET['show'])){ echo $_GET['show']; }?>">
        </form>
        <br><br>
        <table class="table table-bordered" border="1" width="100%">
            <tr style="background-color:#efeded;">
                <th width="5%">No</th>
                <th width="25%">Sub Kriteria</th>
                <th width="20%">Jenis Kriteria</th>  
                <th width="20%">Nilai</th>
                <th width="17%">Kelompok</th>
                <th width="13%">Aksi</th>
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
                    $where = "where tbl_faktor.faktor like '%".$_GET['where']."%'";
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
                $data = $this->model->GetD("tbl_faktor.id_faktor, tbl_faktor.id_aspek, tbl_faktor.faktor, tbl_aspek.aspek, tbl_faktor.nilai, tbl_faktor.kelompok 
                    from tbl_aspek JOIN tbl_faktor ON tbl_aspek.id_aspek = tbl_faktor.id_aspek 
                    $where order by tbl_aspek.id_aspek asc,tbl_faktor.id_faktor ASC LIMIT ".$page.",".$batasawal);
                foreach ($data as $d) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['faktor'];?></td>
                    <td><?php echo $d['aspek'];?></td>
                    <td><?php echo $d['nilai'];?></td>
                    <td><?php echo $d['kelompok'];?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=subkriteria&aksi=edit&id_faktor=<?php echo $d['id_faktor']."&id_aspek=".$d['id_aspek']."&faktor=".$d['faktor']."&nilai=".$d['nilai']."&kelompok=".$d['kelompok']; ?>" style="float:left;">
                            <button type="button" class="btn btn-info btn-xs">Edit</button>
                        </a>
                        <p style="float:left;">||</p>
                        <a href="<?php echo base_url(); ?>index.php/profile_matcing/hapus/subkriteria/<?php echo $d['id_faktor']; ?>" style="float:left;">
                            <button type="button" class="btn btn-danger btn-xs">Hapus</button>
                        </a>
                    </td>
                </tr>
            <?php
                } 
            ?>
        </table>
        <?php
            $no=0;
            $data = $this->model->GetD("tbl_faktor.id_faktor, tbl_faktor.id_aspek, tbl_faktor.faktor, tbl_aspek.aspek, tbl_faktor.nilai, tbl_faktor.kelompok 
                    from tbl_aspek JOIN tbl_faktor ON tbl_aspek.id_aspek = tbl_faktor.id_aspek 
                    $where order by tbl_faktor.id_faktor ASC, tbl_aspek.id_aspek asc");
            foreach ($data as $d) {
                $no++;
            }
            $a = explode(".", $no / $batasawal);
            $b = $a[0];
            $prev = $pager-1;
        ?>
        <ul class="pagination" style="float:right; margin-top:-10px;">
            <button type="button" class="btn btn-md" <?php if($pager <= 0){ echo "disabled";}?>>
                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=subkriteria&pager=<?php echo $prev."".$info_where."".$info_show; ?>">Prev</a>
            </button>
            <button type="button" class="btn btn-md" <?php if($pager++ == $b){ echo "disabled";}?>>
                <a href="<?php echo base_url(); ?>index.php/profile_matcing/form_master?page=subkriteria&pager=<?php echo $pager."".$info_where."".$info_show; ?>">Next</a>
            </button>
        </ul>
        <p style="float:left;"><?php echo "Halaman Ke <span style='color:red;'>".$pager."</span> Tampilan <span style='color:red;'>".$batasawal."</span> dari Total <span style='color:red;'>".$no."</span>";?></p>
    </fieldset>
</section>