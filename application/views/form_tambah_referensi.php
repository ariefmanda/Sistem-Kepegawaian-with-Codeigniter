<div class="container">
    <h3 style="text-align:center;">Tambah Referensi Keluarga</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/referensi/tambahkan" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $idKaryawan; ?>" name="idKaryawan">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Nama Karyawan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" value="<?php echo $namaLengkap; ?>" disabled>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Nama :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="namaRef" placeholder="Nama" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Hubungan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="relasi" placeholder="Relasi" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Alamat :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Nomer Telephone :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" min="1" name="telp" placeholder="Nomer Telephone" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4"></label>
                    <div class="col-md-7">
                        <input type="submit" name="btnSubmit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
