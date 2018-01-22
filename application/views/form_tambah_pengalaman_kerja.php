<div class="container">
    <h3 style="text-align:center;">Tambah Pengalaman Kerja</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_kerja/tambahkan" enctype="multipart/form-data">
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
                    <label class="control-label col-md-4">Perusahaan :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="perusahaan" placeholder="Perusahaan" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Kota :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Jabatan Terakhir :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="JabatanTerakhir" placeholder="Jabatan Terakhir" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">GajiTerakhir :</label>
                    <div class="col-md-7">
                        <input type="number" class="form-control" name="GajiTerakhir" placeholder="Gaji Terakhir" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Masa Kerja :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="MasaKerja" placeholder="Masa Kerja" required>
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