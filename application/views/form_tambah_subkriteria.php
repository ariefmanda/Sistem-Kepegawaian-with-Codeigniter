<div class="container">
    <h3 style="text-align:center;">Tambah Sub Kriteria</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/profile_matcing/tambahkan/subkriteria" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-8">
                    <label class="control-label col-md-4">Aspek :</label>
                    <div class="col-md-7">
                        <select class="form-control" name="id_aspek">
                            <?php 
                                $data = $this->model->GetData("tbl_aspek order by id_aspek asc");
                                foreach ($data as $d) {
                                ?>
                                    <option value="<?php echo $d['id_aspek']; ?>"><?php echo $d['aspek']; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Faktor :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="faktor" placeholder="Faktor" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Nilai :</label>
                    <div class="col-md-7">
                        <input type="number" min="1" max="5" class="form-control" name="nilai" placeholder="nilai" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Kelompok :</label>
                    <div class="col-md-7">
                        <select class="form-control" name="kelompok">
                            <option value="core">Core</option>
                            <option value="secondary">Secondary</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4"></label>
                    <div class="col-md-7">
                        <input type="submit" name="btnSubmit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>