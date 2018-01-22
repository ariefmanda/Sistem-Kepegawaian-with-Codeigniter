<div class="container">
    <br>
    <a href="<?php echo base_url(); ?>index.php/karyawan/tambah_info/orang_tua/<?php echo $idKaryawan;?>?orang=tua">
        <?php if(empty($_GET['orang'])){ echo "<button>Edit</button>";} ?>
    </a>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karyawan/orang_tua/<?php echo $idKaryawan; ?>" enctype="multipart/form-data">
        <?php if(!empty($_GET['orang'])){ echo '<input type="submit" name="btnSubmit" value="Editkan" style="float:left;">';} ?>
        <input type="hidden" class="form-control" name="page" value="anak">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <div align="center"><h3>Orang Tua</h3></div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ayah :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaAyah" placeholder="Nama Ayah" value="<?php echo $namaAyah; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ibu</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaIbu" placeholder="Nama Ibu" value="<?php echo $namaIbu; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat Orang Tua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="alamatOrtu" placeholder="Alamat Orang Tua" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>><?php echo $alamatOrtu; ?></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota Orang Tua</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kotaOrtu" placeholder="Kota Alamat Orang Tua" value="<?php echo $kotaOrtu; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Provinsi Orang Tua</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="provOrtu" placeholder="Provinsi Orang Tua" value="<?php echo $provOrtu; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kode POS Orang Tua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="kodeposOrtu" placeholder="Kode POS Alamat Orang Tua" value="<?php echo $kodeposOrtu; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nomor Telpon Orang Tua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="telpOrtu" placeholder="Nomor Telpon Orang Tua" value="<?php echo $telpOrtu; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <div align="center"><h3>Mertua</h3></div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ayah Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaAyahMertua" placeholder="Nama Ayah Mertua" value="<?php echo $namaAyahMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nama Ibu Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="namaIbuMertua" placeholder="Nama Ibu Mertua" value="<?php echo $namaIbuMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Alamat Mertua :</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="alamatMertua" placeholder="Alamat Mertua" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>><?php echo $alamatMertua; ?></textarea>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kota Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kotaMertua" placeholder="Kota Mertua" value="<?php echo $kotaMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Provinsi Mertua :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="provinsiMertua" placeholder="Provinsi Mertua" value="<?php echo $provinsiMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Kode POS Mertua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="kodeposMertua" placeholder="Kode POS Alamat Orang Tua" value="<?php echo $kodeposMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4">Nomor Telpon Mertua</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="telpMertua" placeholder="Nomor HP Mertua" value="<?php echo $telpMertua; ?>" <?php if(empty($_GET['orang'])){ echo "disabled";} ?>>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label col-md-4"></label>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
           
</div>