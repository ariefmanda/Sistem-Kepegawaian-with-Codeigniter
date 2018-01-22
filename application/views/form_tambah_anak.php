<div class="container">
    <?php
    if (!empty($_GET['info'])) {
        echo "<h3 style='color:green;' class='form-title'>".$_GET['info']."</h3>";
    }
    ?>
    <h3 style="text-align:center;">Tambah Anak</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/anak/tambahkan" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
        <div class="col-md-12">
            <div class="col-md-9">
                <div class="col-md-8">
                    <label class="control-label col-md-4">Nama Lengkap :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Nama Anak :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="namaAnak" placeholder="Nama Anak" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Jenis Kelamin :</label>
                    <div class="col-md-7">
                        <select name="jenisKelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <div class="col-md-8">
                    <label class="control-label col-md-4">Tanggal Lahir :</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="tglLahir" required>
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