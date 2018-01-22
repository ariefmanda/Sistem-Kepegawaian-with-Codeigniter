<div class="container">
    <h3 style="text-align:center;">Masukan Nilai</h3>
    <hr>
    <?php   
        $data_komponen = $this->model->GetD("tbl_faktor.faktor as faktor, tbl_aspek.aspek as aspek , tbl_aspek.id_aspek as id_aspek
            from tbl_faktor join tbl_aspek on tbl_aspek.id_aspek = tbl_faktor.id_aspek 
            order by tbl_aspek.id_aspek asc, tbl_faktor.id_faktor asc");
        $data_aspek = $this->model->GetData("tbl_aspek order by id_aspek asc");
        $data_karyawan = $this->model->GetData("tbl_karyawan where idKaryawan = ".$_POST['idKaryawan']); 
        $data_skala = $this->model->GetData("tbl_skala order by id_skala asc");
    ?>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/tambah" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label col-md-6">Nama Karyawan :</label>
                <div class="col-md-6">
                    <select class="form-control" name="idKaryawan" >
                        <option value="<?php echo $data_karyawan[0]['idKaryawan']; ?>"><?php echo $data_karyawan[0]['namaLengkap']; ?></option>
                    </select>
                </div>
            </div>
        </div>
    <?php
        echo "<div><p>Skala Penilaian</p>";
        foreach ($data_skala as $d) {
            echo $d['id_skala']." = ".$d['skala'];
            echo "<br>";
        }
        echo "</div>";
    ?>
        <div class="col-md-12">
            <?php
            $no=1;
            foreach ($data_aspek as $aspek) {
                echo "<h3 style='text-align:center;''>".$aspek['aspek']."</h3><hr>";
                foreach ($data_komponen as $faktor) {
                    if($aspek['id_aspek'] == $faktor['id_aspek']){
                        ?>
                        <div class="col-md-6">
                            <label class="control-label col-md-6"><?php echo $faktor['faktor']; ?> :</label>
                            <div class="col-md-3">
                                <input type="number" name="<?php echo $no++; ?>" placeholder="skala" min="1" max="5" required>
                            </div>
                        </div>
                        <?php
                    } else {
                        continue;
                    }
                }
            }
            ?>
            <br>
            <br>
            <br>
            <div class="col-md-6">
                <label class="control-label col-md-6"></label>
                <div class="col-md-3">
                    <input type="submit" name="btnSubmit" value="Simpan">
                </div>
            </div>
        </div>
    </form>    
</div>