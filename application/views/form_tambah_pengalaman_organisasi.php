<div class="container">
    <h3 style="text-align:center;">Tambah Pengalaman Organisasi</h3>
    <hr>
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/pengalaman_organisasi/tambahkan" enctype="multipart/form-data">
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
                    <label class="control-label col-md-4">Organisasi :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="Organisasi" placeholder="Organisasi" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <label class="control-label col-md-4">Posisi Terakhir :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="posisiTerakhir" placeholder="Posisi Terakhir" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Kota :</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <label class="control-label col-md-4">Tahun Keluar :</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="thnKeluar" placeholder="Tahun Keluar" required>
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