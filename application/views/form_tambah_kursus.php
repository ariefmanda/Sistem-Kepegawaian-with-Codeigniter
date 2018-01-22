<div class="container">
    <h3 style="text-align:center;">Tambah Kursus Karyawan</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/karypendidikannf/tambahkan" enctype="multipart/form-data">
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
                    <label class="control-label col-md-4">Judul Kursus :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="judulKursus" placeholder="Judul Kursus" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Penyelenggara :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Kota :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Durasi (Bulan):</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" min="1" name="durasi" placeholder="Durasi" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Tahun Sertifikat :</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="thnSertifikat" required>
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
